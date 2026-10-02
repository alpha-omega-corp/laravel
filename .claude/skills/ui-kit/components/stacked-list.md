# stacked-list

A list of like items, one row each: the name and the line that tells it from the others at the left, its figure or date and a caption at the right.

## Placement

- console.main — fits: the screen's list, with its pagination straight under it once it passes a page
- stacked.main — fits: one card of the grid, where its titles and subtitles are cut to a third of the width
- workspace.list — fits: the items to choose from, under the list's heading and filter, scrolling in the 20rem column
- workspace.detail — fits: the chosen item's own lines, never a second list to choose from
- * — never: a site lists what it offers with the menu or the catalogue, which a direction draws, and a bar, a title strip or a task holds no list

## Limits

- items — 12 (choice-overload)

## Behaviour

- Every row has the same fields in the same places, so the eye reads down one column; a row that holds something else belongs in another list. (law-of-similarity)
- Its title and subtitle are cut to one line each, so what tells two items apart comes first in the title. (serial-position-effect, cognitive-load)
- Past twelve rows it is paged, with pagination straight under it, or narrowed by the filter above it in workspace's list. (choice-overload, hicks-law)
- With no items it draws an empty panel, so the page shows an empty-state in its place. (flow)
- `separate` gives each row a panel of its own, for rows that are each a thing to open, while the lines of one record stay in one panel. (law-of-common-region)
