# console

A persistent sidebar, a page header, and dense data under it. For admin screens,
back offices and CRUD.

## Shell

`application-shells/sidebar/*`

## Suits

admin, back office, CRUD

## Regions

What a roll places in each region of this layout's stub, and what each region is.

- nav: the sidebar, 18rem wide and full height beside the page on a wide screen, a band across the top on a phone; unpadded
- nav — side-nav | vertical-nav
- header: the page's title strip, above main and right of the sidebar, under its own rule
- header — page-heading
- main: one column of dense data, sections 1.5rem apart; not a grid, so nothing sits beside anything
- main — table + pagination | stacked-list + pagination | grid-list, prefabs, section-heading + feed | card-heading + description-list | form-layout, action-panel | nothing
