# workspace

A narrow icon rail, a list column, and a detail column beside it. For inboxes,
triage and collaboration.

## Shell

`application-shells/multi-column/*`

## Family

`app`

## Suits

inbox, triage, collaboration

## Regions

What a roll places in each region of this layout's stub, and what each region is.

- rail: a 4rem strip of marks down the left edge, unpadded; nothing with a label fits
- rail — avatar
- list: the 20rem column of items to choose from, unpadded, scrolling on its own
- list — card-heading | section-heading, input | select | tabs | nothing, stacked-list, pagination | nothing
- detail: the chosen item, in the rest of the width
- detail — page-heading, prefabs, description-list | table, tabs + feed | form-layout | textarea + button, action-panel | nothing
