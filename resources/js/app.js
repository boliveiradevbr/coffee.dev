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

function initContactForm() {
    const form = document.querySelector('[data-contact-form]');

    if (!form) {
        return;
    }

    const submitButton = form.querySelector('[data-contact-submit]');
    const submitLabel = form.querySelector('[data-contact-submit-label]');
    const submitArrow = form.querySelector('[data-contact-submit-arrow]');
    const submitSpinner = form.querySelector('[data-contact-submit-spinner]');
    const submitStatus = form.querySelector('[data-contact-submit-status]');
    let isSubmitting = false;

    if (!submitButton || !submitLabel || !submitArrow || !submitSpinner || !submitStatus) {
        return;
    }

    form.addEventListener('submit', (event) => {
        if (isSubmitting) {
            event.preventDefault();

            return;
        }

        if (!form.checkValidity()) {
            return;
        }

        isSubmitting = true;
        submitButton.disabled = true;
        submitButton.setAttribute('aria-busy', 'true');
        submitLabel.textContent = 'Enviando briefing...';
        submitArrow.classList.add('hidden');
        submitSpinner.classList.remove('hidden');
        submitStatus.textContent = 'Enviando briefing...';
    });
}

initMobileMenu();
initContactForm();
