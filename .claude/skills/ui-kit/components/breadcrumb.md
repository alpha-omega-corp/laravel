# breadcrumb

The trail from home to the page being shown, each level a link and the last the page itself.

## Placement

- *.nav — fits: under the site-header in the bar's frame, on a page two levels deep or more; held with the bar where a direction makes it sticky
- console.nav — never: the sidebar lists the screens, and a screen's trail is its page-heading's
- stacked.nav — never: the navbar runs unpadded across the top, and a screen's trail is its page-heading's
- * — never: on an app screen it goes in the page-heading's breadcrumb slot above the title, and no other region is navigation

## Limits

- items — 4 (working-memory)
- per-page — 1 (jakobs-law)

## Behaviour

- It appears only on a page two levels deep or more, such as /shop/apples, since on a site of one level the navigation already says where a visitor is. (working-memory, occams-razor)
- Its first item is home, each after it the level above the page, linked, and its last the page itself, unlinked and marked current. (working-memory, jakobs-law)
- Each label is the words of that page's navigation label or title, so the trail reads as the site's own map. (mental-model, law-of-similarity)
- Every level it links is a page the site serves, since a trail that answers an error ends the visit there. (peak-end-rule, flow)
