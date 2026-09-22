/**
 * Entry point for the site: mobile menu.
 */

/** Tailwind's md breakpoint, where the header switches to the desktop nav. */
const DESKTOP_NAV_QUERY = '(min-width: 768px)';

function initMobileMenu() {
    const toggle = document.getElementById('mobile-menu-toggle');
    const menu = document.getElementById('mobile-menu');

    if (!toggle || !menu) {
        return;
    }

    const icon = toggle.querySelector('span');

    const setState = (isOpen) => {
        menu.classList.toggle('is-open', isOpen);
        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Fechar menu' : 'Abrir menu');

        if (icon) {
            icon.textContent = isOpen ? '✕' : '☰';
        }
    };

    toggle.addEventListener('click', () => setState(!menu.classList.contains('is-open')));

    menu.querySelectorAll('.mobile-menu-link').forEach((link) => {
        link.addEventListener('click', () => setState(false));
    });

    // Fires only when the breakpoint is actually crossed, unlike a resize listener.
    const desktopNav = window.matchMedia(DESKTOP_NAV_QUERY);

    desktopNav.addEventListener('change', (event) => {
        if (event.matches) {
            setState(false);
        }
    });
}

initMobileMenu();
