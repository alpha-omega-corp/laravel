# hearth

A dark, warm room by lamplight: the name low on one full-bleed photograph, the house in
photographed doors, the carte in one quiet column, and the page closed on a band of the accent
with the address and the hours. Dark by design, whatever the visitor's system says.

## Layouts

- marketing — the long page, the photograph first and the visit band last
- journal — a room with a story: the lead photograph, then the narrow column
- poster — one photograph and the name, the hours at its foot
- split — the room on one side, tonight's hours and the door on the other

## Scheme

`dark`

## Palettes

- sandstone — best
- vellum — best
- blossom — fair

## Suits

a restaurant with a room worth photographing, dinner service

## Looks

The frames: the nav on the dark with no rule; the hero full-bleed, its frame unpadded and its
`.wrap` let out to the whole width; the main sections `--section-gap` apart on the same dark;
the band the accent as a surface, its text `--band-ink`, its buttons inverted — the primary an
on-accent ground with accent text, the secondary transparent with an on-accent edge; the footer
on the dark under a hairline.

- site-header — the brand in the display face at `text-2xl`; the links small and ink-soft with an accent underline on hover; the bar one ink-soft line with a hairline under it; the action a primary button.
- hero — with a photograph, the photograph fills the frame behind a scrim (`--image-scrim`) and the copy sits low on the left within the reading width, the title at most 16ch with its mark; with none, the frame's glyph goes, a caption stays as a small line at the bottom right, and the hero is the accent's glow at 62svh — a finished look rather than an empty box.
- features — doors: as many columns as the column holds at 15rem each and three at most, each item a tile of one column, its photograph 4/5 (3/4 from `md`, 16/10 on a phone) with the copy over its foot on the scrim, the title in the display face, the body clamped to two lines, and the whole tile the link; the tile lifts 4px on hover.
- section — the head on the left, the mark a 56×3 accent bar.
- cta-band — the details in three columns, each label uppercase, tracked and small; the actions on the right.
- site-footer — three columns, the brand in the display face.
- menu — the carte: one column of 44rem, centred; each section title in the display face at `text-2xl` over a hairline; no leader; each row the name in the display face and the tabular price at the end, a hairline between items, the description at most 56ch.
- schedule — no panel, at most 44rem wide and centred, on the carte's own measure so the two start at one edge, hairlines between the days.
- catalogue — no panel edge and no surface; the photograph and the frame on `--radius-media`; the name in the display face.
- map — a hairline panel on `--radius-media`, the map darkened to sit on the page, the caption on the second ground.
