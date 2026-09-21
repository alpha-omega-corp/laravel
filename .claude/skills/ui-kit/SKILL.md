---
name: ui-kit
description: The shared Tailwind UI kit generated from /html — 364 Blade components addressed as `::reference`. Invoke whenever a message contains a `::` component reference (`::card`, `::layout/cards/01-basic-card`), when asked to add, find or list a UI component, build a page from the kit, or wire the kit into another project over MCP. Covers reference resolution, the Blade tag form, and the token re-theming required before kit markup goes into this app.
metadata:
    origin: project
---

# Shared UI kit

364 components generated verbatim from the Tailwind Plus markup in `html/`. Each source file
became one anonymous Blade component; the names were kept exactly.

| source | component | Blade tag |
| --- | --- | --- |
| `html/layout/cards/01-basic-card.html` | `resources/views/components/ui/layout/cards/01-basic-card.blade.php` | `<x-ui.layout.cards.01-basic-card />` |

## The `::` reference

A reference is `category/group/name`. Write it with a leading `::`.

- `::layout/cards/01-basic-card` — exact, resolves to one component.
- `::08-well` — a name that happens to be unique, resolves to one component.
- `::card` — a family or partial name. **Does not** resolve to a single component; it returns
  candidates. Names are not unique once flattened: 6 collide exactly, 17 more after the `NN-`
  prefix is stripped. Never guess — show the candidates and let the user pick.

Resolve references with the `uikit` MCP server's three tools:

```
mcp__uikit__list-ui-components     browse: categories and groups, or one category's components
mcp__uikit__search-ui-components   find by keyword — "card", "sign in", "pagination"
mcp__uikit__get-ui-component       read one, by reference or by the shorthand above
mcp__uikit__roll-ui-design         a starting point: a theme, a layout, and parts
mcp__uikit__get-ui-feature         a whole wired piece of a site, files and all
```

The first three answer *where is the thing I already have in mind*. The fourth answers the
other question, and it is the harder one: asked to choose from three hundred and sixty-four
components, anybody — person or model — reaches for the one they used last or the first entry
of the first listing, and everything built from the kit comes out the same. `roll-ui-design`
picks a theme, a layout that theme's own spec rates `best` or `good`, and one component per
group so the result is a screen rather than five buttons. Roll again for a different answer;
it is the one tool here that is meant to give one.

Deployer draws the same thing on its **Design** tab, where the pairings are a graph rather
than the table below and a roll lights the route it took.

`get-ui-feature` is for the things in here that are not a component. The **theme picker** is
one: a Blade component, two enums, the stylesheet holding every palette, the script that
remembers the choice, a file of strings, and four edits to the shell — and it ships in every
new site, so a generated project has it before anybody asks. Call it with no arguments to see
what there is; call it with a name to get every file, its contents, and the wiring. Never
assemble one of these out of single components: what gets left out is the half that makes it
work.

The kit **used to live in this application** as `App\Support\UiKit` and a Laravel MCP server
under `app/Mcp`. It was never really a Laravel thing — it walks a directory of Blade files and
answers questions about them — so reaching it meant booting a framework, and every project that
wanted it needed a PHP runtime and a checkout of this one. It is now served by deployer, which is
a single binary. The components themselves have not moved: they are still generated here, under
`resources/views/components/ui`, and deployer is pointed at that directory.

To look one up from the shell, with no MCP client in the way:

```bash
# Wherever Deployer is checked out on *this* machine — the path below is not
# a constant, and a pasted one is the commonest reason this returns nothing.
DEPLOYER=$(git -C ~/GolandProjects/deployer rev-parse --show-toplevel)

printf '{"jsonrpc":"2.0","id":1,"method":"tools/call","params":{"name":"get-ui-component","arguments":{"reference":"::card"}}}\n' \
  | "$DEPLOYER/build/bin/deployer-mcp" -server uikit
```

If that binary is not there, `make mcp ARGS="-server uikit"` runs the same
surface from source, and an installed Deployer serves it as
`deployer --serve-mcp=uikit` — the installers ship the app and not
`cmd/mcp`.

The full list is in `references/index.md` — grep it rather than reading it whole.

## Categories

| category | components | groups |
| --- | --- | --- |
| `application-shells` | 23 | multi-column, sidebar, stacked |
| `data-display` | 19 | calendars, description-lists, stats |
| `elements` | 45 | avatars, badges, button-groups, buttons, dropdowns |
| `feedback` | 12 | alerts, empty-states |
| `forms` | 74 | action-panels, checkboxes, comboboxes, form-layouts, input-groups, radio-groups, select-menus, sign-in-forms, textareas, toggles |
| `headings` | 25 | card-headings, page-headings, section-headings |
| `layout` | 38 | cards, containers, dividers, list-containers, media-objects |
| `lists` | 44 | feeds, grid-lists, stacked-lists, tables |
| `navigation` | 54 | breadcrumbs, command-palettes, navbars, pagination, progress-bars, sidebar-navigation, tabs, vertical-navigation |
| `overlays` | 24 | drawers, modal-dialogs, notifications |
| `page-examples` | 6 | detail-screens, home-screens, settings-screens |

## Slots

45 components had a `<!-- Content goes here -->` or `<!-- Your content -->` placeholder; that
line is now `{{ $slot }}`. Everything else is verbatim, including explanatory comments such as
`<!-- Current: "…", Default: "…" -->`, which describe the classes to swap for active state.

```blade
<x-ui.layout.cards.01-basic-card>
    <p>Anything here lands in the card body.</p>
</x-ui.layout.cards.01-basic-card>
```

Components without a slot render fixed demo markup — edit it after inserting.

## Re-theme before using kit markup in this app

Kit markup carries Tailwind's default palette and `dark:` variants. This application themes
itself with its own tokens and seven `[data-theme]` blocks in `resources/css/themes.css` —
orchard, sandstone, harbour, graphite, blossom, fresh and vellum — switched at runtime from the
picker in the navigation bar, and it uses no `dark:` variants at all. Dropping kit classes in
unchanged breaks every one of them at once.

| kit class | use instead |
| --- | --- |
| `bg-white`, `bg-gray-50` | `bg-canvas`, `bg-canvas-alt` (`bg-raise` for a panel) |
| `text-gray-900` | `text-ink` |
| `text-gray-500`, `text-gray-600` | `text-ink-soft` |
| `bg-indigo-600`, `text-indigo-600` | `bg-accent`, `text-accent` |
| `text-white` on indigo | `text-on-accent` |
| `ring-gray-200`, `border-gray-200`, `divide-gray-200` | `border-rule`, `divide-rule` |
| `rounded-lg` on a panel | `rounded-panel` (0 in vellum, 1.5rem in blossom, by design) |
| `rounded-md` on a control | `rounded-control` — a pill in blossom, square in vellum |
| a whole button | `<x-kit.button>`, never the kit's classes — see `/ui-kit/buttons` |
| any `dark:*` | delete — the token block is the dark mode |

Other projects have their own tokens. Re-theme to the host project, never assume indigo.

## Using the kit from another project

The kit is served by **deployer**, which is one binary serving several MCP servers — `deployer`
for the deploy pipeline and `uikit` for this library, chosen by argument. Register it once in any
other project:

```bash
# Point it at the binary this machine actually has: the built MCP server,
# or the installed app, which serves the same surface under a flag.
claude mcp add uikit -- "$DEPLOYER/build/bin/deployer-mcp" -server uikit
# or:
claude mcp add uikit -- deployer --serve-mcp=uikit
```

Nothing to install and no PHP involved: it is the same binary that deploys, and a project that
already has the `deployer` server configured reaches this one the same way.

It exposes three read-only tools: `list-ui-components`, `search-ui-components` and
`get-ui-component`. Outside Laravel the returned markup is plain Tailwind HTML, so the Blade tag
does not apply — copy the markup instead.

Which directory it reads is `claude.uikit` in deployer's settings file, pointed at this project's
`resources/views/components/ui`. If the tools answer "No UI kit is configured", that key is what
is missing. The behaviour is covered by `pkg/uikit` in the deployer repository; there is no PHP
side left to test.

## Licensing

This markup is Tailwind Plus. It may be used in your own and client projects, but the kit must
not be redistributed or published as a component library.
