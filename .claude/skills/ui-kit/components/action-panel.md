# action-panel

A panel whose whole purpose is the one control at its end: what it does and why, then the button that does it, beside the text from sm when inline.

## Placement

- console.main — fits: one panel of the admin's column, after the data it acts on
- workspace.detail — fits: at the foot of the chosen item, acting on it
- stacked.main — fits: one card of the grid, a third of the width from lg; inline only for a short control, since it goes beside the text from sm whatever the card's width
- focus.main — fits: after the description-list it confirms, the step's one control
- * — never: an admin's or an app's control; a public page's close is its cta-band

## Limits

- action — 1 (hicks-law, von-restorff-effect)
- title — 48 characters (law-of-pragnanz)

## Behaviour

- Its text says what will happen and its control is that verb, such as Export the orders or Close for the day, never Continue or OK. (paradox-of-the-active-user)
- It comes after what it acts on, so the state is read first and the control sits beside it. (law-of-proximity, fittss-law)
- What cannot be undone asks again, in a modal with tone="danger", before it acts. (peak-end-rule)
- Its title is an h3, so it sits under the page-heading's h2. (chunking)
- Its control is the screen's primary only when it is the screen's one action; beside a form's save it is secondary. (von-restorff-effect)
