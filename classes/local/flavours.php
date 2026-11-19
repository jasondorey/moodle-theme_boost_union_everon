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
 * Everon helpers for applying Boost Union flavours to MuTMS tenants.
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_boost_union_everon\local;

defined('MOODLE_INTERNAL') || die();

/**
 * Tenant applicability for Boost Union flavours (Everon-side).
 *
 * Boost Union's flavourslib calls {@see self::cache_tenant_key()} and
 * {@see self::applies_to_active_tenant()} via a small local hook patch.
 */
final class flavours {

    /**
     * Whether tenant flavour matching should run.
     *
     * @return bool
     */
    public static function matching_enabled(): bool {
        if (!mutms::is_enabled()) {
            return false;
        }
        if (!mutms::mutenancy_active()) {
            return false;
        }
        return true;
    }

    /**
     * Tenant id fragment for the Boost Union flavours session cache key.
     *
     * @return int 0 when no active tenant / matching off
     */
    public static function cache_tenant_key(): int {
        if (!self::matching_enabled()) {
            return 0;
        }
        $tenantid = self::active_tenant_id();
        return $tenantid ?? 0;
    }

    /**
     * Current MuTMS tenant id, or null.
     *
     * @return int|null
     */
    public static function active_tenant_id(): ?int {
        if (!class_exists(\tool_mutenancy\local\tenancy::class)) {
            return null;
        }
        $tenantid = \tool_mutenancy\local\tenancy::get_current_tenantid();
        if (!$tenantid) {
            return null;
        }
        return (int) $tenantid;
    }

    /**
     * Whether the given Boost Union flavour applies to the active MuTMS tenant.
     *
     * @param \stdClass $flavour Row from theme_boost_union_flavours
     * @return bool
     */
    public static function applies_to_active_tenant(\stdClass $flavour): bool {
        if (!self::matching_enabled()) {
            return false;
        }
        $tenantid = self::active_tenant_id();
        if (!$tenantid) {
            return false;
        }
        if (empty($flavour->id)) {
            return false;
        }

        $map = self::get_apply_record((int) $flavour->id);
        if ($map === null || empty($map->applytotenants)) {
            return false;
        }
        $ids = json_decode((string) $map->applytotenants_ids, true);
        if (!is_array($ids) || empty($ids)) {
            return false;
        }
        foreach ($ids as $id) {
            if ((int) $id === $tenantid) {
                return true;
            }
        }
        return false;
    }

    /**
     * Load Everon apply row for a flavour id.
     *
     * @param int $flavourid
     * @return \stdClass|null
     */
    public static function get_apply_record(int $flavourid): ?\stdClass {
        global $DB;

        if ($flavourid <= 0 || !self::table_exists()) {
            return null;
        }
        $record = $DB->get_record('theme_boost_union_everon_flavour_apply', ['flavourid' => $flavourid]);
        return $record ?: null;
    }

    /**
     * All apply rows keyed by flavourid.
     *
     * @return array<int,\stdClass>
     */
    public static function get_all_apply_records(): array {
        global $DB;

        if (!self::table_exists()) {
            return [];
        }
        $records = $DB->get_records('theme_boost_union_everon_flavour_apply', null, 'flavourid ASC');
        $byid = [];
        foreach ($records as $record) {
            $byid[(int) $record->flavourid] = $record;
        }
        return $byid;
    }

    /**
     * Save tenant applicability for one flavour.
     *
     * @param int $flavourid
     * @param bool $apply
     * @param array $tenantids
     * @return void
     */
    public static function save_apply(int $flavourid, bool $apply, array $tenantids): void {
        global $DB;

        if ($flavourid <= 0 || !self::table_exists()) {
            return;
        }

        $tenantids = array_values(array_unique(array_map('intval', $tenantids)));
        $tenantids = array_filter($tenantids, static fn(int $id): bool => $id > 0);

        $existing = $DB->get_record('theme_boost_union_everon_flavour_apply', ['flavourid' => $flavourid]);
        if (!$apply || empty($tenantids)) {
            if ($existing) {
                $DB->delete_records('theme_boost_union_everon_flavour_apply', ['id' => $existing->id]);
            }
            return;
        }

        $record = (object) [
            'flavourid' => $flavourid,
            'applytotenants' => 1,
            'applytotenants_ids' => json_encode(array_values($tenantids)),
        ];
        if ($existing) {
            $record->id = $existing->id;
            $DB->update_record('theme_boost_union_everon_flavour_apply', $record);
        } else {
            $DB->insert_record('theme_boost_union_everon_flavour_apply', $record);
        }
    }

    /**
     * Drop mappings for flavours that no longer exist in Boost Union.
     *
     * @return void
     */
    public static function cleanup_orphans(): void {
        global $DB;

        if (!self::table_exists()) {
            return;
        }
        if (!$DB->get_manager()->table_exists('theme_boost_union_flavours')) {
            $DB->delete_records('theme_boost_union_everon_flavour_apply');
            return;
        }
        $sql = "SELECT ea.id
                  FROM {theme_boost_union_everon_flavour_apply} ea
             LEFT JOIN {theme_boost_union_flavours} f ON f.id = ea.flavourid
                 WHERE f.id IS NULL";
        $orphans = $DB->get_records_sql($sql);
        foreach ($orphans as $orphan) {
            $DB->delete_records('theme_boost_union_everon_flavour_apply', ['id' => $orphan->id]);
        }
    }

    /**
     * Purge Boost Union flavours session cache after mapping changes.
     *
     * @return void
     */
    public static function purge_flavour_caches(): void {
        \core_cache\helper::purge_by_event('theme_boost_union_flavours_edited');
    }

    /**
     * Tenant options for autocomplete (id => name).
     *
     * @return array<int,string>
     */
    public static function tenant_options(): array {
        global $DB;

        if (!mutms::mutenancy_active() || !$DB->get_manager()->table_exists('tool_mutenancy_tenant')) {
            return [];
        }
        $tenants = $DB->get_records('tool_mutenancy_tenant', ['archived' => 0], 'name ASC', 'id,name,idnumber');
        $options = [];
        foreach ($tenants as $tenant) {
            $label = $tenant->name;
            if (!empty($tenant->idnumber)) {
                $label .= ' (' . $tenant->idnumber . ')';
            }
            $options[(int) $tenant->id] = $label;
        }
        return $options;
    }

    /**
     * Whether the Everon apply table exists.
     *
     * @return bool
     */
    public static function table_exists(): bool {
        global $DB;
        return $DB->get_manager()->table_exists('theme_boost_union_everon_flavour_apply');
    }
}
