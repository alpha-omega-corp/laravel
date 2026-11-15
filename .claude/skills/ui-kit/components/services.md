# services

What the business does, a card per service with an icon, its name and one line, the owner's own rows: a law firm's fields, a garage's jobs, a builder's trades.

## Placement

- carte.offer — fits: the list the page is for, in the widest column, as many cards across as fit
- carte.main — fits: under the offer, what else the business does
- marketing.main — fits: across the reading width, three or four cards across and one on a phone
- split.main — fits: under the opening's two halves
- poster.main — fits: a short row below the fold, the names and their lines
- board.main — fits: a tile of its own, one card across in a third of the page and two in the first 2×2 tile
- journal.main — fits: the practical part of the narrow column, two cards across
- stacked.main — fits: one card of the grid, a third of the width
- focus.main — fits: the services the one task chooses among, in the 36rem column
- console.main — fits: the admin's view of what a visitor reads, in its column of data
- workspace.detail — fits: one block of the chosen item
- * — never: nothing wide goes in a side column, an opening says what the page is and a band asks for one thing

## Limits

- title — 48 characters (law-of-pragnanz)
- services — 12; advice 8 (hicks-law, choice-overload)
- per-page — 1 (law-of-similarity)

## Behaviour

- It lives on the one page whose role is the offer, and home names the three or four a visitor comes for, through a feature item or the hero's second link, rather than every service twice. (hicks-law, pareto-principle)
- A bare tag draws the services the owner edits in the admin, and one written on the tag is the brief's own: never a service the business does not offer, added to make the row even. (occams-razor, cognitive-bias)
- Each service is its name and one line in the customer's words, what they get rather than what the trade calls it. (mental-model, cognitive-load)
- A price is printed only when the owner wrote one, as written, dès CHF 120 or sur devis, and is never estimated to fill the card. (cognitive-bias, postels-law)
- An icon is one Lucide name per service, all from the one set and all or none, so the row reads as one group and no card looks like the odd one out by accident. (law-of-similarity, von-restorff-effect)
- It is not the page's features: features are the page's own blocks with their photographs, services the owner's rows, and a page that needs both gives them different jobs. (law-of-similarity, chunking)
- Linked from the navigation as #prestations, it carries id="prestations" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
- Its arrangement is chosen on its tag and the direction's look stays: `variant="rows"` rules them as a list, the name beside its line, for a dozen read down; `variant="tiles"` centres a large icon over each name, for four or five that are the whole offer; bare, it is the direction's own. (law-of-proximity, aesthetic-usability-effect)
