# catalogue

What the business sells, a card per item with its picture, its name, its price and a line about it: a preview until a checkout is wired, and then a card to buy from.

## Placement

- carte.offer — fits: the list the page is for, in the widest column, as many cards across as fit
- carte.main — fits: under the offer when the offer holds the menu
- marketing.main — fits: across the reading width, as many cards across as fit and one on a phone
- split.main — fits: under the opening's two halves
- poster.main — fits: a few, below the fold, since a long list is carte's
- board.main — fits: a tile of its own, one card across in a third of the page and two or three in the first 2×2 tile
- journal.main — fits: what the place offers, two cards across in the narrow column
- stacked.main — fits: one card of the grid, a third of the width
- focus.main — fits: the choice the one task is about, in the 36rem column
- console.main — fits: the admin's view of what a visitor sees, in its column of data
- workspace.detail — fits: one block of the chosen item
- * — never: nothing wide goes in a side column, an opening says what the page is and a band asks for one thing

## Limits

- items — 12 (choice-overload)
- per-page — 1 (choice-overload)

## Behaviour

- It lives on the one page whose role is the offer, and home links to that page, from the hero's second link or a feature item, rather than showing the list again. (choice-overload, hicks-law)
- A heading names it, since it has no title of its own: the lead's section on carte, and the page's h1 or a section above it anywhere else. (chunking)
- A bare tag draws the catalogue the owner edits in the admin, and only that list takes a checkout: items written on a tag that is given one would sell whatever the site's row of each id is. (teslers-law, cognitive-bias)
- It is given its checkout on the offer page alone, once /stripe has wired one: there each card's buy button is the page's action, and anywhere else a row of primary buttons competes with the one thing the page asks. (von-restorff-effect, mental-model)
- Every card carries its price as the business writes it, since a product without one is a question the visitor has to ask. (mental-model, postels-law)
- Linked from the navigation as #produits, it carries id="produits" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
