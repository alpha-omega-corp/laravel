# pagination

Previous and next under a long list or table, with the page numbers between them on a wide screen, or n / N when simple.

## Placement

- console.main — fits: straight under the table or the list it pages
- workspace.list — fits: at the foot of the list it pages, `simple`, since its numbers overflow the 20rem column
- workspace.detail — fits: straight under the table it pages
- * — never: a site's list is whole on a page of its own, a menu or a catalogue past twelve entries taking sections, and the kit draws its links as #, a dead end

## Behaviour

- It sits straight under the list or the table it pages, and only once that list passes a page of twelve. (law-of-proximity, choice-overload)
- It draws a number for every page with no ellipsis, so past seven pages it is `simple`: previous, 3 / 12, next. (millers-law, hicks-law)
- The kit draws every link as #, so it goes only where the screen gives each link its page's address, since a # that goes nowhere is a dead end. (flow, peak-end-rule)
- Below sm its numbers are hidden, so a list read on phones is paged `simple`, which says 3 / 12 at every width. (working-memory)
