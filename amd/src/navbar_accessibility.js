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
 * Navbar accessibility menu — applies adjustments site-wide with localStorage persistence.
 *
 * Colour Mode (Dark / Light / System) is bridged to Boost colour modes (preference
 * theme_boost_colourmode + cookie + data-bs-theme / data-colourmode), not the retired
 * theme-boost-union-everon-a11y-dark-mode class. Default selection is System (`auto`).
 *
 * @module     theme_boost_union_everon/navbar_accessibility
 * @copyright  2026
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'theme_boost_union_everon/navbar_a11y_popovers',
    'core/local/aria/focuslock',
    'core_user/repository',
], function($, ClusterPopovers, FocusLock, UserRepository) {

    const bootApi = window.themeEveronA11y || null;
    const STORAGE_KEY = bootApi ? bootApi.STORAGE_KEY : 'theme_boost_union_everon_a11y_v1';
    const CONTAINER_ID = 'nav-accessibility-popover-container';
    const FONT_MIN = 85;
    const FONT_MAX = 150;
    const FONT_STEP = 5;

    // Mirror theme_boost/colourmode: preference + cookie name used by Boost colour modes.
    const COLOURMODE_PREFERENCE = 'theme_boost_colourmode';
    const MODE_LIGHT = 'light';
    const MODE_DARK = 'dark';
    const MODE_AUTO = 'auto';
    const COLOUR_MODES = [MODE_LIGHT, MODE_DARK, MODE_AUTO];
    const DEFAULT_COLOUR_MODE = MODE_AUTO;
    const LEGACY_DARK_CLASS = 'theme-boost-union-everon-a11y-dark-mode';

    const HTML_CLASS = 'theme-boost-union-everon-a11y-active';
    // Colour mode is intentionally absent: the a11y Colour Mode section drives Boost instead.
    const CLASS_MAP = bootApi ? bootApi.CLASS_MAP : {
        highlightTitle: 'theme-boost-union-everon-a11y-highlight-title',
        highlightLinks: 'theme-boost-union-everon-a11y-highlight-links',
        dyslexiaFont: 'theme-boost-union-everon-a11y-dyslexia',
        letterSpacing: 'theme-boost-union-everon-a11y-letter-spacing',
        lineHeight: 'theme-boost-union-everon-a11y-line-height',
        fontWeight: 'theme-boost-union-everon-a11y-font-weight',
        darkContrast: 'theme-boost-union-everon-a11y-dark-contrast',
        lightContrast: 'theme-boost-union-everon-a11y-light-contrast',
        highContrast: 'theme-boost-union-everon-a11y-high-contrast',
        highSaturation: 'theme-boost-union-everon-a11y-high-saturation',
        lowSaturation: 'theme-boost-union-everon-a11y-low-saturation',
        monochrome: 'theme-boost-union-everon-a11y-monochrome',
        readingGuide: 'theme-boost-union-everon-a11y-reading-guide-on',
        stopAnimations: 'theme-boost-union-everon-a11y-stop-animations',
        bigCursor: 'theme-boost-union-everon-a11y-big-cursor',
    };

    const GROUPS = {
        contrast: ['darkContrast', 'lightContrast', 'highContrast'],
        saturation: ['highSaturation', 'lowSaturation', 'monochrome'],
    };

    const DEFAULTS = bootApi ? bootApi.DEFAULTS : {
        fontSize: 100,
        highlightTitle: false,
        highlightLinks: false,
        dyslexiaFont: false,
        letterSpacing: false,
        lineHeight: false,
        fontWeight: false,
        darkContrast: false,
        lightContrast: false,
        highContrast: false,
        highSaturation: false,
        lowSaturation: false,
        monochrome: false,
        darkMode: false,
        readingGuide: false,
        stopAnimations: false,
        bigCursor: false,
    };

    const READING_GUIDE_STRIP_HEIGHT = 96;

    let readingGuideEl = null;
    let readingGuideMoveHandler = null;
    let currentState = null;

    /**
     * @returns {boolean}
     */
    const colourModeBridgeEnabled = () => {
        const container = document.getElementById(CONTAINER_ID);
        return !!(container && container.dataset.colourmodeBridge === '1');
    };

    /**
     * Cookie attribute suffix from Boost (Path/Domain/Secure/SameSite), when available.
     *
     * @returns {string}
     */
    const getColourModeCookieAttributes = () => {
        const container = document.getElementById(CONTAINER_ID);
        if (container && typeof container.dataset.colourmodeCookieattributes === 'string') {
            return container.dataset.colourmodeCookieattributes;
        }
        return '; Path=/; SameSite=Lax';
    };

    /**
     * @param {string|null} mode
     * @returns {boolean}
     */
    const isValidColourMode = (mode) => {
        return COLOUR_MODES.indexOf(mode) !== -1;
    };

    /**
     * Resolve Boost "auto" against the device colour scheme (same as theme_boost/colourmode).
     *
     * @param {string} mode light|dark|auto
     * @returns {string} light|dark
     */
    const resolveColourMode = (mode) => {
        if (mode !== MODE_AUTO) {
            return mode;
        }
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? MODE_DARK : MODE_LIGHT;
    };

    /**
     * Chosen Boost colour mode on the document (not the resolved data-bs-theme).
     * Falls back to System (`auto`) when missing or unknown.
     *
     * @returns {string} light|dark|auto
     */
    const getBoostColourMode = () => {
        const mode = document.documentElement.getAttribute('data-colourmode');
        return isValidColourMode(mode) ? mode : DEFAULT_COLOUR_MODE;
    };

    /**
     * Apply a Boost colour mode the same way theme_boost/colourmode does:
     * data-colourmode + data-bs-theme, preference, and cookie.
     *
     * @param {string} mode light|dark|auto
     */
    const applyBoostColourMode = (mode) => {
        if (!isValidColourMode(mode)) {
            return;
        }
        const root = document.documentElement;
        root.setAttribute('data-colourmode', mode);
        root.setAttribute('data-bs-theme', resolveColourMode(mode));
        root.classList.remove(LEGACY_DARK_CLASS);

        document.cookie = COLOURMODE_PREFERENCE + '=' + mode + getColourModeCookieAttributes();

        if (colourModeBridgeEnabled() && UserRepository && typeof UserRepository.setUserPreference === 'function') {
            UserRepository.setUserPreference(COLOURMODE_PREFERENCE, mode);
        }
    };

    /**
     * Sync Colour Mode radio tiles from Boost's chosen colour mode (not localStorage).
     *
     * @param {HTMLElement} panelRoot
     */
    const syncColourModeUi = (panelRoot) => {
        const current = getBoostColourMode();
        panelRoot.querySelectorAll('[data-a11y-colourmode]').forEach((button) => {
            const mode = button.getAttribute('data-a11y-colourmode');
            const active = mode === current;
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-checked', active ? 'true' : 'false');
        });
    };

    /**
     * @returns {object}
     */
    const loadState = () => {
        let state;
        if (bootApi && typeof bootApi.loadState === 'function') {
            state = bootApi.loadState();
        } else {
            try {
                const raw = window.localStorage.getItem(STORAGE_KEY);
                if (!raw) {
                    state = {...DEFAULTS};
                } else {
                    state = {...DEFAULTS, ...JSON.parse(raw)};
                }
            } catch (e) {
                state = {...DEFAULTS};
            }
        }
        // Colour mode lives in Boost preference/cookie; never revive legacy darkMode from storage.
        return {...state, darkMode: false};
    };

    /**
     * @param {object} state
     */
    const saveState = (state) => {
        try {
            // Persist assistive prefs only; Boost owns colour-mode persistence.
            const toStore = {...state, darkMode: false};
            window.localStorage.setItem(STORAGE_KEY, JSON.stringify(toStore));
        } catch (e) {
            // Ignore quota errors.
        }
    };

    /**
     * @param {object} state
     */
    const ensureReadingGuide = () => {
        if (!readingGuideEl) {
            readingGuideEl = document.createElement('div');
            readingGuideEl.id = 'theme-boost-union-everon-a11y-reading-guide';
            readingGuideEl.className = 'theme-boost-union-everon-a11y-reading-guide';
            readingGuideEl.setAttribute('aria-hidden', 'true');
            readingGuideEl.hidden = true;
            document.body.appendChild(readingGuideEl);
        }
    };

    /**
     * @param {boolean} enabled
     */
    const setReadingGuide = (enabled) => {
        ensureReadingGuide();
        if (enabled && !readingGuideMoveHandler) {
            const positionReadingGuide = (clientY) => {
                if (!readingGuideEl) {
                    return;
                }
                const maxTop = Math.max(0, window.innerHeight - READING_GUIDE_STRIP_HEIGHT);
                const top = Math.max(0, Math.min(maxTop, clientY - (READING_GUIDE_STRIP_HEIGHT / 2)));
                readingGuideEl.style.top = top + 'px';
                readingGuideEl.style.height = READING_GUIDE_STRIP_HEIGHT + 'px';
            };

            readingGuideMoveHandler = (event) => {
                positionReadingGuide(event.clientY);
            };
            document.addEventListener('mousemove', readingGuideMoveHandler, {passive: true});
            readingGuideEl.hidden = false;
            positionReadingGuide(window.innerHeight / 2);
            return;
        }
        if (readingGuideMoveHandler) {
            document.removeEventListener('mousemove', readingGuideMoveHandler);
            readingGuideMoveHandler = null;
        }
        if (readingGuideEl) {
            readingGuideEl.hidden = true;
        }
    };

    /**
     * @param {object} state
     */
    const applyState = (state) => {
        if (bootApi && typeof bootApi.applyState === 'function') {
            bootApi.applyState(state);
        } else {
            const html = document.documentElement;
            html.classList.add(HTML_CLASS);
            html.classList.remove(LEGACY_DARK_CLASS);
            html.style.setProperty('--theme-boost-union-everon-a11y-font-scale', String(state.fontSize / 100));

            Object.keys(CLASS_MAP).forEach((key) => {
                const className = CLASS_MAP[key];
                if (state[key]) {
                    html.classList.add(className);
                } else {
                    html.classList.remove(className);
                }
            });
        }

        // Belt-and-braces: never leave the retired Everon dark class on the document.
        document.documentElement.classList.remove(LEGACY_DARK_CLASS);

        setReadingGuide(!!state.readingGuide);
        currentState = {...state};
    };

    /**
     * @param {HTMLElement} panelRoot
     * @param {object} state
     */
    const syncPanelUi = (panelRoot, state) => {
        const fontValue = panelRoot.querySelector('[data-a11y-font-value]');
        if (fontValue) {
            fontValue.textContent = state.fontSize + '%';
        }

        panelRoot.querySelectorAll('[data-a11y-toggle]').forEach((button) => {
            const key = button.getAttribute('data-a11y-toggle');
            const active = !!(key && state[key]);
            button.classList.toggle('is-active', active);
            button.setAttribute('aria-pressed', active ? 'true' : 'false');
        });

        syncColourModeUi(panelRoot);
    };

    /**
     * @param {object} state
     * @param {string} key
     * @param {boolean} value
     * @returns {object}
     */
    const updateToggle = (state, key, value) => {
        const next = {...state, [key]: value};
        Object.keys(GROUPS).forEach((groupName) => {
            if (!GROUPS[groupName].includes(key) || !value) {
                return;
            }
            GROUPS[groupName].forEach((other) => {
                if (other !== key) {
                    next[other] = false;
                }
            });
        });
        return next;
    };

    /**
     * @param {HTMLElement} panelRoot
     * @param {object} nextState
     */
    const commitState = (panelRoot, nextState) => {
        applyState(nextState);
        saveState(nextState);
        syncPanelUi(panelRoot, nextState);
    };

    /**
     * @param {HTMLElement} container
     */
    const handlePanelClick = (container, event) => {
        const panelRoot = container.querySelector('[data-region="a11y-panel"]');
        if (!panelRoot || !currentState) {
            return;
        }

        const colourModeBtn = event.target.closest('[data-a11y-colourmode]');
        if (colourModeBtn && panelRoot.contains(colourModeBtn)) {
            event.preventDefault();
            event.stopPropagation();
            const mode = colourModeBtn.getAttribute('data-a11y-colourmode');
            if (!isValidColourMode(mode)) {
                return;
            }
            if (colourModeBridgeEnabled()) {
                applyBoostColourMode(mode);
            }
            syncColourModeUi(panelRoot);
            return;
        }

        const toggleBtn = event.target.closest('[data-a11y-toggle]');
        if (toggleBtn && panelRoot.contains(toggleBtn)) {
            event.preventDefault();
            event.stopPropagation();
            const key = toggleBtn.getAttribute('data-a11y-toggle');
            // Ignore legacy darkMode toggles; Colour Mode owns Boost bridging.
            if (!key || key === 'darkMode' || !(key in DEFAULTS)) {
                return;
            }
            commitState(
                panelRoot,
                updateToggle(currentState, key, !currentState[key])
            );
            return;
        }

        const actionBtn = event.target.closest('[data-a11y-action]');
        if (!actionBtn || !panelRoot.contains(actionBtn)) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        const action = actionBtn.getAttribute('data-a11y-action');
        if (action === 'font-increase') {
            commitState(panelRoot, {
                ...currentState,
                fontSize: Math.min(FONT_MAX, currentState.fontSize + FONT_STEP),
            });
            return;
        }
        if (action === 'font-decrease') {
            commitState(panelRoot, {
                ...currentState,
                fontSize: Math.max(FONT_MIN, currentState.fontSize - FONT_STEP),
            });
            return;
        }
        if (action === 'reset') {
            commitState(panelRoot, {...DEFAULTS});
            if (colourModeBridgeEnabled()) {
                applyBoostColourMode(DEFAULT_COLOUR_MODE);
            }
            syncColourModeUi(panelRoot);
        }
    };

    /**
     * @param {HTMLElement} container
     */
    const bindPopover = (container) => {
        const toggle = container.querySelector('[data-region="popover-region-toggle"]');
        const panel = container.querySelector('[data-region="popover-region-container"]');
        if (!toggle || !panel) {
            return;
        }

        // Notifications call FocusLock.trapFocus on the panel in the menuOpened turn, so the
        // toggle is not :focus when the browser paints. untrapFocus does not move focus;
        // the notification popover calls focusMenuToggle only from its Escape handler.
        let focusTrapped = false;

        /**
         * Trap focus inside the open panel and move it off the navbar toggle.
         * FocusLock focuses the first control (close ×); re-park on the dialog root
         * so resting open has no header :focus chrome. Tab still reaches controls.
         */
        const trapPanelFocus = () => {
            if (focusTrapped) {
                return;
            }
            FocusLock.trapFocus(panel);
            focusTrapped = true;
            panel.focus({preventScroll: true});
        };

        /**
         * Release this panel's trap once. Does not move focus.
         */
        const releasePanelFocus = () => {
            if (!focusTrapped) {
                return;
            }
            focusTrapped = false;
            FocusLock.untrapFocus();
        };

        /**
         * @param {{returnFocus?: boolean}} [options] Set returnFocus for Escape only.
         */
        const close = (options) => {
            container.classList.add('collapsed');
            toggle.setAttribute('aria-expanded', 'false');
            panel.setAttribute('aria-hidden', 'true');
            releasePanelFocus();
            if (options && options.returnFocus) {
                toggle.focus();
            }
        };

        const open = () => {
            ClusterPopovers.closeAllExcept(container);
            container.classList.remove('collapsed');
            toggle.setAttribute('aria-expanded', 'true');
            panel.setAttribute('aria-hidden', 'false');
            trapPanelFocus();
        };

        const isOpen = () => !container.classList.contains('collapsed');

        // Other navbar icons close this region by adding `collapsed` directly.
        // Release the trap in that same turn so it cannot pull focus back.
        container.addEventListener('theme_boost_union_everon:popoverregionclosed', () => {
            releasePanelFocus();
        });

        toggle.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();
            if (isOpen()) {
                close();
            } else {
                open();
            }
        });

        toggle.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggle.click();
            }
        });

        // Notifications-style top-right × — same close path as Escape (return focus).
        panel.addEventListener('click', (event) => {
            const closeBtn = event.target.closest('[data-action="everon-popover-close"]');
            if (!closeBtn || !panel.contains(closeBtn)) {
                return;
            }
            event.preventDefault();
            event.stopPropagation();
            close({returnFocus: true});
        });

        document.addEventListener('click', (event) => {
            if (!isOpen()) {
                return;
            }
            if (event.target.closest('#' + CONTAINER_ID)) {
                return;
            }
            close();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && isOpen()) {
                close({returnFocus: true});
            }
        });
    };

    const HOVER_CLASS = 'custom-navbar__a11y-option--hover';

    /**
     * Toggle hover class via pointer events (more reliable than :hover with FA / pointer-events:none children).
     *
     * @param {HTMLElement} panelRoot
     * @returns {void}
     */
    const bindOptionHoverEffects = (panelRoot) => {
        if (panelRoot.dataset.cnA11yHoverDelegBound === '1') {
            return;
        }
        panelRoot.dataset.cnA11yHoverDelegBound = '1';

        const findControl = (target) => {
            if (!(target instanceof Element)) {
                return null;
            }
            const control = target.closest('.custom-navbar__a11y-option, .custom-navbar__a11y-step-btn');
            if (!control || !panelRoot.contains(control)) {
                return null;
            }
            return control;
        };

        panelRoot.addEventListener('pointerover', (event) => {
            const control = findControl(event.target);
            if (!control) {
                return;
            }
            control.classList.add(HOVER_CLASS);
        });

        panelRoot.addEventListener('pointerout', (event) => {
            const control = findControl(event.target);
            if (!control) {
                return;
            }
            const related = event.relatedTarget;
            if (related instanceof Node && control.contains(related)) {
                return;
            }
            control.classList.remove(HOVER_CLASS);
        });

        panelRoot.addEventListener('focusin', (event) => {
            const control = findControl(event.target);
            if (control) {
                control.classList.add(HOVER_CLASS);
            }
        });

        panelRoot.addEventListener('focusout', (event) => {
            const control = findControl(event.target);
            if (!control) {
                return;
            }
            const related = event.relatedTarget;
            if (related instanceof Node && control.contains(related)) {
                return;
            }
            control.classList.remove(HOVER_CLASS);
        });
    };

    let documentClickBound = false;

    /**
     * Capture clicks even if inner controls use stopPropagation.
     *
     * @returns {void}
     */
    const bindDocumentClickHandler = () => {
        if (documentClickBound) {
            return;
        }
        documentClickBound = true;
        document.addEventListener('click', (event) => {
            const container = document.getElementById(CONTAINER_ID);
            if (!container || !container.contains(event.target)) {
                return;
            }
            handlePanelClick(container, event);
        }, true);
    };

    /**
     * @returns {boolean}
     */
    const setup = () => {
        const container = document.getElementById(CONTAINER_ID);
        if (!container) {
            return false;
        }

        const panelRoot = container.querySelector('[data-region="a11y-panel"]');
        if (!panelRoot) {
            return false;
        }

        bindOptionHoverEffects(panelRoot);

        if (container.dataset.a11yBound === '1') {
            return true;
        }

        const state = loadState();
        applyState(state);
        syncPanelUi(panelRoot, state);
        bindPopover(container);
        bindDocumentClickHandler();
        container.dataset.a11yBound = '1';
        return true;
    };

    /**
     * Keep trying until the navbar markup is in the DOM.
     *
     * @returns {void}
     */
    const scheduleSetup = () => {
        if (setup()) {
            return;
        }

        const retry = (attemptsLeft) => {
            if (setup() || attemptsLeft <= 0) {
                return;
            }
            window.setTimeout(() => {
                retry(attemptsLeft - 1);
            }, 100);
        };

        const startRetries = () => {
            retry(50);
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', startRetries, {once: true});
        } else {
            startRetries();
        }

        if (typeof MutationObserver !== 'undefined') {
            const observer = new MutationObserver(() => {
                if (setup()) {
                    observer.disconnect();
                }
            });
            observer.observe(document.documentElement, {childList: true, subtree: true});
            window.setTimeout(() => {
                observer.disconnect();
            }, 10000);
        }
    };

    /**
     * Initialise accessibility toolbar.
     */
    const init = () => {
        ClusterPopovers.init();
        applyState(loadState());
        bindDocumentClickHandler();
        scheduleSetup();
    };

    return {
        init: init,
    };
});
