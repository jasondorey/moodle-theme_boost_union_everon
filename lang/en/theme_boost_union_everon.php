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
 * Theme Everon - Language pack
 *
 * @package    theme_boost_union_everon
 * @copyright  2023 Daniel Poggenpohl <daniel.poggenpohl@fernuni-hagen.de> and Alexander Bias <bias@alexanderbias.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Let codechecker ignore some sniffs for this file as it is perfectly well ordered, just not alphabetically.
// phpcs:disable moodle.Files.LangFilesOrdering.UnexpectedComment
// phpcs:disable moodle.Files.LangFilesOrdering.IncorrectOrder

// General.
$string['pluginname'] = 'Everon';
$string['choosereadme'] = 'Everon is a Boost Union child theme for Project Theme. It ships stock Union look plus optional features such as the accessibility toolbar, Launch Pad, Focus Mode, My Courses layout, and Dashboard layout.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon is a Boost Union child for Project Theme. Prefer Union Look/Content settings; Everon adds features such as the accessibility toolbar, Launch Pad shortcuts, Focus Mode, My Courses card layout, Dashboard layout, and optional MuTMS compatibility.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Inheritance';
$string['inheritanceinherit'] = 'Inherit';
$string['inheritanceduplicate'] = 'Duplicate';
$string['inheritanceoptionsexplanation'] = 'Most of the time, inheriting will be perfectly fine. However, it may happen that imperfect code is integrated into Boost Union which prevents simple SCSS inheritance for particular Boost Union features. If you encounter any issues with Boost Union features which seem not to work in Everon as well, try to switch this setting to \'Duplicate\' and, if this solves the problem, report an issue on Github (see the README.md file for details how to report an issue).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pre SCSS inheritance';
$string['prescssinheritancesetting_desc'] = 'With this setting, you control if the pre SCSS code from Boost Union should be inherited or duplicated.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Extra SCSS inheritance';
$string['extrascssinheritancesetting_desc'] = 'With this setting, you control if the extra SCSS code from Boost Union should be inherited or duplicated.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Accessibility';
$string['accessibilityheading'] = 'Accessibility toolbar';
$string['accessibilityheading_desc'] = 'Navbar utility that lets each user adjust content, colour, and assistive tools. Preferences are stored in the browser (localStorage), not in Moodle user preferences.';
$string['enableaccessibilitytool'] = 'Enable accessibility toolbar';
$string['enableaccessibilitytool_desc'] = 'Show the accessibility icon in the top navbar (next to notifications/messages) and load the toolbar. Default: Yes.';
$string['activityiconfiltersheading'] = 'Activity icons';
$string['activityiconfiltersheading_desc'] = 'Purpose-colour filters for Safari (page SVG defs) and light monologo filters in Boost dark mode. Branded icons stay unfiltered; aimassign monologos are excluded from tinting.';
$string['enableactivityiconfilters'] = 'Activity icon filters';
$string['enableactivityiconfilters_desc'] = 'When enabled, load Safari purpose-colour filters for core monologos and file icons, and force light/white monologo filters under Boost dark mode (`data-bs-theme="dark"`). Default: Yes.';
$string['accessibilitymenu'] = 'Accessibility options';
$string['a11ycontentadjustments'] = 'Content Adjustments';
$string['a11ycoloradjustments'] = 'Color Adjustments';
$string['a11ytools'] = 'Tools';
$string['a11yadjustfontsize'] = 'Adjust Font Size';
$string['a11ydecreasefont'] = 'Decrease font size';
$string['a11yincreasefont'] = 'Increase font size';
$string['a11yhighlighttitle'] = 'Highlight Title';
$string['a11yhighlightlinks'] = 'Highlight Links';
$string['a11ydyslexiafont'] = 'Dyslexia Font';
$string['a11yletterspacing'] = 'Letter Spacing';
$string['a11ylineheight'] = 'Line Height';
$string['a11yfontweight'] = 'Font Weight';
$string['a11ydarkcontrast'] = 'Dark Contrast';
$string['a11ylightcontrast'] = 'Light Contrast';
$string['a11yhighcontrast'] = 'High Contrast';
$string['a11yhighsaturation'] = 'High Saturation';
$string['a11ylowsaturation'] = 'Low Saturation';
$string['a11ymonochrome'] = 'Monochrome';
$string['a11ycolourmode'] = 'Colour Mode';
$string['a11ycolourmodedark'] = 'Dark';
$string['a11ycolourmodelight'] = 'Light';
$string['a11ycolourmodesystem'] = 'System';
$string['a11yreadingguide'] = 'Reading Guide';
$string['a11ystopanimations'] = 'Stop Animations';
$string['a11ybigcursor'] = 'Big Cursor';
$string['a11yresetall'] = 'Reset all accessibility settings';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Navbar icon that opens capability-aware shortcut links and/or custom role link packs. Choose Built-in tiles mode (default) to automatically show shortcuts for installed features based on each user\'s capabilities (including tenant-scoped and Global tiles on MuTMS sites), or Custom role links only to manage all links via JSON packs. The icon is hidden when Launch Pad is disabled or the current user has no accessible links.';
$string['enablelaunchpad'] = 'Enable Launch Pad';
$string['enablelaunchpad_desc'] = 'Show the Launch Pad icon in the top navbar (after the accessibility tool, before the user menu) when the user has at least one accessible link. Default: No.';
$string['launchpadmode'] = 'Launch Pad mode';
$string['launchpadmode_desc'] = 'Choose how Launch Pad links are populated. In Built-in tiles mode, shortcuts are generated automatically from the enabled tiles below based on installed plugins and each user\'s capabilities (Site administrators and, on MuTMS sites, Tenant managers), with non-administrator role packs appended. In Custom role links only mode, only the JSON role link packs below are used.';
$string['launchpadmode_builtin'] = 'Built-in tiles (capability-aware) + custom role links';
$string['launchpadmode_custom'] = 'Custom role links only';
$string['launchpadbuiltintiles'] = 'Built-in Launch Pad tiles';
$string['launchpadbuiltintiles_desc'] = 'Select which built-in tiles can appear when Built-in tiles mode is active. Only tiles for features installed on this site are listed. Every tile is still checked against the current user\'s capabilities (and active tenant on MuTMS sites) so users never see links they cannot access.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'JSON array of objects with <code>label</code>, <code>url</code> (site-relative path such as <code>/admin/search.php</code>), and optional <code>icon</code> (Font Awesome class, e.g. <code>fa-cog</code>). External URLs are rejected in v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Links: Site administrators';
$string['launchpadlinks_siteadmin_desc'] = 'Shown when the user is a site administrator (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Links: Manager';
$string['launchpadlinks_manager_desc'] = 'Legacy MVP setting (migrated into a manager role pack when possible).';
$string['launchpadlinks_authenticated'] = 'Links: Authenticated users';
$string['launchpadlinks_authenticated_desc'] = 'Fallback for every logged-in non-guest user. Merged after siteadmin and role packs.';

$string['launchpadrolelinks'] = 'Role link packs';
$string['launchpadrolelinks_desc'] = 'Configure JSON link lists by role. In Built-in tiles mode, the built-in tiles above manage Site administrator (and Tenant manager on MuTMS sites) shortcuts and the Site administrators pack here is inactive; any added role packs are appended (deduplicated by URL). In Custom role links only mode, these JSON packs (including Site administrators) drive the Launch Pad exclusively. Role packs match when the user has that role in any context.';
$string['launchpadbuiltinpacks'] = 'Built-in packs';
$string['launchpadconfiguredroles'] = 'Configured packs';
$string['launchpadaddrole'] = 'Add role';
$string['launchpadremoverole'] = 'Remove';
$string['launchpadchooserole'] = 'Choose a role…';
$string['launchpadlinks_role'] = 'Links: {$a}';
$string['launchpadrolemissing'] = 'Role #{$a} (missing)';
$string['launchpadrolemapinvalid'] = 'Launch Pad role links must be a JSON object mapping pack keys to link arrays.';

$string['launchpadjsoninvalid'] = 'Launch Pad links must be a JSON array of objects, each with non-empty label and url.';
$string['launchpad_section_global'] = 'Global';
$string['launchpad_tile_prefix_primary'] = 'Primary: {$a}';
$string['launchpad_tile_prefix_global'] = 'Global: {$a}';
$string['launchpad_item_appearance'] = 'Appearance';
$string['launchpad_item_browseusers'] = 'Browse list of users';
$string['launchpad_item_managecourses'] = 'Manage courses and categories';
$string['launchpad_item_plugins'] = 'Plugins overview';
$string['launchpad_item_performance'] = 'Performance overview';
$string['launchpad_item_debugging'] = 'Debugging';
$string['launchpad_item_tasks'] = 'Scheduled tasks';
$string['launchpad_item_certifications'] = 'Certifications';
$string['launchpad_item_customreports'] = 'Custom reports';
$string['launchpad_item_dynamicrules'] = 'Dynamic rules';
$string['launchpad_item_orgstructure'] = 'Organisation structure';
$string['launchpad_item_programs'] = 'Programs';
$string['launchpad_item_users'] = 'Users';
$string['launchpad_item_catalogue'] = 'Catalogue';
$string['launchpad_item_customhomepages'] = 'Custom home pages';
$string['launchpad_item_alltenants'] = 'All tenants';
$string['launchpad_item_allusers'] = 'All users';
$string['launchpad_item_certificates'] = 'Certificates';
$string['launchpad_item_courses'] = 'Courses';
$string['launchpad_item_custompages'] = 'Custom pages';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Focus Mode';
$string['focusmodeheading'] = 'Focus Mode';
$string['focusmodeheading_desc'] = 'A floating control on course content pages, Dashboard (/my/), My courses (/my/courses.php), and MuTMS custom home pages that hides secondary navigation and drawers and widens the main content. Preference is stored per course or page in the browser (localStorage).';
$string['enablefocusmode'] = 'Enable Focus Mode';
$string['enablefocusmode_desc'] = 'Show the Focus Mode button (bottom-right) on course home, section, and activity pages as well as Dashboard (/my/), My courses (/my/courses.php), and MuTMS custom home pages. Default: Yes.';
$string['focusmodeenable'] = 'Focus mode';
$string['focusmodedisable'] = 'Exit focus mode';
$string['focusmodenotice'] = 'Focus mode is on. Click × at the bottom right to turn it off.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'User menu';
$string['usermenuheading'] = 'User menu tiles';
$string['usermenuheading_desc'] = 'Restyle the profile usermenu as a Launch Pad–style tile grid (same Boost destinations). Panel chrome already matches Accessibility / Launch Pad. Turn off to keep the vertical link list.';
$string['enableusermenutiles'] = 'Enable user menu tiles';
$string['enableusermenutiles_desc'] = 'Show profile usermenu items as a 3-column tile grid with Font Awesome icons. Default: Yes. Set to No for the vertical list.';
$string['usermenumenu'] = 'User menu';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Navbar';
$string['navbarheading'] = 'Compact navbar';
$string['navbarheading_desc'] = 'Slightly tighter top bar, clearer active link underline, and consistent utility icon hit targets. Site logo and brand colour stay in Boost Union → Look (multi-client path). Login layout is unchanged (Boost Union login only).';
$string['enablecompactnavbar'] = 'Enable compact navbar';
$string['enablecompactnavbar_desc'] = 'Apply compact navbar chrome on all pages except login. Default: Yes. Turn off to use stock Boost Union navbar height.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'My Courses';
$string['mycoursesheading'] = 'My Courses layout';
$string['mycoursesheading_desc'] = 'Optional card grid skin on the My courses page (/my/courses.php) at the default Moodle / Boost Union page width (expandable via Focus Mode). Skins the stock Course overview block — does not replace it. Search, grouping, sort, and view modes stay core Moodle.';
$string['enablemycourseslayout'] = 'Enable My Courses layout';
$string['enablemycourseslayout_desc'] = 'Show a responsive card grid (1–3 columns at default width, expanding up to 5 columns in Focus Mode) and restyle cards (shadow, circular progress on image, star on image). Default: Yes.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'My Courses stats';
$string['mycoursesstatsheading_desc'] = 'Optional statistics strip at the top of My courses (/my/courses.php) for the current user: Enrolments, Completions, Badges, and Certificates. Each panel can be enabled independently.';
$string['enablemycoursesstats'] = 'Enable My Courses stats';
$string['enablemycoursesstats_desc'] = 'Show the statistics strip above the course overview on My courses. Default: Yes.';
$string['mycoursesstatsenrolments'] = 'Show Enrolments panel';
$string['mycoursesstatsenrolments_desc'] = 'Count of the current user’s active (in progress) courses. Default: Yes.';
$string['mycoursesstatscompletions'] = 'Show Completions panel';
$string['mycoursesstatscompletions_desc'] = 'Count of courses the current user has completed. Default: Yes.';
$string['mycoursesstatsbadges'] = 'Show Badges panel';
$string['mycoursesstatsbadges_desc'] = 'Count of badges awarded to the current user. Default: Yes.';
$string['mycoursesstatscertificates'] = 'Show Certificates panel';
$string['mycoursesstatscertificates_desc'] = 'Count of certificates awarded to the current user (tool_certificate or mod_customcert when installed; otherwise 0). Default: Yes.';
$string['mycoursesstatsaria'] = 'My courses statistics';
$string['mycoursesstatsenrolmentstitle'] = 'Enrolments';
$string['mycoursesstatsenrolmentssub'] = '{$a} Active courses';
$string['mycoursesstatscompletionstitle'] = 'Completions';
$string['mycoursesstatscompletionssub'] = '{$a} Completed courses';
$string['mycoursesstatsbadgestitle'] = 'Badges';
$string['mycoursesstatsbadgessub'] = '{$a} Awarded';
$string['mycoursesstatscertificatestitle'] = 'Certificates';
$string['mycoursesstatscertificatessub'] = '{$a} Awarded';

// Settings: Dashboard tab (shared Course overview cards + block surfaces on /my/).
$string['dashboardtab'] = 'Dashboard';
$string['dashboardheading'] = 'Dashboard layout';
$string['dashboardheading_desc'] = 'Optional Dashboard card grid and block surface skin on /my/ at the default Moodle / Boost Union page width (expandable via Focus Mode), sharing Course overview card chrome with My Courses. Column layout (Calendar / Upcoming events on the right) uses Boost Union Outside (right) — configure under Feel → Blocks.';
$string['enabledashboardlayout'] = 'Enable Dashboard layout';
$string['enabledashboardlayout_desc'] = 'Apply the same Course overview card chrome as My Courses on Dashboard (1–3 columns at default width, expanding to 4 columns in Focus Mode). Also unifies Timeline / Calendar / Upcoming block surfaces and softens empty states to match. Default: Yes. Enable Boost Union Outside (right) separately for the right column.';
$string['dashboardsurfacesnote'] = 'When Dashboard layout is enabled, Everon also applies shared block surface tokens (soft border, radius, shadow) and calmer Timeline / Upcoming empty-state styling so supporting blocks match course cards.';

// Settings: MuTMS tab.
$string['mutmstab'] = 'MuTMS';
$string['mutmsheading'] = 'MuTMS compatibility';
$string['mutmsheading_desc'] = 'Optional bridge so Everon works with the MuTMS plugin suite on this site (programs, certifications, catalogue, custom home pages, multi-tenancy appearance, and related tools). Prefer theme CSS and settings mirroring — MuTMS plugin code is not forked.';
$string['enablemutmscompatibility'] = 'Enable MuTMS compatibility';
$string['enablemutmscompatibility_desc'] = 'When Yes: (1) load MuTMS surface CSS under Everon / Boost colour modes; (2) keep custom home pages (tool_muhome) out of the Dashboard layout skin; (3) mirror tenant Boost appearance (brand colour, SCSS, site + login backgrounds) into Everon and bust per-tenant theme CSS caches; (4) allow Boost Union flavours to apply to MuTMS tenants (map them below on this MuTMS tab) and use a thin MuTMS logo/favicon fallback when no flavour logo wins — including on the login page for guests when forcelogin would make flavour Look files redirect. Default: No. Turn on after MuTMS plugins are installed.';
$string['flavourtenantspage'] = 'Tenant flavours';
$string['flavourtenantsheading'] = 'Apply flavours to MuTMS tenants';
$string['flavourtenantsheading_desc'] = 'Map Boost Union flavours to MuTMS tenants here. Matching is active only while MuTMS compatibility is On.';
$string['flavourtenantsmap'] = 'Flavour to tenant mapping';
$string['flavourtenantsmap_desc'] = 'For each flavour, choose Apply to tenants and select which MuTMS tenants it should match.';
$string['flavourtenantssettingalert'] = 'Flavour Look assets (logos, favicon, SCSS, and related controls) are configured within Boost Union flavours.';
$string['flavourtenantssettingmodal'] = '<strong>Flavours</strong><br />Boost Union flavours hold the Look assets that brand a context (logos, favicon, SCSS, and related controls). On this MuTMS tab you only choose which MuTMS tenants each flavour applies to. Click the \'Manage flavours\' icon to open the Boost Union flavours overview and create or edit a flavour.';
$string['flavourtenantsmapinvalid'] = 'The flavour to tenant mapping could not be saved because the submitted data was invalid.';
$string['flavourtenantsintro'] = 'For each Boost Union flavour, choose whether it applies when a MuTMS tenant is active. Matching uses the same flavour sort order as categories and cohorts (first match wins). Within a flavour, categories are checked first, then cohorts, then tenants. Put tenant-wide flavours higher in the Flavours list when they should beat category flavours on category pages.';
$string['flavourapplytotenants'] = 'Apply to tenants';
$string['flavourapplytotenants_help'] = 'When Yes, this flavour can match while one of the selected MuTMS tenants is the active tenant (session switch, forced tenant, or tenant member). Requires Everon MuTMS compatibility On.';
$string['flavourtenants'] = 'Tenants';
$string['flavourtenants_help'] = 'MuTMS tenants this flavour applies to when Apply to tenants is Yes.';
$string['flavourtenantsneedcompat'] = 'Everon MuTMS compatibility is Off. Tenant flavour matching stays inactive until you enable it above on this MuTMS tab.';
$string['flavourtenantsneedmutenancy'] = 'MuTMS multi-tenancy (tool_mutenancy) is not active on this site.';
$string['flavourtenantsnone'] = 'No Boost Union flavours exist yet. Create a flavour under Boost Union → Flavours, then return here to map it to tenants.';
$string['flavourtenantstenantsnone'] = 'No active MuTMS tenants were found.';

// Status check: Boost Union flavourslib local hook.
$string['checkflavourhookok'] = 'Boost Union flavourslib includes the Everon MuTMS tenant hook.';
$string['checkflavourhookok_details'] = 'Tenant-mapped flavours can apply (navbar colour, Look assets). Upstream child-theme callbacks will replace this local hook when available.';
$string['checkflavourhookreapplied'] = 'Boost Union flavourslib was missing the Everon MuTMS tenant hook; it was re-applied ({$a}).';
$string['checkflavourhookmissing'] = 'Boost Union flavourslib is missing the Everon MuTMS tenant hook.';
$string['checkflavourhookmissing_details'] = 'A Boost Union upgrade likely overwrote flavourslib.php. Re-run Everon upgrade, open this status check again as a user that can write the file, or apply theme/boost_union_everon/patches/boost_union-flavour-tenant-hook.patch from the Moodle public root, then purge caches.';
$string['checkflavourhookmissingbu'] = 'Boost Union flavourslib.php was not found.';
$string['checkflavourhookmissingbu_details'] = 'Install theme_boost_union before Everon MuTMS tenant flavours can apply.';

// Privacy API.
$string['privacy:metadata'] = 'The Everon theme does not store any personal data about any user. Accessibility and Focus Mode preferences are stored in the browser only. Launch Pad links, My Courses layout, My Courses stats, Dashboard layout, compact navbar, MuTMS compatibility, and flavour-to-tenant mappings are site-wide admin settings.';
