# field

The one field every form of a site is drawn with — a line, a long text or a choice — written `@field(...)` in a page and `<x-kit.field>` inside a kit component, so a site's forms read alike from one page and one project to the next.

## Placement

- * — never: it is a form's, drawn inside the form a page or a prefab writes, never placed in a region on its own

## Behaviour

- One of three kinds and nothing else: a line (`type` text, email, tel, url, number, date, time, datetime-local, password or search), a long text (`type: 'long'`) or a choice (`options`, a native select); any other type, a choice with nothing in it and options on a line are refused while the page is built. (law-of-similarity)
- It always has a name and a label: a placeholder is an example of an answer, never the label. (paradox-of-the-active-user)
- A personal field says what it is so the browser can fill it — autocomplete="name", type email with autocomplete="email", type tel with autocomplete="tel" — and every attribute but class, style and data-kit-part reaches the control. (parkinsons-law)
- Its error is the one the form came back with for its name, in words under it and marked aria-invalid, and what was typed is kept, never a password. (postels-law, von-restorff-effect)
- A list of options posts the word it shows; a choice that may stay empty takes `choose`, the line it opens on. (postels-law)
- Its id is field-<name> unless one is given, so a second form with the same field on one page gives its own. (fittss-law)
