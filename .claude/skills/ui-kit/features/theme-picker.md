# theme-picker

Two independent axes in one popover: which of the seven palettes the page is
rendered in, and whether it is light, dark or whatever the operating system says.
It ships in every new site, so a generated project has it before anybody asks.

## Files

- `resources/views/components/layouts/theme-picker.blade.php` — the picker: a native `<el-popover>`, two `radiogroup`s, and a swatch per palette that previews the real tokens
- `app/Enums/Theme.php` — the seven palettes, and which one is the default
- `app/Enums/Appearance.php` — system, light, dark, and the `data-theme` value each implies
- `resources/css/themes.css` — every palette's tokens, one `[data-palette='…']` block each, in both schemes
- `resources/js/theme.js` — applying a choice, remembering it, and keeping the buttons in step
- `lang/en/theme.php` — the picker's own strings and the one-line summary of each palette

## Wiring

Four edits, and the first two are the ones a site is broken without.

`<html>` carries both axes. The palette is always there; the appearance
attribute is absent on `system`, which is what hands the choice back to the
operating system:

```blade
<html lang="fr" class="h-full" data-palette="{{ $palette->value }}"{!! $appearanceAttribute !!}>
```

**An inline script in `<head>`, before the stylesheet**, reads the two remembered
choices back. Without it every load paints the default first and then corrects
itself, which is a flash on every page:

```blade
<script>
    (function () {
        const palettes = @json(array_column(Theme::cases(), 'value'));

        try {
            const palette = localStorage.getItem('ui-palette');

            if (palettes.includes(palette)) {
                document.documentElement.dataset.palette = palette;
            }

            const theme = localStorage.getItem('ui-theme');

            if (theme === 'light' || theme === 'dark') {
                document.documentElement.dataset.theme = theme;
            }
        } catch (error) {
            // Storage is unavailable; the defaults stand.
        }
    })();
</script>
```

`resources/js/app.js` imports the switcher, and `resources/css/app.css` imports
the palettes:

```js
import './theme.js';
```

And the picker goes in the navigation bar, taking the two current values so the
server renders the right one as checked:

```blade
<x-layouts.theme-picker :palette="$palette" :appearance="$appearance" />
```

## Notes

**The popover is `<el-popover>` and not `<el-menu>`**, because a menu closes on
the first click. Here one often sets both axes in a row, and watching the page
change under a panel that stayed open is precisely the feedback that is wanted.
The button carries `popovertarget`, which is native — the panel opens with no
JavaScript at all.

**A palette row previews itself** by carrying its own `data-palette`, so the
swatch is the real tokens rather than three hex values copied out of `themes.css`
and left to drift. It deliberately carries no `data-theme`: `color-scheme`
inherits, so each swatch is drawn in the scheme the page is already in, which is
what the viewer would actually get by choosing it.

**Both choices are viewer preferences rather than application state**, so they
live in `localStorage` and never on the server. `system` is not a stored value on
the appearance axis — it is the *absence* of `data-theme`.

**The mobile browser chrome follows.** `theme.js` reads `--color-canvas` back off
the computed style and writes one `meta[name="theme-color"]`, removing the two
media-scoped tags: once a choice exists those answer the system rather than the
viewer, and are wrong.

**A site that wants one palette** keeps that block in `themes.css`, deletes the
other six, drops the palette `radiogroup` from the picker, and removes the unused
font families from `vite.config.js`. What is left is the light/dark axis, which
is worth keeping on its own.
