---
name: column-bounds
description: Keeps every column of a site layout inside its bounds, both its width and its job. Invoke before editing a layout stub (`stubs/layouts/*.blade.php`) or a layout spec in `ui-kit/layouts/`, before writing or changing a direction's rules in `resources/css/kit.css`, before placing, moving or adding a component in a region that is not full width (split's halves, carte's offer and visit, poster's facts, a board tile, journal's narrow column), and when something bleeds out of a column, runs under its neighbour or overflows on a phone. Covers the box rules, the role rules, and the greps that check them.
metadata:
    origin: project
---

# Column bounds

A column is any region narrower than the page. It has two bounds, and a change keeps both:

- **the box**: nothing in it is wider than the column, at any screen width;
- **the role**: it holds what its layout's `## Regions` sentence says, and nothing else.

| layout | columns | width |
| --- | --- | --- |
| `split` | `hero`, `visit` | `7fr` and `5fr` from `lg`, and only while `visit` holds something |
| `carte` | `offer`, `visit` | `1fr` and `22rem` from `lg`; `visit` is sticky there |
| `poster` | `facts` | two across from `md` |
| `board` | each tile of `main` | two across from `sm`, three from `lg`, the first tile 2×2 at `lg` |
| `journal` | `story`, `main` | one `max-w-3xl` column |

## The box

1. **Tracks shrink.** An arbitrary track is `minmax(0, …)`, never a bare `fr`, and a column is
   `min-w-0`. Tailwind's `grid-cols-N` is already `minmax(0, 1fr)`.
2. **Two columns only while the second holds something**, as `lg:[&:has(>aside>*)]:grid-cols-[…]`,
   and every frame hides itself when empty (`[&:not(:has(>*))]:hidden`).
3. **A column is a plain `div` or `aside`.** Never `main > .wrap`, never a `section` directly under
   `main`, so no direction's frame rule lays it out a second time.
4. **A media query knows the window, not the column.** A direction rule that widens a component
   (a bleed with `100vmax` or `100vw`, a negative inline margin, a grid of three columns or more)
   applies only in a full-width frame. It is scoped to that frame, the way counter's schedule strip
   is scoped to `main > .wrap`. Everywhere else, the component stays the kit's own panel. The
   exceptions are components that only ever sit in a full-width frame: `site-header` and
   `site-footer`.
5. **`:has(> [data-kit='X'])` matches more than the preview.** The second shape in
   `directions/README.md` is there for deployer's `data-ref` wrapper, but it matches any direct
   parent inside `main > .wrap`, and in `board` that parent is the tile grid. Check each
   frame-scoped rule against every stub that nests a grid inside main's frame.
6. **Sticky only beside something**: `lg:sticky`, never a bare `sticky`.
7. **What cannot shrink scrolls in its own box.** A table sits in an `overflow-x-auto` wrapper,
   long words and URLs get `break-words`, and media gets `max-w-full`.

## The role

1. **The region's sentence is the contract.** Read it in `ui-kit/layouts/<layout>.md` before you
   place anything. `visit` is the hours and the way in. `offer` is the list. `lead` has nothing to
   scroll past. `facts` is the hours and the way in, side by side.
2. **The width decides what fits.** A 22rem column takes nothing wide: no catalogue grid, no
   features, no table, no gallery. The bar takes only navigation. No column ever takes `modal`,
   `drawer`, `dropdown`, `command-palette`, `notification` or `placeholder`.
3. **A side column stays short**: the hours and the map, or the hours and a line of address.
   Anything longer belongs in `main`, or the opening stops fitting on one screen.
4. **A column holds only what the page has.** It gets only the page's own prefabs, and one family
   appears once per page, so a column never repeats what `main` already holds.
5. **No admin controls in a public column.** `console` is the admin's layout.
6. **Every column declares its collapse.** Say which column comes first on a phone, and drop the
   sticky there.

A failure is fixed where it comes from. Scope the direction's rule, or move the component to a
region whose sentence and width fit it. Never add a class or a wrapper to the page to squeeze
something in: that is the direction's job, and the next direction cannot undo it.

## Check

Run these from this repository's root. Point `STUBS` at the worker template's `stubs/layouts`, or
at a site's own stubs, since a site keeps the stubs it was made with.

```bash
STUBS=~/PhpstormProjects/<site>/stubs/layouts

# 1. Bare fr tracks. Any output fails.
grep -ohE 'grid-cols-\[[^]]*\]' "$STUBS"/*.blade.php | sed -E 's/minmax\(0,_?[0-9.]+fr\)//g' | grep fr
grep -n 'grid-template-columns' resources/css/kit.css | sed -E 's/minmax\(0, ?[0-9.]+fr\)//g' | grep fr

# 2. Bleeds and wide grids, one line each with its selector. Every selector must be a
#    full-width frame, or a component that only lives in one (box rules 4 and 5).
awk '/\{[ \t]*$/ && !/^[ \t]*@/ {sel=$0; sub(/^[ \t]+/,"",sel); sub(/[ \t]*\{[ \t]*$/,"",sel)}
     /100vmax|100vw|margin-inline: *-|repeat\(([3-9]|1[0-9])/ && !/^[ \t]*\*/ {print NR": "sel}' resources/css/kit.css

# 3. Bare sticky. Any output fails.
grep -nE '(^|[" ])sticky' "$STUBS"/*.blade.php
```

For each hit in check 2, list the directions whose `## Layouts` name each layout that has a
column, and ask whether the component can land in that column. Then look at the page at 375px,
768px (where `board` is two across) and 1280px, in every direction the layout is drawn in. The
greps only find the rules. Whether something runs under its neighbour is something you see.
