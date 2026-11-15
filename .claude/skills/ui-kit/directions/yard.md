# yard

An industrial site in daylight: a hazard strip over the name, heads set like stencilled bay numbers, slabs with hard ink edges, the figure of each job very large on a hazard plate, and one diagonal where the page runs out into its last slab.

## Layouts

- split — the name and the facts first, the yard and its hours beside it
- board — the jobs, the trades and the way in as slabs on one board
- marketing — the long page
- poster — one cover, the name as large as a hoarding

## Scheme

`any`

## Palettes

- concrete — best
- marigold — best
- graphite — good
- harbour — good
- vellum — fair
- denim — good

## Suits

a construction company, a garage, logistics, an industrial trade

## Looks

The frames: the nav with no top padding, flush to the top of the window, standing on a 4px ink rule bled to both edges; the hero left on the page's own ground, with no wash behind the page; the main with its sections `clamp(4rem, 8vw, 6.5rem)` apart and counting its titled sections for their bay numbers; the band a field of the second colour that starts on a diagonal — a ramp `clamp(1.5rem, 5vw, 4.5rem)` tall rising from left to right above it — with the ask on a slab of ink inside, where the accent becomes the canvas, so the eyebrow and the primary button invert and the secondary is a transparent outline 2px thick; the footer a slab of ink with canvas text (the second ground with ink text in the dark scheme), under the same ramp unless a band is the last thing on the page, when the band's field runs flat into it. Everywhere: each panel is a square slab with a 2px ink edge and no blur, each button square, uppercase and tracked, each eyebrow bold, uppercase and tracked at 0.12em.

- site-header — the bar a strip of the second colour bled to both edges, its text 0.75rem, bold, uppercase and tracked, today's status and the phone each on an ink plate with canvas text; the brand uppercase at 1.5rem in the display weight; the links ink, semibold, uppercase and tracked, 0.8125rem in the nav, underlined on hover by 3px of the second colour.
- hero — the name in capitals, breaking anywhere rather than overflowing. From 56rem, in the hero band and with no arrangement chosen, the name is a hoarding: the eyebrow and the name run across both columns, the name at `clamp(3.25rem, 6.5vw, 5.5rem)` or 1.35 times the display size if that is larger, then the words and the facts in a 7/12 column beside the photograph in 5/12, which drops its ratio and stands as tall as they do, 18rem at least; in a column the hero keeps its own stack. The note opens on a 0.625rem square of the second colour. The facts wrap in a row under a 4px ink rule, each figure over its label: the figure at `clamp(3rem, 5.5vw, 4.5rem)` in tabular numerals, the label 0.75rem, bold, uppercase and tracked.
- features — the head the full width, its title a bay head; each item a slab with a 2px ink edge on the raised ground, the photograph at 16/9 flush to the edge and filling the slab's height, the words beside it in 3 parts to its 2 with `clamp(1.25rem, 3vw, 2rem)` of padding, the two stacking where the column is narrow; 1.25rem between slabs; the item's title uppercase at 1.75rem; the link small, bold, uppercase and tracked, followed by an arrow.
- section — the head the full width; the title a bay head, as every titled component in main has: uppercase at the heading size, its place down the page as a two-digit number on an ink plate before it, both standing on a 4px ink rule.
- marks — the hero's and the band's a bar 5rem by 0.625rem of the second colour; the features' and the section's hidden, the bay number standing in for them.
- media — square corners; a photograph with text on it veiled from its foot by ink at 72%, clear by 64% of the way up.
- cta-band — in the band frame a slab of ink with no border and `clamp(1.5rem, 5vw, 3.5rem)` of padding; placed anywhere else, the same padding inside a 0.625rem edge of the second colour; the title uppercase; the details under a 2px rule, their labels 0.75rem, bold, uppercase and tracked.
- site-footer — the brand uppercase at 1.5rem in canvas; the blurb, the eyebrows, the contact and the closing line in a muted canvas, the closing line over a dimmed rule; the links canvas, underlined on hover by 2px of the second colour; the admin button a transparent outline 1px thick.
- menu — a tariff board: with no arrangement chosen the sections wrap side by side, each 22rem at least, 2rem by 3rem apart, the title across all of them; each section title uppercase and tracked on an ink strip with canvas text and no rule; the name semibold; the price in the display face at 1.125rem.
- schedule — the title uppercase at 1.25rem; with no arrangement chosen the week in two columns 16rem at least, 3rem apart, no day split across them; the day's name 0.75rem, bold, uppercase and tracked, its hours bold, a closed day 0.75rem, uppercase and tracked.
- catalogue — the name uppercase in the display face at 1.25rem; the price in the display face at 1.25rem.
- map — the map in grey, its contrast slightly raised; the caption over a 2px ink rule; the address and the directions link 0.75rem, bold, uppercase and tracked.
- events — the list closed by a 2px ink rule, the lines between rows ink; the date uppercase at 1.25rem in tabular numerals; the name bold at 1.0625rem; the picture square-cornered.
- booking — a hazard edge: 0.75rem of the second colour across its top; each field's label 0.75rem, bold, uppercase and tracked, each input square with an ink border until it is focused or invalid.
- faq — the list closed by a 2px ink rule, the lines between entries ink; the question bold at 1.0625rem; with no arrangement chosen the question ends in a 2rem ink plate carrying a plus in the display face, a minus once the entry is open.
- gallery — the caption 0.75rem, bold, uppercase and tracked.
- team — the name uppercase in the display face at 1.25rem; the role 0.75rem, bold, uppercase and tracked.
- projects — with no arrangement chosen the body padded 1.25rem and the figure lifted first, pulled 4rem up over the foot of the photograph and flush to the card's left edge, its border and padding dropped; in every arrangement the figure's value on a plate of the second colour, sized to its card at 17% of the card's width between 2.5rem and 4rem, its label and the meta line 0.75rem, bold, uppercase and tracked, the name uppercase at 1.5rem.
- services — with no arrangement chosen one board of cells: as many 15rem columns as fit, no gap, the cells overlapped by their 2px so their edges are shared, no shadow; the icon 2.25rem; the name uppercase at 1.25rem; the price over a 2px ink rule, 0.75rem, bold, uppercase and tracked.
- process — each step under a rule 4px thick, 1.5rem clear of the next, the rows 2rem apart with no gap between columns so the rule runs on; the number at `clamp(3.5rem, 2.75rem + 3vw, 5.5rem)`; the name uppercase at 1.25rem; the duration 0.75rem, bold, uppercase and tracked.
- testimonials — each a slab padded 1.5rem with none at its foot, signed on an ink strip that runs edge to edge along the foot: the name in canvas, 0.8125rem, bold, uppercase and tracked, the role in a muted canvas, the portrait square.
- pricing — the plan's name uppercase at 1.25rem; the price at `clamp(2.75rem, 2.25rem + 2vw, 3.75rem)`; the flag a square tag, 0.75rem, bold, uppercase and tracked; what is included over a 2px ink rule.
- listings — the status a square tag flush in the photograph's top left corner, 0.75rem, bold, uppercase and tracked; the body padded 1.25rem; the name uppercase at 1.375rem; the facts over a 2px ink rule, their labels 0.6875rem, bold, uppercase and tracked; with no arrangement chosen the price at 1.5rem in canvas on an ink strip along the card's foot, edge to edge.
- credentials — each item aligned to its start with no rule and no padding over it; each name stamped on an ink plate, canvas, uppercase, in the display face at 1.125rem, its detail under it.
- jobs — the list closed by a 2px ink rule, the lines between rows ink; the name uppercase at 1.375rem; each fact a square tag with a 2px ink edge and no ground, 0.75rem, bold, uppercase and tracked; the arrow on a 2.5rem ink plate that turns to the second colour when its row is hovered.
- quote — a hazard edge: 0.75rem of the second colour across its top; the fields as booking's, the labels small capitals and the inputs square with an ink border.
- donate — a hazard edge: 0.75rem of the second colour across its top; the account details over a 2px ink rule, their labels 0.6875rem, bold, uppercase and tracked.
- courses — the list closed by a 2px ink rule, the lines between rows ink; the date uppercase at 1.25rem in tabular numerals; the name bold at 1.0625rem; the price in the display face at 1.25rem; the seats a square tag, 0.75rem, bold, uppercase and tracked.
