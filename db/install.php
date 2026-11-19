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
 * Theme Everon install hook.
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Post-install: migrate legacy theme_everon artefacts if present, then ensure
 * the local Boost Union flavourslib tenant hook is applied.
 *
 * @return bool
 */
function xmldb_theme_boost_union_everon_install() {
    global $DB;

    $dbman = $DB->get_manager();

    // Folder/component rename: keep MuTMS flavour-apply rows from theme_everon.
    $oldtable = new xmldb_table('theme_everon_flavour_apply');
    $newtable = new xmldb_table('theme_boost_union_everon_flavour_apply');
    if ($dbman->table_exists($oldtable) && !$dbman->table_exists($newtable)) {
        $dbman->rename_table($oldtable, 'theme_boost_union_everon_flavour_apply');
    }

    // Move config_plugins rows from the old frankenstyle component when unique.
    $legacy = $DB->get_records('config_plugins', ['plugin' => 'theme_everon']);
    foreach ($legacy as $row) {
        if ($DB->record_exists('config_plugins', ['plugin' => 'theme_boost_union_everon', 'name' => $row->name])) {
            continue;
        }
        $DB->set_field('config_plugins', 'plugin', 'theme_boost_union_everon', ['id' => $row->id]);
    }

    \theme_boost_union_everon\local\boost_union_flavour_hook::ensure_applied();
    return true;
}
