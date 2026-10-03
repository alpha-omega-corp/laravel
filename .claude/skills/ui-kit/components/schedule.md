# schedule

The opening hours: a week of days, each with its hours as the business writes them or closed said in words, and a note for what the week does not say.

## Placement

- split.visit — fits: the opening's other half with the map, beside the hero from lg and under it on a phone, still within the first two screens
- carte.visit — fits: 22rem beside the list and held in view while it scrolls from lg, after it on a phone
- poster.facts — fits: at the foot of the cover, beside the map from md
- marketing.main — fits: in the reading width, the week's strip across the window in counter and beside the map in market
- split.main — fits: with the map, under the opening
- carte.main — fits: with the map, under the list
- poster.main — fits: with the map, below the fold
- board.main — fits: a tile of its own, drawn in the tile rather than as counter's strip across the window
- journal.main — fits: the practical part of the narrow column, with the map
- stacked.main — fits: one card of the grid
- focus.main — fits: beside the one task it serves, a booking's hours
- console.main — fits: the admin's view of what a visitor reads, in its column of data
- workspace.detail — fits: one block of the chosen item
- * — never: an opening says what the page is, today's status is the header's status line, and the list, the gallery, the band and the foot each have a job of their own

## Limits

- days — 7 (chunking)
- title — 48 characters (law-of-pragnanz)
- per-page — 1 (occams-razor)

## Behaviour

- It sits in the same region as the map, so when and where are read as one: beside the opening, or together in main. (law-of-common-region, law-of-proximity)
- On home and on the visit page the hours are within the first two screens, beside the opening or first in main, or the header's status line says whether it is open today. (pareto-principle, selective-attention)
- A bare tag draws the hours the owner edits in the admin, and a week written on the tag is the brief's own; with neither it draws nothing, never a week of closed days nobody entered. (teslers-law, cognitive-bias)
- Its days are one week with a closed day kept as its row, said in words; a holiday or a closure is its note, not another day. (chunking, peak-end-rule)
- Hours stay as the owner writes them, 11:30–14:00 · 18:30–22:00, never turned into another notation. (postels-law)
- Linked from the navigation as #horaires, it carries id="horaires" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
- Its arrangement is chosen on its tag and the direction's look stays: `variant="strip"` lays the week across, a cell a day, for a page that opens on it; `variant="plain"` draws the days as lines with no panel, for a side column or a quiet page; bare, it is the direction's own. (law-of-proximity, aesthetic-usability-effect)
