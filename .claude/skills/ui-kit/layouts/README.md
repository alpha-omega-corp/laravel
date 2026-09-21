# What a layout has to define

A layout is a composition: which shell, which regions, which component sits in
each. It answers *how it is arranged*, where a theme answers *what it looks
like*. The two are chosen independently.

Every layout works with every theme — nothing here refuses a combination. Which
ones are worth steering towards is written on the **theme** side, in each
theme's `## Pairs with`, so the matrix lives in one place.

## The file format

- `# <name>` then **one paragraph**, which is the summary every screen shows. It
  ends at the first blank line.
- `## Shell` — one backticked kit reference or glob, the application shell this
  layout is built from. `application-shells/sidebar/*`, `navigation/navbars/*`.
- `## Suits` — what it is for, in a few words.

Adding a layout is a file here plus a row in every theme's `## Pairs with`; a
layout no theme mentions is one a roll can still pick but nothing recommends.
