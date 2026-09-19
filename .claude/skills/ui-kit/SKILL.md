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

Resolve references with `App\Support\UiKit`:

```php
use App\Support\UiKit;

UiKit::resolve('::card');   // ['match' => null, 'candidates' => [...]]
UiKit::tree();              // category => group => count
UiKit::search('sign in');   // matching components
UiKit::markup($component);  // the raw Blade
```

To look one up from the shell:

```bash
php artisan tinker --execute 'print_r(App\Support\UiKit::resolve("::card")["candidates"]);'
```

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
itself with its own tokens and three `[data-variant]` palettes, and uses no `dark:` variants at
all. Dropping kit classes in unchanged breaks the fresh / calm / bold themes.

| kit class | use instead |
| --- | --- |
| `bg-white`, `bg-gray-50` | `bg-canvas`, `bg-canvas-alt` |
| `text-gray-900` | `text-ink` |
| `text-gray-500`, `text-gray-600` | `text-ink-soft` |
| `bg-indigo-600`, `text-indigo-600` | `bg-accent`, `text-accent` |
| `text-white` on indigo | `text-on-accent` |
| `ring-gray-200`, `border-gray-200`, `divide-gray-200` | `border-rule`, `divide-rule` |
| `rounded-lg` | `rounded-panel` (0 in calm and bold by design) |
| any `dark:*` | delete — `[data-variant]` already themes the page |

Other projects have their own tokens. Re-theme to the host project, never assume indigo.

## Using the kit from another project

The kit is exposed over MCP by `app/Mcp/Servers/UiKitServer.php`, registered in `routes/ai.php`
as the local server `uikit`. Register it once in any other project:

```bash
claude mcp add uikit -- php /home/nanstis/PhpstormProjects/cleaner/artisan mcp:start uikit
```

It exposes three read-only tools: `list-ui-components`, `search-ui-components` and
`get-ui-component`. Outside Laravel the returned markup is plain Tailwind HTML, so the Blade tag
does not apply — copy the markup instead.

Do not run `php artisan mcp:start uikit` by hand to test it; it blocks waiting on stdio. Use
`php artisan mcp:inspector uikit`, or the tests in `tests/Feature/UiKitTest.php`.

## Licensing

This markup is Tailwind Plus. It may be used in your own and client projects, but the kit must
not be redistributed or published as a component library.
