# team

The people a visitor will meet, a card per person with their photo, their name, their role and a line about them.

## Placement

- carte.offer — fits: the people the page is for, in the widest column, as many cards across as fit
- carte.main — fits: under the offer, the people who make it
- marketing.main — fits: across the reading width, as many cards across as fit and one on a phone
- split.main — fits: under the opening's two halves
- poster.main — fits: a few, below the fold, two or three cards across
- board.main — fits: a tile of its own, one card across in a third of the page and two or three in the first 2×2 tile
- journal.main — fits: the people behind the story, two cards across in the narrow column
- stacked.main — fits: one card of the grid, a third of the width
- focus.main — fits: the person the one task is with, in the 36rem column
- console.main — fits: the admin's view of who a visitor meets, in its column of data
- workspace.detail — fits: one block of the chosen item
- * — never: nothing wide goes in a side column, an opening says what the page is and a band asks for one thing

## Limits

- title — 48 characters (law-of-pragnanz)
- members — 12; advice 8 (choice-overload)
- per-page — 1 (choice-overload)

## Behaviour

- It lives on the one page whose role is the team, and home links to that page, from a feature item or the hero's second link, rather than showing everybody again. (choice-overload, hicks-law)
- A bare tag draws the team the owner edits in the admin, and people written on the tag are the brief's own: never an invented name, role or portrait for somebody real. (teslers-law, cognitive-bias)
- Every member is drawn the same way, a photo or its empty frame, then the name, then the role, so a row reads as one group. (law-of-similarity, law-of-common-region)
- A heading names it when the page's h1 does not already: the team's title on its own page, a section above it anywhere else. (chunking)
- Linked from the navigation as #equipe, it carries id="equipe" on its own tag, or the link lands nowhere. (flow, peak-end-rule)
