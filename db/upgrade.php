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
 * Theme Everon upgrade steps.
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Upgrade hook for theme_boost_union_everon.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_theme_boost_union_everon_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2026111600) {
        $table = new xmldb_table('theme_boost_union_everon_flavour_apply');

        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('flavourid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('applytotenants', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('applytotenants_ids', XMLDB_TYPE_TEXT, null, null, null, null, null);

        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('flavouriduk', XMLDB_KEY_UNIQUE, ['flavourid']);

        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        upgrade_plugin_savepoint(true, 2026111600, 'theme', 'boost_union_everon');
    }

    if ($oldversion < 2026111700) {
        // Re-apply local Boost Union flavourslib tenant hook after BU upgrades wipe it.
        \theme_boost_union_everon\local\boost_union_flavour_hook::ensure_applied();
        upgrade_plugin_savepoint(true, 2026111700, 'theme', 'boost_union_everon');
    }

    if ($oldversion < 2026111900) {
        // Component rename theme_everon → theme_boost_union_everon: migrate legacy table if present.
        $oldtable = new xmldb_table('theme_everon_flavour_apply');
        $newtable = new xmldb_table('theme_boost_union_everon_flavour_apply');
        if ($dbman->table_exists($oldtable) && !$dbman->table_exists($newtable)) {
            $dbman->rename_table($oldtable, 'theme_boost_union_everon_flavour_apply');
        }

        // Re-apply Boost Union flavourslib hook against the new frankenstyle class names.
        \theme_boost_union_everon\local\boost_union_flavour_hook::ensure_applied();
        upgrade_plugin_savepoint(true, 2026111900, 'theme', 'boost_union_everon');
    }

    if ($oldversion < 2026112300) {
        // after_config auto-repatch: heal flavourslib when Boost Union upgrades wipe the hook
        // without an Everon version bump. Confirm hook now and remember BU version.
        \theme_boost_union_everon\local\boost_union_flavour_hook::ensure_applied_if_needed();
        upgrade_plugin_savepoint(true, 2026112300, 'theme', 'boost_union_everon');
    }

    return true;
}
