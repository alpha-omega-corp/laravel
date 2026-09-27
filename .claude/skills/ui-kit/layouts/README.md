# What a layout has to define

A layout is a **structure**: which frames the page has, in what order, and what
each one holds. It answers *how it is arranged*, where a palette answers *what
colours and faces* and a direction *what kind of place this is*. The three are
chosen independently, and a direction is drawn in every layout it lists — so a
restaurant can come out as a long page, a carte or a poster, in hearth or in
counter, rather than as one page in four colours.

There are two families. The **site layouts** — `marketing`, `split`, `carte`,
`poster`, `board`, `journal` — are public pages built from the site components
(`site-header`, `hero`, `features`, `section`, `media`, `cta-band`,
`site-footer`) and the prefabs, and they are what a business is drawn in. The
**app layouts** — `console`, `stacked`, `focus`, `workspace` — are screens of an
application with a shell, and no direction lists them.

Every layout works with every palette — nothing here refuses a combination.
Which ones are worth steering towards is written on the **theme** side, in each
theme's `## Pairs with`, so the matrix lives in one place.

## The failure these exist to prevent

Asked to lay out a page, anybody — a person or a model — reaches for the same
one: a bar, a hero, three equal cards, a band, a footer. Every design skill
worth reading names it as the first thing to avoid (Anthropic's
`frontend-design`, impeccable, taste). The kit made it worse by construction for
a while: every direction was drawn in `marketing` alone, so every site of a
business came out the same page in a different palette.

The answer the good skills converge on is the one this kit already has for
colour: **derive several materially different structures and roll among them.**
Each site layout below is an archetype with a thesis — what the first screen is
for — and a business's site is rolled among the ones its directions list.

## The file format

- `# <name>` then **one paragraph**, which is the summary every screen shows. It
  ends at the first blank line. Say what the first screen is for.
- `## Shell` — one backticked kit reference or glob, the application shell this
  layout is built from. `application-shells/sidebar/*`, `navigation/navbars/*`.
- `## Suits` — what it is for, in a few words.
- `## Not for` — when another layout is the better answer, naming it. Prose.
- `## Regions` — what a roll places in each region of the layout's stub, and what
  each region is. Each region has two list items, one of each kind, and neither is
  ever hard-wrapped:
  - `- <region>: <sentence>` says what the region is. Deployer's mockup dialog
    shows it under the region's name, and `list-ui-layouts` prints it.
  - `- <region> — <slot>, <slot>, …` is the recipe. `<region>` is the stub's
    marker name (`{{-- region:<name> --}}`), and the slots are placed in order, the
    order a reader meets them. A slot is one of its alternatives, written `a | b`,
    each equally likely. An alternative is one kit component, several placed
    together (`table + pagination`, `stat + stat + stat`), or `nothing`. Nothing
    after the dash leaves the region empty on purpose.
- `## Collapse` — what the layout becomes on a phone. Prose; every layout with
  columns says where each column goes.
- `## Beyond the recipe` — what a session building the site may add here, and
  what it should not. Prose.

Deployer reads the summary, `## Shell` and `## Regions`; the rest is for whoever
builds the page.

### The prefabs in a recipe

A prefab — `schedule`, `menu`, `map`, `catalogue`, any component a business lists
under `## Prefabs` — is placed **only as the page's own**. The page's prefabs are
the brief's, else the business's.

- `prefabs` on its own as a slot is where the page's prefabs go that no region
  names, in the business's order. It counts only in `main`, or in the last region
  when the stub has no `main`.
- **A prefab named in a region's recipe is placed there** when the page has it:
  `visit — schedule, map | nothing` puts the hours beside the opening. That is what
  lets a layout be arranged around what the business is for. When its slot rolls
  another alternative, it goes with the rest, where `prefabs` put them.
- A prefab the page does not have is never placed, wherever it is named: with none
  of the business's data it renders nothing, and a slot that placed one anyway
  would be a page claiming hours nobody entered.

### What a slot may place

Names are kit components (`resources/views/components/kit`). A slot never places
a component an earlier slot on the page already placed, so one family appears once
per page — the rule taste's skill calls the repetition ban, enforced by the roll
rather than asked of a reader. One alternative may repeat a name. A name the
application cannot build is skipped for that application.

A region the recipe names and the application's stub does not have — a site keeps
the stub it was made with — is placed in `main` instead: before main's own slots
when the recipe writes it above `main`, after them when below.

Put a component in a region only if it works there bare, in that region's box:
nothing wide in a 22rem side column; nothing that needs a neighbour in a stack of
sections that each stand alone; only a navigation in a top bar; nothing with a
label in `workspace`'s 4rem rail; and never `modal`, `drawer`, `dropdown`,
`command-palette`, `notification` or `placeholder`.

## What a site layout's stub must keep

A direction restyles the page through frames it finds by what they hold, never by
position (`../directions/README.md`). A site stub keeps those frames wherever it
has that role, and gives everything else a frame no direction matches:

| Role | Shape in the stub |
|---|---|
| the bar | `body > header` holding `nav` |
| the hero band | `main > section > .wrap` holding the hero — only when the hero is the full-width opening |
| main | `main > .wrap`, the sections one under another |
| the band | `main > section > .wrap` holding the `cta-band` |
| the footer | `body > footer` holding `footer` |

A column, a board or a strip that is none of these is a plain `div` or `aside` —
never `main > .wrap` and never a `section` directly under `main` — so no
direction lays it out twice. It uses utilities, and the direction still draws the
components inside it. Every frame hides itself when nothing was placed in it
(`[&:not(:has(>*))]:hidden` and its variants), and a two-column frame is two
columns only while its second column holds something.

## Building beyond the recipe

**A layout is where a page starts, not what it is allowed to be.** The roll gives
a coherent first draft; the session building the site owns what happens next, and
is expected to change it. It may:

- add sections the brief needs, as kit components (`import-ui-components`, then the
  tag) or as its own markup in the palette's tokens;
- reorder main's sections, drop a region, or move a prefab to where the content
  wants it;
- write a section no component covers — a timeline for a family business, a pull
  quote, a gallery — in the kit's tokens, with no `dark:` and no default palette.

What it keeps are the rules that make a direction work and a page read well:

- **The frames.** Never add a class or a wrapper to make a section *look* a
  certain way — that is the direction's, and a class added here is one the next
  direction cannot undo. Structure is fine; styling is not.
- **The first screen says what this is and how to get there.** Most of the time
  anybody spends on a page is in its first two screenfuls (NN/g), and for a place
  people visit the hours and the address belong there, not at the foot.
- **One family once.** Two sections of the same shape in a row read as a template.
  Alternate heavy and light — a dense section earns a quiet one.
- **No filler.** No "why choose us", no team grid, no testimonials nobody gave, no
  three equal cards to fill the middle. An empty-feeling page is solved with
  scale, a photograph and space, not invented content.
- **A real close.** The page ends on something a visitor can act on — the way in,
  the booking, the contact — not on a section that trails off.
- **Every column declares its collapse.** On a phone, say what comes first.

## Adding a layout

A stub in the worker template's `stubs/layouts/<name>.blade.php`, opening with
`{{-- <name>: <summary> --}}` and marking its regions; a file here; a row in every
theme's `## Pairs with`; and, for a site layout, a line in the `## Layouts` of each
direction it suits. A layout no theme mentions is one a roll can still pick but
nothing recommends. A layout with no `## Regions` is one a page roll will not
fill: deployer refuses it rather than drawing an empty page. A site keeps the
stubs it was made with, so a new layout reaches the sites made after it.
