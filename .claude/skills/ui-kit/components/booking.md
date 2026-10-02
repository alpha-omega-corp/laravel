# booking

A request to book a table, an appointment, a stay or a quote, which the owner confirms by hand: a short form that works with no script, or a link to the outside booking system the business already uses.

## Placement

- marketing.main — fits: in the reading width, on the page whose role is to book, two fields across from sm and one on a phone
- split.main — fits: under the opening's two halves, the hours and the map above it in the visit column
- carte.main — fits: under the offer, for the visitor who has chosen
- poster.main — fits: below the fold, after the cover has said when and where
- board.main — fits: a tile of its own, its fields one across in a third of the page
- journal.main — fits: the practical part of the narrow column, after the hours
- stacked.main — fits: one card of the grid, its fields one across
- focus.main — fits: the one task of the page, in the 36rem column
- * — never: a side column, a bar, an opening, the gallery, a band and the foot each have a job of their own, and a form is a task rather than a fact read in passing

## Limits

- title — 48 characters (law-of-pragnanz)
- services — 12 (choice-overload, hicks-law)
- per-page — 1 (occams-razor)

## Behaviour

- It lives on the one page whose role is to book, and the header's action and the hero's first link lead there, rather than a form on every page. (hicks-law, von-restorff-effect)
- A bare tag draws the form the owner set up in the admin, posting to the base's endpoint; a business on OpenTable or Planity gives the section its address and the tag becomes one button to it, never a second form beside the first. (teslers-law, jakobs-law)
- It asks only for what confirming needs: a name, one field for an email or a phone, a day, and the rest optional; a service is asked only when the owner lists some. (parkinsons-law, cognitive-load)
- The day is a native date input from today and the time a native time input, so a phone opens its own picker and nobody types a format. (postels-law, jakobs-law)
- A refusal stands under its own field in words that say what would be accepted, and the visitor's answers are kept, so a correction is one field. (postels-law, zeigarnik-effect)
- Once sent, the thanks stand where the form was and say the request is not yet confirmed, so nobody takes a request for a booking. (peak-end-rule, mental-model)
- Linked from the navigation as #booking, it carries id="booking" on its own tag, which is also where the base sends the visitor back. (flow, peak-end-rule)
