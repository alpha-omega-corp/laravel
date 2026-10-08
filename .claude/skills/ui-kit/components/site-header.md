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
- The brand is the site's name, alone at the far left, and it leads home; the items, the menus and the action keep together at the right, as on apdigital.ch. (jakobs-law, mental-model, law-of-proximity)
- The page being shown is marked, with aria-current and an underline rather than a colour alone; an anchor never is, since it names a section and not a page. (working-memory, flow)
- The page most visitors come for leads the items, and the visit or the contact page closes them. (serial-position-effect, pareto-principle)
- An item is a page; a section of home is #carte on home and /#carte from any other page, and home's anchors are the first items dropped once the pages pass the advice. (hicks-law, mental-model)
- The action is the one thing the brief asks a visitor to do, a primary button at the far right, and never also one of the items. (von-restorff-effect, occams-razor)
- It stays on screen as the page scrolls, stuck to the top on the canvas with a rule under it, so the way to every page and to the action is never more than a glance away. (jakobs-law, goal-gradient-effect)
- Before the action it draws the language menu by itself once the site has two languages, and the theme menu only when its tag asks for it, `:theme-picker="true"`, which the build writes when the site's mockup chose it, and the site binds it. On a phone the bar is one row, the name, the action and a menu button, and the items and the menus open under it, so the sticky bar never takes a second row of the screen. (law-of-common-region, cognitive-load)
- Its arrangement is the site's, chosen on deployer's mockup and written by the build as `variant`, the same on every page: `centred`, the name centred over the pages, or `split`, the pages at the left, the name in the middle and the action at the right; with none, the name at the left and the rest at the right. From a tablet's width up only: on a phone every arrangement is the one row. (jakobs-law, law-of-similarity)
- Each label is a word or two and at most 16 characters: past five they wrap beside the action on a laptop. (cognitive-load, hicks-law)
- The status line and the phone say only what the brief states, and the phone is shown as written and dialled by its digits. (cognitive-bias, postels-law)
