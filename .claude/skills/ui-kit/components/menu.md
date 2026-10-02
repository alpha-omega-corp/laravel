# menu

A menu or a price list: sections of dishes or services, each with its price read along a line from its name, and a line about it.

## Placement

- carte.offer — fits: the list the page is for, in the widest column, its sections one under another or side by side as the direction draws them
- carte.main — fits: under the offer when the offer holds the catalogue
- marketing.main — fits: across the reading width, on the page whose role is the offer
- split.main — fits: under the opening's two halves
- poster.main — fits: a short one, below the fold, since a long list is carte's
- board.main — first: only as the board's first tile, 2×2 from lg, a third of the page being too narrow a column for a carte
- journal.main — fits: the practical part of the narrow column, which a carte reads well in
- stacked.main — never: every card is a third of the width, too narrow a column for a carte
- focus.main — fits: beside the one task it serves, in the 36rem column
- console.main — fits: the admin's view of what a visitor reads, in its column of data
- workspace.detail — fits: one block of the chosen item
- * — never: a side column stays short, an opening says what the page is, the gallery is pictures and a band asks for one thing

## Limits

- title — 48 characters (law-of-pragnanz)
- per-page — 1 (choice-overload)

## Behaviour

- It lives on the one page whose role is the offer, the menu or the services, and home links to that page rather than showing it again. (choice-overload, hicks-law)
- A section holds at most twelve items, and a menu of more than one section titles every one, so the list is read in chunks. (choice-overload, chunking)
- A bare tag draws the menu the owner edits in the admin, and dishes written on the tag are the brief's own: never an invented dish or price. (teslers-law, cognitive-bias)
- Prices stay as the business writes them, in one form down the whole list, 14.50 or CHF 14.–, never both. (postels-law, law-of-similarity)
- Linked from the navigation as #carte, it carries id="carte" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
