/**
 * Injected Focus Mode layout CSS (fallback when aggregated theme CSS is stale).
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
(function(global) {
    'use strict';

    var STYLE_ID = 'theme-boost-union-everon-focus-live-css';
    var HTML_CLASS = 'theme-boost-union-everon-focus-mode';
    var OUTSIDE = ':is(.main-inner-outside-right,.main-inner-outside-left,.main-inner-outside-left-right)';

    var CSS = [
        'html.' + HTML_CLASS + ' .secondary-navigation,',
        'body.' + HTML_CLASS + ' .secondary-navigation,',
        'html.' + HTML_CLASS + ' .tertiary-navigation,',
        'body.' + HTML_CLASS + ' .tertiary-navigation,',
        'html.' + HTML_CLASS + ' .drawer-toggles,',
        'body.' + HTML_CLASS + ' .drawer-toggles,',
        'html.' + HTML_CLASS + ' .drawer-toggler,',
        'body.' + HTML_CLASS + ' .drawer-toggler{display:none!important}',
        'html.' + HTML_CLASS + ' #page.drawers,',
        'body.' + HTML_CLASS + ' #page.drawers{margin-left:0!important;margin-right:0!important}',
        'body.' + HTML_CLASS + '.limitedwidth #page.drawers .main-inner,',
        'body.' + HTML_CLASS + '.limitedwidth.uses-drawers #page.drawers .main-inner,',
        'html.' + HTML_CLASS + ' body.limitedwidth #page.drawers .main-inner,',
        'html.' + HTML_CLASS + ' body.limitedwidth.uses-drawers #page.drawers .main-inner,',
        'body.' + HTML_CLASS + ' #page.drawers .main-inner,',
        'html.' + HTML_CLASS + ' #page.drawers .main-inner{',
        'max-width:min(92rem,calc(100vw - 2.5rem))!important;width:100%!important;',
        'margin-left:auto!important;margin-right:auto!important}',
        'body.' + HTML_CLASS + '.limitedwidth .header-maxwidth,',
        'html.' + HTML_CLASS + ' body.limitedwidth .header-maxwidth,',
        'body.' + HTML_CLASS + ' .header-maxwidth,',
        'html.' + HTML_CLASS + ' .header-maxwidth{',
        'max-width:min(92rem,calc(100vw - 2.5rem))!important;',
        'padding-left:0!important;padding-right:0!important}',
        'body.' + HTML_CLASS + '.limitedwidth.uses-drawers .sticky-footer-content,',
        'html.' + HTML_CLASS + ' body.limitedwidth.uses-drawers .sticky-footer-content{',
        'max-width:min(92rem,calc(100vw - 2.5rem))!important}',
        'html.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + ',',
        'body.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + ',',
        'html.' + HTML_CLASS + ' #page.drawers .theme-block-region-header-wrapper' + OUTSIDE + ',',
        'body.' + HTML_CLASS + ' #page.drawers .theme-block-region-header-wrapper' + OUTSIDE + '{',
        'max-width:min(92rem,calc(100vw - 2.5rem))!important;width:100%!important;',
        'margin-left:auto!important;margin-right:auto!important}',
        'html.' + HTML_CLASS + ' body.limitedwidth #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner,',
        'body.' + HTML_CLASS + '.limitedwidth #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner,',
        'html.' + HTML_CLASS + ' body #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner,',
        'body.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner{',
        'max-width:none!important;margin-left:0!important;margin-right:0!important}',
        '@media (min-width:992px){',
        'html.' + HTML_CLASS + ' body.limitedwidth #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner,',
        'body.' + HTML_CLASS + '.limitedwidth #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner,',
        'html.' + HTML_CLASS + ' body #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner,',
        'body.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + '>.main-inner{',
        'flex:1 1 auto!important;min-width:0!important;width:auto!important}',
        'html.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + '>#theme-block-region-outside-right,',
        'html.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + '>#theme-block-region-outside-left,',
        'body.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + '>#theme-block-region-outside-right,',
        'body.' + HTML_CLASS + ' #page.drawers .main-inner-wrapper' + OUTSIDE + '>#theme-block-region-outside-left{',
        'flex:0 0 auto}}',
        'html.' + HTML_CLASS + ' #page.drawers #region-main,',
        'body.' + HTML_CLASS + ' #page.drawers #region-main{max-width:none!important}'
    ].join('');

    function syncFocusLayoutStyles(enabled) {
        var style = document.getElementById(STYLE_ID);
        if (enabled) {
            if (!style) {
                style = document.createElement('style');
                style.id = STYLE_ID;
                style.textContent = CSS;
                document.head.appendChild(style);
            }
            return;
        }
        if (style) {
            style.remove();
        }
    }

    function isFocusModeActive() {
        return document.documentElement.classList.contains(HTML_CLASS)
            || (document.body && document.body.classList.contains(HTML_CLASS));
    }

    global.themeEveronSyncFocusLayoutStyles = syncFocusLayoutStyles;

    if (isFocusModeActive()) {
        syncFocusLayoutStyles(true);
    }
})(typeof window !== 'undefined' ? window : this);
