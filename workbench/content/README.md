# The demo content of the framework tab's business views

One file per kind of business, `<business>.php`, named after a file in
`.claude/skills/ui-kit/businesses/`. The skill says what a site of that kind is made of — its pages,
the prefabs each page holds, the looks it may take; `.claude/skills/ui-kit/designs/<business>.md`
settles a few designs; and the file here is a fictional business of that kind to draw them with: its
name and address, the rows its owner would keep in the admin, and the words of each page.
`Workbench\App\Framework\Site` puts the three together, and `tests/Feature/FrameworkSitesTest.php`
holds a file to the shape below.

French, and fictional: an invented Swiss business with an `.example` e-mail address and a
`0xx 000 00 00` phone number. Invented content is not chrome, so it is not translated. Write it the
way the kit's own rules ask a real site to be written (`components/<name>.md`, `## Behaviour`):
sentences a business would say, figures a business would know, no filler and no "lorem".

## The shape

```php
return [
    'site' => [
        'brand' => 'Monnier Construction',          // the name in the header and the footer
        'blurb' => '…',                             // one line under the name in the footer
        'address' => 'Route de l’Industrie 14, 1030 Bussigny',
        'phone' => '021 000 00 00',
        'email' => 'info@monnier-construction.example',
        'status' => 'Chantiers ouverts à la visite', // optional: the header's line above the bar
        'note' => '© Monnier Construction SA',       // the footer's small print
        'action' => ['label' => 'Demander un devis', 'to' => '/quote'], // the header's one action: a page of the business
        'band' => [ … ],                             // optional: the closing band of every page that has none of its own
    ],

    // What the site would bind as `kit.<name>`: one entry for EVERY prefab the business lists, keyed
    // by the component's own prop names (the docblock at the top of its Blade file gives the shape).
    'prefabs' => [
        'projects' => ['title' => 'Nos chantiers', 'projects' => [ … ]],
        'map' => ['address' => '…', 'title' => '…'],
    ],

    // The words of each page, keyed by its path in the business's `## Pages`. Every page has an entry.
    'pages' => [
        '/' => [
            'hero' => [ … ],        // required: the page's opening
            'features' => [ … ],    // optional: the page's own blocks
            'story' => [ … ],       // optional: a section of prose
            'band' => [ … ],        // optional: this page's closing band, instead of the site's
        ],
        '/projects' => [
            'label' => 'Chantiers', // required when the business gives the page a label: its item in the navigation, in French
            'hero' => [ … ],
        ],
    ],
];
```

A link is `['label' => '…', 'to' => '/quote']`, where `to` is the path of a page of the business,
or `['label' => '…', 'href' => 'tel:+41210000000']` for anything else. `to` is checked: it must be a
page the business has. The same holds inside a prefab's rows: a plan, a project, a service or a
course written with `'to' => '/contact'` is given the `href` its component reads, so a plan's button
leads to the page that takes the request.

| Block | Keys |
|---|---|
| `hero` | `eyebrow`, `title` (required), `lead`, `subject` (what the photograph owed shows, in words: there are no photographs here, and the frame is captioned with it), `note`, `links` (the first is the page's main action), `facts` (`[{value, label}]`, three at most) |
| `features` | `eyebrow`, `title`, `lead`, `items`: `[{title, body, subject, to?, label?, icon?}]`, three to six. Every item has a `subject`: the kit frames a photograph for each block, icon or not, and a frame with no caption is an empty box. `label` names what the link opens; `icon` is a Lucide name |
| `story` | `eyebrow`, `title`, `lead`, `body`: a list of paragraphs |
| `band` | `eyebrow`, `title`, `lead`, `links`, `details`: `[{label, value, href?}]` |

**There are no photographs.** A hero and a feature item say what theirs would show in `subject`, and
the kit frames it; a project, a listing, a product or a person with no `image` keeps the frame its
component draws. Where a component takes an address and nothing else — the gallery's pictures — write
`'image' => 'picture:La salle dressée pour un mariage'`: it becomes the address of the same frame as
an image, captioned with those words (`Workbench\App\Framework\Picture`). Give it `width` and
`height` (1200 by 900 is what the frame is drawn at) and an `alt`.

## Where each block goes

The layout's own recipe decides (`layouts/<name>.md`), and a design chooses the layout, so a page's
words are written once and drawn in whichever layout a design gives it:

- `hero` opens the page. Where the layout opens on a heading instead (carte's lead, a board on any
  page but home), its `eyebrow`, `title` and `lead` are that heading.
- The page's prefabs stand in `main` in the order its `## Pages` line names them, each only where
  its own rules let it (`components/<name>.md`, `## Placement`). Two exceptions: the side column,
  where the layout has one (split, carte, poster), takes the hours and the map, then whatever else
  of the page its rules place there — a business with no hours to give puts its credentials beside
  the opening — and carte's `offer` takes the list the page is for.
- `features` follows the prefabs, and leads them on home in marketing and on a board; on any other
  page of a board the first, large tile is what the page is for. In journal `features` is the one
  band of pictures across the page.
- `story` closes `main`, and in journal it is the story's column above the pictures. Give one to
  every page a design may draw in journal.
- `band` is the closing band where the layout has one (marketing, carte) and the last tile of a
  board.

So write `hero` for every page, `features` for home and wherever a page has something of its own to
show, and `story` wherever a design draws the page in journal or the page would otherwise be one
prefab alone.
