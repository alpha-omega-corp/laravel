# What a component's rules have to define

A themed component (`resources/views/components/kit/<name>.blade.php`) says what it draws. The file
here beside it says where it may go: which regions of which layouts it fits, how much of it a page
takes, and how it behaves once it is there — each rule tied to the law of UX it serves
(`../laws.md`). Deployer reads these files live, from `claude.skills`, when it plans a site of
several pages: `plan-ui-site` places a component only where its `## Placement` lets it, and its
findings name the law a page breaks. A machine without them plans with no rules and says so.

This README is for whoever writes one. Like every README of the package it is export-ignored, so it
never reaches a site, and nothing may depend on it being vendored: the rules themselves are in the
component files.

## The file format

`components/<name>.md`, one per themed component, named after it: `site-header.md` for
`<x-kit.site-header>`. Every component the kit ships has one, `tests/Feature/ComponentRulesTest.php`
holds the grammar below, and `site-header.md` and `hero.md` are worked examples.

- `# <name>` then **one paragraph**, which is the summary: what the component is for, the way its
  docblock would say it. It ends at the first blank line.
- `## Placement` — where it may go, one line per scope:
  `- <scope> — <verdict>`, optionally followed by `: <note>`.
  - `<scope>` is `<layout>.<region>`, `<layout>.*`, `*.<region>` or `*`. The layout and region names
    are those of `../layouts/<layout>.md` and of the worker's stubs (`{{-- region:<name> --}}`).
  - `<verdict>` is `fits` (it may be placed there), `first` (only as the region's first component)
    or `never` (it must not be placed there).
  - `<note>` says why, or what the component becomes in that box — its width, where it goes on a
    phone — for whoever places it, a session or the factory.
  - For a layout and a region the most exact line wins: `<layout>.<region>`, then `<layout>.*`,
    then `*.<region>`, then `*`. A region no line reaches is `fits`.
- `## Limits` — how much of it a page takes: `- <measure> — <max>`, the max an integer optionally
  followed by its unit (`characters`, `items`), then an optional `; advice <n>` and an optional
  `(<law>, …)`. The measure is one of the component's own `@props` — a list counts its entries, a
  string its characters — or `per-page`, how many of it one page holds. Past the max a check fails;
  past the advice it only says so. Where a threshold in `../laws.md` counts the same thing, use its
  numbers. Optional: a component with nothing to count has no section.
- `## Behaviour` — how it behaves where it is placed: `- <sentence>` ending with the laws it serves,
  `(<law>, …)`. A behaviour is something a session building a page by hand could get wrong, not a
  description of the markup — that is the docblock's.

What every line keeps to:

- **One line each, never hard-wrapped.** The readers take a section line by line, and the second
  half of a wrapped rule is a line nobody reads.
- **These three sections and no others**, and no `###` inside them: a section ends at the next
  heading of any level. Above all never `## Regions` (deployer parses that as a layout's recipe),
  never a colon line such as `- nav: …` (a region's role), and never `## Shell`, `## Prefabs`,
  `## Layout` or `## Pairs with`, which deployer reads out of every file of a folder it knows.
- **A line that ends in `)` ends in its laws.** The last parenthesis of a Limits or a Behaviour line
  is its list of law slugs, each one of the thirty in `../laws.md`; close a sentence with a full stop
  before it, and never with a parenthesis of prose.
- **A region a layout's recipe places the component in is never `never` for it.** The recipe is
  what a roll places, and a rule that refuses it is a roll that loses a region.

## Region classes

A class is a kind of region: the same box and the same job, in whichever layout it is found. A rule
written for one region of a class is the rule for all of them, so decide a component by its classes
and write one line per region of each. Every region of every layout is in exactly one:

| class | regions | its box, and what it takes |
| --- | --- | --- |
| bar | marketing.nav, split.nav, carte.nav, poster.nav, board.nav, journal.nav, console.nav, stacked.nav, workspace.rail | The page's navigation and nothing else: the site-header across the top of a site layout, the navbar across an app's, console's 18rem sidebar, workspace's 4rem rail of marks where nothing with a label fits. |
| opening | marketing.hero, split.hero, poster.hero, board.hero, journal.hero, carte.lead, console.header, stacked.header, focus.header | Where a page says what it is: its one h1 and the one thing to do, with nothing to scroll past and nothing — an alert, a badge, a promotion — above it. The width varies: the full width, split's 7fr, poster's first screen. |
| side | split.visit, carte.visit, poster.facts, workspace.list | A column beside the page's widest content: split's 5fr and carte's 22rem (sticky there) from lg, poster's two halves from md, workspace's 20rem list. Short: the hours and the way in, or one list to choose from. |
| offer | carte.offer | The widest column, first: the list the page is for, a menu or a catalogue. |
| main | marketing.main, split.main, carte.main, poster.main, console.main, workspace.detail | The reading width, sections one under another and far enough apart to stand alone: a site's sections (poster's quiet, below the fold), console's dense data, workspace's chosen item. |
| narrow | journal.story, journal.main | One max-w-3xl column set like a magazine's page: text-led sections, nothing wide. |
| gallery | journal.gallery | One band of pictures across the full width, once. |
| tile | board.main, stacked.main | A grid of tiles, one component each: board's three across from lg (the first 2×2, two across from sm), stacked's cards three across. A third of the width, never the whole. |
| band | marketing.band, carte.band | The full width before the footer: the page's close, the last thing a visitor is asked to do. |
| foot | marketing.footer, split.footer, carte.footer, poster.footer, board.footer, journal.footer | The foot of a site page: the contact, the links, the admin's door. |
| focus | focus.main | One 36rem column holding one task: a form, a sign-in, a choice. |

`*.<region>` reaches every layout that has a region of that name, and a name is not a class:
`hero`, `visit`, `band` and `footer` mean one thing wherever they are, but `nav` is a site's bar and
an app's, `header` an app screen's title strip, and `main` is five classes at once — a board's tiles,
journal's column, focus's task. Write `<layout>.<region>` unless the name means the same everywhere.

## From column bounds to verdicts

The `column-bounds` skill gives every column two bounds, its box and its role, and they are where
most verdicts come from:

- **The region's sentence is the contract** (role rule 1). A component that does not answer what a
  region is — features in a visit column, an alert in carte's lead, which has nothing to scroll
  past — is `never` there.
- **The width decides what fits** (role rule 2). Nothing wide in a side column — a catalogue grid,
  features, a table, a gallery — so those are `never` in every side. The bar takes only navigation,
  so everything but a navigation is `never` in every bar. No column takes an overlay, so `modal`,
  `drawer`, `dropdown`, `command-palette`, `notification` and `placeholder` are `* — never`.
- **A side column stays short** (role rule 3): what fits there fits with a note that keeps it
  short, and a `per-page` limit.
- **Only the page's own prefabs, one family once** (role rule 4): a component a page holds once has
  `per-page — 1`; which prefabs a page has is its business's `## Pages`, not a component's rule.
- **No admin controls in a public column** (role rule 5): an app or admin component lists the
  regions it fits and ends on `* — never`, which keeps it out of every site layout.
- **Every column declares its collapse** (role rule 6): the note on a `fits` says where the
  component goes on a phone.
- **The box rules are the stub's and the direction's**, not the component's: tracks that shrink,
  two columns only while the second holds something, bleeds only in a full-width frame, sticky
  only beside something, what cannot shrink scrolling in its own box. They never make a verdict
  `never`; a note says what the component becomes in that box — a hero stacking in split's 7fr, a
  table scrolling in its own.

`first` is for a component that opens its region and has nothing above it — the site-header in
its bar, the hero in its opening. Anything that fits a region without opening it is `fits`.

## Writing one

1. Read the component's docblock and `@props`, then the `## Regions` sentence of every layout.
2. Under `## Placement`, write a line for each region of each class the component belongs to, with
   a note where the box changes it; then `never` for a region a wildcard would otherwise let in;
   then the fallback: `* — never` for a component that belongs to a few regions (a bar, an opening,
   an app screen), or nothing, leaving it `fits`, for one that goes wherever a page has room.
3. Under `## Limits`, count only props and `per-page`, with the thresholds' numbers where one
   applies: `nav-items`, `actions-per-region`, `title-characters`, `catalogue-items`,
   `menu-section-items`, `form-fields`.
4. Under `## Behaviour`, write what the component does once placed that a page could get wrong,
   each line ending with its laws.
5. `vendor/bin/pest tests/Feature/ComponentRulesTest.php`.
