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
 * Map Boost Union flavours to MuTMS tenants (Everon).
 *
 * @package    theme_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/../../../config.php');

require_login();
$context = context_system::instance();
require_capability('theme/boost_union:configure', $context);

$PAGE->set_context($context);
$PAGE->set_url(new \core\url('/theme/everon/flavours/tenants.php'));
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('flavourtenantspage', 'theme_everon'));
$PAGE->set_heading(get_string('flavourtenantspage', 'theme_everon'));

$flavours = [];
if ($DB->get_manager()->table_exists('theme_boost_union_flavours')) {
    $flavours = $DB->get_records('theme_boost_union_flavours', null, 'sort ASC', 'id,title,sort');
}

\theme_everon\local\flavours::cleanup_orphans();
$maps = \theme_everon\local\flavours::get_all_apply_records();
$tenantoptions = \theme_everon\local\flavours::tenant_options();

$form = new \theme_everon\form\flavour_tenants_form($PAGE->url, [
    'flavours' => $flavours,
    'maps' => $maps,
    'tenantoptions' => $tenantoptions,
]);

if ($form->is_cancelled()) {
    redirect(new \core\url('/admin/settings.php', ['section' => 'theme_everon']));
}

if ($data = $form->get_data()) {
    foreach ($flavours as $flavour) {
        $fid = (int) $flavour->id;
        $applyfield = 'flavour_' . $fid . '_apply';
        $tenantsfield = 'flavour_' . $fid . '_tenants';
        $apply = !empty($data->$applyfield);
        $tenantids = [];
        if (!empty($data->$tenantsfield) && is_array($data->$tenantsfield)) {
            $tenantids = $data->$tenantsfield;
        }
        \theme_everon\local\flavours::save_apply($fid, $apply, $tenantids);
    }
    \theme_everon\local\flavours::purge_flavour_caches();
    redirect(
        $PAGE->url,
        get_string('changessaved'),
        null,
        \core\output\notification::NOTIFY_SUCCESS
    );
}

echo $OUTPUT->header();

if (!\theme_everon\local\mutms::is_enabled()) {
    echo $OUTPUT->notification(get_string('flavourtenantsneedcompat', 'theme_everon'), 'warning');
}

if (!\theme_everon\local\mutms::mutenancy_active()) {
    echo $OUTPUT->notification(get_string('flavourtenantsneedmutenancy', 'theme_everon'), 'warning');
}

if (empty($flavours)) {
    echo $OUTPUT->notification(get_string('flavourtenantsnone', 'theme_everon'), 'info');
    $overview = new \core\url('/theme/boost_union/flavours/overview.php');
    echo html_writer::div(html_writer::link($overview, get_string('configtitleflavours', 'theme_boost_union')));
} else {
    if (empty($tenantoptions)) {
        echo $OUTPUT->notification(get_string('flavourtenantstenantsnone', 'theme_everon'), 'warning');
    }
    $form->display();
}

echo $OUTPUT->footer();
