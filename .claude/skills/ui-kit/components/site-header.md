# site-header

The bar across the top of every public page: the name, which leads home, the site's pages, and the one thing a visitor is asked to do.

## Placement

- marketing.nav — first: across the full width, above the opening
- split.nav — first: across the full width, above both halves of the opening
- carte.nav — first: straight above the list's heading, since carte has no hero
- poster.nav — first: over the cover, which fills the rest of the first screen
- board.nav — first: above the board's short opening
- journal.nav — first: above the lead photograph
- * — never: a site has one bar, the nav of a site layout; an app screen and the admin draw their own navigation

## Limits

- items — 9; advice 5 (hicks-law, millers-law)
- per-page — 1 (jakobs-law)

## Behaviour

- Every page draws the same brand, items and action in the same order; given no items it draws the site's pages, so no page keeps a copy of the navigation that can drift. (jakobs-law, law-of-similarity, teslers-law)
- The brand is the site's name at the far left, and it leads home. (jakobs-law, mental-model)
- The page being shown is marked, with aria-current and an underline rather than a colour alone; an anchor never is, since it names a section and not a page. (working-memory, flow)
- The page most visitors come for leads the items, and the visit or the contact page closes them. (serial-position-effect, pareto-principle)
- An item is a page; a section of home is #carte on home and /#carte from any other page, and home's anchors are the first items dropped once the pages pass the advice. (hicks-law, mental-model)
- The action is the one thing the brief asks a visitor to do, a primary button at the far right, and never also one of the items. (von-restorff-effect, occams-razor)
- Each label is a word or two and at most 16 characters: on a phone the items are one strip that scrolls sideways past about 335px, with nothing to show there is more. (cognitive-load, zeigarnik-effect)
- The status line and the phone say only what the brief states, and the phone is shown as written and dialled by its digits. (cognitive-bias, postels-law)
