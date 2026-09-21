# What a palette is, and where its values live

A palette is a token set: colour, type, radius, shadow, density, and how much the
thing moves. It answers *what it looks like*. A layout answers *how it is
arranged*, and the two are chosen independently — `/create <name> <theme>
<layout>` takes one of each.

**The values are in `resources/css/themes.css`**, one `[data-palette='<name>']`
block per palette, and that file is the only place they are written. These files
are the *index*: what each one looks like, what it pairs with, and where it costs
something. A file here that restated a hex value would be the second copy that
drifts.

## Two axes, and they are independent

This changed, and the old model is worth naming so it is not read back in. A
palette used to be light-only, dark-only or dual, and choosing it chose both.
It no longer does:

- **`data-palette` on `<html>`** picks the palette. All seven are declared.
- **`data-theme`** picks light or dark. Its *absence* is "system", which leaves
  `color-scheme: light dark` to follow the operating system.

Every colour in `themes.css` is a `light-dark()` pair, so each palette is one
block rather than a block plus a `prefers-color-scheme` copy of it. That is why
no file here says whether its palette is light or dark: all of them are both, and
the question belongs to the other axis. `App\Enums\Scheme`, which had
`Light`/`Dark`/`Dual`, is what is left of the old model and nothing reads it.

Which axis a viewer is on is theirs to change at runtime, through the
**theme picker** — see `../features/theme-picker.md`, which ships in every new
site.

## The token vocabulary

Every palette defines exactly these. One that needs a colour this list does not
have is a palette with a bug: the eleventh token is how a set becomes
unmaintainable.

```
--color-canvas        the page
--color-canvas-alt    a surface one step off the page: wells, stripes, gray footers
--color-raise         the raised surface a panel is made of
--color-ink           body text and headings
--color-ink-soft      secondary text, meta, placeholders, icons
--color-rule          every border, divider and ring
--color-accent        the brand surface and link colour
--color-accent-strong hover and pressed for accent
--color-on-accent     text on accent
--color-highlight     the second colour: badges, marks, a chart series
--color-on-highlight  text on highlight

--dur-fast            hover, focus, toggle
--dur-base            reveal, drawer, dropdown, row
--dur-slow            hero, section, scrub
--ease-out            a GSAP ease name for entrances, e.g. power3.out
--ease-inout          a GSAP ease name for moves and reversals

--font-display        headings
--font-body           everything else
--display-weight      the weight the display face is set at
--body-leading        body line-height
--radius-panel        the corner of panels and cards
--radius-control      the corner of buttons and inputs
--container-wrap      the reading width
```

`--text-display`, `--text-title` and `--text-figure` are per palette, as
`clamp()` steps with their own line-height and letter-spacing.

The duration and ease tokens are read by JavaScript rather than by CSS, which is
what makes switching palette also switch the feel.

**`orchard` is the default**, and its values are also the `@theme` block in
`resources/css/app.css` — which is what generates the utilities. The two have to
be kept in step, and the block is repeated in `themes.css` so a nested
`[data-palette='orchard']` preview resets whatever palette is active around it.

**The rules in `themes.css` are deliberately unlayered.** Tailwind emits `@theme`
into `@layer theme`, and an unlayered declaration beats a layered one whatever
the specificity — which is what lets the active palette win with no `!important`
anywhere.

## The file format

These files are read by two things, so the shape is a contract rather than a
convention.

- `# <name>` then **one paragraph** — the summary every screen shows. It ends at
  the first blank line.
- `## Pairs with` — one `- <layout> — <best|good|fair>` per line. The pairing
  matrix lives here, once, on the theme side; nothing reads it off the layouts.
- `## Tokens`, `## Mood` and `## Costs` are prose for whoever is choosing.

Adding a palette is a block in `themes.css`, a case in `App\Enums\Theme`, a
summary in `lang/*/theme.php`, a file here, and a row in each of the others'
`## Pairs with`. Nothing lists them in code: deployer's `uikit.ReadCatalogue`
walks this directory, so a palette exists here the moment its file does.

**A generated project keeps the palette it uses and deletes the rest**, along
with the palette half of the picker and the font families in `vite.config.js`.
