# delivery

Where the business comes to you and on what terms: a zone a row, a town or a district, with what delivery costs there, the least order it takes and how long it is on the way.

## Placement

- carte.offer — never: the offer column is the list for sale, and the zones are how it reaches you
- carte.visit — fits: the zones beside the menu, held in view while it scrolls, when there are five or fewer
- carte.main — fits: under the offer, the towns the menu is delivered to
- marketing.main — fits: across the reading width, on the page that says how an order reaches you
- split.visit — fits: the opening's other half, when the business has no door to come to and the zones are its way in
- split.main — fits: under the opening's two halves
- poster.facts — fits: at the foot of the cover beside the hours, five zones or fewer
- poster.main — fits: below the fold, the zones as one table
- board.main — fits: a tile of its own, or the first 2×2 tile on the page whose role is the delivery
- journal.main — fits: the practical part of the narrow column, the zones one under another
- stacked.main — fits: one card of the grid, the zones one under another
- focus.main — fits: the question asked before an order, in the 36rem column
- * — never: an opening says what the page is, a gallery is pictures, and a band asks for one thing rather than listing twelve

## Limits

- title — 48 characters (law-of-pragnanz)
- intro — 160 characters (cognitive-load)
- zones — 12; advice 7 (millers-law, chunking)
- note — 160 characters (cognitive-load)
- per-page — 1 (occams-razor)

## Behaviour

- It answers the first question of anyone who orders to the door, does it come to me, so it stands on the page of the visit or the delivery, and home links to it rather than repeating the list. (mental-model, hicks-law)
- The zones are listed nearest first, the business's own town at the top, since a visitor scans for their own place and stops at it. (serial-position-effect, selective-attention)
- Every zone gives its terms in the same order and the same words, delivery, minimum, time, so two towns are compared term by term. (law-of-similarity, cognitive-load)
- A term is printed as the owner wrote it and left out where they gave none: never a fee worked out from a distance, never a time promised for them. (cognitive-bias, teslers-law)
- A place not on the list is not delivered, and the note under the list says so plainly, with the way to ask, rather than leave a visitor at the end of the list wondering. (peak-end-rule, postels-law)
- Linked from the navigation as #livraison, it carries id="livraison" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
- Its arrangement is chosen on its tag and the direction's look stays: `variant="table"` aligns the terms in columns under one header, for many zones compared term by term; `variant="cards"` makes each zone a card with its terms stacked large, for three to six towns worth reading at a glance; bare, it is the direction's own. (law-of-similarity, law-of-common-region)
