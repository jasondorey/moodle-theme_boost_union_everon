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
 * Position the core message drawer as a navbar popout matching Everon panel chrome.
 * Prefer CSS (style/messages.css); this module only mounts/sizes and kills page push.
 *
 * @module     theme_boost_union_everon/navbar_messages
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'core/pubsub',
    'core_message/message_drawer_events',
    'theme_boost_union_everon/navbar_a11y_popovers',
], function(PubSub, MessageDrawerEvents, NavbarPopovers) {

    const POPOVER_CLASS = 'custom-navbar__message-drawer-popover';
    const POPOVER_CLASS_ALT = 'everon-message-drawer-popover';
    const MOUNTED_CLASS = 'custom-navbar__message-drawer-mounted';
    const MOUNTED_CLASS_ALT = 'everon-message-drawer-mounted';
    const READY_CLASS = 'custom-navbar__message-drawer-ready';
    const READY_CLASS_ALT = 'everon-message-drawer-ready';
    const OPEN_CLASS = 'custom-navbar__popover-open';
    const BODY_OPEN_CLASS = 'everon-message-popover-open';
    const BODY_OPEN_CLASS_LEGACY = 'custom-navbar__message-popover-open';
    const PANEL_WIDTH = 380;
    const PANEL_MAX_HEIGHT = 640;

    const CLOSE_IN_OVERVIEW_CLASS = 'everon-message-close-in-overview';

    const SELECTORS = {
        toggleContainer: '#nav-message-popover-container',
        toggleFallback: '[data-region="popover-region-messages"]',
        drawer: '[data-region="right-hand-drawer"]',
        messageApp: '[data-region="message-drawer"]',
        toggle: '[data-region="popover-region-toggle"], .popover-region-toggle',
        closeWidget: '.message-app > .closewidget',
        closeLink: '.closewidget a[data-action="closedrawer"], a[data-action="closedrawer"]',
        overviewHeader: '[data-region="view-overview"]',
        closeSlot: '[data-region="everon-message-close-slot"]',
    };

    /**
     * @returns {HTMLElement|null}
     */
    const getToggleContainer = () => {
        return document.querySelector(SELECTORS.toggleContainer) ||
            document.querySelector(SELECTORS.toggleFallback);
    };

    /**
     * @returns {HTMLElement|null}
     */
    const findMessageDrawer = () => {
        const drawers = document.querySelectorAll(SELECTORS.drawer);
        for (const drawer of drawers) {
            if (drawer.querySelector(SELECTORS.messageApp)) {
                return drawer;
            }
        }
        return null;
    };

    /**
     * @returns {HTMLElement|null}
     */
    const getToggle = () => {
        const container = getToggleContainer();
        if (!container) {
            return null;
        }
        return container.querySelector(SELECTORS.toggle);
    };

    /**
     * @returns {boolean}
     */
    const isDrawerVisible = () => {
        const drawer = findMessageDrawer();
        return !!(drawer && !drawer.classList.contains('hidden'));
    };

    /**
     * @returns {number}
     */
    const getPopoverGapPx = () => {
        const rootFont = parseFloat(getComputedStyle(document.documentElement).fontSize) || 16;
        return 0.35 * rootFont;
    };

    /**
     * Top edge aligned with other navbar panels.
     *
     * @returns {number|null}
     */
    const getAlignedPopoverTop = () => {
        const openContainer = document.querySelector(
            '#usernavigation .popover-region:not(.collapsed) > .popover-region-container'
        );
        if (openContainer) {
            const rect = openContainer.getBoundingClientRect();
            if (rect.height >= 8) {
                return Math.round(rect.top);
            }
        }

        const gapPx = getPopoverGapPx();
        const regionSelectors = [
            '#nav-notification-popover-container',
            '#nav-message-popover-container',
            '#nav-popover-favourites-container',
            '#nav-accessibility-popover-container',
            '#nav-launchpad-popover-container',
        ];
        let maxBottom = 0;
        let found = false;
        regionSelectors.forEach((selector) => {
            const region = document.querySelector(selector);
            if (!region) {
                return;
            }
            const bottom = region.getBoundingClientRect().bottom;
            if (!found || bottom > maxBottom) {
                maxBottom = bottom;
                found = true;
            }
        });
        if (found) {
            return Math.round(maxBottom + gapPx);
        }

        const toggle = getToggle();
        if (toggle) {
            return Math.round(toggle.getBoundingClientRect().bottom + gapPx);
        }
        return null;
    };

    /**
     * Publish measured top for CSS fallback before mount.
     */
    const publishPopoverTop = () => {
        const topPx = getAlignedPopoverTop();
        if (topPx !== null) {
            document.documentElement.style.setProperty('--everon-message-popover-top', topPx + 'px');
            document.documentElement.style.setProperty('--cn-cluster-popover-top', topPx + 'px');
        }
    };

    /**
     * @param {HTMLElement|null} messageApp
     * @returns {HTMLElement|null}
     */
    const getCloseLink = (messageApp) => {
        if (!messageApp) {
            return null;
        }
        return messageApp.querySelector('a[data-action="closedrawer"]');
    };

    /**
     * @param {HTMLElement|null} messageApp
     * @returns {boolean}
     */
    const isOverviewVisible = (messageApp) => {
        if (!messageApp) {
            return false;
        }
        const overview = messageApp.querySelector(SELECTORS.overviewHeader);
        return !!(overview && !overview.classList.contains('hidden'));
    };

    /**
     * Host core close × in the overview action cluster (notifications-style),
     * restore to `.closewidget` on other message views.
     */
    const syncCloseControl = () => {
        const drawer = findMessageDrawer();
        const messageApp = drawer ? drawer.querySelector(SELECTORS.messageApp) : null;
        if (!messageApp) {
            return;
        }

        const closeWidget = messageApp.querySelector(SELECTORS.closeWidget) ||
            messageApp.querySelector('.closewidget');
        const closeLink = getCloseLink(messageApp);
        const slot = messageApp.querySelector(SELECTORS.closeSlot);

        if (!closeLink || !closeWidget) {
            return;
        }

        if (isOverviewVisible(messageApp) && slot) {
            if (closeLink.parentElement !== slot) {
                slot.appendChild(closeLink);
            }
            messageApp.classList.add(CLOSE_IN_OVERVIEW_CLASS);
            return;
        }

        if (closeLink.parentElement !== closeWidget) {
            closeWidget.appendChild(closeLink);
        }
        messageApp.classList.remove(CLOSE_IN_OVERVIEW_CLASS);
    };

    /**
     * Mount drawer under the message toggle so absolute top matches other panels.
     *
     * @returns {boolean}
     */
    const mountMessageDrawer = () => {
        const container = getToggleContainer();
        const drawer = findMessageDrawer();
        if (!container || !drawer) {
            return false;
        }
        if (drawer.parentElement !== container) {
            container.appendChild(drawer);
        }
        drawer.classList.add(MOUNTED_CLASS, MOUNTED_CLASS_ALT);
        return true;
    };

    /**
     * @param {HTMLElement} drawer
     * @returns {boolean}
     */
    const isMounted = (drawer) => {
        const container = getToggleContainer();
        return !!(
            drawer &&
            container &&
            drawer.parentElement === container &&
            (drawer.classList.contains(MOUNTED_CLASS) || drawer.classList.contains(MOUNTED_CLASS_ALT))
        );
    };

    const suppressPageOverlay = () => {
        document.body.classList.add(BODY_OPEN_CLASS, BODY_OPEN_CLASS_LEGACY);
        const page = document.getElementById('page');
        if (page) {
            page.style.overflow = '';
        }
        document.querySelectorAll('.modal-backdrop').forEach((backdrop) => {
            backdrop.style.display = 'none';
            backdrop.setAttribute('aria-hidden', 'true');
        });
    };

    const restorePageOverlay = () => {
        document.body.classList.remove(BODY_OPEN_CLASS, BODY_OPEN_CLASS_LEGACY);
        const page = document.getElementById('page');
        if (page) {
            page.style.overflow = '';
        }
    };

    const positionDrawer = () => {
        const drawer = findMessageDrawer();
        const toggle = getToggle();
        if (!drawer || !toggle) {
            return;
        }

        mountMessageDrawer();
        publishPopoverTop();

        drawer.classList.add(POPOVER_CLASS, POPOVER_CLASS_ALT);

        const panelWidth = Math.min(PANEL_WIDTH, window.innerWidth - 24);
        const maxHeight = Math.min(window.innerHeight * 0.85, PANEL_MAX_HEIGHT);
        const mounted = isMounted(drawer);

        drawer.style.setProperty('width', panelWidth + 'px', 'important');
        drawer.style.setProperty('max-width', panelWidth + 'px', 'important');
        drawer.style.setProperty('height', maxHeight + 'px', 'important');
        drawer.style.setProperty('min-height', maxHeight + 'px', 'important');
        drawer.style.setProperty('max-height', maxHeight + 'px', 'important');
        drawer.style.setProperty('bottom', 'auto', 'important');

        if (mounted) {
            drawer.style.removeProperty('top');
            drawer.style.removeProperty('left');
            drawer.style.setProperty('right', '0', 'important');
        } else {
            const toggleRect = toggle.getBoundingClientRect();
            let left = toggleRect.right - panelWidth;
            if (left < 12) {
                left = 12;
            }
            const topPx = getAlignedPopoverTop() ?? Math.round(toggleRect.bottom + getPopoverGapPx());
            drawer.style.setProperty('top', topPx + 'px', 'important');
            drawer.style.setProperty('left', left + 'px', 'important');
            drawer.style.setProperty('right', 'auto', 'important');
            document.documentElement.style.setProperty('--everon-message-popover-top', topPx + 'px');
        }

        const messageApp = drawer.querySelector(SELECTORS.messageApp);
        if (messageApp) {
            messageApp.style.height = maxHeight + 'px';
            messageApp.style.minHeight = maxHeight + 'px';
            messageApp.style.maxHeight = maxHeight + 'px';
        }

        syncCloseControl();

        if (isDrawerVisible()) {
            drawer.classList.add(READY_CLASS, READY_CLASS_ALT);
        }
    };

    /**
     * Prepare while still hidden so the sidebar flash never shows.
     */
    const prepareBeforeOpen = () => {
        const container = getToggleContainer();
        if (container) {
            try {
                NavbarPopovers.closeAllExcept(container);
            } catch (e) {
                // Still open messages if another panel fails to close.
            }
        }
        const drawer = findMessageDrawer();
        if (!drawer || !drawer.classList.contains('hidden')) {
            return;
        }
        drawer.classList.remove(READY_CLASS, READY_CLASS_ALT);
        drawer.classList.add(POPOVER_CLASS, POPOVER_CLASS_ALT);
        mountMessageDrawer();
        publishPopoverTop();
        positionDrawer();
    };

    const resetDrawer = () => {
        restorePageOverlay();
        const drawer = findMessageDrawer();
        const container = getToggleContainer();
        if (container) {
            container.classList.remove(OPEN_CLASS);
            container.classList.add('collapsed');
        }
        if (!drawer) {
            return;
        }

        drawer.classList.remove(
            POPOVER_CLASS,
            POPOVER_CLASS_ALT,
            READY_CLASS,
            READY_CLASS_ALT
        );
        ['width', 'max-width', 'height', 'min-height', 'max-height', 'top', 'left', 'right', 'bottom']
            .forEach((prop) => drawer.style.removeProperty(prop));

        const messageApp = drawer.querySelector(SELECTORS.messageApp);
        if (messageApp) {
            messageApp.style.height = '';
            messageApp.style.minHeight = '';
            messageApp.style.maxHeight = '';
            // Prefer overview slot again next open; restore link to closewidget now.
            const closeWidget = messageApp.querySelector('.closewidget');
            const closeLink = getCloseLink(messageApp);
            if (closeWidget && closeLink && closeLink.parentElement !== closeWidget) {
                closeWidget.appendChild(closeLink);
            }
            messageApp.classList.remove(CLOSE_IN_OVERVIEW_CLASS);
        }

        const toggle = getToggle();
        if (toggle) {
            toggle.setAttribute('aria-expanded', 'false');
        }
    };

    const markOpen = () => {
        const container = getToggleContainer();
        if (container) {
            try {
                NavbarPopovers.closeAllExcept(container);
            } catch (e) {
                // Keep the popout open even if another panel fails to close.
            }
            container.classList.remove('collapsed');
            container.classList.add(OPEN_CLASS);
        }
        const toggle = getToggle();
        if (toggle) {
            toggle.setAttribute('aria-expanded', 'true');
        }
        suppressPageOverlay();
        positionDrawer();
        window.requestAnimationFrame(() => {
            positionDrawer();
            suppressPageOverlay();
        });
    };

    let initialised = false;
    let stateSyncPending = false;

    const syncState = () => {
        if (stateSyncPending) {
            return;
        }
        stateSyncPending = true;
        window.requestAnimationFrame(() => {
            stateSyncPending = false;
            if (isDrawerVisible()) {
                markOpen();
                return;
            }
            // Core shows the drawer after the backdrop promise — wait briefly.
            window.setTimeout(() => {
                if (isDrawerVisible()) {
                    markOpen();
                } else {
                    resetDrawer();
                }
            }, 80);
        });
    };

    /**
     * @param {MutationRecord[]} mutations
     * @returns {boolean}
     */
    const isOpeningFromHidden = (mutations) => {
        return mutations.some((mutation) => {
            if (mutation.type !== 'attributes' || mutation.attributeName !== 'class') {
                return false;
            }
            const hadHidden = (mutation.oldValue || '').split(/\s+/).includes('hidden');
            const hasHidden = mutation.target.classList.contains('hidden');
            return hadHidden && !hasHidden;
        });
    };

    const observeDrawer = () => {
        const drawer = findMessageDrawer();
        if (!drawer) {
            return;
        }
        const observer = new MutationObserver((mutations) => {
            const hiddenToggled = mutations.some((mutation) => {
                if (mutation.type !== 'attributes' || mutation.attributeName !== 'class') {
                    return false;
                }
                const hadHidden = (mutation.oldValue || '').split(/\s+/).includes('hidden');
                const hasHidden = mutation.target.classList.contains('hidden');
                return hadHidden !== hasHidden;
            });
            if (hiddenToggled) {
                if (isOpeningFromHidden(mutations)) {
                    prepareBeforeOpen();
                }
                syncState();
            }
        });
        observer.observe(drawer, {
            attributes: true,
            attributeFilter: ['class'],
            attributeOldValue: true,
        });

        const messageApp = drawer.querySelector(SELECTORS.messageApp);
        if (messageApp) {
            const headerObserver = new MutationObserver(() => {
                syncCloseControl();
            });
            headerObserver.observe(messageApp, {
                attributes: true,
                attributeFilter: ['class'],
                subtree: true,
                attributeOldValue: true,
            });
            syncCloseControl();
        }

        const backdropObserver = new MutationObserver(() => {
            if (isDrawerVisible()) {
                suppressPageOverlay();
            }
        });
        backdropObserver.observe(document.body, {childList: true, subtree: false});
    };

    /**
     * Ensure toggle container has the id expected by navbar_a11y_popovers mutex.
     */
    const ensureToggleContainerId = () => {
        const byId = document.getElementById('nav-message-popover-container');
        if (byId) {
            return;
        }
        const region = document.querySelector(SELECTORS.toggleFallback);
        if (region && !region.id) {
            region.id = 'nav-message-popover-container';
        }
    };

    /**
     * Hook the toggle click so we can prepare before core shows the drawer.
     */
    const bindTogglePrepare = () => {
        const toggle = getToggle();
        if (!toggle || toggle.dataset.everonMessagesBound) {
            return;
        }
        toggle.dataset.everonMessagesBound = '1';
        toggle.addEventListener('click', () => {
            const drawer = findMessageDrawer();
            if (drawer && drawer.classList.contains('hidden')) {
                prepareBeforeOpen();
            }
        }, true);
    };

    const init = () => {
        if (initialised) {
            return;
        }
        ensureToggleContainerId();
        if (!getToggleContainer()) {
            return;
        }
        initialised = true;

        NavbarPopovers.init();
        bindTogglePrepare();

        const bootstrap = () => {
            ensureToggleContainerId();
            const drawer = findMessageDrawer();
            if (drawer) {
                drawer.classList.add(POPOVER_CLASS, POPOVER_CLASS_ALT);
            }
            mountMessageDrawer();
            publishPopoverTop();
            observeDrawer();
            if (isDrawerVisible()) {
                markOpen();
            }
        };

        PubSub.subscribe(MessageDrawerEvents.HIDE, resetDrawer);
        PubSub.subscribe(MessageDrawerEvents.TOGGLE_VISIBILITY, () => {
            const drawer = findMessageDrawer();
            if (drawer && drawer.classList.contains('hidden')) {
                prepareBeforeOpen();
            }
            syncState();
        });
        PubSub.subscribe(MessageDrawerEvents.SHOW_CONVERSATION, markOpen);

        window.addEventListener('resize', () => {
            publishPopoverTop();
            if (isDrawerVisible()) {
                positionDrawer();
            }
        });

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bootstrap);
        } else {
            bootstrap();
        }
    };

    return {
        init: init,
        prepareBeforeOpen: prepareBeforeOpen,
    };
});
