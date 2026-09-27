# What a business type has to define

A business type is the kind of place a site is for — a restaurant, a farm, a
shop — and what it answers is *which prefabs the site cannot do without*. A
prefab is a kit component many kinds of business share: a farm and a restaurant
both have opening hours, a salon's price list is a menu like a restaurant's, and
nearly everybody somebody walks into needs a map.

Deployer's Design tab offers these as a dropdown. The roll takes one of the
business's directions — how its site looks — then a palette that direction
takes, then one of the layouts the direction is drawn in, and hands the prefabs
to `/create`, which places them in the mockup — where the layout's recipe names
them, or in main. They are kit components, so they
read the palette's tokens and take whatever theme and direction were rolled with
no re-theming.

## The file format

- `# <name>` then **one paragraph**, which is the summary every screen shows. It
  ends at the first blank line.
- `## Prefabs` — one `- <kit component> — <why>` per line, in the order a
  visitor meets them. Only names in `resources/views/components/kit` count:
  `schedule`, `menu`, `map`, `catalogue`, or any other kit component.
- `## Directions` — one `- <direction> — <why>` per line, in order of
  preference: the looks this kind of site may be drawn in, each a file in
  `../directions/`. A roll takes one of them and never one outside the list, and
  **the layouts come from the direction**: a restaurant drawn in hearth may be a
  long page, a journal, a poster or a split, and a roll picks one. Optional.
- `## Layout` — one backticked layout name, the one the site is built in.
  Deployer reads it only when `## Directions` is absent, or when none of the
  listed directions can be drawn in the application — a site whose `kit.css` is
  older than them. It stays beside `## Directions` for that reason, and because
  a deployer built before directions reads this line alone. Optional; without
  either the roll picks a layout the theme rates, as it always has.

Adding a business type is a file here. Adding a direction to one is a line
under its `## Directions`, naming a file in `../directions/`. Adding a prefab is
a kit component, its entry in the worker template's `resources/components.php`,
and its drawing in deployer's `pkg/uikit/parts.go` — the mockup draws a name it
does not know as a grey box.
