# quote

A request for a quote, which the business answers with a figure: what the job is, where, in which budget band and by when, in a short form that works with no script.

## Placement

- marketing.main — fits: in the reading width, on the page whose role is the quote, two fields across from sm and one on a phone
- split.main — fits: under the opening's two halves, the map and the hours beside the hero above it
- carte.main — fits: under the offer, for the visitor who has found the job they need
- poster.main — fits: below the fold, after the cover has said what the firm does
- board.main — fits: a tile of its own, its fields one across in a third of the page
- journal.main — fits: the practical part of the narrow column, its fields one across
- stacked.main — fits: one card of the grid, its fields one across
- focus.main — fits: the one task of the page, in the 36rem column
- * — never: a side column, a bar, an opening, the gallery, a band and the foot each have a job of their own, and a form is a task rather than a fact read in passing

## Limits

- title — 48 characters (law-of-pragnanz)
- intro — 160 characters (cognitive-load)
- note — 120 characters (cognitive-load)
- scopes — 12 (hicks-law, choice-overload)
- budgets — 6; advice 4 (hicks-law)
- per-page — 1 (occams-razor)

## Behaviour

- It lives on the one page whose role is the quote, and the header's action and the hero's first link lead there from every page, rather than a form on each. (hicks-law, von-restorff-effect)
- A page has a quote or a booking and not both: a business that prices work takes a quote, one that sells an hour takes a booking, and two forms ask the visitor which they are. (occams-razor, hicks-law)
- It asks what pricing needs and nothing else: who, how to reach them, what kind of job, where, and a description; the budget and the date are optional, since half of those asking do not know them yet. (parkinsons-law, cognitive-load)
- The budget is chosen among bands the owner wrote, moins de CHF 20 000, de 20 000 à 100 000, never typed as an amount a visitor has to guess, and the bands are never invented for them. (hicks-law, cognitive-bias)
- What happens next stands beside the button in the owner's words, réponse sous deux jours ouvrables, and is never a delay the page promises on its own. (zeigarnik-effect, cognitive-bias)
- A refusal stands under its own field in words that say what would be accepted, and the visitor's description is kept, so a correction is one field. (postels-law, zeigarnik-effect)
- Once sent, the thanks stand where the form was and say an answer is coming with a figure, so nobody takes a request for an order. (peak-end-rule, mental-model)
- Linked from the navigation as #quote, it carries id="quote" on its own tag, which is also where the endpoint sends the visitor back. (flow, peak-end-rule)
- Its arrangement is chosen on its tag and the direction's look stays: `variant="split"` sets the invitation on one side and the form on the other, in main at its width; `variant="plain"` draws the form on the page with no panel round it; bare, it is the direction's own. (law-of-common-region, goal-gradient-effect)
