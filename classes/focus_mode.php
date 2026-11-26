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
 * Focus Mode helpers (distraction-free wide layout for courses, Dashboard, and My courses).
 *
 * Ported from theme_custom\course_focus (GPL).
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_boost_union_everon;

defined('MOODLE_INTERNAL') || die();

/**
 * Focus Mode page helpers.
 */
class focus_mode {

    /**
     * Resolve the current course id for focus mode (0 when unavailable / site).
     *
     * @param \moodle_page $page
     * @return int
     */
    public static function resolve_course_id(\moodle_page $page): int {
        if (!empty($page->course)) {
            $courseid = (int) $page->course->id;
            if ($courseid > 0 && $courseid !== (int) SITEID) {
                return $courseid;
            }
        }

        if (!empty($page->cm)) {
            $courseid = (int) $page->cm->course;
            if ($courseid > 0 && $courseid !== (int) SITEID) {
                return $courseid;
            }
        }

        $coursecontext = $page->context->get_course_context(false);
        if ($coursecontext) {
            $courseid = (int) $coursecontext->instanceid;
            if ($courseid > 0 && $courseid !== (int) SITEID) {
                return $courseid;
            }
        }

        return 0;
    }

    /**
     * Course home, single section, and activity pages only.
     *
     * Excludes course secondary tabs (participants, grades, settings, reports, etc.).
     *
     * @param \moodle_page $page
     * @return bool
     */
    public static function is_course_content_page(\moodle_page $page): bool {
        if (self::resolve_course_id($page) <= 0) {
            return false;
        }

        $path = $page->url->get_path(false);
        $pagetype = (string) $page->pagetype;

        if (preg_match('#/course/view\.php$#', $path)) {
            return true;
        }

        if (preg_match('#/course/section\.php$#', $path)) {
            return true;
        }

        if (preg_match('#^course-view-section-#', $pagetype)) {
            return true;
        }

        // Activity module pages (/mod/…), including nested views (forum discuss, quiz attempt, etc.).
        if (preg_match('#/mod/[^/]+/.+\.php$#', $path) && !preg_match('#/index\.php$#', $path)) {
            return true;
        }

        if (preg_match('#^mod-#', $pagetype)) {
            return !empty($page->cm);
        }

        if (!empty($page->cm) && in_array($page->pagelayout, ['incourse', 'popup', 'embedded'], true)) {
            return preg_match('#^mod-#', $pagetype) === 1;
        }

        return false;
    }

    /**
     * Dashboard (/my/) page, excluding MuTMS custom home pages that reuse mydashboard.
     *
     * @param \moodle_page $page
     * @return bool
     */
    public static function is_dashboard_page(\moodle_page $page): bool {
        if ($page->pagelayout !== 'mydashboard') {
            return false;
        }
        // MuTMS custom home pages reuse mydashboard + content region — exclude from /my/ focus.
        if ($page->pagetype === 'tool-muhome-index') {
            return false;
        }
        return true;
    }

    /**
     * My courses (/my/courses.php) page.
     *
     * @param \moodle_page $page
     * @return bool
     */
    public static function is_mycourses_page(\moodle_page $page): bool {
        return $page->pagelayout === 'mycourses';
    }

    /**
     * Resolve the Focus Mode persistence scope for this page.
     *
     * Returns numeric course id string on course content pages, 'dashboard' on /my/,
     * 'mycourses' on /my/courses.php, or '' when Focus Mode does not apply.
     *
     * @param \moodle_page $page
     * @return string
     */
    public static function resolve_scope(\moodle_page $page): string {
        if (self::is_course_content_page($page)) {
            $courseid = self::resolve_course_id($page);
            return $courseid > 1 ? (string) $courseid : '';
        }
        if (self::is_dashboard_page($page)) {
            return 'dashboard';
        }
        if (self::is_mycourses_page($page)) {
            return 'mycourses';
        }
        return '';
    }

    /**
     * Whether Focus Mode should be offered on this page (setting + supported page).
     *
     * @param \moodle_page $page
     * @return bool
     */
    public static function should_offer(\moodle_page $page): bool {
        if (!\theme_boost_union_everon_focusmode_enabled()) {
            return false;
        }
        return self::resolve_scope($page) !== '';
    }
}
