# tabs

The views of one screen side by side, such as the orders by state or a customer's details and history, the one shown underlined or raised.

## Placement

- stacked.header — fits: under the page-heading, since main is a grid where tabs would be one card among the rest
- console.main — fits: above the data they switch
- workspace.list — fits: above the list they filter, two or three short labels, since more wrap onto a second row in 20rem
- workspace.detail — fits: above the part of the chosen item they switch, across the width
- * — never: the views of one app screen; a site's pages are its site-header's items and its sections are anchors

## Limits

- items — 9; advice 5 (hicks-law, millers-law)

## Behaviour

- The view being shown is given current, and it is marked by an underline or a raised pill as well as its colour. (working-memory, flow)
- Each tab is a link to its view, a path or a ?tab= query, so the view survives a reload and can be shared, and none is a # that leads nowhere. (mental-model, peak-end-rule)
- Tabs switch the views of one thing: a tab never leads to another screen, which is the navigation's job. (mental-model, jakobs-law)
- A label is a word or two: the row wraps rather than scrolls, and a second row reads as a second set of tabs. (cognitive-load, law-of-pragnanz)
- A badge is a count within its view, such as the pending orders, never a part of the label. (selective-attention)
