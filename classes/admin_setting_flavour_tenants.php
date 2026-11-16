<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin setting: map Boost Union flavours to MuTMS tenants (inline on MuTMS tab).
 *
 * @package    theme_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Flavour → MuTMS tenant applicability UI saved into theme_everon_flavour_apply.
 */
class theme_everon_admin_setting_flavour_tenants extends admin_setting {

    /**
     * @param string $name
     * @param string $visiblename
     * @param string $description
     */
    public function __construct($name, $visiblename, $description) {
        parent::__construct($name, $visiblename, $description, '{}');
    }

    /**
     * Current mappings as JSON (table is source of truth).
     *
     * @return string
     */
    public function get_setting() {
        return $this->encode_current_maps();
    }

    /**
     * @return string
     */
    public function get_defaultsetting() {
        return '{}';
    }

    /**
     * Persist mappings from the admin form payload.
     *
     * @param string|array $data
     * @return string Empty on success, else error.
     */
    public function write_setting($data) {
        $maps = $this->normalize_posted_maps($data);
        if ($maps === null) {
            return get_string('flavourtenantsmapinvalid', 'theme_everon');
        }

        $flavours = $this->load_flavours();
        foreach ($flavours as $flavour) {
            $fid = (int) $flavour->id;
            $apply = !empty($maps[$fid]['apply']);
            $tenantids = [];
            if (!empty($maps[$fid]['tenants']) && is_array($maps[$fid]['tenants'])) {
                $tenantids = $maps[$fid]['tenants'];
            }
            \theme_everon\local\flavours::save_apply($fid, $apply, $tenantids);
        }

        \theme_everon\local\flavours::cleanup_orphans();
        \theme_everon\local\flavours::purge_flavour_caches();

        // Keep a mirror in plugin config so admin change detection stays stable.
        $encoded = $this->encode_current_maps();
        return ($this->config_write($this->name, $encoded) ? '' : get_string('errorsetting', 'admin'));
    }

    /**
     * @param string $data
     * @param string $query
     * @return string
     */
    public function output_html($data, $query = '') {
        global $OUTPUT;

        $flavours = $this->load_flavours();
        $tenantoptions = \theme_everon\local\flavours::tenant_options();
        $maps = $this->normalize_posted_maps($data);
        if ($maps === null) {
            $maps = $this->maps_from_records(\theme_everon\local\flavours::get_all_apply_records());
        }

        $fullname = $this->get_full_name();
        $id = $this->get_id();
        $yesno = [
            0 => get_string('no'),
            1 => get_string('yes'),
        ];

        $html = html_writer::start_div('theme-everon-flavour-tenants', [
            'id' => $id . '_ui',
            'data-region' => 'flavour-tenants',
        ]);

        if (!\theme_everon\local\mutms::is_enabled()) {
            $html .= $OUTPUT->notification(get_string('flavourtenantsneedcompat', 'theme_everon'), 'warning');
        }
        if (!\theme_everon\local\mutms::mutenancy_active()) {
            $html .= $OUTPUT->notification(get_string('flavourtenantsneedmutenancy', 'theme_everon'), 'warning');
        }

        $html .= html_writer::tag('p', get_string('flavourtenantsintro', 'theme_everon'), [
            'class' => 'form-description mb-3',
        ]);

        // Hidden store Moodle saves (JSON). Visible controls sync into it before submit.
        $encoded = json_encode($maps, JSON_UNESCAPED_SLASHES);
        if ($encoded === false) {
            $encoded = '{}';
        }
        $html .= html_writer::tag('textarea', s($encoded), [
            'name' => $fullname,
            'id' => $id,
            'class' => 'sr-only',
            'rows' => 1,
            'cols' => 60,
            'style' => 'position:absolute;left:-10000px;width:1px;height:1px;overflow:hidden;',
            'data-region' => 'flavour-tenants-store',
            'aria-hidden' => 'true',
            'tabindex' => '-1',
        ]);

        if (empty($flavours)) {
            $html .= $OUTPUT->notification(get_string('flavourtenantsnone', 'theme_everon'), 'info');
            $overview = new \core\url('/theme/boost_union/flavours/overview.php');
            $html .= html_writer::div(html_writer::link($overview, get_string('configtitleflavours', 'theme_boost_union')));
        } else {
            if (empty($tenantoptions)) {
                $html .= $OUTPUT->notification(get_string('flavourtenantstenantsnone', 'theme_everon'), 'warning');
            }

            foreach ($flavours as $flavour) {
                $fid = (int) $flavour->id;
                $apply = !empty($maps[$fid]['apply']) ? 1 : 0;
                $selectedtenants = [];
                if (!empty($maps[$fid]['tenants']) && is_array($maps[$fid]['tenants'])) {
                    $selectedtenants = array_map('intval', $maps[$fid]['tenants']);
                }

                $html .= html_writer::start_div('theme-everon-flavour-tenant border rounded p-3 mb-3', [
                    'data-region' => 'flavour-row',
                    'data-flavour-id' => $fid,
                ]);
                $html .= html_writer::tag('h4', format_string($flavour->title), ['class' => 'h5 mb-3']);

                $applyid = $id . '_f' . $fid . '_apply';
                $html .= html_writer::start_div('mb-3');
                $html .= html_writer::tag('label', get_string('flavourapplytotenants', 'theme_everon'), [
                    'class' => 'form-label',
                    'for' => $applyid,
                ]);
                $html .= html_writer::start_tag('select', [
                    'id' => $applyid,
                    'class' => 'form-select',
                    'data-region' => 'flavour-apply',
                ]);
                foreach ($yesno as $value => $label) {
                    $attrs = ['value' => $value];
                    if ((int) $value === $apply) {
                        $attrs['selected'] = 'selected';
                    }
                    $html .= html_writer::tag('option', $label, $attrs);
                }
                $html .= html_writer::end_tag('select');
                $html .= html_writer::tag('div', get_string('flavourapplytotenants_help', 'theme_everon'), [
                    'class' => 'form-text text-muted',
                ]);
                $html .= html_writer::end_div();

                $tenantsid = $id . '_f' . $fid . '_tenants';
                $html .= html_writer::start_div('mb-0', [
                    'data-region' => 'flavour-tenants-wrap',
                    'style' => $apply ? '' : 'display:none;',
                ]);
                $html .= html_writer::tag('label', get_string('flavourtenants', 'theme_everon'), [
                    'class' => 'form-label',
                    'for' => $tenantsid,
                ]);
                $html .= html_writer::start_tag('select', [
                    'id' => $tenantsid,
                    'class' => 'form-select',
                    'multiple' => 'multiple',
                    'size' => min(8, max(3, count($tenantoptions) ?: 3)),
                    'data-region' => 'flavour-tenants-select',
                ]);
                foreach ($tenantoptions as $tid => $label) {
                    $attrs = ['value' => (int) $tid];
                    if (in_array((int) $tid, $selectedtenants, true)) {
                        $attrs['selected'] = 'selected';
                    }
                    $html .= html_writer::tag('option', format_string($label), $attrs);
                }
                $html .= html_writer::end_tag('select');
                $html .= html_writer::tag('div', get_string('flavourtenants_help', 'theme_everon'), [
                    'class' => 'form-text text-muted',
                ]);
                $html .= html_writer::end_div();

                $html .= html_writer::end_div();
            }
        }

        $html .= html_writer::end_div();

        // Sync visible controls into the hidden JSON store (no nested form; no AMD required).
        $html .= html_writer::script("
(function() {
    var root = document.getElementById(" . json_encode($id . '_ui') . ");
    var store = document.getElementById(" . json_encode($id) . ");
    if (!root || !store) { return; }
    var sync = function() {
        var maps = {};
        root.querySelectorAll('[data-region=\"flavour-row\"]').forEach(function(row) {
            var fid = row.getAttribute('data-flavour-id');
            var applyEl = row.querySelector('[data-region=\"flavour-apply\"]');
            var tenantsEl = row.querySelector('[data-region=\"flavour-tenants-select\"]');
            var wrap = row.querySelector('[data-region=\"flavour-tenants-wrap\"]');
            var apply = applyEl && parseInt(applyEl.value, 10) === 1 ? 1 : 0;
            if (wrap) { wrap.style.display = apply ? '' : 'none'; }
            var tenants = [];
            if (tenantsEl) {
                Array.prototype.forEach.call(tenantsEl.selectedOptions || [], function(opt) {
                    tenants.push(parseInt(opt.value, 10));
                });
            }
            maps[fid] = {apply: apply, tenants: tenants};
        });
        store.value = JSON.stringify(maps);
    };
    root.addEventListener('change', sync);
    var form = root.closest('form');
    if (form) { form.addEventListener('submit', sync); }
    sync();
})();
");

        return format_admin_setting($this, $this->visiblename, $html, $this->description, true, '', null, $query);
    }

    /**
     * @return array<int,\stdClass>
     */
    protected function load_flavours(): array {
        global $DB;

        if (!$DB->get_manager()->table_exists('theme_boost_union_flavours')) {
            return [];
        }
        return $DB->get_records('theme_boost_union_flavours', null, 'sort ASC', 'id,title,sort');
    }

    /**
     * @return string
     */
    protected function encode_current_maps(): string {
        $maps = $this->maps_from_records(\theme_everon\local\flavours::get_all_apply_records());
        // Include all known flavours so empty/default rows are represented.
        foreach ($this->load_flavours() as $flavour) {
            $fid = (int) $flavour->id;
            if (!isset($maps[$fid])) {
                $maps[$fid] = ['apply' => 0, 'tenants' => []];
            }
        }
        ksort($maps);
        $encoded = json_encode($maps, JSON_UNESCAPED_SLASHES);
        return $encoded === false ? '{}' : $encoded;
    }

    /**
     * @param array<int,\stdClass> $records
     * @return array<int,array{apply:int,tenants:int[]}>
     */
    protected function maps_from_records(array $records): array {
        $maps = [];
        foreach ($records as $fid => $record) {
            $ids = json_decode((string) $record->applytotenants_ids, true);
            if (!is_array($ids)) {
                $ids = [];
            }
            $maps[(int) $fid] = [
                'apply' => !empty($record->applytotenants) ? 1 : 0,
                'tenants' => array_values(array_map('intval', $ids)),
            ];
        }
        return $maps;
    }

    /**
     * @param string|array|null $data
     * @return array<int,array{apply:int,tenants:int[]}>|null
     */
    protected function normalize_posted_maps($data): ?array {
        if (is_array($data)) {
            $decoded = $data;
        } else if (is_string($data)) {
            $data = trim($data);
            if ($data === '') {
                return [];
            }
            $decoded = json_decode($data, true);
            if (!is_array($decoded)) {
                return null;
            }
        } else if ($data === null || $data === false) {
            return [];
        } else {
            return null;
        }

        $maps = [];
        foreach ($decoded as $fid => $row) {
            $fid = (int) $fid;
            if ($fid <= 0 || !is_array($row)) {
                continue;
            }
            $tenants = [];
            if (!empty($row['tenants']) && is_array($row['tenants'])) {
                $tenants = array_values(array_unique(array_map('intval', $row['tenants'])));
                $tenants = array_values(array_filter($tenants, static fn(int $id): bool => $id > 0));
            }
            $maps[$fid] = [
                'apply' => !empty($row['apply']) ? 1 : 0,
                'tenants' => $tenants,
            ];
        }
        return $maps;
    }
}
