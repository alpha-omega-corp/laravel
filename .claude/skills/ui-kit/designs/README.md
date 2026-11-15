# What a design is, and what it has to define

A business says what its site cannot do without, a direction how it looks, a palette what colours
and faces, a layout how a page is arranged — and a roll draws one of each. A **design** is one such
draw written down on purpose: for one kind of business, one direction, one palette, a layout for
every page and the arrangements its prefabs take, with the sentence that says *why this one, for
whom*. A business has several, because the same bakery is a bright counter for the one that sells
lunch and a calm studio for the one that sells wedding cakes.

They are worked examples, not a list of what is allowed. What is allowed is still the business's
`## Directions`, the direction's `## Palettes` and `## Layouts`, and the page's own layouts; a
design is one point in that space that somebody looked at and judged right. A session that builds a
site reads the designs of its business first and starts from the one nearest the brief, rather than
from a blank roll: the reason under each is what tells it which brief it answers.

**The framework tab draws every one of them.** The showcase's business views
(`workbench/app/Framework`) read these files and nothing else, so a design here is a page there —
every page of the business, in that design, with the regions it fills and the files it read — and
`tests/Feature/DesignsTest.php` refuses a design the skill itself would refuse.

## The file format

`designs/<business>.md`, named after a file in `../businesses/`.

- `# <business>` then **one paragraph**: what the designs of this business differ by. It ends at
  the first blank line.
- `## <Name>` — one section per design, at least three, the name a word or a few as a person would
  say it ("Salle du soir", "Chantier"). Then, in any order:
  - **one paragraph** — why: what kind of this business the design is for and what its first
    screen leads with. Never hard-wrapped into a list; it ends at the first blank line.
  - `- direction — <name>` — one of the business's `## Directions`. Every direction the business
    lists is some design's.
  - `- palette — <name>` — one the direction takes, whatever its verdict.
  - `- scheme — <light|dark>` — only when the design must pin one; left out, it is the visitor's.
    Never on a direction that pins its own.
  - `- <path> — <layout>` — one line for **every** page of the business's `## Pages`: a layout
    the page lists that the direction is drawn in too.
  - `- <component> — <arrangement>` — the arrangement a prefab of the business, or one of the
    frame's three (`site-header`, `hero`, `site-footer`), takes: a word that component accepts.
    A component with no line is drawn as the direction draws it.

No two designs of one business choose the same direction, palette and layouts: two that differ
only by a name are one design.

## Writing one

1. Read the business's file, then each direction it lists and the palettes that direction rates.
2. Decide who the design is for before choosing anything: the answer is its paragraph, and every
   line under it should follow from that sentence.
3. Give each page the layout that leads with what that visitor came for — the list in `carte`, the
   opening beside the hours in `split`, the work on a `board` — and an arrangement only where the
   direction's own is not the one.
4. Look at it: the framework tab's contact sheet (`/framework/sheet?business=<name>`) lays every
   page of every design out side by side.
5. `vendor/bin/pest tests/Feature/DesignsTest.php`.
