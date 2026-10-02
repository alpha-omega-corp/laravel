# What a business type has to define

A business type is the kind of place a site is for — a restaurant, a farm, a
shop — and what it answers is *which prefabs the site cannot do without*. A
prefab is a kit component many kinds of business share: a farm and a restaurant
both have opening hours, a salon's price list is a menu like a restaurant's,
nearly everybody somebody walks into needs a map, and a salon, a practice and
a hotel all take a request for a day and a time.

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
  `schedule`, `menu`, `map`, `catalogue`, `gallery`, `team`, `events`, `faq`,
  `booking`, or any other kit component.
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
- `## Pages` — the pages a site of this kind has, one line per page in the
  order of its navigation, home first, five at most:
  `- <path> — <role>: <layout> | <layout>…[; <prefab>, <prefab>…][ — <label>]`,
  never hard-wrapped.
  - `<path>` is `/` or lowercase words joined by hyphens — `/menu`,
    `/the-house` — with no trailing slash. `<role>` is the page's job: `home`,
    `offer`, `story`, `visit`, `book`, `team`, `gallery`, `agenda`, `faq`, or
    any other word.
  - The layouts are the site layouts the page may be drawn in. A site is
    drawn in one direction, so a page names at least one layout of every
    direction under `## Directions`, and the factory picks among those the
    site's direction is drawn in.
  - The prefabs are the business's own, placed on that page and nowhere the
    line does not name them. A list — `menu`, `catalogue`, `gallery`, `team`,
    `events`, `faq` — and the `booking` form each sit on exactly one page,
    which home links to rather than repeats, and every prefab sits on some
    page; the hours and the map may sit on two, home and the visit.
  - `<label>` is the page's item in the site header, a word or two. A page
    without one is left out of the navigation: home, which the brand leads
    to, or a page the header's action leads to from every page. A page
    nothing links to is one `check_site` fails.

  Paths and labels are English defaults: deployer's `plan-ui-site` proposes
  this set and takes the site's own words from the brief when it has them,
  and a site's pages, once it has them, are its `resources/pages.json`. Each
  set follows a site built by hand for that kind of business before the kit:
  a restaurant's menu, its house and the way to book; a salon's services, its
  team, its work and an appointment; a farm's stall, its market days and its
  story; a shop's goods, where they come from, and ordering ahead. The types
  added after them — bakery, cafe, butcher, florist, winery, trades, hotel,
  practice, fitness — follow the same shapes. The laws they answer are in `../laws.md`.

Adding a business type is a file here. Adding a direction to one is a line
under its `## Directions`, naming a file in `../directions/`. Adding a prefab is
a kit component, its entry in the worker template's `resources/components.php`,
and its drawing in deployer's `pkg/uikit/parts.go` — the mockup draws a name it
does not know as a grey box.
