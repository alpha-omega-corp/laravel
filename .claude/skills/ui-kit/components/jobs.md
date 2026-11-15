# jobs

The positions that are open, a row per job with its name, where it is, how much of a week it is, a line about the work and the way to apply.

## Placement

- carte.offer — fits: the list the page is for, when the page is the careers page, in the widest column
- carte.main — fits: under the offer
- marketing.main — fits: across the reading width, the facts beside the name and under it in a narrow column
- split.main — fits: under the opening's two halves
- poster.main — fits: below the fold, the few that are open
- board.main — fits: a tile of its own, the facts under the name in a third of the page
- journal.main — fits: the practical part of the narrow column, the facts under the name
- stacked.main — fits: one card of the grid, a third of the width
- focus.main — fits: the positions the one task chooses among, in the 36rem column
- console.main — fits: the admin's view of what an applicant reads, in its column of data
- * — never: a side column is for the hours and the way in, an opening says what the page is and a band asks for one thing

## Limits

- title — 48 characters (law-of-pragnanz)
- intro — 160 characters (cognitive-load)
- jobs — 12; advice 8 (choice-overload, hicks-law)
- per-page — 1 (occams-razor)

## Behaviour

- It lives on the one page whose role is working here, linked from the footer or the navigation, and home does not list the positions again. (hicks-law, selective-attention)
- A bare tag draws the positions the owner keeps in the admin, and with none open it draws nothing: a heading over “aucun poste pour le moment” is a section about nothing. (occams-razor, teslers-law)
- A position is taken off when it is filled, since one left up for a year tells an applicant nobody reads the page. (mental-model, cognitive-bias)
- Each row leads with what the job is called in the applicant's words, then where and how much of a week, the two facts they filter by. (serial-position-effect, mental-model)
- The whole row is the link to the advert or the way to apply, named by the job and never by “postuler” alone. (fittss-law, paradox-of-the-active-user)
- A salary, a start date or a contract type is the owner's to state and is never guessed for them. (cognitive-bias, postels-law)
- Linked from the navigation as #emplois, it carries id="emplois" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
- Its arrangement is chosen on its tag and the direction's look stays: `variant="cards"` makes each position a card, for two or three that each deserve a paragraph; bare, it is the direction's own. (law-of-common-region, aesthetic-usability-effect)
