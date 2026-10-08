# theme-picker

Light, dark or as the device has it, as a menu in the header beside the language one and drawn like it: the current choice's icon on the button, the three choices in the list, applied at once by the site's script and kept in a plain `theme` cookie for the next pages.

## Placement

- * — never: the site-header draws it by itself, before the language menu, when its tag asks for it and the site binds `kit.theme-picker`; a page never places it

## Limits

- per-page — 1 (jakobs-law)

## Behaviour

- It is the site's choice, made once on deployer's mockup before the site exists and written on every page's header, so a site offers it on every page or on none. (jakobs-law, occams-razor)
- It sits at the right of the header on every page, beside the language menu, where visitors look for settings, and nowhere else on the page. (jakobs-law, law-of-common-region)
- Until a visitor picks, the device's scheme decides, and Automatic hands the choice back to it, so nobody is moved off the scheme they set for everything else. (mental-model, teslers-law)
- The button shows the icon of the choice in force, a sun, a moon or a screen, so the visitor sees what it does before opening it. (mental-model, cognitive-load)
- A choice applies the moment it is made, with no reload, and holds on every page after. (flow, doherty-threshold)
- A direction that pins the scheme hides it, so no page offers a control that does nothing. (occams-razor, teslers-law)
