# What a business type has to define

A business type is the kind of place a site is for — a restaurant, a farm, a
shop — and what it answers is *which prefabs the site cannot do without*. A
prefab is a kit component many kinds of business share: a farm and a restaurant
both have opening hours, a salon's price list is a menu like a restaurant's, and
nearly everybody somebody walks into needs a map.

Deployer's Design tab offers these as a dropdown. The roll keeps the theme and
the layout it would have picked, fixes the layout to the one named here, and
hands the prefabs to `/create`, which places them in the mockup. They are kit
components, so they read the palette's tokens and take whatever theme was rolled
with no re-theming.

## The file format

- `# <name>` then **one paragraph**, which is the summary every screen shows. It
  ends at the first blank line.
- `## Prefabs` — one `- <kit component> — <why>` per line, in the order a
  visitor meets them. Only names in `resources/views/components/kit` count:
  `schedule`, `menu`, `map`, `catalogue`, or any other kit component.
- `## Layout` — one backticked layout name, the one the site is built in.
  Optional; without it the roll picks one the theme rates, as it always has.

Adding a business type is a file here. Adding a prefab is a kit component, its
entry in the worker template's `resources/components.php`, and its drawing in
deployer's `pkg/uikit/parts.go` — the mockup draws a name it does not know as a
grey box.
