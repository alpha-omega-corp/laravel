# pricing

What it costs, plan by plan: a name, a price and its period, who it is for, what it includes and the one thing to do, read side by side and never a checkout.

## Placement

- carte.offer — fits: the plans the page is for, in the widest column, side by side
- carte.main — fits: under the offer, what the listed things cost as plans
- marketing.main — fits: across the reading width, two to four plans side by side and one under another on a phone
- split.main — fits: under the opening's two halves
- poster.main — fits: below the fold, the plans in one row
- board.main — fits: the first 2×2 tile, the plans one under another in a single tile
- journal.main — fits: the practical part of the narrow column, the plans one under another
- stacked.main — fits: one card of the grid, the plans one under another
- focus.main — fits: the choice the one task is, in the 36rem column
- * — never: plans are compared across a width a side column does not have, an opening says what the page is, and a band asks for one thing rather than offering four

## Limits

- title — 48 characters (law-of-pragnanz)
- intro — 160 characters (cognitive-load)
- plans — 4; advice 3 (hicks-law, choice-overload)
- per-page — 1 (occams-razor)

## Behaviour

- It lives on the one page whose role is the price, and the header's action or the hero's first link leads there rather than a table on every page. (hicks-law, flow)
- A bare tag draws the plans the owner keeps in the admin, and a price is printed as they wrote it, currency and all: never computed, converted, rounded or made up for a plan the brief did not price. (cognitive-bias, teslers-law)
- At most one plan is featured, and it says why only in the owner's words: with no flag it is drawn stronger and claims nothing, since “le plus choisi” nobody measured is a lie with a border. (von-restorff-effect, cognitive-bias)
- Every plan lists what it includes in the same order and the same words, so the difference between two plans is the lines that differ. (law-of-similarity, cognitive-load)
- A plan's button leads somewhere, a contact, a sign-up, a call, under a label that says where, and never takes a payment: a checkout is deployer's /stripe, wired to the catalogue. (mental-model, jakobs-law)
- What is not in the price stands under the plans as one line, the tax, the deposit, the notice period, rather than in a footnote. (cognitive-bias, peak-end-rule)
- Linked from the navigation as #tarifs, it carries id="tarifs" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
- Its arrangement is chosen on its tag and the direction's look stays: `variant="rows"` sets each plan across the column, its price at the end of its row, for plans that differ by one thing; bare, it is the direction's own. (law-of-proximity, aesthetic-usability-effect)
