# What a direction is, and what it has to define

A direction is how a page **looks**, over markup that does not change. A palette
answers *what colours and faces*, a layout *how it is arranged*; a direction
answers *what kind of place this is* — a dark room by lamplight, a bright
counter, a calm studio, a market stall — and it is the difference between four
sites built from one brief reading as four businesses or as one.

**It is CSS over one DOM.** `ui:layout` writes every tag bare and the schema
gains one field, `direction`; the build writes it next to the palette, as
`<html data-palette="sandstone" data-direction="hearth">`. `resources/css/kit.css`
holds a `[data-direction='<name>']` section per direction, and that section
restyles the components through their `data-kit` and `data-kit-part` hooks.
No component reads the direction and no prop names one: a component never
branches on how the page looks, so a page switched from one direction to
another is an attribute changed rather than a page rebuilt, and a class somebody
adds to a section to make it look a certain way is one the next direction
cannot undo.

A direction never names a font: the faces are the palette's, loaded per palette
from `resources/css/fonts.json`.

## The file format

`directions/<name>.md`, read by deployer's `uikit.ReadCatalogue` the way it
reads the layouts, the themes and the businesses — so a direction exists to a
roll the moment its file and its root block do.

- `# <name>` then **one paragraph**, the summary every screen shows. It ends at
  the first blank line.
- `## Layouts` — one `- <layout> — <why>` per line, in order of preference: the
  site layouts the direction is drawn in, each a file in `../layouts/`. A roll
  picks among them — the look and the arrangement are two choices, and one look
  drawn in a single layout made every site of a business the same page in a
  different colour. `/build` offers them, and a layout outside the list is
  refused with the ones that would do. A direction written before the list, with
  one backticked name under `## Layout`, is read as a list of one.
- `## Scheme` — `` `light` ``, `` `dark` `` or `` `any` ``. A direction that pins
  one pins it in its root block (below); deployer reads this line to lock the
  preview's scheme buttons and to say so in the brief.
- `## Palettes` — one `- <palette> — <best|good|fair>` per line. Only the
  palettes listed are ones the direction takes: a roll picks among `best` and
  `good` alike — both are recommendations, and best alone left studio one
  palette — and `fair` only when neither is listed. A palette left off is
  refused when a direction is chosen with it; a page already drawn in it keeps
  it when its dice or its locks roll again.
- `## Suits` — what kind of business, in a few words.
- **No `## Regions`.** The recipe is the layout's: a direction drawn in six
  layouts cannot carry one recipe for all of them, and what goes where is a
  question about structure rather than about looks. (Deployer still honours a
  `## Regions` on a direction written before `## Layouts`, for its one layout.)
- `## Looks` — `- <component> — <how this direction draws it>`, prose for
  whoever writes or reads the CSS. Nothing parses it.

## The hooks

Every component a direction styles carries `data-kit="<name>"` on its root and
`data-kit-part="<name>-<part>"` on its parts, and those are the only hooks —
`data-ref` stays on the root for dev mode, as on every kit component. A part
always starts with its component's own name, so `[data-kit-part$='-mark']` is
every accent mark on the page and `[data-kit-part^='menu-']` is the menu.
Containers render even when empty, so a direction always has the same
structure to hold; a leaf renders only with its content, and a title's mark only
with the title.

```
media        media-image media-frame media-caption
section      section-head section-eyebrow section-title section-mark section-lead section-body
hero         hero-copy hero-eyebrow hero-title hero-mark hero-lead hero-actions hero-note hero-facts hero-fact hero-media
site-header  site-header-bar site-header-status site-header-phone site-header-nav site-header-brand site-header-links site-header-action
site-footer  site-footer-about site-footer-brand site-footer-blurb site-footer-contact site-footer-links site-footer-note site-footer-admin
features     features-head features-eyebrow features-title features-mark features-lead features-list features-item features-media features-copy features-item-title features-body features-link
cta-band     cta-band-copy cta-band-eyebrow cta-band-title cta-band-mark cta-band-lead cta-band-actions cta-band-details cta-band-detail
menu         menu-title menu-section menu-section-title menu-list menu-item menu-row menu-name menu-leader menu-price menu-description
schedule     schedule-title schedule-days schedule-day schedule-dayname schedule-hours schedule-closed schedule-note
catalogue    catalogue-item catalogue-image catalogue-frame catalogue-body catalogue-row catalogue-name catalogue-price catalogue-description catalogue-action
map          map-frame map-caption map-address map-directions
events       events-title events-list events-item events-date events-time events-name events-description events-image
booking      booking-title booking-intro booking-form booking-field booking-actions booking-sent booking-link
faq          faq-title faq-list faq-entry faq-question faq-answer
gallery      gallery-title gallery-grid gallery-item gallery-image gallery-caption
team         team-title team-list team-member team-image team-frame team-name team-role team-bio
```

An icon (`<x-kit.icon>`) carries `data-kit="icon"` on its `svg` and draws in `currentColor`,
so a direction colours it through the text around it or through `[data-kit='icon']`.

The list is shared with deployer, whose prefab drawings carry the same hooks so
the preview is styled like the page. A look that needs a hook this list does not
have is a change to the list, never a class added to one direction's markup.

## The five frames, and the preview's wrapper

The site stubs (`worker/stubs/layouts/`) share five frames, and a direction may
style them. A frame is found by what it holds, never by its position, since a
stub is free to gain a frame — and every site layout keeps these where it has
that role, while its own columns, boards and strips are plain `div`s and
`aside`s no direction matches (`../layouts/README.md`). So a direction written
against `marketing` draws in `split`, `carte`, `poster`, `board` and `journal`
with no rule of its own for them: the components inside the new frames carry
the look, and the frames carry the arrangement.

| Frame | Selector |
|---|---|
| nav | `body > header:has([data-kit='site-header'])` |
| hero | `main > section:has(> .wrap [data-kit='hero'])`, and its `> .wrap` |
| main | `main > .wrap` |
| band | `main > section:has(> .wrap [data-kit='cta-band'])` |
| footer | `body > footer:has([data-kit='site-footer'])` |

Deployer's preview stands a drawing where each tag would be, wrapped as
`<div data-ref="&lt;x-kit.NAME /&gt;" class="space-y-1.5"><p>caption</p>DRAWING</div>`.
So a frame selector is a descendant `:has(> .wrap [data-kit='X'])` and never
`> .wrap > [data-kit='X']`, and a rule placing a child of the main frame by its
component matches both shapes, the wrapper named by its `data-ref`:

```css
:is(main > .wrap > [data-kit='X'], main > .wrap > [data-ref]:has(> [data-kit='X']))
```

Never a bare `:has(> [data-kit='X'])`: board's grid of tiles is a child of the
main frame too, and a rule meant for one component then styles the whole
board — counter's hours strip bled under every tile that way.

A rule on the component itself (`[data-kit='menu'] …`) works in both as it is.

## The tokens

Every root block declares all thirteen. The shared rules — written once, on
`[data-direction]` with no value — read them, so a direction is mostly its
values.

| Token | What it is |
|---|---|
| `--section-gap` | the space between the main frame's sections |
| `--band-pad` | the block padding of the hero and band frames and of bled bands |
| `--band-surface` | the band frame's ground |
| `--band-ink` | the text on that ground |
| `--hero-min-height` | the hero's height when it is a photograph |
| `--heading-size` | a section heading's size |
| `--heading-leading` | its line-height |
| `--eyebrow-case` | an eyebrow's text-transform |
| `--eyebrow-tracking` | an eyebrow's letter-spacing |
| `--radius-media` | a photograph's corner |
| `--image-scrim` | the veil over a photograph with text on it |
| `--page-wash` | what is behind the whole page |
| `--panel-backdrop` | the glass blur |

## The CSS rules

The directions are the last section of `kit.css`, after `@layer components`.

- **Unlayered and flat.** Unlayered, as `themes.css` is, so a rule beats the
  utilities in a component's own markup with no `!important`. No nesting, since
  deployer's window compiles this in whatever webview the OS supplies; no
  `@import`, since the preview's compiler loads `./themes.css` and nothing else.
- **One root block per direction**, `[data-direction='<name>'] { … }` with single
  quotes, exactly once at the top level — deployer finds the names with
  `\[data-direction='([a-z][a-z0-9-]*)'\]`. An `@media` block may declare one of
  its tokens again under the same selector.
- **Selectors** are `[data-direction…]`, `[data-kit…]` and `[data-kit-part…]`,
  the elements `html`, `body`, `header`, `main`, `section` and `footer`, the
  kit's own `.wrap`, `.panel`, `.btn`, `.btn-primary` and `.btn-secondary`, and
  pseudo-classes and elements. Never a utility class, an element chain inside a
  component, or an id: a utility is what a direction must not depend on, since
  the markup is free to change it.
- **Tokens in values.** `var(--color-*)`, `color-mix(in oklab, …)`,
  `light-dark()`, the tokens above, lengths and keywords — never a hex, rgb or
  hsl literal, never a default Tailwind colour. A root block **never redeclares
  a palette token** (`--color-*`, `--font-*`, `--radius-panel`,
  `--radius-control`, `--display-weight`, `--text-*`, `--container-wrap`,
  `--dur-*`, `--ease-*`, `--panel-*`, `--btn-*`): the palette is the other
  axis. The one exception is the band frame, which re-maps the ink, the soft
  ink and the rule — and in hearth the accent — from `--band-ink` and
  `--band-surface`, so the text and the buttons read on the band.
- **A grid follows the column, not the window.** A component stands across the page in one layout
  and in a third of it in another — split's opening, carte's offer, a board's tile — so a
  direction's columns are `repeat(auto-fit, minmax(min(100%, …), 1fr))` or a flex wrap, and a
  window-wide `@media` breakpoint only sets a layout that is right at any width the component can be
  given, or is scoped to a frame that is always the page's width (the hero band, main's frame). A
  rule that capped a count of columns at `md` drew three slivers in a board's tile.
- **Displays are guarded.** The stub hides a frame nothing was placed in with
  `[&:not(:has(>*))]:hidden`, and an unlayered `display` would undo it — so a
  rule that sets `display` on a frame says `main > .wrap:has(> *)`.
- **The scheme is pinned in the root block and nowhere else.** hearth declares
  `color-scheme: dark`; `kit.css` imports `themes.css` at its top, so the
  direction comes later in the cascade than `themes.css`'s `[data-theme]` rules
  at the same specificity, and the page is dark whatever the visitor's system
  says. `data-theme` is left alone: in this kit it means *the viewer chose*, and
  a generated site ships no picker.

## Adding a direction

1. A file here.
2. Its root block and rules in `resources/css/kit.css`.
3. A row in any business's `## Directions` (`../businesses/README.md`).
4. A fixture in deployer's preview plugin (`client/app/plugins/preview.client.ts`).

`tests/Feature/DirectionTest.php` holds the specs and the stylesheet together:
a root block per spec and none without one, every token declared, the scheme
pinned only where the spec says so, and nothing but the allowed selectors and
values in any rule that names a direction.
