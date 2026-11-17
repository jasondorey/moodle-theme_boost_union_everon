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
 * Status check: Boost Union flavourslib Everon tenant hook.
 *
 * @package    theme_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_everon\check;

use core\check\result;
use theme_everon\local\boost_union_flavour_hook as flavour_hook_helper;

/**
 * Reports whether the local Boost Union flavourslib hook is present.
 */
class flavour_hook extends \core\check\check {

    /**
     * Action link to Everon MuTMS settings (where tenant flavours are configured).
     *
     * @return \action_link|null
     */
    public function get_action_link(): ?\action_link {
        return new \action_link(
            new \moodle_url('/admin/settings.php', [
                'section' => 'theme_everon',
                'activetab' => 'theme_everon_mutms',
            ]),
            get_string('mutmstab', 'theme_everon')
        );
    }

    /**
     * Return result. Attempts a quiet re-apply when the hook is missing and the file is writable.
     *
     * @return result
     */
    public function get_result(): result {
        if (!flavour_hook_helper::flavourslib_exists()) {
            return new result(
                result::INFO,
                get_string('checkflavourhookmissingbu', 'theme_everon'),
                get_string('checkflavourhookmissingbu_details', 'theme_everon')
            );
        }

        if (!flavour_hook_helper::is_applied()) {
            // Prefer restoring during the check when the web/CLI user can write flavourslib
            // (typical after a Boost Union upgrade wiped the hook).
            $outcome = flavour_hook_helper::ensure_applied();
            if (flavour_hook_helper::is_applied()) {
                return new result(
                    result::OK,
                    get_string('checkflavourhookreapplied', 'theme_everon', $outcome),
                    get_string('checkflavourhookok_details', 'theme_everon')
                );
            }
            return new result(
                result::WARNING,
                get_string('checkflavourhookmissing', 'theme_everon'),
                get_string('checkflavourhookmissing_details', 'theme_everon')
            );
        }

        return new result(
            result::OK,
            get_string('checkflavourhookok', 'theme_everon'),
            get_string('checkflavourhookok_details', 'theme_everon')
        );
    }
}
