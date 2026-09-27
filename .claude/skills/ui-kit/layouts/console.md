# console

The admin's layout: a persistent sidebar of the site's screens, a page header, and dense data under
it. Every website has an admin section, where its owner manages the prefabs — the hours, the menu,
the catalogue — and the content; this is its shape, and no public page is ever drawn in it.

## Shell

`application-shells/sidebar/*`

## Family

`admin`

## Suits

a site's admin section, a back office

## Not for

Any page a visitor sees. A site's public pages are the site layouts — `marketing`, `split`, `carte`,
`poster`, `board`, `journal` — and a roll never picks this one unless it is pinned.

## Regions

What a roll places in each region of this layout's stub, and what each region is.

- nav: the sidebar, 18rem wide and full height beside the page on a wide screen, a band across the top on a phone; unpadded
- nav — side-nav | vertical-nav
- header: the page's title strip, above main and right of the sidebar, under its own rule
- header — page-heading
- main: one column of dense data, sections 1.5rem apart; not a grid, so nothing sits beside anything
- main — table + pagination | stacked-list + pagination | grid-list, prefabs, section-heading + feed | card-heading + description-list | form-layout, action-panel | nothing
