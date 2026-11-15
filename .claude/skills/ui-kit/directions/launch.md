# launch

A product's front page: one promise set large and centred over the product, which sits in a bezel like a screenshot, with the light always coming from above — a lit stretch of hairline at the top of the page glowing down behind the opening in the accent, and the same lit edge on the plan to take, the forms and the panel that closes the page. Everything else is crisp hairline panels on the page's own ground: cards in centred rows with their pictures inset, lists as tables in one panel, eyebrows as small capsules, and one action with an arrow from the first screen to the last.

## Layouts

- marketing — the long page: promise, proof, plans, action
- poster — the promise alone on the first screen
- split — the promise beside the product
- board — the features as tiles

## Scheme

`any`

## Palettes

- graphite — best
- nocturne — best
- harbour — good
- lagoon — good
- blossom — good
- fresh — fair
- denim — good
- plum — fair
- sorbet — fair

## Suits

software, an app, a coworking space, a service sold by plan

## Looks

The frames: the nav and the footer keep the kit's own frames, only what stands in them is restyled; the hero's frame has no ground of its own, and the light behind it is drawn on `main`, so every layout's opening has it — a 1px line of the accent up to 44rem wide at the top, fading to nothing at both ends, an 11rem core of the accent under it and a 40rem halo, both stronger in the dark; the main frame's sections stand `clamp(5rem, 10vw, 8rem)` apart; the band is the canvas with the page's ink, no different ground, so the call stands on it as a panel.

- site-header — the bar at 0.8125rem; today's status a capsule like the eyebrows; the brand at the display weight, tracked in by 0.01em.
- hero — the title a size above the display size (`--text-display` × 1.12, at least `clamp(2.125rem, 5.2vw, 3.5rem)`), balanced; each fact turned over so its value stands above its label, the value at `clamp(1.5rem, 3vw, 2rem)` and the label at 0.8125rem; the primary button ends in a small chevron that slides on hover. With no variant the photograph sits in a bezel: 0.5rem of padding inside a hairline, on a translucent raised ground, with a wide glow of the accent under it. In the opening's own band the hero is one centred column: the copy up to 56rem, the title up to 24ch, the lead at 1.1875rem up to 40rem, the actions centred, the facts a centred wrapping row with no rule over them, the photograph under them up to 66rem wide at 16/9; in a cover opening the copy is centred in the height of the first screen, so the product starts under the fold. In a column, split's half, it keeps the kit's two halves.
- media — a photograph's corner is the panel's radius; the hero's and a feature's carry a 1px hairline of the ink at 10% just inside the edge, and, with no picture yet, the accent's faintest tint over the second ground.
- section — the head centred, its lead centred under it, the title balanced; a body of words alone centred at 44rem; a section that opens the page is set as the promise, its title at the hero's size and its lead at 1.1875rem.
- features — tiles rather than alternating blocks: a centred wrapping row with 1.5rem gaps, three across at most, each tile 15rem to 24rem wide, a hairline panel with 0.5rem of padding; the photograph inset at the top at 16/10, its corner following the panel's; the item title at 1.125rem, the body at 0.9375rem; the link at 0.875rem with a chevron, covering the whole tile, whose edge turns towards the accent on hover. The head is centred.
- marks — hidden everywhere. A head is announced by its eyebrow instead, drawn as a capsule: a pill with a hairline tinted by the accent, on a translucent canvas ground, the text at 0.75rem and medium weight in the stronger accent, neither uppercase nor widely tracked.
- menu — a price list: the sections side by side as hairline panels with 1.5rem of padding, each at least 22rem wide, in a column up to 75rem, the title centred across all of them; each section title in the body face, 0.8125rem, semibold and soft; no leader; each row the name with the price at its end in the display face, a hairline between items.
- schedule — a hairline panel; across main it is centred at 36rem, in a column it fills it; the title at 0.8125rem, the days' names in the soft ink.
- catalogue — cards in a centred wrapping row, four across at most, each a hairline panel with 0.5rem of padding; the photograph inset at 16/10 with the inner hairline, the words padded under it.
- map — a hairline panel up to 75rem wide, centred; the caption at 0.8125rem.
- events — a table in one panel: the list inside a hairline panel, centred at 62rem; the title centred above it; the dates at 1rem.
- booking — a panel at a form's measure: centred at 60rem, padded `clamp(1.5rem, 4vw, 2.75rem)`, a hairline round it and the lit edge across its top, a line of the accent up to 30rem wide with an 8rem glow under it.
- faq — the questions in one hairline panel, centred at 48rem, the title centred above it; each question a row with a plus at its end that turns to a cross when the answer is open, the browser's own marker removed.
- gallery — the pictures in a centred wrapping row, four across at most, each with the inner hairline; the title centred, the captions at 0.8125rem.
- team — cards in a centred wrapping row, four across at most, each a hairline panel with 0.5rem of padding; the portrait square, inset, its corner following the panel's; the title centred.
- projects — cards in a centred wrapping row, three across at most, each 17rem to 24rem wide, a hairline panel with 0.5rem of padding; the photograph inset at 16/10; the name at 1.125rem, the meta at 0.8125rem; a card that links turns its edge towards the accent on hover. The title centred at the heading size.
- services — tiles in a centred wrapping row, four across at most, each a hairline panel padded 1.5rem; the icon at 1.25rem in a 2.5rem square tinted with the accent, under a hairline of it; the price at 0.8125rem along the foot, over a hairline; a tile that links turns its edge towards the accent on hover.
- process — a track: a hairline across the top of each row of steps, and each number a pill sitting on it — canvas ground, an accent-tinted edge, 0.75rem, semibold, in the stronger accent; the duration at 0.8125rem in the soft ink; the title and the intro centred, the whole up to 75rem.
- testimonials — hairline panels padded 1.75rem in a centred wrapping row, each 18rem to 36rem wide; the quotation at 1.0625rem under a large opening quotation mark in the accent and the display face; the author under a hairline, the name at 0.875rem semibold, the role at 0.8125rem.
- pricing — the plans side by side in a centred row, each 16rem to 24rem wide, a hairline panel padded 1.75rem; the name small, in the body face at 0.9375rem and semibold, the price with a line-height of 1 and tracked in; the flag a small capsule on the accent. The plan to take, the one with a flag or a primary button, has the accent as its edge and a second ring of it, a wash of the accent down from its top and a glow of it underneath. The title, the intro and the note are centred.
- listings — cards as the projects': three across at most, a hairline panel with 0.5rem of padding, the photograph inset at 16/10, the name at 1.125rem, the place at 0.8125rem; the status a small capsule of the ink with canvas text, which holds over any photograph.
- credentials — a strip between two hairlines, up to 75rem wide: the title small, soft and centred in the body face; the items a centred wrapping row with no rules of their own, each up to 14rem; the logos 2rem high, in greyscale at 80%; the names set as wordmarks, in the display face at 1.0625rem and the soft ink; the detail at 0.75rem.
- jobs — a table in one panel: the positions inside a hairline panel, centred at 62rem, the title and the intro centred above it; the name at 1rem; each fact in the meta a hairline capsule at 0.75rem; the arrow slides on as its row is hovered.
- quote — a panel at a form's measure, as the booking: centred at 60rem, a hairline round it and the lit edge across its top; the title at the heading size.
- donate — the same lit panel at 60rem; the title at the heading size.
- courses — a table in one panel: the sessions inside a hairline panel, centred at 62rem, the title centred above it; the date at 1rem; the places left a hairline capsule at 0.6875rem, with a dot of the highlight before it while the session can still be booked.
- cta-band — the close as one panel on the page's ground, up to 75rem wide: a hairline round it, a corner one and a half times the panel's, padded up to 5rem, the lit edge across its top, a line of the accent up to 40rem wide over a 13rem glow; everything centred in one column, the copy up to 44rem, the title at 1.15 times the heading size, the actions centred with the chevron on the primary button; the details across the foot over a hairline, their labels at 0.8125rem.
- site-footer — the brand at the display weight, tracked in by 0.01em; the columns' eyebrows in the full ink.
