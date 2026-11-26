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
 * Focus Mode — wide layout toggle for course pages, Dashboard, My courses, and MuTMS custom home.
 * FAB injected into Boost footer floats (no Mustache fork).
 *
 * @module     theme_boost_union_everon/course_focus
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define(['core/str'], function(Str) {

    const SELECTORS = {
        button: '[data-action="everon-focus-toggle"]',
        page: '#page',
        pageContent: '#page-content',
        notice: '.theme-boost-union-everon-focus-notice',
        floats: '[data-region="footer-container-popover"]',
        help: '.btn-footer-popover[data-action="footer-popover"]',
        unionButtons: '#boost-union-footer-buttons',
    };

    const UNION_VISIBLE_CLASS = 'theme-boost-union-everon-union-footer-buttons--visible';

    const HTML_CLASS = 'theme-boost-union-everon-focus-mode';
    const STORAGE_PREFIX = 'theme_boost_union_everon_focus_';
    const STORAGE_ACTIVE = 'theme_boost_union_everon_focus_active';
    const ACTIVE_CLASS = 'is-active';
    const BODY_AVAILABLE_CLASS = 'theme-boost-union-everon-focus-available';
    const PAGE_SCOPES = ['dashboard', 'mycourses', 'muhome'];
    const COURSE_VIEW_PATH = /\/course\/view\.php(\/|$)/;
    const COURSE_SECTION_PATH = /\/course\/section\.php(\/|$)/;
    const MOD_ACTIVITY_PATH = /\/mod\/[^/]+\/(?!index\.php)/;
    const DASHBOARD_PATH = /\/my\/(index\.php)?$/;
    const MYCOURSES_PATH = /\/my\/courses\.php(\/|$)/;
    const MUHOME_PATH = /\/admin\/tool\/muhome\/(index\.php)?$/;

    const isPageScope = (scope) => PAGE_SCOPES.includes(scope);

    const isCourseScope = (scope) => /^\d+$/.test(scope) && parseInt(scope, 10) > 1;

    const normalizeScope = (raw) => {
        if (raw === null || raw === undefined) {
            return '';
        }
        const value = String(raw).trim();
        if (isPageScope(value)) {
            return value;
        }
        if (/^\d+$/.test(value)) {
            const id = parseInt(value, 10);
            return id > 1 ? String(id) : '';
        }
        return '';
    };

    const isValidScope = (scope) => isPageScope(scope) || isCourseScope(scope);

    const storageKey = (scope) => STORAGE_PREFIX + scope;

    const readStoredState = (scope) => {
        if (!isValidScope(scope)) {
            return false;
        }
        try {
            return localStorage.getItem(storageKey(scope)) === '1';
        } catch (e) {
            return false;
        }
    };

    const writeStoredState = (scope, enabled) => {
        if (!isValidScope(scope)) {
            return;
        }
        try {
            localStorage.setItem(storageKey(scope), enabled ? '1' : '0');
            if (isCourseScope(scope)) {
                if (enabled) {
                    localStorage.setItem(STORAGE_ACTIVE, scope);
                } else if (localStorage.getItem(STORAGE_ACTIVE) === scope) {
                    localStorage.removeItem(STORAGE_ACTIVE);
                }
            }
        } catch (e) {
            // Ignore.
        }
    };

    const getActiveFocusCourseId = () => {
        try {
            const active = normalizeScope(localStorage.getItem(STORAGE_ACTIVE));
            if (isCourseScope(active)) {
                return active;
            }
            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                if (!key || key === STORAGE_ACTIVE || !key.startsWith(STORAGE_PREFIX)) {
                    continue;
                }
                const suffix = key.slice(STORAGE_PREFIX.length);
                if (isCourseScope(suffix) && localStorage.getItem(key) === '1') {
                    return suffix;
                }
            }
        } catch (e) {
            // Ignore.
        }
        return '';
    };

    const getScopeFromPageConfig = () => {
        const pageconfig = window.themeEveronFocusPageConfig;
        if (!pageconfig) {
            return '';
        }
        const fromScope = normalizeScope(pageconfig.scope);
        if (fromScope) {
            return fromScope;
        }
        return normalizeScope(pageconfig.courseId);
    };

    const getCourseIdFromBodyClass = () => {
        const body = document.body;
        if (!body?.classList) {
            return '';
        }
        for (const className of body.classList) {
            const match = /^course-(\d+)$/.exec(className);
            if (match) {
                const id = normalizeScope(match[1]);
                if (isCourseScope(id)) {
                    return id;
                }
            }
        }
        return '';
    };

    const isMuhomePage = (body) => {
        if (!body) {
            return false;
        }
        return body.id === 'page-tool-muhome-index'
            || body.id === 'page-admin-tool-muhome-index'
            || body.classList.contains('pagetype-tool-muhome-index')
            || (body.classList.contains('pagelayout-mydashboard')
                && body.classList.contains('path-admin-tool-muhome')
                && !body.classList.contains('path-admin-tool-muhome-management'));
    };

    const getPageScopeFromContext = () => {
        const body = document.body;
        const path = window.location.pathname;
        if (body?.classList?.contains('pagelayout-mycourses')
            || body?.classList?.contains('page-mycourses')
            || MYCOURSES_PATH.test(path)) {
            return 'mycourses';
        }
        if (isMuhomePage(body) || MUHOME_PATH.test(path)) {
            return 'muhome';
        }
        if (body?.classList?.contains('pagelayout-mydashboard')
            || body?.classList?.contains('path-my-index')
            || DASHBOARD_PATH.test(path)) {
            return 'dashboard';
        }
        return '';
    };

    const hasModActivityBodyClass = (body) => {
        for (const className of body.classList) {
            if (className.startsWith('path-mod-')) {
                return true;
            }
            if (className.startsWith('path-') && className.includes('-mod-')) {
                return true;
            }
        }
        return false;
    };

    const isModActivityPath = () => {
        const body = document.body;
        const path = window.location.pathname;
        return (body && hasModActivityBodyClass(body)) || MOD_ACTIVITY_PATH.test(path);
    };

    const resolveScope = (scopeFromInit = '') => {
        const fromInit = normalizeScope(scopeFromInit);
        if (fromInit) {
            return fromInit;
        }
        const fromPage = getScopeFromPageConfig();
        if (fromPage) {
            return fromPage;
        }
        const fromPageContext = getPageScopeFromContext();
        if (fromPageContext) {
            return fromPageContext;
        }
        const bodyId = normalizeScope(document.body?.dataset.themeEveronFocusId);
        if (bodyId) {
            return bodyId;
        }
        const fromBodyClass = getCourseIdFromBodyClass();
        if (fromBodyClass) {
            return fromBodyClass;
        }
        const existing = document.querySelector(SELECTORS.button);
        if (existing) {
            const fromButton = normalizeScope(existing.dataset.focusscope || existing.dataset.courseid);
            if (fromButton) {
                return fromButton;
            }
        }
        if (COURSE_VIEW_PATH.test(window.location.pathname)) {
            const fromUrl = normalizeScope(new URLSearchParams(window.location.search).get('id'));
            if (fromUrl) {
                return fromUrl;
            }
        }
        const activeId = getActiveFocusCourseId();
        return isCourseScope(activeId) ? activeId : '';
    };

    const isFocusEligiblePage = () => {
        if (getScopeFromPageConfig()) {
            return true;
        }
        if (getPageScopeFromContext()) {
            return true;
        }
        const body = document.body;
        if (!body) {
            return false;
        }
        if (body.classList.contains(BODY_AVAILABLE_CLASS)) {
            return true;
        }
        const path = window.location.pathname;
        if (COURSE_VIEW_PATH.test(path) || COURSE_SECTION_PATH.test(path)) {
            return true;
        }
        if (isModActivityPath()) {
            return isCourseScope(resolveScope());
        }
        return false;
    };

    const shouldOfferFocus = (scope) => {
        if (!isFocusEligiblePage()) {
            return false;
        }
        const resolved = normalizeScope(scope) || resolveScope();
        return isValidScope(resolved);
    };

    const closeDrawers = () => {
        document.querySelector(SELECTORS.page)?.classList.remove('show-drawer-left', 'show-drawer-right');
    };

    const isFocusModeActive = () => {
        return document.documentElement.classList.contains(HTML_CLASS)
            || document.body?.classList.contains(HTML_CLASS);
    };

    const syncFocusLayoutStyles = (enabled) => {
        if (typeof window.themeEveronSyncFocusLayoutStyles === 'function') {
            window.themeEveronSyncFocusLayoutStyles(enabled);
        }
    };

    const applyFocusMode = (enabled) => {
        document.documentElement.classList.toggle(HTML_CLASS, enabled);
        document.body?.classList.toggle(HTML_CLASS, enabled);
        syncFocusLayoutStyles(enabled);
        if (enabled) {
            closeDrawers();
        }
    };

    const updateButton = (button, enabled, enableLabel, disableLabel) => {
        button.classList.toggle(ACTIVE_CLASS, enabled);
        button.setAttribute('aria-pressed', enabled ? 'true' : 'false');
        button.setAttribute('aria-label', enabled ? disableLabel : enableLabel);
        button.setAttribute('title', enabled ? disableLabel : enableLabel);
        button.querySelector('.theme-boost-union-everon-focus-btn__icon--off')?.toggleAttribute('hidden', enabled);
        button.querySelector('.theme-boost-union-everon-focus-btn__icon--on')?.toggleAttribute('hidden', !enabled);
    };

    const updateNotice = (enabled, noticeText) => {
        const host = document.querySelector(SELECTORS.pageContent);
        if (!host) {
            return;
        }
        let notice = document.querySelector(SELECTORS.notice);
        if (!enabled) {
            notice?.remove();
            return;
        }
        if (!notice) {
            notice = document.createElement('div');
            notice.className = 'theme-boost-union-everon-focus-notice';
            notice.setAttribute('role', 'status');
            host.prepend(notice);
        }
        notice.textContent = noticeText;
    };

    const createFocusButton = (scope) => {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = [
            'btn',
            'btn-icon',
            'rounded-circle',
            'bg-secondary',
            'btn-footer-everon-focus',
            'theme-boost-union-everon-focus-btn',
        ].join(' ');
        button.dataset.action = 'everon-focus-toggle';
        button.dataset.focusscope = scope;
        if (isCourseScope(scope)) {
            button.dataset.courseid = scope;
        }
        button.setAttribute('aria-pressed', 'false');
        button.innerHTML = [
            '<span class="theme-boost-union-everon-focus-btn__icon theme-boost-union-everon-focus-btn__icon--off" aria-hidden="true">',
            '<i class="fa fa-up-right-and-down-left-from-center" aria-hidden="true"></i>',
            '</span>',
            '<span class="theme-boost-union-everon-focus-btn__icon theme-boost-union-everon-focus-btn__icon--on" aria-hidden="true" hidden>',
            '<i class="fa fa-xmark" aria-hidden="true"></i>',
            '</span>',
        ].join('');
        return button;
    };

    /**
     * Fold Boost Union #boost-union-footer-buttons into the Everon flex stack and
     * show it only while at least one Union float (back-to-top / a11y) is visible.
     *
     * @param {Element} floats
     */
    const syncUnionFooterButtons = (floats) => {
        const union = floats.querySelector(SELECTORS.unionButtons)
            || document.querySelector(SELECTORS.unionButtons);
        if (!union) {
            return;
        }
        if (union.parentElement !== floats) {
            const focusBtn = floats.querySelector(SELECTORS.button);
            if (focusBtn) {
                floats.insertBefore(union, focusBtn);
            } else {
                floats.appendChild(union);
            }
        }

        const updateVisibility = () => {
            const visible = Array.from(union.querySelectorAll('button, a')).some((el) => {
                if (el.hidden) {
                    return false;
                }
                const style = window.getComputedStyle(el);
                return style.display !== 'none' && style.visibility !== 'hidden';
            });
            union.classList.toggle(UNION_VISIBLE_CLASS, visible);
        };

        updateVisibility();

        if (union.dataset.everonUnionSync === '1') {
            return;
        }
        union.dataset.everonUnionSync = '1';

        const observer = new MutationObserver(updateVisibility);
        observer.observe(union, {
            attributes: true,
            childList: true,
            subtree: true,
            attributeFilter: ['style', 'class', 'hidden', 'aria-hidden'],
        });
        window.addEventListener('scroll', updateVisibility, {passive: true});
        // Union injects #back-to-top asynchronously — recheck shortly after.
        window.setTimeout(updateVisibility, 0);
        window.setTimeout(updateVisibility, 350);
    };

    const ensureFocusButton = (scopeFromInit = '') => {
        const scope = resolveScope(scopeFromInit);
        if (!shouldOfferFocus(scope)) {
            return null;
        }
        const floats = document.querySelector(SELECTORS.floats);
        if (!floats) {
            return null;
        }
        let button = document.querySelector(SELECTORS.button);
        if (!button) {
            button = createFocusButton(scope);
            const helpButton = floats.querySelector(SELECTORS.help);
            if (helpButton) {
                floats.insertBefore(button, helpButton);
            } else {
                floats.appendChild(button);
            }
        }
        floats.classList.add('theme-boost-union-everon-footer-floats');
        syncUnionFooterButtons(floats);
        button.classList.add('bg-secondary');
        button.dataset.focusscope = scope;
        if (isCourseScope(scope)) {
            button.dataset.courseid = scope;
        }
        button.hidden = false;
        button.removeAttribute('aria-hidden');
        return button;
    };

    const bindFocusButton = (button, scope) => {
        if (button.dataset.everonFocusBound === '1') {
            return;
        }
        button.dataset.everonFocusBound = '1';

        Promise.all([
            Str.get_string('focusmodeenable', 'theme_boost_union_everon'),
            Str.get_string('focusmodedisable', 'theme_boost_union_everon'),
            Str.get_string('focusmodenotice', 'theme_boost_union_everon'),
        ]).then(([enableLabel, disableLabel, noticeText]) => {
            const applyState = (enabled) => {
                applyFocusMode(enabled);
                updateButton(button, enabled, enableLabel, disableLabel);
                updateNotice(enabled, noticeText);
            };
            const setState = (enabled) => {
                applyState(enabled);
                writeStoredState(scope, enabled);
            };

            const enabled = readStoredState(scope) || isFocusModeActive();
            if (enabled) {
                applyState(true);
            } else {
                updateButton(button, false, enableLabel, disableLabel);
            }

            button.addEventListener('click', (event) => {
                event.preventDefault();
                setState(!isFocusModeActive());
            });
        }).catch(() => {
            const enabled = readStoredState(scope) || isFocusModeActive();
            if (enabled) {
                applyFocusMode(true);
            }
            button.classList.toggle(ACTIVE_CLASS, enabled);
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const next = !isFocusModeActive();
                applyFocusMode(next);
                writeStoredState(scope, next);
                button.classList.toggle(ACTIVE_CLASS, next);
                updateNotice(next, 'Focus mode is on. Click × at the bottom right to turn it off.');
            });
        });
    };

    const restoreFocusOnLoad = (scopeFromInit = '') => {
        const scope = resolveScope(scopeFromInit);
        if (!isValidScope(scope)) {
            return;
        }
        const fromInit = normalizeScope(scopeFromInit);
        const onSupportedPage = isFocusEligiblePage()
            || isValidScope(fromInit)
            || (isCourseScope(scope) && isModActivityPath() && readStoredState(scope));
        if (!onSupportedPage) {
            return;
        }
        if (readStoredState(scope) || isFocusModeActive()) {
            applyFocusMode(true);
        }
    };

    /**
     * @param {string|number} [scopeFromInit='']
     */
    const init = (scopeFromInit = '') => {
        restoreFocusOnLoad(scopeFromInit);

        const attempt = (retriesLeft) => {
            const button = ensureFocusButton(scopeFromInit);
            if (!button) {
                if (retriesLeft > 0) {
                    window.setTimeout(() => attempt(retriesLeft - 1), 50);
                }
                return;
            }
            const scope = normalizeScope(button.dataset.focusscope || button.dataset.courseid);
            if (!isValidScope(scope)) {
                return;
            }
            bindFocusButton(button, scope);
        };

        attempt(30);
    };

    return {init: init};
});
