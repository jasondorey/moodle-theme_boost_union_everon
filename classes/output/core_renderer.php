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
 * Everon core renderer — inject accessibility toolbar and Launch Pad into navbar utilities.
 *
 * @package    theme_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_everon\output;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../locallib.php');

/**
 * Extends Boost Union's renderer so Everon can append navbar utilities
 * (accessibility, launch pad) without replacing the whole navbar template.
 */
class core_renderer extends \theme_boost_union\output\core_renderer {

    /**
     * Hide Boost's colour-mode navbar menu. Everon's a11y Dark Mode tile is the switcher;
     * colour modes themselves stay enabled via theme_boost | enablecolourmodes.
     *
     * @return string
     */
    public function colour_mode_menu(): string {
        return '';
    }

    /**
     * Append Everon navbar utilities after parent plugin output.
     * Order: … messages → accessibility → launch pad → (user menu follows in template).
     *
     * @return string
     */
    public function navbar_plugin_output() {
        $output = parent::navbar_plugin_output();
        if (\theme_everon_accessibility_enabled()) {
            $output .= $this->render_from_template(
                'theme_everon/accessibility_popover',
                \theme_everon_accessibility_popover_context()
            );
        }
        $launchctx = \theme_everon_launchpad_template_context();
        if ($launchctx !== null) {
            $output .= $this->render_from_template('theme_everon/launch_pad_popover', $launchctx);
        }
        return $output;
    }

    /**
     * Inject early a11y / Focus Mode boot CSS/JS in head (avoids flash).
     *
     * @return string
     */
    public function standard_head_html() {
        $output = '';
        if (\theme_everon_accessibility_enabled()) {
            $output .= \theme_everon_get_a11y_boot_html();
        }
        if (\theme_everon_focusmode_enabled()) {
            $output .= \theme_everon_get_focusmode_boot_html();
        }
        // Safari purpose-colour filters reference page-local SVG defs (data-URI filters fail there).
        if (\theme_everon_activity_icon_filters_enabled()) {
            $output .= \theme_everon_get_activity_icon_filters_svg();
        }
        $output .= parent::standard_head_html();
        return $output;
    }

    /**
     * Append My Courses stats strip after the page heading when enabled.
     * Order: page title → stats → Course overview (main content).
     *
     * @return string
     */
    public function full_header() {
        $header = parent::full_header();
        if (!\theme_everon_mycourses_stats_should_offer($this->page)) {
            return $header;
        }
        $ctx = \theme_everon_mycourses_stats_template_context();
        if ($ctx === null) {
            return $header;
        }
        return $header . $this->render_from_template('theme_everon/mycourses_stats', $ctx);
    }

    /**
     * Enrich core usermenu action items for Everon tile mode (icons + everontiles flag).
     *
     * @param string $templatename Template name
     * @param mixed $context Context
     * @return string
     */
    public function render_from_template($templatename, $context) {
        // Usermenu is usually a layout partial (not rendered via this method directly).
        // Enrich the usermenu node on any template context that carries it, and also
        // when core/user_menu or core/user_action_menu_items are rendered standalone.
        if (is_array($context) && isset($context['usermenu']) && is_array($context['usermenu'])) {
            $context['usermenu'] = \theme_everon_usermenu_prepare_action_menu_context($context['usermenu']);
        }
        if ($templatename === 'core/user_menu' || $templatename === 'core/user_action_menu_items') {
            $context = \theme_everon_usermenu_prepare_action_menu_context($context);
        }
        return parent::render_from_template($templatename, $context);
    }

    /**
     * Compact logo: flavour (incl. tenant-applied) wins; else MuTMS tenant_appearance; else parent.
     *
     * @param int|null $maxwidth
     * @param int|null $maxheight
     * @return \moodle_url|false
     */
    public function get_compact_logo_url($maxwidth = 300, $maxheight = 300) {
        $parent = parent::get_compact_logo_url($maxwidth, $maxheight);
        $fallback = $this->mutms_appearance_logo_url('logocompact', $maxwidth, $maxheight);
        if ($fallback !== null) {
            return $fallback;
        }
        return $parent;
    }

    /**
     * Logo: flavour wins; else MuTMS tenant_appearance; else parent.
     *
     * @param int|null $maxwidth
     * @param int|null $maxheight
     * @return \moodle_url|false
     */
    public function get_logo_url($maxwidth = null, $maxheight = 200) {
        $parent = parent::get_logo_url($maxwidth, $maxheight);
        $fallback = $this->mutms_appearance_logo_url('logo', $maxwidth, $maxheight);
        if ($fallback !== null) {
            return $fallback;
        }
        return $parent;
    }

    /**
     * Favicon: flavour wins; else MuTMS tenant_appearance; else parent.
     *
     * @return \moodle_url
     */
    public function favicon() {
        if ($this->flavour_has_look_file('look_favicon')) {
            return parent::favicon();
        }
        if (\theme_everon\local\mutms::is_enabled() && \theme_everon\local\mutms::mutenancy_active()
                && class_exists(\tool_mutenancy\local\tenancy::class)
                && class_exists(\tool_mutenancy\local\config::class)
                && class_exists(\tool_mutenancy\local\appearance::class)) {
            $tenantid = \tool_mutenancy\local\tenancy::get_current_tenantid();
            if ($tenantid && \tool_mutenancy\local\config::is_overridden((int) $tenantid, 'core_admin', 'favicon')) {
                $url = \tool_mutenancy\local\appearance::get_favicon_url((int) $tenantid);
                if ($url) {
                    return $url;
                }
            }
        }
        return parent::favicon();
    }

    /**
     * MuTMS appearance URL when compat is on, tenant overrides the slot, and no flavour file won.
     *
     * @param string $slot logo|logocompact
     * @param int|null $maxwidth
     * @param int|null $maxheight
     * @return \moodle_url|null null = keep parent result
     */
    private function mutms_appearance_logo_url(string $slot, $maxwidth, $maxheight) {
        $flavourfield = $slot === 'logo' ? 'look_logo' : 'look_logocompact';
        if ($this->flavour_has_look_file($flavourfield)) {
            return null;
        }
        if (!\theme_everon\local\mutms::is_enabled() || !\theme_everon\local\mutms::mutenancy_active()) {
            return null;
        }
        if (!class_exists(\tool_mutenancy\local\tenancy::class)
                || !class_exists(\tool_mutenancy\local\config::class)
                || !class_exists(\tool_mutenancy\local\appearance::class)) {
            return null;
        }
        $tenantid = \tool_mutenancy\local\tenancy::get_current_tenantid();
        if (!$tenantid || !\tool_mutenancy\local\config::is_overridden((int) $tenantid, 'core_admin', $slot)) {
            return null;
        }
        if ($slot === 'logo') {
            $url = \tool_mutenancy\local\appearance::get_logo_url($maxwidth, $maxheight, (int) $tenantid);
        } else {
            $url = \tool_mutenancy\local\appearance::get_compact_logo_url($maxwidth, $maxheight, (int) $tenantid);
        }
        return $url ?: null;
    }

    /**
     * Whether the applied Boost Union flavour has a non-empty Look file field.
     *
     * @param string $field look_logo|look_logocompact|look_favicon
     * @return bool
     */
    private function flavour_has_look_file(string $field): bool {
        global $CFG;
        require_once($CFG->dirroot . '/theme/boost_union/flavours/flavourslib.php');
        $flavour = theme_boost_union_get_flavour_which_applies();
        return $flavour !== null && !empty($flavour->{$field});
    }

}
