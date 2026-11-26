/**
 * Restore Focus Mode before first paint (course content pages, Dashboard, My courses, MuTMS custom home).
 * Loaded synchronously from theme_boost_union_everon head — plain JS (no AMD).
 *
 * @package    theme_boost_union_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
(function(global) {
    'use strict';

    var HTML_CLASS = 'theme-boost-union-everon-focus-mode';
    var STORAGE_PREFIX = 'theme_boost_union_everon_focus_';
    var STORAGE_ACTIVE = 'theme_boost_union_everon_focus_active';
    var COURSE_VIEW_PATH = /\/course\/view\.php(\/|$)/;
    var COURSE_SECTION_PATH = /\/course\/section\.php(\/|$)/;
    var MOD_ACTIVITY_PATH = /\/mod\/[^/]+\/(?!index\.php)/;
    var DASHBOARD_PATH = /\/my\/(index\.php)?$/;
    var MYCOURSES_PATH = /\/my\/courses\.php(\/|$)/;
    var MUHOME_PATH = /\/admin\/tool\/muhome\/(index\.php)?$/;

    function isPageScope(scope) {
        return scope === 'dashboard' || scope === 'mycourses' || scope === 'muhome';
    }

    function isCourseScope(scope) {
        return /^\d+$/.test(scope) && parseInt(scope, 10) > 1;
    }

    function normalizeScope(raw) {
        if (raw === null || raw === undefined) {
            return '';
        }
        var value = String(raw).trim();
        if (isPageScope(value)) {
            return value;
        }
        if (/^\d+$/.test(value)) {
            var id = parseInt(value, 10);
            return id > 1 ? String(id) : '';
        }
        return '';
    }

    function getActiveFocusCourseId() {
        try {
            var active = normalizeScope(global.localStorage.getItem(STORAGE_ACTIVE));
            if (isCourseScope(active)) {
                return active;
            }
            for (var i = 0; i < global.localStorage.length; i++) {
                var key = global.localStorage.key(i);
                if (!key || key === STORAGE_ACTIVE || key.indexOf(STORAGE_PREFIX) !== 0) {
                    continue;
                }
                var suffix = key.slice(STORAGE_PREFIX.length);
                if (isCourseScope(suffix) && global.localStorage.getItem(key) === '1') {
                    return suffix;
                }
            }
        } catch (e) {
            // Ignore.
        }
        return '';
    }

    function getCourseIdFromBodyClass() {
        var body = global.document.body;
        if (!body || !body.classList) {
            return '';
        }
        for (var i = 0; i < body.classList.length; i++) {
            var match = /^course-(\d+)$/.exec(body.classList[i]);
            if (match) {
                var id = normalizeScope(match[1]);
                if (isCourseScope(id)) {
                    return id;
                }
            }
        }
        return '';
    }

    function getScopeFromPageConfig() {
        var pageconfig = global.themeEveronFocusPageConfig;
        if (!pageconfig) {
            return '';
        }
        var fromScope = normalizeScope(pageconfig.scope);
        if (fromScope) {
            return fromScope;
        }
        return normalizeScope(pageconfig.courseId);
    }

    function isMuhomePage(body) {
        if (!body) {
            return false;
        }
        return body.id === 'page-tool-muhome-index'
            || body.id === 'page-admin-tool-muhome-index'
            || body.classList.contains('pagetype-tool-muhome-index')
            || (body.classList.contains('pagelayout-mydashboard')
                && body.classList.contains('path-admin-tool-muhome')
                && !body.classList.contains('path-admin-tool-muhome-management'));
    }

    function getPageScopeFromContext() {
        var body = global.document.body;
        var path = global.location.pathname;
        if ((body && (body.classList.contains('pagelayout-mycourses') || body.classList.contains('page-mycourses')))
            || MYCOURSES_PATH.test(path)) {
            return 'mycourses';
        }
        if (isMuhomePage(body) || MUHOME_PATH.test(path)) {
            return 'muhome';
        }
        if ((body && (body.classList.contains('pagelayout-mydashboard') || body.classList.contains('path-my-index')))
            || DASHBOARD_PATH.test(path)) {
            return 'dashboard';
        }
        return '';
    }

    function getScopeFromBody() {
        var fromPage = getScopeFromPageConfig();
        if (fromPage) {
            return fromPage;
        }
        var fromPageContext = getPageScopeFromContext();
        if (fromPageContext) {
            return fromPageContext;
        }
        var body = global.document.body;
        if (!body) {
            return '';
        }
        var fromData = normalizeScope(body.getAttribute('data-theme-boost-union-everon-focus-id'));
        if (fromData) {
            return fromData;
        }
        return getCourseIdFromBodyClass();
    }

    function readStoredState(scope) {
        if (!scope) {
            return false;
        }
        try {
            return global.localStorage.getItem(STORAGE_PREFIX + scope) === '1';
        } catch (e) {
            return false;
        }
    }

    function resolveScopeForRestore() {
        var fromBody = getScopeFromBody();
        if (fromBody) {
            return fromBody;
        }
        var activeId = getActiveFocusCourseId();
        if (isCourseScope(activeId) && readStoredState(activeId)) {
            return activeId;
        }
        return '';
    }

    function hasModActivityBodyClass(body) {
        for (var i = 0; i < body.classList.length; i++) {
            var className = body.classList[i];
            if (className.indexOf('path-mod-') === 0) {
                return true;
            }
            if (className.indexOf('path-') === 0 && className.indexOf('-mod-') !== -1) {
                return true;
            }
        }
        return false;
    }

    function shouldRestoreFocus() {
        var scope = resolveScopeForRestore();
        if (!scope || !readStoredState(scope)) {
            return false;
        }
        if (isPageScope(scope)) {
            return true;
        }
        var path = global.location.pathname;
        if (COURSE_VIEW_PATH.test(path) || COURSE_SECTION_PATH.test(path)) {
            return true;
        }
        var body = global.document.body;
        if (body && (hasModActivityBodyClass(body) || MOD_ACTIVITY_PATH.test(path))) {
            return true;
        }
        if (getScopeFromPageConfig()) {
            return true;
        }
        return false;
    }

    function applyFocusClass() {
        if (!shouldRestoreFocus()) {
            return;
        }
        global.document.documentElement.classList.add(HTML_CLASS);
        if (global.document.body) {
            global.document.body.classList.add(HTML_CLASS);
        }
        if (typeof global.themeEveronSyncFocusLayoutStyles === 'function') {
            global.themeEveronSyncFocusLayoutStyles(true);
        }
    }

    applyFocusClass();
    if (global.document.readyState === 'loading') {
        global.document.addEventListener('DOMContentLoaded', applyFocusClass);
    }
    global.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            applyFocusClass();
        }
    });
})(typeof window !== 'undefined' ? window : this);
