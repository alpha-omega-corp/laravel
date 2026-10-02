# button-group

A few joined buttons switching one view of what is under them, a period, a layout or a filter, with the current one filled.

## Placement

- console.header — fits: under the page-heading or in its actions, switching the period or the view of the whole screen
- stacked.header — fits: in the page-heading's actions, switching the period of the dashboard under it
- console.main — fits: in the heading of the section it switches, or straight above it
- workspace.list — fits: under the list's heading, switching which items it lists
- workspace.detail — fits: straight above the part of the chosen item it switches
- * — never: on a site the navigation is the site-header's and a choice is a link, and in a task a choice is a radio-group, which a form sends

## Limits

- buttons — 5; advice 3 (hicks-law, choice-overload)

## Behaviour

- It switches a view of what is right under it and never moves between screens, which is the sidebar's, the navbar's or the tabs'. (mental-model, law-of-proximity)
- Exactly one button is current, marked by aria-current as well as by its fill. (von-restorff-effect)
- Each label is a word, and an icon goes beside the word, never instead of it. (cognitive-load, hicks-law)
- Its buttons stay on one row, so on a phone all their labels together fit the page's 335px. (zeigarnik-effect)
- A choice a form sends, such as delivery or pickup, is a radio-group, since these buttons submit nothing. (jakobs-law, mental-model)
