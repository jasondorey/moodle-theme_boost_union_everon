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
 * Everon database upgrade steps.
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Run upgrade steps for theme_boost_union_everon.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_theme_boost_union_everon_upgrade(int $oldversion): bool {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2026102226) {
        $oldtable = new xmldb_table('theme_everon_flavour_apply');
        $newtable = new xmldb_table('theme_boost_union_everon_flavour_apply');

        if ($dbman->table_exists($oldtable) && !$dbman->table_exists($newtable)) {
            $dbman->rename_table($oldtable, 'theme_boost_union_everon_flavour_apply');
        } else if (!$dbman->table_exists($newtable)) {
            $newtable->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
            $newtable->add_field('flavourid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
            $newtable->add_field('applytotenants', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0');
            $newtable->add_field('tenants', XMLDB_TYPE_TEXT, null, null, null, null, null);

            $newtable->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
            $newtable->add_key('flavourid_uq', XMLDB_KEY_UNIQUE, ['flavourid']);

            $dbman->create_table($newtable);
        }

        // Apply Boost Union flavourslib tenant hook if missing (survives Boost Union upgrades).
        \theme_boost_union_everon\local\boost_union_flavour_hook::ensure_applied_if_needed();

        upgrade_plugin_savepoint(true, 2026102226, 'theme', 'boost_union_everon');
    }

    return true;
}
