# navbar

An application's bar across the top: its name, its screens as links and a place for the account's menu, the links wrapping rather than hiding on a phone.

## Placement

- stacked.nav — first: across the full width above the header band; on a phone its links fit one row, since the bar is 3.5rem tall and a second row spills out of it
- * — never: an app's top bar only; a site's bar is its site-header, which knows the site's pages and marks the one shown, and the admin's is a sidebar

## Limits

- items — 9; advice 5 (hicks-law, millers-law)
- actions — 2 (hicks-law)
- per-page — 1 (jakobs-law)

## Behaviour

- It is the same on every screen of the app, the same items in the same order, so a screen is found where it was. (jakobs-law, law-of-similarity)
- The screen being shown is given current: the navbar does not work it out, and a bar with nothing marked leaves the user to remember where they are. (working-memory, flow)
- Its brand is a name and not a link, so the app's home screen is its first item. (jakobs-law, serial-position-effect)
- Every item has an href: one without is a # that leads nowhere. (peak-end-rule)
- A label is a word or two and at most 16 characters, and the items fit one row on a phone: the bar is 3.5rem tall, and a row that wraps spills out of it. (cognitive-load)
- Its actions are the account's menu and at most one button, never the screen's primary action, which belongs to the page-heading. (von-restorff-effect, hicks-law)
