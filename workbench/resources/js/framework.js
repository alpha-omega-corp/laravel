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
 * Between two kinds of view (the projects and the business types, the grid of
 * every design and the inspection of one, the contact sheet and the record)
 * the parts differ, so the whole main column (`data-framework-main`) is
 * swapped instead, and the window goes back to the top of the tab.
 *
 * The address is the view's, pushed, so a view can still be linked and Back and
 * Forward walk the views. Anything this cannot do (another page, a refusal, a
 * view drawn some other way) is the ordinary navigation.
 */

const ROOT = '[data-framework-root]';
const CONTROLS = '[data-ref="framework.controls"]';
const FRAME = 'iframe[data-ref="framework.site"]';
const MAIN = '[data-framework-main]';

let latest = 0;

/*
 * Which tab a path is. Every view of the framework (the projects, the business
 * types, the contact sheet, the record) is one tab, chosen from the first row
 * of the side column, so all of them are `/framework`. The page drawn alone
 * (`/framework/site`), a placeholder picture and a picture of the record or of
 * Claude's shots are not views: they keep their own paths and are followed as they always were.
 */
function tab(pathname) {
    const segments = pathname.split('/');

    if (segments[1] === 'framework' && !['site', 'picture'].includes(segments[2]) && !(['record', 'shots'].includes(segments[2]) && segments.length > 3)) {
        return '/framework';
    }

    return segments.slice(0, 3).join('/');
}

/** A link this tab can draw in place: same page, same tab, followed with no modifier and in this window. */
function inPlace(link, event) {
    if (!link || event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
        return null;
    }

    if (link.hasAttribute('download') || (link.target && link.target !== '_self' && link.target !== '_top')) {
        return null;
    }

    const url = new URL(link.getAttribute('href') ?? '', link.baseURI);

    return url.origin === location.origin && tab(url.pathname) === tab(location.pathname) ? url : null;
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

    if (!next) {
        location.assign(url);

        return;
    }

    // Another kind of view: the grid for one design, or one design for the grid.
    if (names(next) !== names(root)) {
        const main = root.querySelector(MAIN);
        const freshMain = next.querySelector(MAIN);

        if (!main || !freshMain) {
            location.assign(url);

            return;
        }

        main.replaceWith(freshMain);

        const controls = root.querySelector(CONTROLS);
        const freshControls = next.querySelector(CONTROLS);

        if (controls && freshControls) {
            controls.setAttribute('aria-label', freshControls.getAttribute('aria-label') ?? '');
            controls.innerHTML = freshControls.innerHTML;
            controls.scrollTop = 0;
        }

        freshMain.querySelectorAll(FRAME).forEach(watchFrame);
        keepTab(root);
        document.title = doc.title;

        if (push) {
            history.pushState({ framework: true }, '', url);
        }

        root.removeAttribute('aria-busy');

        if (root.getBoundingClientRect().top < 0) {
            root.scrollIntoView({ block: 'start' });
        }

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

    keepTab(root);

    // A part that is a whole new view (the contact sheet of another business) is read from its top.
    if (root.querySelector('[data-framework-top]') && root.getBoundingClientRect().top < 0) {
        root.scrollIntoView({ block: 'start' });
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

/*
 * The design as deployer's Hallucinator takes it: a button in the inspected
 * design's head opens its dialog, and Copy puts the prompt on the clipboard.
 * Both are found by the click, not bound once, because the head is swapped in
 * with every choice and brings its own dialog with the prompt written again.
 */
async function copyPrompt(button) {
    // The head's dialog or the first tab of What a build pulls: each holds its own prompt and its own word.
    const box = button.closest('[data-framework-prompt-box]');
    const text = box?.querySelector('[data-framework-prompt-text]');
    const said = box?.querySelector('[data-framework-prompt-said]');

    if (!text) {
        return;
    }

    try {
        await navigator.clipboard.writeText(text.value);
    } catch {
        // No clipboard API (a page not served over https or localhost): the selection is copied instead.
        text.select();
        document.execCommand('copy');
    }

    if (said) {
        said.textContent = button.dataset.copied ?? '';
    }
}

/*
 * What a build pulls, as tabs. The tab chosen is kept here, because a choice
 * in the side column swaps the whole part in, and a reader comparing two
 * palettes wants the palette's tab to stay open between them.
 */
let pullsTab = null;

function showTab(tab, focus) {
    const list = tab.closest('[role="tablist"]');
    const scope = tab.closest('[data-framework-tabs]');

    for (const other of list.querySelectorAll('[role="tab"]')) {
        const on = other === tab;
        other.setAttribute('aria-selected', on ? 'true' : 'false');
        other.tabIndex = on ? 0 : -1;
        scope.querySelector(`#${other.getAttribute('aria-controls')}`)?.toggleAttribute('hidden', !on);
    }

    pullsTab = tab.dataset.frameworkTab;

    if (focus) {
        tab.focus();
    }

    tab.scrollIntoView({ block: 'nearest', inline: 'nearest' });
}

/** After a swap: the tab chosen before, when the new part has it. */
function keepTab(root) {
    const tab = pullsTab && root.querySelector(`[data-framework-tabs] [data-framework-tab="${pullsTab}"]`);

    if (tab) {
        showTab(tab, false);
    }
}

/** Arrows, Home and End move along the tabs, as a tab list is walked. */
function walkTabs(event) {
    const tab = event.target.closest?.('[data-framework-tabs] [role="tab"]');

    if (!tab) {
        return;
    }

    const tabs = [...tab.closest('[role="tablist"]').querySelectorAll('[role="tab"]')];
    const at = tabs.indexOf(tab);
    const to = { ArrowRight: at + 1, ArrowLeft: at - 1, Home: 0, End: tabs.length - 1 }[event.key];

    if (to !== undefined) {
        event.preventDefault();
        showTab(tabs[(to + tabs.length) % tabs.length], true);
    }
}

function prompt(event) {
    const tab = event.target.closest?.('[data-framework-tabs] [data-framework-tab]');

    if (tab) {
        showTab(tab, false);

        return true;
    }

    const open = event.target.closest?.('[data-framework-prompt]');

    if (open) {
        const dialog = document.getElementById(open.dataset.frameworkPrompt);
        dialog?.querySelector('[data-framework-prompt-said]')?.replaceChildren();
        dialog?.showModal();

        return true;
    }

    const copy = event.target.closest?.('[data-framework-prompt-copy]');

    if (copy) {
        copyPrompt(copy);

        return true;
    }

    return false;
}

if (document.querySelector(ROOT)) {
    document.addEventListener('click', (event) => {
        if (event.target.closest?.(ROOT) && !prompt(event)) {
            follow(event);
        }
    });

    document.addEventListener('keydown', walkTabs);
    document.querySelectorAll(FRAME).forEach(watchFrame);

    // The views pushed here are walked back and forth the same way; the first one too, which has no state of its own.
    history.replaceState({ framework: true }, '');
    window.addEventListener('popstate', (event) => {
        if (event.state?.framework) {
            go(new URL(location.href), false);
        }
    });
}
