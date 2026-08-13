/**
 * Entry point for the marketing site: ambient shader, mobile menu, scroll reveal.
 */

import { initShaderBackground } from './shader.js';

/** The navigation breakpoint, mirroring @media (min-width: 1099px) in app.css. */
const DESKTOP_NAV_QUERY = '(min-width: 1099px)';

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
        toggle.setAttribute('aria-label', isOpen ? 'Fechar menu de navegação' : 'Abrir menu de navegação');

        if (icon) {
            icon.textContent = isOpen ? 'close' : 'menu';
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

function initScrollReveal() {
    const targets = document.querySelectorAll('.scroll-reveal:not(.visible)');

    if (targets.length === 0) {
        return;
    }

    if (!('IntersectionObserver' in window)) {
        targets.forEach((target) => target.classList.add('visible'));

        return;
    }

    // The -100px bottom inset reproduces the prototype's `windowHeight - 100`
    // threshold. Elements are revealed once and then stop being watched.
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        },
        { rootMargin: '0px 0px -100px 0px' },
    );

    targets.forEach((target) => observer.observe(target));
}

initShaderBackground();
initMobileMenu();
initScrollReveal();
