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
 * Theme Everon - Local library
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @copyright  2023 Alexander Bias <bias@alexanderbias.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Whether the Everon accessibility toolbar is enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_accessibility_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enableaccessibilitytool');
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Whether Everon activity icon filters are enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_activity_icon_filters_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enableactivityiconfilters');
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Hidden SVG filter defs for Safari purpose-colour activity icon tinting.
 * Matrix values match Boost `$activity-icon-*-bg` / `recolor-icon` (icons.scss).
 *
 * @return string
 */
function theme_boost_union_everon_get_activity_icon_filters_svg(): string {
    // Boost purpose colours → feColorMatrix fifth-column RGB (component / 255).
    $filters = [
        'administration' => '0 0 0 0 0.8549019608 0 0 0 0 0.3450980392 0 0 0 0 0.937254902 0 0 0 1 0',
        'assessment' => '0 0 0 0 0.9764705882 0 0 0 0 0 0 0 0 0 0.5254901961 0 0 0 1 0',
        'collaboration' => '0 0 0 0 0.3568627451 0 0 0 0 0.2509803922 0 0 0 0 1 0 0 0 1 0',
        'communication' => '0 0 0 0 0.9215686275 0 0 0 0 0.3843137255 0 0 0 0 0 0 0 0 1 0',
        'content' => '0 0 0 0 0 0 0 0 0 0.6 0 0 0 0 0.6784313725 0 0 0 1 0',
        'interactivecontent' => '0 0 0 0 0.5529411765 0 0 0 0 0.2392156863 0 0 0 0 0.1058823529 0 0 0 1 0',
    ];

    $inner = '';
    foreach ($filters as $purpose => $matrix) {
        $id = 'safari-activity-' . $purpose;
        $inner .= '<filter id="' . $id . '" color-interpolation-filters="sRGB">'
            . '<feColorMatrix type="matrix" values="' . $matrix . '"/>'
            . '</filter>';
    }

    return '<svg xmlns="http://www.w3.org/2000/svg" id="theme-boost-union-everon-activity-icon-filters" '
        . 'width="0" height="0" style="position:absolute;width:0;height:0;overflow:hidden" '
        . 'aria-hidden="true" focusable="false"><defs>' . $inner . '</defs></svg>';
}

/**
 * Inline head markup: apply stored a11y settings before first paint.
 * Ported from theme_custom (GPL).
 *
 * @return string
 */
function theme_boost_union_everon_get_a11y_boot_html(): string {
    global $CFG;

    static $cached = null;
    if ($cached !== null) {
        return $cached;
    }

    $bootfile = $CFG->dirroot . '/theme/boost_union_everon/javascript/a11y_boot.js';
    $js = is_readable($bootfile) ? file_get_contents($bootfile) : '';
    if ($js === false) {
        $js = '';
    }

    // Dark/light paint is owned by Boost colour modes (data-bs-theme). Do not inject
    // critical CSS for the retired theme-boost-union-everon-a11y-dark-mode path.
    $cached = '';
    if ($js !== '') {
        $cached .= '<script id="theme-boost-union-everon-a11y-boot">' . $js . '</script>';
    }

    return $cached;
}

/**
 * Template context for the accessibility popover (Boost colour-mode bridge metadata).
 *
 * @return array
 */
function theme_boost_union_everon_accessibility_popover_context(): array {
    $context = [
        'colourmodeenabled' => false,
        'colourmodecookieattributes' => '',
    ];

    if (!class_exists(\theme_boost\colour_mode::class)) {
        return $context;
    }

    if (!\theme_boost\colour_mode::is_enabled()) {
        return $context;
    }

    $context['colourmodeenabled'] = true;
    $context['colourmodecookieattributes'] = \theme_boost\colour_mode::get_cookie_attributes();
    return $context;
}

/**
 * Whether Everon Focus Mode is enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_focusmode_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enablefocusmode');
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Whether the Everon My Courses layout skin is enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_mycourses_layout_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enablemycourseslayout');
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Whether the My Courses layout should load on this page.
 *
 * @param \moodle_page $page
 * @return bool
 */
function theme_boost_union_everon_mycourses_should_offer(\moodle_page $page): bool {
    if (!theme_boost_union_everon_mycourses_layout_enabled()) {
        return false;
    }
    return $page->pagelayout === 'mycourses';
}

/**
 * Whether a Yes/No Everon config is enabled (default Yes when unset).
 *
 * @param string $name Config name without plugin prefix.
 * @return bool
 */
function theme_boost_union_everon_config_yes_default(string $name): bool {
    $value = get_config('theme_boost_union_everon', $name);
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Whether the Everon My Courses stats strip is enabled (admin master setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_mycourses_stats_enabled(): bool {
    return theme_boost_union_everon_config_yes_default('enablemycoursesstats');
}

/**
 * Whether a specific My Courses stats panel is enabled.
 *
 * @param string $panel One of enrolments, completions, badges, certificates.
 * @return bool
 */
function theme_boost_union_everon_mycourses_stats_panel_enabled(string $panel): bool {
    $map = [
        'enrolments' => 'mycoursesstatsenrolments',
        'completions' => 'mycoursesstatscompletions',
        'badges' => 'mycoursesstatsbadges',
        'certificates' => 'mycoursesstatscertificates',
    ];
    if (!isset($map[$panel])) {
        return false;
    }
    return theme_boost_union_everon_config_yes_default($map[$panel]);
}

/**
 * Whether the My Courses stats strip should load on this page.
 *
 * @param \moodle_page $page
 * @return bool
 */
function theme_boost_union_everon_mycourses_stats_should_offer(\moodle_page $page): bool {
    if (!theme_boost_union_everon_mycourses_stats_enabled()) {
        return false;
    }
    if ($page->pagelayout !== 'mycourses') {
        return false;
    }
    if (!isloggedin() || isguestuser()) {
        return false;
    }
    foreach (['enrolments', 'completions', 'badges', 'certificates'] as $panel) {
        if (theme_boost_union_everon_mycourses_stats_panel_enabled($panel)) {
            return true;
        }
    }
    return false;
}

/**
 * Count active (in-progress) enrolled courses for a user.
 *
 * @param int $userid
 * @return int
 */
function theme_boost_union_everon_mycourses_stats_count_active_courses(int $userid): int {
    global $CFG;

    require_once($CFG->libdir . '/enrollib.php');
    require_once($CFG->dirroot . '/course/lib.php');
    require_once($CFG->libdir . '/completionlib.php');

    if ($userid <= 0) {
        return 0;
    }

    $user = \core_user::get_user($userid, '*', MUST_EXIST);
    $courses = enrol_get_all_users_courses($userid, true);
    $count = 0;
    foreach ($courses as $course) {
        if (course_classify_for_timeline($course, $user) === COURSE_TIMELINE_INPROGRESS) {
            $count++;
        }
    }
    return $count;
}

/**
 * Count completed courses for a user (course_completions.timecompleted > 0).
 *
 * @param int $userid
 * @return int
 */
function theme_boost_union_everon_mycourses_stats_count_completions(int $userid): int {
    global $DB;

    if ($userid <= 0) {
        return 0;
    }

    return (int) $DB->count_records_select(
        'course_completions',
        'userid = ? AND timecompleted IS NOT NULL AND timecompleted > 0',
        [$userid]
    );
}

/**
 * Count badges awarded to a user.
 *
 * @param int $userid
 * @return int
 */
function theme_boost_union_everon_mycourses_stats_count_badges(int $userid): int {
    global $DB;

    if ($userid <= 0) {
        return 0;
    }

    return (int) $DB->count_records('badge_issued', ['userid' => $userid]);
}

/**
 * Count certificates awarded to a user (soft-detect plugin backends).
 *
 * @param int $userid
 * @return int
 */
function theme_boost_union_everon_mycourses_stats_count_certificates(int $userid): int {
    global $DB;

    if ($userid <= 0) {
        return 0;
    }

    $dbman = $DB->get_manager();

    if (get_config('tool_certificate', 'version')) {
        $table = new \xmldb_table('tool_certificate_issues');
        if ($dbman->table_exists($table)) {
            return (int) $DB->count_records('tool_certificate_issues', ['userid' => $userid]);
        }
    }

    if (get_config('mod_customcert', 'version')) {
        $table = new \xmldb_table('customcert_issues');
        if ($dbman->table_exists($table)) {
            return (int) $DB->count_records('customcert_issues', ['userid' => $userid]);
        }
    }

    return 0;
}

/**
 * Mustache context for the My Courses stats strip, or null when nothing to render.
 *
 * @param int|null $userid Defaults to current user.
 * @return array|null
 */
function theme_boost_union_everon_mycourses_stats_template_context(?int $userid = null): ?array {
    global $USER;

    $userid = $userid ?? (int) $USER->id;
    if ($userid <= 0 || !isloggedin() || isguestuser($userid)) {
        return null;
    }
    if (!theme_boost_union_everon_mycourses_stats_enabled()) {
        return null;
    }

    $panels = [];
    $definitions = [
        'enrolments' => [
            'id' => 'enrolments',
            'titlestring' => 'mycoursesstatsenrolmentstitle',
            'substring' => 'mycoursesstatsenrolmentssub',
            'iconclass' => 'fa fa-clipboard-list fa-fw',
            'countfn' => 'theme_boost_union_everon_mycourses_stats_count_active_courses',
        ],
        'completions' => [
            'id' => 'completions',
            'titlestring' => 'mycoursesstatscompletionstitle',
            'substring' => 'mycoursesstatscompletionssub',
            'iconclass' => 'fa fa-clipboard-check fa-fw',
            'countfn' => 'theme_boost_union_everon_mycourses_stats_count_completions',
        ],
        'badges' => [
            'id' => 'badges',
            'titlestring' => 'mycoursesstatsbadgestitle',
            'substring' => 'mycoursesstatsbadgessub',
            'iconclass' => 'fa fa-medal fa-fw',
            'countfn' => 'theme_boost_union_everon_mycourses_stats_count_badges',
        ],
        'certificates' => [
            'id' => 'certificates',
            'titlestring' => 'mycoursesstatscertificatestitle',
            'substring' => 'mycoursesstatscertificatessub',
            'iconclass' => 'fa fa-certificate fa-fw',
            'countfn' => 'theme_boost_union_everon_mycourses_stats_count_certificates',
        ],
    ];

    foreach ($definitions as $key => $def) {
        if (!theme_boost_union_everon_mycourses_stats_panel_enabled($key)) {
            continue;
        }
        $count = (int) call_user_func($def['countfn'], $userid);
        $panels[] = [
            'id' => $def['id'],
            'title' => get_string($def['titlestring'], 'theme_boost_union_everon'),
            'subtext' => get_string($def['substring'], 'theme_boost_union_everon', $count),
            'count' => $count,
            'iconclass' => $def['iconclass'],
        ];
    }

    if ($panels === []) {
        return null;
    }

    // Mark all but the last panel so Mustache can render dividers between neighbours only.
    $last = count($panels) - 1;
    foreach ($panels as $i => &$panel) {
        $panel['hasdivider'] = ($i < $last);
    }
    unset($panel);

    return [
        'arialabel' => get_string('mycoursesstatsaria', 'theme_boost_union_everon'),
        'panels' => $panels,
        'haspanels' => true,
    ];
}

/**
 * Whether the Everon Dashboard layout skin is enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_dashboard_layout_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enabledashboardlayout');
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Whether the Dashboard layout should load on this page.
 *
 * @param \moodle_page $page
 * @return bool
 */
function theme_boost_union_everon_dashboard_should_offer(\moodle_page $page): bool {
    if (!theme_boost_union_everon_dashboard_layout_enabled()) {
        return false;
    }
    if ($page->pagelayout !== 'mydashboard') {
        return false;
    }
    // MuTMS custom home pages reuse mydashboard + content region — never skin as /my/.
    if ($page->pagetype === 'tool-muhome-index') {
        return false;
    }
    return true;
}

/**
 * Whether MuTMS compatibility is enabled (admin setting).
 * Default: disabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_mutms_compatibility_enabled(): bool {
    return \theme_boost_union_everon\local\mutms::is_enabled();
}

/**
 * Admin setting updatedcallback for MuTMS compatibility.
 *
 * @return void
 */
function theme_boost_union_everon_mutms_setting_updated(): void {
    \theme_boost_union_everon\local\mutms::setting_updated();
}

/**
 * Whether Everon compact navbar is enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_compact_navbar_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enablecompactnavbar');
    if ($value === false || $value === null || $value === '') {
        return true;
    }
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Whether compact navbar CSS should load (all non-login layouts when enabled).
 *
 * @param \moodle_page $page
 * @return bool
 */
function theme_boost_union_everon_compact_navbar_should_offer(\moodle_page $page): bool {
    if (!theme_boost_union_everon_compact_navbar_enabled()) {
        return false;
    }
    return $page->pagelayout !== 'login';
}

/**
 * Inline head markup: restore Focus Mode before first paint on supported pages.
 *
 * @return string
 */
function theme_boost_union_everon_get_focusmode_boot_html(): string {
    global $CFG, $PAGE;

    static $jscached = null;
    if ($jscached === null) {
        $bootfile = $CFG->dirroot . '/theme/boost_union_everon/javascript/course_focus_boot.js';
        $js = is_readable($bootfile) ? file_get_contents($bootfile) : '';
        $jscached = ($js === false || $js === '') ? '' : $js;
    }

    if ($jscached === '') {
        return '';
    }

    $html = '';
    if (!empty($PAGE) && $PAGE->context) {
        $scope = \theme_boost_union_everon\focus_mode::resolve_scope($PAGE);
        if ($scope !== '') {
            $config = ['scope' => $scope];
            if (\theme_boost_union_everon\focus_mode::is_course_content_page($PAGE)) {
                $courseid = \theme_boost_union_everon\focus_mode::resolve_course_id($PAGE);
                if ($courseid > 1) {
                    $config['courseId'] = $courseid;
                }
            }
            $html .= '<script id="theme-boost-union-everon-focus-boot-config">window.themeEveronFocusPageConfig='
                . json_encode($config, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)
                . ';</script>';
        }
    }

    $html .= '<script id="theme-boost-union-everon-focus-boot">' . $jscached . '</script>';
    return $html;
}

/**
 * Whether the Everon Launch Pad is enabled (admin setting).
 * Default: disabled until configured.
 *
 * @return bool
 */
function theme_boost_union_everon_launchpad_enabled(): bool {
    $value = get_config('theme_boost_union_everon', 'enablelaunchpad');
    return $value === 'yes' || $value === '1' || $value === 1;
}

/**
 * Built-in pack keys (always available in settings UI).
 *
 * @return string[]
 */
function theme_boost_union_everon_launchpad_builtin_keys(): array {
    return ['siteadmin'];
}


/**
 * Default Site administrators Launch Pad links (Moodle 5.2 paths).
 *
 * @return array<int, array{label:string, url:string, icon?:string}>
 */
function theme_boost_union_everon_launchpad_default_siteadmin_links(): array {
    return [
        ['label' => 'Browse list of users', 'url' => '/admin/user.php', 'icon' => 'fa-users'],
        ['label' => 'Manage courses and categories', 'url' => '/course/management.php', 'icon' => 'fa-graduation-cap'],
        ['label' => 'Plugins overview', 'url' => '/admin/plugins.php', 'icon' => 'fa-puzzle-piece'],
        ['label' => 'Performance overview', 'url' => '/report/performance/index.php', 'icon' => 'fa-gauge-high'],
        ['label' => 'Custom reports', 'url' => '/reportbuilder/index.php', 'icon' => 'fa-table'],
        ['label' => 'Debugging', 'url' => '/admin/settings.php?section=debugging', 'icon' => 'fa-bug'],
        ['label' => 'Scheduled tasks', 'url' => '/admin/tool/task/scheduledtasks.php', 'icon' => 'fa-clock'],
    ];
}


/**
 * Normalise a list of link objects (shared by settings validation).
 *
 * @param mixed $decoded
 * @return array|string Clean link list, or error string.
 */
function theme_boost_union_everon_launchpad_normalize_links_list($decoded) {
    if (!is_array($decoded)) {
        return get_string('launchpadjsoninvalid', 'theme_boost_union_everon');
    }
    if ($decoded !== [] && array_keys($decoded) !== range(0, count($decoded) - 1)) {
        return get_string('launchpadjsoninvalid', 'theme_boost_union_everon');
    }

    $clean = [];
    foreach ($decoded as $item) {
        if (!is_array($item)) {
            return get_string('launchpadjsoninvalid', 'theme_boost_union_everon');
        }
        $label = isset($item['label']) ? trim((string) $item['label']) : '';
        $url = isset($item['url']) ? trim((string) $item['url']) : '';
        if ($label === '' || $url === '') {
            return get_string('launchpadjsoninvalid', 'theme_boost_union_everon');
        }
        $entry = [
            'label' => $label,
            'url' => $url,
        ];
        if (!empty($item['icon'])) {
            $entry['icon'] = trim((string) $item['icon']);
        }
        $clean[] = $entry;
    }
    return $clean;
}

/**
 * Normalise the full role-links map for storage.
 *
 * @param array $decoded
 * @return array|string Clean map, or error string.
 */
function theme_boost_union_everon_launchpad_normalize_rolelinks_map(array $decoded) {
    $clean = [];

    // Preserve insertion order; always emit builtins first if present / empty.
    $orderedkeys = [];
    foreach (theme_boost_union_everon_launchpad_builtin_keys() as $builtin) {
        $orderedkeys[] = $builtin;
    }
    foreach (array_keys($decoded) as $key) {
        if (in_array($key, $orderedkeys, true)) {
            continue;
        }
        $orderedkeys[] = $key;
    }

    foreach ($orderedkeys as $key) {
        if ($key === 'siteadmin') {
            $raw = $decoded[$key] ?? [];
            if ($raw === '' || $raw === null) {
                $raw = [];
            }
            if (is_string($raw)) {
                $raw = json_decode($raw, true);
            }
            $links = theme_boost_union_everon_launchpad_normalize_links_list($raw === null ? [] : $raw);
            if (is_string($links)) {
                return $links;
            }
            $clean[$key] = $links;
            continue;
        }
        // Drop legacy authenticated pack key if still present in posted data.
        if ($key === 'authenticated') {
            continue;
        }
        if (!preg_match('/^role:(\d+)$/', $key, $m)) {
            // Skip unknown keys (_order, legacy, etc.).
            continue;
        }
        if (!array_key_exists($key, $decoded)) {
            continue;
        }
        $raw = $decoded[$key];
        if (is_string($raw)) {
            $raw = json_decode($raw, true);
        }
        $links = theme_boost_union_everon_launchpad_normalize_links_list($raw === null ? [] : $raw);
        if (is_string($links)) {
            return $links;
        }
        $clean[$key] = $links;
    }

    return $clean;
}

/**
 * Decode stored map JSON into an array (builtins guaranteed).
 *
 * @param string $raw
 * @return array<string, array>
 */
function theme_boost_union_everon_launchpad_decode_rolelinks_map(string $raw): array {
    $decoded = [];
    if (trim($raw) !== '') {
        $tmp = json_decode($raw, true);
        if (is_array($tmp)) {
            $decoded = $tmp;
        }
    }
    $map = [];
    foreach (theme_boost_union_everon_launchpad_builtin_keys() as $builtin) {
        $map[$builtin] = [];
        if (isset($decoded[$builtin]) && is_array($decoded[$builtin])) {
            $norm = theme_boost_union_everon_launchpad_normalize_links_list($decoded[$builtin]);
            $map[$builtin] = is_array($norm) ? $norm : [];
        }
    }
    foreach ($decoded as $key => $links) {
        if (!preg_match('/^role:(\d+)$/', (string) $key)) {
            continue;
        }
        if (!is_array($links)) {
            continue;
        }
        $norm = theme_boost_union_everon_launchpad_normalize_links_list($links);
        $map[$key] = is_array($norm) ? $norm : [];
    }
    return $map;
}

/**
 * One-time migration from MVP launchpadlinks_* settings into launchpadrolelinks.
 *
 * @return void
 */
function theme_boost_union_everon_launchpad_migrate_mvp_if_needed(): void {
    $done = get_config('theme_boost_union_everon', 'launchpadrolelinks_migrated');
    if ($done === '1' || $done === 1) {
        return;
    }

    $existing = get_config('theme_boost_union_everon', 'launchpadrolelinks');
    if (is_string($existing) && trim($existing) !== '' && trim($existing) !== '{}') {
        set_config('launchpadrolelinks_migrated', '1', 'theme_boost_union_everon');
        return;
    }

    $map = [
        'siteadmin' => theme_boost_union_everon_launchpad_default_siteadmin_links(),
    ];

    $raw = get_config('theme_boost_union_everon', 'launchpadlinks_siteadmin');
    if (is_string($raw) && trim($raw) !== '') {
        $decoded = json_decode($raw, true);
        $norm = theme_boost_union_everon_launchpad_normalize_links_list(is_array($decoded) ? $decoded : []);
        if (is_array($norm) && $norm !== []) {
            $map['siteadmin'] = $norm;
        }
    }
    // Legacy launchpadlinks_authenticated is intentionally dropped (no authenticated pack).

    // Best-effort: manager MVP JSON → first manager-archetype role pack.
    $mgrraw = get_config('theme_boost_union_everon', 'launchpadlinks_manager');
    if (is_string($mgrraw) && trim($mgrraw) !== '') {
        $decoded = json_decode($mgrraw, true);
        $norm = theme_boost_union_everon_launchpad_normalize_links_list(is_array($decoded) ? $decoded : []);
        if (is_array($norm) && $norm !== []) {
            $managerroles = get_archetype_roles('manager');
            if (!empty($managerroles)) {
                $first = reset($managerroles);
                $map['role:' . (int) $first->id] = $norm;
            }
        }
    }

    $encoded = json_encode($map, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    set_config('launchpadrolelinks', $encoded === false ? '{}' : $encoded, 'theme_boost_union_everon');
    set_config('launchpadrolelinks_migrated', '1', 'theme_boost_union_everon');
}

/**
 * Roles available in the Add role dropdown (exclude guest + frontpage).
 *
 * @return array<int, stdClass> role id => role object with localname
 */
function theme_boost_union_everon_launchpad_addable_roles(): array {
    $roles = role_get_names(\context_system::instance());
    $out = [];
    foreach ($roles as $role) {
        if (in_array($role->shortname, ['guest', 'frontpage'], true)) {
            continue;
        }
        $out[(int) $role->id] = $role;
    }
    return $out;
}

/**
 * Role ids assigned to the user in any context.
 *
 * @param int $userid
 * @return int[]
 */
function theme_boost_union_everon_launchpad_user_role_ids(int $userid): array {
    global $DB;

    if ($userid <= 0) {
        return [];
    }
    $ids = $DB->get_fieldset_sql(
        'SELECT DISTINCT roleid FROM {role_assignments} WHERE userid = ?',
        [$userid]
    );
    return array_map('intval', $ids ?: []);
}

/**
 * Drop legacy authenticated pack from stored map if still present.
 *
 * @return void
 */
function theme_boost_union_everon_launchpad_drop_authenticated_pack_if_needed(): void {
    $raw = get_config('theme_boost_union_everon', 'launchpadrolelinks');
    if (!is_string($raw) || trim($raw) === '') {
        return;
    }
    $decoded = json_decode($raw, true);
    if (!is_array($decoded) || !array_key_exists('authenticated', $decoded)) {
        return;
    }
    unset($decoded['authenticated']);
    $clean = theme_boost_union_everon_launchpad_normalize_rolelinks_map($decoded);
    if (is_string($clean)) {
        unset($decoded['authenticated']);
        $clean = $decoded;
        if (!isset($clean['siteadmin']) || !is_array($clean['siteadmin'])) {
            $clean = ['siteadmin' => []] + $clean;
        }
    }
    $encoded = json_encode($clean, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    set_config('launchpadrolelinks', $encoded === false ? '{"siteadmin":[]}' : $encoded, 'theme_boost_union_everon');
}

/**
 * Load the configured role-links map (after migration).
 *
 * @return array<string, array>
 */
function theme_boost_union_everon_launchpad_get_rolelinks_map(): array {
    theme_boost_union_everon_launchpad_migrate_mvp_if_needed();
    theme_boost_union_everon_launchpad_drop_authenticated_pack_if_needed();
    $raw = get_config('theme_boost_union_everon', 'launchpadrolelinks');
    return theme_boost_union_everon_launchpad_decode_rolelinks_map(is_string($raw) ? $raw : '');
}

/**
 * Pack keys that match the given user, in merge order.
 * siteadmin (if admin) → configured role packs the user holds (any context).
 *
 * @param int|null $userid
 * @return string[]
 */
function theme_boost_union_everon_launchpad_matching_pack_keys(?int $userid = null): array {
    global $USER;

    $userid = $userid ?? (int) $USER->id;
    if (!isloggedin() || isguestuser($userid)) {
        return [];
    }

    $map = theme_boost_union_everon_launchpad_get_rolelinks_map();
    $matched = [];

    if (is_siteadmin($userid) && array_key_exists('siteadmin', $map)) {
        $matched[] = 'siteadmin';
    }

    $userroles = theme_boost_union_everon_launchpad_user_role_ids($userid);
    $userroleslookup = array_fill_keys($userroles, true);
    foreach ($map as $key => $unused) {
        if (!preg_match('/^role:(\d+)$/', $key, $m)) {
            continue;
        }
        $rid = (int) $m[1];
        if (isset($userroleslookup[$rid])) {
            $matched[] = $key;
        }
    }

    return $matched;
}

/**
 * Sanitize an optional Font Awesome icon class token (e.g. fa-cog).
 *
 * @param string $icon
 * @return string
 */
function theme_boost_union_everon_launchpad_sanitize_icon(string $icon): string {
    $icon = trim($icon);
    if ($icon === '') {
        return '';
    }
    $parts = preg_split('/\s+/', $icon) ?: [];
    $kept = [];
    foreach ($parts as $part) {
        if (preg_match('/^fa(-[a-z0-9]+)+$/i', $part)) {
            $kept[] = strtolower($part);
        }
    }
    if ($kept === []) {
        return '';
    }
    $glyph = '';
    foreach ($kept as $part) {
        if ($part !== 'fa' && str_starts_with($part, 'fa-')) {
            $glyph = $part;
            break;
        }
    }
    return $glyph;
}

/**
 * Resolve a configured URL to a same-site absolute moodle URL, or null if disallowed.
 *
 * @param string $raw
 * @return \core\url|null
 */
function theme_boost_union_everon_launchpad_sanitize_url(string $raw): ?\core\url {
    global $CFG;

    $raw = trim($raw);
    if ($raw === '') {
        return null;
    }

    $lower = strtolower($raw);
    if (str_starts_with($lower, 'javascript:') || str_starts_with($lower, 'data:') ||
            str_starts_with($lower, 'vbscript:')) {
        return null;
    }

    if (str_starts_with($raw, '//')) {
        return null;
    }

    $wwwroot = rtrim($CFG->wwwroot, '/');

    if (preg_match('#^https?://#i', $raw)) {
        $candidate = rtrim($raw, '/');
        if ($candidate === $wwwroot || str_starts_with($raw, $wwwroot . '/')) {
            return new \core\url($raw);
        }
        return null;
    }

    if (!str_starts_with($raw, '/')) {
        return null;
    }

    if (str_contains($raw, '\\') || preg_match('#^[a-z][a-z0-9+.-]*:#i', $raw)) {
        return null;
    }

    return new \core\url($raw);
}

/**
 * Sanitise a raw link list from the map into renderable links.
 *
 * @param array $items
 * @return array<int, array{label:string, url:string, icon:string, hasicon:bool}>
 */
function theme_boost_union_everon_launchpad_sanitize_link_items(array $items): array {
    $links = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            continue;
        }
        $label = isset($item['label']) ? trim(clean_param((string) $item['label'], PARAM_TEXT)) : '';
        $urlraw = isset($item['url']) ? trim((string) $item['url']) : '';
        if ($label === '' || $urlraw === '') {
            continue;
        }
        $url = theme_boost_union_everon_launchpad_sanitize_url($urlraw);
        if ($url === null) {
            continue;
        }
        $icon = theme_boost_union_everon_launchpad_sanitize_icon(isset($item['icon']) ? (string) $item['icon'] : '');
        $links[] = [
            'label' => $label,
            'url' => $url->out(false),
            'icon' => $icon,
            'hasicon' => $icon !== '',
        ];
    }
    return $links;
}

/**
 * Whether tool_mutenancy is installed and active.
 *
 * @return bool
 */
function theme_boost_union_everon_launchpad_mutenancy_is_active(): bool {
    try {
        if (!\core_component::get_plugin_directory('tool', 'mutenancy')) {
            return false;
        }
        if (!class_exists(\tool_mutenancy\local\tenancy::class) ||
                !method_exists(\tool_mutenancy\local\tenancy::class, 'is_active')) {
            return false;
        }
        return (bool) \tool_mutenancy\local\tenancy::is_active();
    } catch (\Throwable $e) {
        return false;
    }
}

/**
 * Safely check whether a plugin is installed on disk and registered in config.
 *
 * @param string $type Plugin type (e.g. 'tool').
 * @param string $name Plugin name (e.g. 'muprog').
 * @return bool
 */
function theme_boost_union_everon_launchpad_plugin_installed(string $type, string $name): bool {
    try {
        if (!\core_component::get_plugin_directory($type, $name)) {
            return false;
        }
        return !empty(get_config($type . '_' . $name, 'version'));
    } catch (\Throwable $e) {
        return false;
    }
}

/**
 * Safely check a capability without triggering debugging notices for missing plugins/caps.
 *
 * @param string $capability
 * @param \context|null $context
 * @param int|null $userid
 * @return bool
 */
function theme_boost_union_everon_launchpad_has_capability(
    string $capability,
    ?\context $context,
    ?int $userid = null
): bool {
    if ($context === null) {
        return false;
    }
    try {
        if (!get_capability_info($capability)) {
            return false;
        }
        return has_capability($capability, $context, $userid);
    } catch (\Throwable $e) {
        return false;
    }
}

/**
 * Safely check whether the user can access tool_certificate template management.
 *
 * @param \context|null $tenantcatcontext Active tenant category context, if any.
 * @param int|null $userid
 * @return bool
 */
function theme_boost_union_everon_launchpad_can_manage_certificates(
    ?\context $tenantcatcontext,
    ?int $userid = null
): bool {
    global $USER;

    if (!theme_boost_union_everon_launchpad_plugin_installed('tool', 'certificate')) {
        return false;
    }

    $iscurrentuser = ($userid === null || $userid === (int) $USER->id);
    if ($iscurrentuser && class_exists(\tool_certificate\permission::class) &&
            method_exists(\tool_certificate\permission::class, 'can_view_admin_tree')) {
        try {
            return (bool) \tool_certificate\permission::can_view_admin_tree();
        } catch (\Throwable $e) {
            return false;
        }
    }

    $systemcontext = \context_system::instance();
    if (theme_boost_union_everon_launchpad_has_capability('tool/certificate:manage', $systemcontext, $userid)) {
        return true;
    }
    if ($tenantcatcontext !== null &&
            theme_boost_union_everon_launchpad_has_capability('tool/certificate:manage', $tenantcatcontext, $userid)) {
        return true;
    }
    return false;
}

/**
 * Build a single sanitized Launch Pad tile entry.
 *
 * @param string $label
 * @param string $rawurl
 * @param string $icon
 * @return array{label:string, url:string, icon:string, hasicon:bool}|null
 */
function theme_boost_union_everon_launchpad_make_tile(string $label, string $rawurl, string $icon): ?array {
    $label = trim($label);
    if ($label === '') {
        return null;
    }
    $url = theme_boost_union_everon_launchpad_sanitize_url($rawurl);
    if ($url === null) {
        return null;
    }
    $cleanicon = theme_boost_union_everon_launchpad_sanitize_icon($icon);
    return [
        'label' => $label,
        'url' => $url->out(false),
        'icon' => $cleanicon,
        'hasicon' => $cleanicon !== '',
    ];
}

/**
 * Merged, deduped (by URL) role-pack links from launchpadrolelinks for a user.
 *
 * @param int|null $userid
 * @param bool $includesiteadmin Whether to include the built-in siteadmin pack.
 * @return array<int, array{label:string, url:string, icon:string, hasicon:bool}>
 */
function theme_boost_union_everon_launchpad_get_rolepack_links_for_user(
    ?int $userid = null,
    bool $includesiteadmin = true
): array {
    $keys = theme_boost_union_everon_launchpad_matching_pack_keys($userid);
    if ($keys === []) {
        return [];
    }

    $map = theme_boost_union_everon_launchpad_get_rolelinks_map();
    $merged = [];
    $seen = [];
    foreach ($keys as $key) {
        if (!$includesiteadmin && $key === 'siteadmin') {
            continue;
        }
        if (!isset($map[$key]) || !is_array($map[$key])) {
            continue;
        }
        foreach (theme_boost_union_everon_launchpad_sanitize_link_items($map[$key]) as $link) {
            if (isset($seen[$link['url']])) {
                continue;
            }
            $seen[$link['url']] = true;
            $merged[] = $link;
        }
    }
    return $merged;
}

/**
 * Active Launch Pad population mode ('builtin' or 'custom').
 *
 * @return string
 */
function theme_boost_union_everon_launchpad_get_mode(): string {
    $mode = get_config('theme_boost_union_everon', 'launchpadmode');
    if ($mode === 'custom') {
        return 'custom';
    }
    return 'builtin';
}

/**
 * Available built-in Launch Pad tile choices filtered to plugins installed on this site.
 *
 * Used by both the admin multicheckbox setting and runtime evaluation so settings
 * always match what is installed on this site.
 *
 * @return array<string, string> Map of tile key => localised checkbox label.
 */
function theme_boost_union_everon_launchpad_get_builtin_tile_choices(): array {
    if (theme_boost_union_everon_launchpad_mutenancy_is_active()) {
        $primary = static function (string $strkey): string {
            return get_string(
                'launchpad_tile_prefix_primary',
                'theme_boost_union_everon',
                get_string($strkey, 'theme_boost_union_everon')
            );
        };
        $global = static function (string $strkey): string {
            return get_string(
                'launchpad_tile_prefix_global',
                'theme_boost_union_everon',
                get_string($strkey, 'theme_boost_union_everon')
            );
        };

        $choices = [];
        $choices['appearance'] = $primary('launchpad_item_appearance');
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'mucertify')) {
            $choices['certifications'] = $primary('launchpad_item_certifications');
        }
        $choices['customreports'] = $primary('launchpad_item_customreports');
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'murules')) {
            $choices['dynamicrules'] = $primary('launchpad_item_dynamicrules');
        }
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'murelation')) {
            $choices['orgstructure'] = $primary('launchpad_item_orgstructure');
        }
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'muprog')) {
            $choices['programs'] = $primary('launchpad_item_programs');
        }
        $choices['tenantusers'] = $primary('launchpad_item_users');
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'mucatalog')) {
            $choices['catalogue'] = $primary('launchpad_item_catalogue');
        }
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'muhome')) {
            $choices['customhomepages'] = $primary('launchpad_item_customhomepages');
        }

        $choices['alltenants'] = $global('launchpad_item_alltenants');
        $choices['allusers'] = $global('launchpad_item_allusers');
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'certificate')) {
            $choices['certificates'] = $global('launchpad_item_certificates');
        }
        $choices['courses'] = $global('launchpad_item_courses');
        if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'mupages')) {
            $choices['custompages'] = $global('launchpad_item_custompages');
        }

        return $choices;
    }

    $choices = [
        'allusers' => get_string('launchpad_item_browseusers', 'theme_boost_union_everon'),
        'courses' => get_string('launchpad_item_managecourses', 'theme_boost_union_everon'),
        'appearance' => get_string('launchpad_item_appearance', 'theme_boost_union_everon'),
        'plugins' => get_string('launchpad_item_plugins', 'theme_boost_union_everon'),
        'performance' => get_string('launchpad_item_performance', 'theme_boost_union_everon'),
        'customreports' => get_string('launchpad_item_customreports', 'theme_boost_union_everon'),
        'debugging' => get_string('launchpad_item_debugging', 'theme_boost_union_everon'),
        'tasks' => get_string('launchpad_item_tasks', 'theme_boost_union_everon'),
    ];
    if (theme_boost_union_everon_launchpad_plugin_installed('tool', 'certificate')) {
        $choices['certificates'] = get_string('launchpad_item_certificates', 'theme_boost_union_everon');
    }

    return $choices;
}

/**
 * Enabled built-in Launch Pad tile keys for the current site.
 *
 * Handles Moodle admin_setting_configmulticheckbox storage semantics:
 * - false / null (never saved yet): all available tiles enabled.
 * - '' (saved with every box unchecked): zero tiles enabled.
 * - comma-separated list: only those valid available keys enabled.
 *
 * @return array<string, bool> Map of enabled tile key => true.
 */
function theme_boost_union_everon_launchpad_get_enabled_builtin_tiles(): array {
    $available = array_keys(theme_boost_union_everon_launchpad_get_builtin_tile_choices());
    $raw = get_config('theme_boost_union_everon', 'launchpadbuiltintiles');

    if ($raw === false || $raw === null) {
        return array_fill_keys($available, true);
    }

    $raw = trim((string) $raw);
    if ($raw === '') {
        return [];
    }

    $availablelookup = array_fill_keys($available, true);
    $enabled = [];
    foreach (explode(',', $raw) as $key) {
        $key = trim($key);
        if ($key !== '' && isset($availablelookup[$key])) {
            $enabled[$key] = true;
        }
    }
    return $enabled;
}

/**
 * Whether Custom reports should be shown to the user.
 *
 * Moodle grants moodle/reportbuilder:view to the default Authenticated User role,
 * so view-only access only shows Custom reports when the user also has at least
 * one other built-in management tile.
 *
 * @param \context $systemcontext
 * @param int $userid
 * @param bool $hasotheradmin
 * @return bool
 */
function theme_boost_union_everon_launchpad_can_show_customreports(
    \context $systemcontext,
    int $userid,
    bool $hasotheradmin
): bool {
    global $CFG;

    if (empty($CFG->enablecustomreports)) {
        return false;
    }

    $canmanage = theme_boost_union_everon_launchpad_has_capability('moodle/reportbuilder:editall', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('moodle/reportbuilder:edit', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('moodle/reportbuilder:viewall', $systemcontext, $userid);
    if ($canmanage) {
        return true;
    }

    return $hasotheradmin
        && theme_boost_union_everon_launchpad_has_capability('moodle/reportbuilder:view', $systemcontext, $userid);
}

/**
 * Build dynamic Workplace-aligned MuTMS Launch Pad sections when tool_mutenancy is active.
 *
 * @param int|null $userid
 * @return array<int, array{title:string, hastitle:bool, links:array}>
 */
function theme_boost_union_everon_launchpad_get_mutms_sections_for_user(?int $userid = null): array {
    global $DB, $USER;

    $userid = $userid ?? (int) $USER->id;
    if ($userid <= 0 || !isloggedin() || isguestuser($userid)) {
        return [];
    }

    $enabled = theme_boost_union_everon_launchpad_get_enabled_builtin_tiles();
    $systemcontext = \context_system::instance();

    // Resolve active tenant and its tenant/category contexts safely.
    $tenantid = 0;
    $tenant = null;
    $tenantcontext = null;
    $tenantcatid = 0;
    $tenantcatcontext = null;

    if (method_exists(\tool_mutenancy\local\tenancy::class, 'get_current_tenantid')) {
        try {
            $tenantid = (int) \tool_mutenancy\local\tenancy::get_current_tenantid();
        } catch (\Throwable $e) {
            $tenantid = 0;
        }
    }

    if ($tenantid > 0) {
        try {
            if (class_exists(\tool_mutenancy\local\tenant::class) &&
                    method_exists(\tool_mutenancy\local\tenant::class, 'fetch')) {
                $tenant = \tool_mutenancy\local\tenant::fetch($tenantid);
            }
            if (!$tenant && $DB->get_manager()->table_exists('tool_mutenancy_tenant')) {
                $tenant = $DB->get_record('tool_mutenancy_tenant', ['id' => $tenantid]);
            }
        } catch (\Throwable $e) {
            $tenant = null;
        }

        try {
            if (class_exists(\context_tenant::class) && method_exists(\context_tenant::class, 'instance')) {
                $tenantcontext = \context_tenant::instance($tenantid, IGNORE_MISSING) ?: null;
            } else if (class_exists(\core\context\tenant::class) &&
                    method_exists(\core\context\tenant::class, 'instance')) {
                $tenantcontext = \core\context\tenant::instance($tenantid, IGNORE_MISSING) ?: null;
            } else if (class_exists(\tool_mutenancy\context\tenant::class) &&
                    method_exists(\tool_mutenancy\context\tenant::class, 'instance')) {
                $tenantcontext = \tool_mutenancy\context\tenant::instance($tenantid, IGNORE_MISSING) ?: null;
            }
        } catch (\Throwable $e) {
            $tenantcontext = null;
        }

        if ($tenant && !empty($tenant->categoryid)) {
            $tenantcatid = (int) $tenant->categoryid;
            try {
                $tenantcatcontext = \context_coursecat::instance($tenantcatid, IGNORE_MISSING) ?: null;
            } catch (\Throwable $e) {
                $tenantcatcontext = null;
            }
        }
    }

    $targetcontext = ($tenantid > 0 && $tenantcatcontext !== null) ? $tenantcatcontext : $systemcontext;
    $contextparam = ($tenantid > 0 && $tenantcatcontext !== null) ? ('?contextid=' . $tenantcatcontext->id) : '';

    $addtile = static function (array &$bucket, string $strkey, string $rawurl, string $icon): void {
        $tile = theme_boost_union_everon_launchpad_make_tile(
            get_string($strkey, 'theme_boost_union_everon'),
            $rawurl,
            $icon
        );
        if ($tile !== null) {
            $bucket[] = $tile;
        }
    };

    // Determine Global section capabilities first so tenant managers without Global access
    // receive tenant-scoped Courses and Certificates in their primary section without duplication.
    $canalltenants = isset($enabled['alltenants']) && (
        theme_boost_union_everon_launchpad_has_capability('tool/mutenancy:view', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)
    );
    $canallusers = isset($enabled['allusers']) && (
        theme_boost_union_everon_launchpad_has_capability('moodle/user:update', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('moodle/user:delete', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)
    );
    $canglobalcourses = isset($enabled['courses']) && (
        theme_boost_union_everon_launchpad_has_capability('moodle/category:manage', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('moodle/course:create', $systemcontext, $userid)
    );
    $cancustompages = isset($enabled['custompages'])
        && theme_boost_union_everon_launchpad_plugin_installed('tool', 'mupages')
        && theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid);

    $canmanagecerts = isset($enabled['certificates'])
        && theme_boost_union_everon_launchpad_can_manage_certificates($tenantcatcontext, $userid);
    $hassystemcert = theme_boost_union_everon_launchpad_has_capability('tool/certificate:manage', $systemcontext, $userid)
        || theme_boost_union_everon_launchpad_has_capability('tool/certificate:viewallcertificates', $systemcontext, $userid);
    $hasotherglobal = $canalltenants || $canallusers || $canglobalcourses || $cancustompages;
    $canglobalcerts = $canmanagecerts && ($hassystemcert || $hasotherglobal);

    $globallinks = [];
    if ($canalltenants) {
        $addtile($globallinks, 'launchpad_item_alltenants', '/admin/tool/mutenancy/index.php', 'fa-building');
    }
    if ($canallusers) {
        $addtile($globallinks, 'launchpad_item_allusers', '/admin/user.php', 'fa-users-gear');
    }
    if ($canglobalcerts) {
        $addtile($globallinks, 'launchpad_item_certificates', '/admin/tool/certificate/manage_templates.php', 'fa-certificate');
    }
    if ($canglobalcourses) {
        $addtile($globallinks, 'launchpad_item_courses', '/course/management.php', 'fa-graduation-cap');
    }
    if ($cancustompages) {
        $addtile($globallinks, 'launchpad_item_custompages', '/admin/tool/mupages/manage.php', 'fa-file-lines');
    }

    // Primary / Tenant section.
    $primarylinks = [];

    // Appearance.
    if (isset($enabled['appearance'])) {
        if ($tenantid > 0) {
            if (theme_boost_union_everon_launchpad_has_capability('tool/mutenancy:configappearance', $tenantcontext, $userid)) {
                $addtile(
                    $primarylinks,
                    'launchpad_item_appearance',
                    '/admin/tool/mutenancy/tenant_appearance.php?id=' . $tenantid,
                    'fa-palette'
                );
            }
        } else if (theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)) {
            $addtile(
                $primarylinks,
                'launchpad_item_appearance',
                '/admin/settings.php?section=theme_boost_union_look',
                'fa-palette'
            );
        }
    }

    // Certifications.
    if (isset($enabled['certifications']) &&
            theme_boost_union_everon_launchpad_plugin_installed('tool', 'mucertify') &&
            theme_boost_union_everon_launchpad_has_capability('tool/mucertify:view', $targetcontext, $userid)) {
        $addtile(
            $primarylinks,
            'launchpad_item_certifications',
            '/admin/tool/mucertify/management/index.php' . $contextparam,
            'fa-award'
        );
    }

    // Record insertion slot for Custom reports (3rd in Primary, right after Appearance & Certifications).
    $customreportsindex = count($primarylinks);

    // Dynamic rules.
    if (isset($enabled['dynamicrules']) &&
            theme_boost_union_everon_launchpad_plugin_installed('tool', 'murules') && (
                theme_boost_union_everon_launchpad_has_capability('tool/murules:manage', $systemcontext, $userid) ||
                theme_boost_union_everon_launchpad_has_capability('tool/murules:view', $systemcontext, $userid)
            )) {
        $addtile($primarylinks, 'launchpad_item_dynamicrules', '/admin/tool/murules/rules.php', 'fa-bolt');
    }

    // Organisation structure.
    if (isset($enabled['orgstructure']) &&
            theme_boost_union_everon_launchpad_plugin_installed('tool', 'murelation') &&
            theme_boost_union_everon_launchpad_has_capability('tool/murelation:viewframeworks', $systemcontext, $userid)) {
        $addtile($primarylinks, 'launchpad_item_orgstructure', '/admin/tool/murelation/management/index.php', 'fa-sitemap');
    }

    // Programs.
    if (isset($enabled['programs']) &&
            theme_boost_union_everon_launchpad_plugin_installed('tool', 'muprog') &&
            theme_boost_union_everon_launchpad_has_capability('tool/muprog:view', $targetcontext, $userid)) {
        $addtile(
            $primarylinks,
            'launchpad_item_programs',
            '/admin/tool/muprog/management/index.php' . $contextparam,
            'fa-layer-group'
        );
    }

    // Users (tenant-scoped only so site admins do not see duplicate Users + All users).
    if (isset($enabled['tenantusers']) && $tenantid > 0 &&
            theme_boost_union_everon_launchpad_has_capability('tool/mutenancy:view', $tenantcontext, $userid)) {
        $addtile(
            $primarylinks,
            'launchpad_item_users',
            '/admin/tool/mutenancy/tenant_users.php?id=' . $tenantid,
            'fa-users'
        );
    }

    // Catalogue.
    if (isset($enabled['catalogue']) &&
            theme_boost_union_everon_launchpad_plugin_installed('tool', 'mucatalog') &&
            theme_boost_union_everon_launchpad_has_capability('tool/mucatalog:view', $targetcontext, $userid)) {
        $addtile(
            $primarylinks,
            'launchpad_item_catalogue',
            '/admin/tool/mucatalog/management/sections.php' . $contextparam,
            'fa-book-open'
        );
    }

    // Custom home pages.
    if (isset($enabled['customhomepages']) &&
            theme_boost_union_everon_launchpad_plugin_installed('tool', 'muhome') &&
            theme_boost_union_everon_launchpad_has_capability('tool/muhome:view', $targetcontext, $userid)) {
        $addtile(
            $primarylinks,
            'launchpad_item_customhomepages',
            '/admin/tool/muhome/management/index.php' . $contextparam,
            'fa-house'
        );
    }

    // For tenant managers (and any user without a Global section), include tenant-scoped
    // Courses and Certificates directly in the primary section when those tiles are enabled.
    if ($globallinks === []) {
        if (isset($enabled['courses']) && $tenantid > 0 && $tenantcatid > 0 && $tenantcatcontext !== null && (
                theme_boost_union_everon_launchpad_has_capability('moodle/category:manage', $tenantcatcontext, $userid) ||
                theme_boost_union_everon_launchpad_has_capability('moodle/course:create', $tenantcatcontext, $userid)
        )) {
            $addtile(
                $primarylinks,
                'launchpad_item_courses',
                '/course/management.php?categoryid=' . $tenantcatid,
                'fa-graduation-cap'
            );
        }
        if ($canmanagecerts) {
            $addtile(
                $primarylinks,
                'launchpad_item_certificates',
                '/admin/tool/certificate/manage_templates.php',
                'fa-certificate'
            );
        }
    }

    // Custom reports: splice into its Workplace position after checking other management tiles.
    if (isset($enabled['customreports']) &&
            theme_boost_union_everon_launchpad_can_show_customreports(
                $systemcontext,
                $userid,
                $primarylinks !== [] || $globallinks !== []
            )) {
        $customreportstile = theme_boost_union_everon_launchpad_make_tile(
            get_string('launchpad_item_customreports', 'theme_boost_union_everon'),
            '/reportbuilder/index.php',
            'fa-chart-bar'
        );
        if ($customreportstile !== null) {
            array_splice($primarylinks, $customreportsindex, 0, [$customreportstile]);
        }
    }

    // Append any non-siteadmin custom role packs configured in launchpadrolelinks, deduped by URL.
    $seen = [];
    foreach ($primarylinks as $link) {
        $seen[$link['url']] = true;
    }
    foreach ($globallinks as $link) {
        $seen[$link['url']] = true;
    }
    foreach (theme_boost_union_everon_launchpad_get_rolepack_links_for_user($userid, false) as $link) {
        if (isset($seen[$link['url']])) {
            continue;
        }
        $seen[$link['url']] = true;
        $primarylinks[] = $link;
    }

    $sections = [];
    if ($primarylinks !== []) {
        $sections[] = [
            'title' => '',
            'hastitle' => false,
            'links' => $primarylinks,
        ];
    }
    if ($globallinks !== []) {
        $sections[] = [
            'title' => get_string('launchpad_section_global', 'theme_boost_union_everon'),
            'hastitle' => true,
            'links' => $globallinks,
        ];
    }

    return $sections;
}

/**
 * Build standard Moodle built-in Launch Pad section when tool_mutenancy is not active.
 *
 * @param int|null $userid
 * @return array<int, array{title:string, hastitle:bool, links:array}>
 */
function theme_boost_union_everon_launchpad_get_standard_sections_for_user(?int $userid = null): array {
    global $USER;

    $userid = $userid ?? (int) $USER->id;
    if ($userid <= 0 || !isloggedin() || isguestuser($userid)) {
        return [];
    }

    $enabled = theme_boost_union_everon_launchpad_get_enabled_builtin_tiles();
    $systemcontext = \context_system::instance();

    $addtile = static function (array &$bucket, string $strkey, string $rawurl, string $icon): void {
        $tile = theme_boost_union_everon_launchpad_make_tile(
            get_string($strkey, 'theme_boost_union_everon'),
            $rawurl,
            $icon
        );
        if ($tile !== null) {
            $bucket[] = $tile;
        }
    };

    $links = [];

    if (isset($enabled['allusers']) && (
            theme_boost_union_everon_launchpad_has_capability('moodle/user:update', $systemcontext, $userid) ||
            theme_boost_union_everon_launchpad_has_capability('moodle/user:delete', $systemcontext, $userid) ||
            theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)
    )) {
        $addtile($links, 'launchpad_item_browseusers', '/admin/user.php', 'fa-users');
    }

    if (isset($enabled['courses']) && (
            theme_boost_union_everon_launchpad_has_capability('moodle/category:manage', $systemcontext, $userid) ||
            theme_boost_union_everon_launchpad_has_capability('moodle/course:create', $systemcontext, $userid)
    )) {
        $addtile($links, 'launchpad_item_managecourses', '/course/management.php', 'fa-graduation-cap');
    }

    if (isset($enabled['appearance']) &&
            theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)) {
        $addtile($links, 'launchpad_item_appearance', '/admin/settings.php?section=theme_boost_union_look', 'fa-palette');
    }

    if (isset($enabled['plugins']) &&
            theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)) {
        $addtile($links, 'launchpad_item_plugins', '/admin/plugins.php', 'fa-puzzle-piece');
    }

    if (isset($enabled['performance']) &&
            theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)) {
        $addtile($links, 'launchpad_item_performance', '/report/performance/index.php', 'fa-gauge-high');
    }

    // Record insertion slot for Custom reports (after Performance overview).
    $customreportsindex = count($links);

    if (isset($enabled['debugging']) &&
            theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)) {
        $addtile($links, 'launchpad_item_debugging', '/admin/settings.php?section=debugging', 'fa-bug');
    }

    if (isset($enabled['tasks']) &&
            theme_boost_union_everon_launchpad_has_capability('moodle/site:config', $systemcontext, $userid)) {
        $addtile($links, 'launchpad_item_tasks', '/admin/tool/task/scheduledtasks.php', 'fa-clock');
    }

    if (isset($enabled['certificates']) &&
            theme_boost_union_everon_launchpad_can_manage_certificates(null, $userid)) {
        $addtile($links, 'launchpad_item_certificates', '/admin/tool/certificate/manage_templates.php', 'fa-certificate');
    }

    // Custom reports: splice into slot only when user has reportbuilder management caps
    // or at least one other built-in management tile.
    if (isset($enabled['customreports']) &&
            theme_boost_union_everon_launchpad_can_show_customreports($systemcontext, $userid, $links !== [])) {
        $customreportstile = theme_boost_union_everon_launchpad_make_tile(
            get_string('launchpad_item_customreports', 'theme_boost_union_everon'),
            '/reportbuilder/index.php',
            'fa-chart-bar'
        );
        if ($customreportstile !== null) {
            array_splice($links, $customreportsindex, 0, [$customreportstile]);
        }
    }

    // Append any non-siteadmin custom role packs configured in launchpadrolelinks, deduped by URL.
    $seen = [];
    foreach ($links as $link) {
        $seen[$link['url']] = true;
    }
    foreach (theme_boost_union_everon_launchpad_get_rolepack_links_for_user($userid, false) as $link) {
        if (isset($seen[$link['url']])) {
            continue;
        }
        $seen[$link['url']] = true;
        $links[] = $link;
    }

    if ($links === []) {
        return [];
    }

    return [[
        'title' => '',
        'hastitle' => false,
        'links' => $links,
    ]];
}

/**
 * Launch Pad sections for the current (or specified) user.
 *
 * Respects launchpadmode ('builtin' vs 'custom'):
 * - 'custom': uses configured launchpadrolelinks packs exclusively.
 * - 'builtin': builds capability-aware MuTMS sections (when tool_mutenancy is active)
 *   or standard Moodle built-in tiles (otherwise), filtered by launchpadbuiltintiles,
 *   plus non-siteadmin custom role packs.
 *
 * @param int|null $userid
 * @return array<int, array{title:string, hastitle:bool, links:array}>
 */
function theme_boost_union_everon_launchpad_get_sections_for_user(?int $userid = null): array {
    global $USER;

    $userid = $userid ?? (int) $USER->id;
    if ($userid <= 0 || !isloggedin() || isguestuser($userid)) {
        return [];
    }

    if (theme_boost_union_everon_launchpad_get_mode() === 'custom') {
        $links = theme_boost_union_everon_launchpad_get_rolepack_links_for_user($userid, true);
        if ($links === []) {
            return [];
        }

        return [[
            'title' => '',
            'hastitle' => false,
            'links' => $links,
        ]];
    }

    if (theme_boost_union_everon_launchpad_mutenancy_is_active()) {
        return theme_boost_union_everon_launchpad_get_mutms_sections_for_user($userid);
    }

    return theme_boost_union_everon_launchpad_get_standard_sections_for_user($userid);
}

/**
 * Merged, deduped (by URL) links for the current user.
 *
 * @param int|null $userid
 * @return array<int, array{label:string, url:string, icon:string, hasicon:bool}>
 */
function theme_boost_union_everon_launchpad_get_links_for_user(?int $userid = null): array {
    $sections = theme_boost_union_everon_launchpad_get_sections_for_user($userid);
    $flat = [];
    foreach ($sections as $section) {
        foreach ($section['links'] as $link) {
            $flat[] = $link;
        }
    }
    return $flat;
}

/**
 * Whether the Launch Pad icon should render for the current user.
 *
 * @return bool
 */
function theme_boost_union_everon_launchpad_should_show(): bool {
    if (!theme_boost_union_everon_launchpad_enabled()) {
        return false;
    }
    if (!isloggedin() || isguestuser()) {
        return false;
    }
    return theme_boost_union_everon_launchpad_get_sections_for_user() !== [];
}

/**
 * Template context for the Launch Pad popover.
 *
 * @return array|null Null when the control should not render.
 */
function theme_boost_union_everon_launchpad_template_context(): ?array {
    if (!theme_boost_union_everon_launchpad_enabled()) {
        return null;
    }
    if (!isloggedin() || isguestuser()) {
        return null;
    }
    $sections = theme_boost_union_everon_launchpad_get_sections_for_user();
    if ($sections === []) {
        return null;
    }
    $links = [];
    foreach ($sections as $section) {
        foreach ($section['links'] as $link) {
            $links[] = $link;
        }
    }
    return [
        'sections' => $sections,
        'hassections' => true,
        'links' => $links,
        'haslinks' => $links !== [],
    ];
}




/**
 * Whether Everon profile usermenu tiles are enabled (admin setting).
 * Default: enabled when the setting has never been saved.
 *
 * @return bool
 */
function theme_boost_union_everon_usermenutiles_enabled(): bool {
    return theme_boost_union_everon_config_yes_default('enableusermenutiles');
}

/**
 * Font Awesome free solid class map for known usermenu titleidentifiers.
 *
 * @return array<string, string> Map of titleidentifier => fa-* class (without leading "fa ").
 */
function theme_boost_union_everon_usermenu_tile_icon_map(): array {
    return [
        'profile,moodle' => 'fa-circle-user',
        'grades,grades' => 'fa-chart-column',
        'calendar,core_calendar' => 'fa-calendar-days',
        'privatefiles,moodle' => 'fa-folder-open',
        'reports,core_reportbuilder' => 'fa-table',
        'preferences,moodle' => 'fa-gear',
        'switchroleto,moodle' => 'fa-people-arrows',
        'switchrolereturn,moodle' => 'fa-rotate-left',
        'logout,moodle' => 'fa-right-from-bracket',
    ];
}

/**
 * Resolve a free FA icon class for one usermenu item.
 *
 * @param array|object $item Menu item (link / submenu-link / divider).
 * @param string $languagetitle Localised "Language" string for submenu detection.
 * @return string FA class token such as fa-link (no leading "fa ").
 */
function theme_boost_union_everon_usermenu_tile_icon_for_item($item, string $languagetitle): string {
    $item = (array) $item;
    // Core marks the penultimate item with divider=true while it remains a link
    // (list-mode separator). Only pure divider nodes should skip icon mapping.
    $ispuredivider = (($item['itemtype'] ?? '') === 'divider')
        || (!empty($item['divider']) && empty($item['link']) && empty($item['submenulink'])
            && empty($item['url']) && empty($item['title']));
    if ($ispuredivider) {
        return 'fa-link';
    }

    $id = isset($item['titleidentifier']) ? (string) $item['titleidentifier'] : '';
    $map = theme_boost_union_everon_usermenu_tile_icon_map();
    if ($id !== '' && isset($map[$id])) {
        return $map[$id];
    }

    $issubmenu = !empty($item['submenulink']) || (($item['itemtype'] ?? '') === 'submenu-link');
    if ($issubmenu) {
        $title = isset($item['title']) ? (string) $item['title'] : '';
        if ($title === $languagetitle || $id === 'language,moodle') {
            return 'fa-globe';
        }
        // Other submenu entries (e.g. Union smart menus).
        return 'fa-folder';
    }

    return 'fa-link';
}

/**
 * Enrich user_action_menu_items template context for Everon tiles (or leave list mode).
 *
 * @param array|object $context Mustache context.
 * @return array
 */
function theme_boost_union_everon_usermenu_prepare_action_menu_context($context): array {
    if (is_object($context)) {
        $context = (array) $context;
    }
    if (!is_array($context)) {
        $context = [];
    }

    $tiles = theme_boost_union_everon_usermenutiles_enabled();
    $context['everontiles'] = $tiles;

    if (!$tiles || empty($context['items']) || !is_array($context['items'])) {
        return $context;
    }

    $languagetitle = get_string('language');
    $enriched = [];
    foreach ($context['items'] as $item) {
        $asobj = is_object($item);
        $row = $asobj ? clone $item : (object) $item;

        // Dividers are omitted from the tile grid (Mustache skips them when everontiles).
        $row->faicon = theme_boost_union_everon_usermenu_tile_icon_for_item($row, $languagetitle);
        $row->hasfaicon = empty($row->pixicon) && empty($row->imgsrc);

        $enriched[] = $asobj ? $row : (array) $row;
    }
    $context['items'] = $enriched;

    return $context;
}

/**
 * Boost Union-style info alert for MuTMS flavour settings (info + jalapeño actions).
 *
 * Reuses Boost Union's notification template, pix icons, and modal AMD so Everon
 * does not fork the admin UI chrome. Message text is Everon-specific: Look assets
 * live in Boost Union flavours; this MuTMS tab only maps flavours to tenants.
 *
 * @return string HTML (info notification), or empty string if Boost Union helpers are unavailable.
 */
function theme_boost_union_everon_render_flavour_setting_notification(): string {
    global $OUTPUT;

    if (!function_exists('theme_boost_union_ensure_modal_js')) {
        return '';
    }

    $modaltitle = get_string('settingoverridenotificationtitle', 'theme_boost_union');
    $modalbody = get_string('flavourtenantssettingmodal', 'theme_boost_union_everon');
    $message = get_string('flavourtenantssettingalert', 'theme_boost_union_everon');

    $actions = [];

    // Info (opens Boost Union bumodal with Everon copy).
    $actions[] = [
        'url' => '#',
        'icon' => new \core\output\pix_icon(
            'info',
            get_string('settingoverrideactioninfo', 'theme_boost_union'),
            'theme_boost_union'
        ),
        'attributes' => [
            'class' => 'action-info py-0 ps-0 ms-0 me-0',
            'data-action' => 'bumodal',
            'data-title' => $modaltitle,
            'data-body' => $modalbody,
        ],
    ];

    // Jalapeño → Boost Union flavours overview.
    $actions[] = [
        'url' => new \core\url('/theme/boost_union/flavours/overview.php'),
        'icon' => new \core\output\pix_icon(
            'flavours',
            get_string('settingoverrideactionflavours', 'theme_boost_union'),
            'theme_boost_union'
        ),
        'attributes' => [
            'class' => 'action-flavours py-0 ms-0 me-0 pe-0',
            'title' => get_string('settingoverrideactionflavours', 'theme_boost_union'),
            'aria-label' => get_string('settingoverrideactionflavours', 'theme_boost_union'),
        ],
    ];

    $actionshtml = [];
    foreach ($actions as $action) {
        $action['attributes']['role'] = 'button';
        $actionshtml[] = $OUTPUT->action_icon(
            $action['url'],
            $action['icon'],
            null,
            $action['attributes']
        );
    }
    $actionshtml = html_writer::span(implode('', $actionshtml), 'settings-actions');

    $content = $OUTPUT->render_from_template('theme_boost_union/settingoverridenotification', [
        'message' => $message,
        'actionshtml' => $actionshtml,
    ]);

    theme_boost_union_ensure_modal_js();

    // Same as Boost Union: render info notification without stripping action data-* attrs.
    return $OUTPUT->render_from_template('core/notification_info', [
        'message' => $content,
        'closebutton' => false,
    ]);
}

/***************************************************************
 * EXTENSION POINT:
 * Add whatever Everon local functions you need here.
 **************************************************************/
