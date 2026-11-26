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
 * Everon after_config: keep Boost Union flavourslib tenant hook applied.
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_boost_union_everon\local\hook;

use theme_boost_union_everon\local\boost_union_flavour_hook;

/**
 * Hook listener that re-applies the MuTMS tenant flavour hook after Boost Union overwrites.
 *
 * Boost Union upgrades replace flavourslib.php and wipe the Everon local hook. Everon's own
 * upgrade.php does not run in that case. This after_config callback restores the hook on the
 * next request (when the web/CLI user can write the file), without waiting for an Everon bump.
 */
class after_config {
    /**
     * Ensure the flavourslib tenant hook is present.
     *
     * @param \core\hook\after_config $hook
     */
    public static function callback(\core\hook\after_config $hook): void {
        boost_union_flavour_hook::ensure_applied_if_needed();
    }
}
