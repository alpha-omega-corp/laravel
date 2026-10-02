# drawer

A panel pulled in over the screen from one edge, full height, with its title, a close button and its actions at the foot: a native dialog, or shown in place with open.

## Placement

- * — never: it opens over the screen from a button of the screen it belongs to, never as a region's own component; and never on a public page, which a visitor meets whole

## Limits

- title — 48 characters (law-of-pragnanz)
- actions — 2 (hicks-law)

## Behaviour

- It holds a side task that keeps the screen behind it in view, such as a list's filters or a row's details, never the screen's own task, which is a page. (flow, working-memory)
- It comes from the edge a reader expects: side="start" for navigation, side="end" for a detail or a filter. (jakobs-law)
- It is given an id, which the button that opens it names with command="show-modal" and commandfor; an id left to the kit changes on every render, and the button then opens nothing. (flow)
- Its actions are the side task's, such as Apply and Reset, the applying one primary and last. (von-restorff-effect, serial-position-effect)
