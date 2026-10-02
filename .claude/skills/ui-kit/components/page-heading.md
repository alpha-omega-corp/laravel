# page-heading

An app screen's title strip: the name of the screen, a few facts about what it shows, and its actions at the right, with the trail above the title on a screen two levels deep.

## Placement

- console.header — first: the strip right of the 18rem sidebar, under its own rule; its actions drop under the title below md
- stacked.header — first: the tinted band under the navbar
- focus.header — fits: under the progress, which opens the step, in the 36rem column
- workspace.detail — first: the chosen item's title, above its facts
- * — never: a screen has one title strip, and a site page opens on its hero, or on a section at level 1 where its layout has none

## Limits

- title — 48 characters (law-of-pragnanz)
- meta — 4 (working-memory, chunking)
- actions — 2 (hicks-law)
- per-page — 1 (chunking)

## Behaviour

- It is the screen's one title and names it in the words of the item that leads there, so the operator sees where they are. (working-memory, mental-model)
- Its actions act on what the whole screen shows, the one primary last at the far right and any other a secondary button. (von-restorff-effect, serial-position-effect)
- Its meta are facts about what the screen shows, a count, a date or a status of a few words each, never a sentence. (chunking, cognitive-load)
- Its breadcrumb slot holds a breadcrumb only on a screen two levels deep or more, where it sits above the title. (working-memory, jakobs-law)
- In focus it names the step being done in the task's own words, under the progress that says how far along it is. (goal-gradient-effect, mental-model)
