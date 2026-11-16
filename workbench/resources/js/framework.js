/*
 * The framework tab without a reload. A link that leads to another view of the
 * same tab (a choice in the side column, a link in the site drawn beside it)
 * fetches that view and swaps in only what changed:
 *
 * - the parts marked `data-framework-part`, by name;
 * - the side column's contents, keeping its scroll and the folds left open, so
 *   a long column is not sent back to its top on every choice;
 * - the business views' frame, by its page: the iframe stays, so a height it
 *   was dragged to stays too, and the page in it is replaced in its history
 *   rather than added to it, so Back steps through the tab's views.
 *
 * The address is the view's, pushed, so a view can still be linked and Back and
 * Forward walk the views. Anything this cannot do (another page, a refusal, a
 * view with other parts) is the ordinary navigation.
 */

const ROOT = '[data-framework-root]';
const CONTROLS = '[data-ref="framework.controls"]';
const FRAME = 'iframe[data-ref="framework.site"]';

let latest = 0;

/** A link this tab can draw in place: same page, same path, followed with no modifier and in this window. */
function inPlace(link, event) {
    if (!link || event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
        return null;
    }

    if (link.hasAttribute('download') || (link.target && link.target !== '_self' && link.target !== '_top')) {
        return null;
    }

    const url = new URL(link.getAttribute('href') ?? '', link.baseURI);

    return url.origin === location.origin && url.pathname === location.pathname ? url : null;
}

function names(scope) {
    return [...scope.querySelectorAll('[data-framework-part]')].map((part) => part.dataset.frameworkPart).join(' ');
}

/** The side column's contents replaced, with its scroll and its open folds as they were. */
function patchControls(current, next) {
    const top = current.scrollTop;
    const open = new Map([...current.querySelectorAll('details')].map((fold) => [fold.querySelector('summary > span')?.textContent ?? '', fold.open]));

    current.innerHTML = next.innerHTML;

    for (const fold of current.querySelectorAll('details')) {
        const was = open.get(fold.querySelector('summary > span')?.textContent ?? '');

        if (was !== undefined) {
            fold.open = was || fold.open;
        }
    }

    current.scrollTop = top;
}

/** The frame's page replaced, without a second entry in the history or a new frame. */
function patchFrame(current, next) {
    const src = next.getAttribute('src');

    if (src && src !== current.dataset.page) {
        current.dataset.page = src;
        current.title = next.title;
        current.contentWindow?.location.replace(new URL(src, location.href));
    }
}

async function go(url, push) {
    const root = document.querySelector(ROOT);

    if (!root) {
        location.assign(url);

        return;
    }

    const ticket = ++latest;
    root.setAttribute('aria-busy', 'true');

    let doc;

    try {
        const response = await fetch(url, { headers: { Accept: 'text/html' } });

        if (!response.ok) {
            throw new Error(String(response.status));
        }

        doc = new DOMParser().parseFromString(await response.text(), 'text/html');
    } catch {
        location.assign(url);

        return;
    }

    // A later choice has been made while this one was fetched: it wins.
    if (ticket !== latest) {
        return;
    }

    const next = doc.querySelector(ROOT);

    if (!next || names(next) !== names(root)) {
        location.assign(url);

        return;
    }

    for (const part of [...root.querySelectorAll('[data-framework-part]')]) {
        const fresh = next.querySelector(`[data-framework-part="${part.dataset.frameworkPart}"]`);
        const height = part.style.height;

        part.replaceWith(fresh);

        // A frame dragged taller stays as tall.
        if (height) {
            fresh.style.height = height;
        }
    }

    const controls = root.querySelector(CONTROLS);
    const freshControls = next.querySelector(CONTROLS);

    if (controls && freshControls) {
        patchControls(controls, freshControls);
    }

    const frame = root.querySelector(FRAME);
    const freshFrame = next.querySelector(FRAME);

    if (frame && freshFrame) {
        patchFrame(frame, freshFrame);
    }

    document.title = doc.title;

    if (push) {
        history.pushState({ framework: true }, '', url);
    }

    root.removeAttribute('aria-busy');
}

function follow(event) {
    const url = inPlace(event.target.closest?.('a[href]'), event);

    if (url) {
        event.preventDefault();
        go(url, true);
    }
}

/** The page in the frame: its links lead back to the tab, so they are followed here rather than by a reload. */
function watchFrame(frame) {
    frame.dataset.page ??= frame.getAttribute('src') ?? '';

    const attach = () => {
        try {
            frame.contentDocument?.addEventListener('click', follow);
        } catch {
            // Another origin: its links reload the tab, as they always did.
        }
    };

    frame.addEventListener('load', attach);
    attach();
}

if (document.querySelector(ROOT)) {
    document.addEventListener('click', (event) => {
        if (event.target.closest?.(ROOT)) {
            follow(event);
        }
    });

    document.querySelectorAll(FRAME).forEach(watchFrame);

    // The views pushed here are walked back and forth the same way; the first one too, which has no state of its own.
    history.replaceState({ framework: true }, '');
    window.addEventListener('popstate', (event) => {
        if (event.state?.framework) {
            go(new URL(location.href), false);
        }
    });
}
