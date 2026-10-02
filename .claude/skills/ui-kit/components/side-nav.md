# side-nav

The admin's sidebar: its screens in titled groups, each row a label with an optional icon and count, on the page's own surface or filled with the accent.

## Placement

- console.nav — first: the 18rem sidebar, full height beside the page from lg; on a phone all of it runs above the page, so it stays short
- * — never: the admin's sidebar and nothing else; a site's bar is its site-header, and the views of one screen are tabs

## Limits

- groups — 9; advice 5 (millers-law, chunking)
- per-page — 1 (jakobs-law)

## Behaviour

- It is the same on every screen of the admin, the same groups and rows in the same order, so the owner finds a screen where it was. (jakobs-law, law-of-similarity)
- A row is current when it is given current, and otherwise only when its href is the full URL served, query included: rows take the absolute URL a route gives, and a screen with a query, such as a list's second page, passes current. (working-memory, flow)
- A group holds the few screens of one kind, at most nine rows under a heading of a word or two, so the sidebar is chosen from rather than read. (millers-law, hicks-law)
- A label is a word or two: in 18rem a longer one is cut short with an ellipsis, and the screen's name with it. (cognitive-load)
- An icon rides beside its label, never alone, and a badge is a count the owner acts on, such as new orders; the badge is hidden from screen readers, so the screen it leads to says the same. (cognitive-load, selective-attention)
