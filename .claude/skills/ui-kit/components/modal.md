# modal

A dialog over the screen that asks one question: its title, a line on why, and the answers as buttons, with the backdrop, Escape and the focus trap left to the browser.

## Placement

- * — never: it opens over the screen from the button that asks for it, never as a region's own component; and never on a public page, where nothing may stand between a visitor and the page

## Limits

- title — 48 characters (law-of-pragnanz)
- actions — 2 (hicks-law)

## Behaviour

- It asks only what cannot wait for the page, such as confirming what cannot be undone; never a welcome, an offer or a newsletter. (flow, selective-attention)
- Its title is the question and its buttons the answers: the action named by its verb, such as Delete the dish, and a way back, never OK. (paradox-of-the-active-user, hicks-law)
- Its tone="danger" is for what cannot be undone, and there the confirming button is the only strong one. (von-restorff-effect)
- It is given an id, which the button that opens it names with command="show-modal" and commandfor; an id left to the kit changes on every render, and the button then opens nothing. (flow)
- A dialog never opens another dialog. (cognitive-load, flow)
