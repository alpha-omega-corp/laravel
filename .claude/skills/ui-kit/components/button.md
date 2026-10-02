# button

The kit's button: a link when it has an href and a button when it does not, in four variants and five sizes drawn from the palette's own tokens.

## Placement

- focus.main — fits: directly under the fields it sends, the task's one primary action at the end of the column
- workspace.detail — fits: under the text it sends, at the foot of the chosen item
- * — never: a button belongs to what it acts on, a form, a hero's links or the band's, and never stands on its own in a region

## Limits

- per-page — 2 (hicks-law)

## Behaviour

- Its variant is primary unless it is given another, so every button but the one action a screen asks for is given secondary, soft or ghost: one primary per screen. (von-restorff-effect, hicks-law)
- Its label is a verb of the task in the site's language, at most 24 characters and never wrapped, such as Réserver or Envoyer, and never “click here” or “en savoir plus”. (paradox-of-the-active-user, cognitive-load)
- No button on a public page is xs, which can fall under the 24px every target needs, and the page's main action is lg or xl. (fittss-law)
- A form's button is given type="submit", since it is type="button" unless told and sends nothing, and it comes directly after the last field, inside the form it sends. (flow, fittss-law, law-of-proximity)
- A button that is only an icon carries its own aria-label, since the icon inside it is hidden from screen readers. (postels-law)
- A submit that makes the visitor wait is disabled while it runs, so the visitor sees it working and a second click sends nothing twice. (doherty-threshold)
- An action is always this or the kit's .btn classes, never a link or a div styled to look like one: one look for one meaning across the site. (law-of-similarity)
