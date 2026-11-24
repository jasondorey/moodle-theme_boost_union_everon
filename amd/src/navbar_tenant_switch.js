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
 * Anchor the MuTMS Switch tenant muform <dialog> directly beneath its navbar
 * trigger icon so it behaves like Everon's other navbar panels (no mid-screen
 * centering, no dimmed backdrop, click-outside & trigger-toggle dismissal,
 * resting focus without spurious focus ring).
 *
 * Uses targeted event hooks only (no MutationObserver).
 *
 * @module     theme_boost_union_everon/navbar_tenant_switch
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'theme_boost_union_everon/navbar_a11y_popovers',
], function(NavbarPopovers) {

    const TRIGGER_SELECTOR = '#usernavigation a[data-muform-dialog-url*="tenant_switch.php"]';
    const DIALOG_CLASS = 'everon-tenant-switch-dialog';
    const FORM_SELECTOR = 'form[data-muform="tool_mutenancy-local-form-tenant_switch"]';
    const NAVBAR_TOGGLE_SELECTOR = [
        '#usernavigation [data-region="popover-region-toggle"]',
        '#usernavigation #user-menu-toggle',
        '#usernavigation [data-bs-toggle="dropdown"]',
        '#usernavigation a.nav-link',
        '#usernavigation button',
    ].join(', ');
    const GAP_REM = 0.35;
    const EDGE_MARGIN = 12;
    const PANEL_DEFAULT_WIDTH = 360;

    let initialised = false;
    let lastTrigger = null;

    /**
     * @returns {number}
     */
    const getGapPx = () => {
        const rootFont = parseFloat(getComputedStyle(document.documentElement).fontSize) || 16;
        return GAP_REM * rootFont;
    };

    /**
     * @param {number} x
     * @param {number} y
     * @param {DOMRect|null} rect
     * @returns {boolean}
     */
    const isPointInRect = (x, y, rect) => {
        if (!rect) {
            return false;
        }
        return x >= rect.left && x <= rect.right && y >= rect.top && y <= rect.bottom;
    };

    /**
     * Position the dialog directly beneath the navbar trigger icon and clamp
     * within the viewport edges on narrow screens.
     *
     * @param {HTMLDialogElement} dialog
     * @param {HTMLElement} trigger
     */
    const positionDialog = (dialog, trigger) => {
        if (!dialog || !dialog.open || !trigger || !trigger.isConnected) {
            return;
        }
        const triggerRect = trigger.getBoundingClientRect();
        if (triggerRect.width === 0 && triggerRect.height === 0) {
            return;
        }

        const viewportW = document.documentElement.clientWidth || window.innerWidth;
        const measuredWidth = dialog.getBoundingClientRect().width;
        const panelWidth = measuredWidth > 0 ?
            measuredWidth :
            Math.min(PANEL_DEFAULT_WIDTH, viewportW - (EDGE_MARGIN * 2));

        const top = Math.max(EDGE_MARGIN, Math.round(triggerRect.bottom + getGapPx()));
        const isRtl = getComputedStyle(document.documentElement).direction === 'rtl';
        const desiredLeft = isRtl ? triggerRect.left : (triggerRect.right - panelWidth);
        const maxLeft = Math.max(EDGE_MARGIN, viewportW - panelWidth - EDGE_MARGIN);
        const left = Math.round(Math.max(EDGE_MARGIN, Math.min(desiredLeft, maxLeft)));

        dialog.style.setProperty('--everon-tenant-switch-top', top + 'px');
        dialog.style.setProperty('--everon-tenant-switch-left', left + 'px');
    };

    /**
     * Park resting focus on the dialog shell (tabindex=-1) when open leaves
     * focus on the header close button (matching MTE-91 across Everon panels).
     * Preserves focus if Muform placed it inside the form body (e.g. error field).
     *
     * @param {HTMLDialogElement} dialog
     */
    const parkRestingFocus = (dialog) => {
        if (!dialog || !dialog.open) {
            return;
        }
        const body = dialog.querySelector('.modal-body');
        if (body && document.activeElement && body.contains(document.activeElement)) {
            return;
        }
        if (!dialog.hasAttribute('tabindex')) {
            dialog.setAttribute('tabindex', '-1');
        }
        dialog.focus({preventScroll: true});
    };

    /**
     * Find the most recently appended open muform dialog on document.body.
     *
     * @returns {HTMLDialogElement|null}
     */
    const findOpenMuformDialog = () => {
        const dialogs = document.querySelectorAll('body > dialog.muform-dialog[open]');
        if (!dialogs.length) {
            return null;
        }
        return dialogs[dialogs.length - 1];
    };

    /**
     * Attach positioning, outside-click dismissal, trigger-toggle close,
     * resize clamping, and resting focus to a Switch tenant dialog instance.
     *
     * @param {HTMLDialogElement} dialog
     * @param {HTMLElement} trigger
     */
    const attachDialog = (dialog, trigger) => {
        if (!dialog || !trigger) {
            return;
        }
        if (dialog.dataset.everonTenantSwitchBound === '1') {
            positionDialog(dialog, trigger);
            return;
        }
        dialog.dataset.everonTenantSwitchBound = '1';

        if (!dialog.classList.contains(DIALOG_CLASS)) {
            dialog.classList.add(DIALOG_CLASS);
        }
        trigger.setAttribute('aria-expanded', 'true');

        positionDialog(dialog, trigger);
        parkRestingFocus(dialog);

        let pointerDownOutside = false;

        const onPointerDown = (event) => {
            if (event.target !== dialog) {
                pointerDownOutside = false;
                return;
            }
            const contentRect = (dialog.querySelector('.modal-content') || dialog).getBoundingClientRect();
            pointerDownOutside = !isPointInRect(event.clientX, event.clientY, contentRect);
        };

        const onClick = (event) => {
            if (!pointerDownOutside || event.target !== dialog) {
                pointerDownOutside = false;
                return;
            }
            pointerDownOutside = false;

            const contentRect = (dialog.querySelector('.modal-content') || dialog).getBoundingClientRect();
            if (isPointInRect(event.clientX, event.clientY, contentRect)) {
                return;
            }

            const {clientX, clientY} = event;
            const onOwnTrigger = isPointInRect(clientX, clientY, trigger.getBoundingClientRect());

            event.stopPropagation();
            dialog.close();

            if (onOwnTrigger) {
                return;
            }

            // If the outside click targeted another navbar icon, open it in one click
            // (matching Everon's other navbar popovers).
            const under = document.elementFromPoint(clientX, clientY);
            if (under instanceof Element) {
                const otherToggle = under.closest(NAVBAR_TOGGLE_SELECTOR);
                if (otherToggle && otherToggle !== trigger && !trigger.contains(otherToggle)) {
                    window.queueMicrotask(() => {
                        otherToggle.click();
                    });
                }
            }
        };

        const onBodyRendered = () => {
            positionDialog(dialog, trigger);
            window.queueMicrotask(() => {
                if (!dialog.open) {
                    return;
                }
                positionDialog(dialog, trigger);
                parkRestingFocus(dialog);
            });
        };

        const onResize = () => {
            if (dialog.open) {
                positionDialog(dialog, trigger);
            }
        };

        const onClose = () => {
            trigger.setAttribute('aria-expanded', 'false');
            window.removeEventListener('resize', onResize);
        };

        dialog.addEventListener('pointerdown', onPointerDown);
        dialog.addEventListener('click', onClick);
        dialog.addEventListener('core/modal:bodyRendered', onBodyRendered);
        dialog.addEventListener('close', onClose, {once: true});
        window.addEventListener('resize', onResize, {passive: true});
    };

    const init = () => {
        if (initialised) {
            return;
        }
        initialised = true;

        NavbarPopovers.init();

        const initialTrigger = document.querySelector(TRIGGER_SELECTOR);
        if (initialTrigger) {
            initialTrigger.setAttribute('aria-haspopup', 'dialog');
            initialTrigger.setAttribute('aria-expanded', 'false');
        }

        // Capture phase: close sibling navbar panels before tool_mulib opens the
        // dialog, then anchor the dialog in a microtask before first paint.
        document.addEventListener('click', (event) => {
            const target = event.target;
            if (!(target instanceof Element)) {
                return;
            }
            const trigger = target.closest(TRIGGER_SELECTOR);
            if (!trigger) {
                return;
            }

            lastTrigger = trigger;
            try {
                NavbarPopovers.closeAllExcept(null);
            } catch (e) {
                // Keep Switch tenant opening even if another panel fails to close.
            }

            window.queueMicrotask(() => {
                const dlg = findOpenMuformDialog();
                if (dlg) {
                    attachDialog(dlg, trigger);
                    return;
                }
                window.requestAnimationFrame(() => {
                    const retry = findOpenMuformDialog();
                    if (retry) {
                        attachDialog(retry, trigger);
                    }
                });
            });
        }, true);

        // Fallback if the ESM dialog handler loaded asynchronously on first click.
        document.addEventListener('core/modal:bodyRendered', (event) => {
            const target = event.target;
            if (!(target instanceof Element)) {
                return;
            }
            const dialog = target.closest('dialog.muform-dialog[open]');
            if (!dialog || !dialog.querySelector(FORM_SELECTOR)) {
                return;
            }
            const trigger = (lastTrigger && lastTrigger.isConnected) ?
                lastTrigger :
                document.querySelector(TRIGGER_SELECTOR);
            if (trigger) {
                attachDialog(dialog, trigger);
            }
        });
    };

    return {
        init: init,
    };
});
