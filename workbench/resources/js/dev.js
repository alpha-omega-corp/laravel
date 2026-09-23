/**
 * Dev mode: name every component on the page, and hand the name over.
 *
 * Each component root carries data-ref holding the tag it is written as. Turning
 * on data-dev on <html> outlines those roots and covers each leaf with its name,
 * so a screenshot of the page says what it is made of without anyone having to
 * describe it. Hovering one shrinks the name to a corner chip and shows the
 * actual render; clicking one puts the tag on the clipboard, which is the whole
 * point of naming it. Nothing here draws any of that — the rules are in app.css
 * reading the two attributes — and nothing is sent anywhere: dev mode is a viewer
 * preference, kept in localStorage beside the theme and restored before first
 * paint by the shell.
 *
 * While dev mode is on, a click anywhere in the page copies rather than acts: the
 * page is being read, not used. The one exception is the toggle itself, which
 * would otherwise be the way out of a mode with no way out.
 */

const STORAGE_KEY = 'ui-dev';

/** How long the copied tag stays confirmed on the plate. */
const CONFIRM_MS = 1200;

const root = document.documentElement;

/**
 * Turn dev mode on or off, remember it, and bring the toggle's state with it.
 */
function apply(enabled) {
    if (enabled) {
        root.dataset.dev = '';
    } else {
        delete root.dataset.dev;
    }

    try {
        localStorage.setItem(STORAGE_KEY, enabled ? '1' : '0');
    } catch {
        // Storage is unavailable; dev mode still applies for this page.
    }

    for (const toggle of document.querySelectorAll('[data-dev-toggle]')) {
        toggle.setAttribute('aria-pressed', String(enabled));
    }
}

/**
 * Put one component's tag on the clipboard and confirm it on its own plate.
 */
async function copy(element) {
    try {
        await navigator.clipboard.writeText(element.dataset.ref);
    } catch {
        // No clipboard permission, or an insecure context: say nothing rather
        // than confirm a copy that did not happen.
        return;
    }

    element.dataset.copied = '';

    setTimeout(() => delete element.dataset.copied, CONFIRM_MS);
}

document.addEventListener('click', (event) => {
    if (event.target.closest('[data-dev-toggle]')) {
        apply(! ('dev' in root.dataset));

        return;
    }

    if (! ('dev' in root.dataset)) {
        return;
    }

    const named = event.target.closest('[data-ref]');

    if (! named) {
        return;
    }

    // The innermost component wins, and the link or button under it does not fire.
    event.preventDefault();

    copy(named);
});

apply('dev' in root.dataset);
