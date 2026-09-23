/**
 * The appearance switcher behind the picker in the navigation bar.
 *
 * Three axes, and they are independent, so they are one table rather than three
 * branches. Each is an attribute on <html>: the palette names a token block in
 * resources/css/themes.css, light or dark becomes a color-scheme that picks one
 * half of every light-dark() pair, and raised contrast re-derives a handful of
 * tokens from the ones already in force. Setting any of them restyles the whole
 * page with no class changes and no second stylesheet.
 *
 * An axis may have an `unset` value that is not an attribute value at all but
 * the absence of the attribute: "system" hands light or dark back to the
 * operating system, and "normal" hands contrast back to the palette.
 *
 * All three are viewer preferences rather than application state, so they live
 * in localStorage; the inline script in the shell reads them back before first
 * paint, which is what keeps the page from flashing the wrong one on every load.
 *
 * None of the lists is repeated here — the picker's buttons are the list.
 */

const AXES = {
    palette: { attribute: 'data-palette', key: 'ui-palette', unset: null },
    theme: { attribute: 'data-theme', key: 'ui-theme', unset: 'system' },
    contrast: { attribute: 'data-contrast', key: 'ui-contrast', unset: 'normal' },
};

const root = document.documentElement;

/**
 * What is in force on each axis: what <html> says, or the axis's unset value.
 */
function current() {
    return Object.fromEntries(
        Object.entries(AXES).map(([axis, { attribute, unset }]) => [
            axis,
            root.getAttribute(attribute) ?? unset,
        ]),
    );
}

/**
 * The mobile browser's chrome takes the colour of the page. It is read back from
 * the computed style rather than repeated here, because the stylesheet decides.
 */
function syncBrowserChrome() {
    const canvas = getComputedStyle(root).getPropertyValue('--color-canvas').trim();

    if (! canvas) {
        return;
    }

    // The two media-scoped tags answer the system, not us; once a choice exists
    // they are wrong, so they give way to a single tag.
    for (const stale of document.querySelectorAll('meta[name="theme-color"][media]')) {
        stale.remove();
    }

    let meta = document.querySelector('meta[name="theme-color"]:not([media])');

    if (! meta) {
        meta = document.createElement('meta');
        meta.setAttribute('name', 'theme-color');
        document.head.appendChild(meta);
    }

    meta.setAttribute('content', canvas);
}

/** Every button on every axis says whether it is the one that is chosen. */
function reflect() {
    const now = current();

    for (const option of document.querySelectorAll('[data-theme-option]')) {
        const axis = option.dataset.themeAxis ?? 'palette';
        const isActive = option.dataset.themeOption === now[axis];

        option.setAttribute('aria-checked', String(isActive));

        // The picker's own label for that axis. The server renders the default
        // one's name, and the remembered one is only known here.
        if (isActive) {
            const name = option.querySelector('[data-theme-name]');

            for (const label of document.querySelectorAll(`[data-theme-label="${axis}"]`)) {
                label.textContent = name ? name.textContent : option.dataset.themeOption;
            }
        }
    }
}

/**
 * Apply a choice on one axis, remember it, and bring the picker along with it.
 */
function apply(axis, value) {
    const { attribute, key, unset } = AXES[axis] ?? {};

    if (! attribute) {
        return;
    }

    if (value === unset) {
        root.removeAttribute(attribute);
    } else {
        root.setAttribute(attribute, value);
    }

    try {
        localStorage.setItem(key, value);
    } catch {
        // Private browsing, or storage the viewer has turned off: the choice
        // still applies for this page, it just will not be remembered.
    }

    syncBrowserChrome();
    reflect();

    root.dispatchEvent(new CustomEvent('theme:changed', { detail: current() }));
}

document.addEventListener('click', (event) => {
    const option = event.target.closest('[data-theme-option]');

    if (option) {
        apply(option.dataset.themeAxis ?? 'palette', option.dataset.themeOption);
    }
});

// On "system" it is the system that decides, including while the page is open.
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    if (current().theme === 'system') {
        syncBrowserChrome();
    }
});

syncBrowserChrome();
reflect();
