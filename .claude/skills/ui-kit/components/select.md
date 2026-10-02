# select

A labelled native select: one answer from a list the visitor already knows, such as a country, a time or a number of guests, chosen in the phone's own picker.

## Placement

- focus.main — fits: one field of the step, as wide as the 36rem column
- workspace.list — fits: the filter above the list, as wide as the 20rem column, which has no padding of its own
- console.main — fits: the filter above the table or the list it narrows
- * — never: a field of a form goes inside its form-layout, and on a site page main sets each of its components a section apart

## Behaviour

- It always has a label, and it is for one answer out of a list known by heart; a few answers to weigh against each other are a radio-group, all in view at once. (hicks-law, mental-model)
- Its selected option is the usual answer when there is one, such as two guests or today, so the common case costs nothing, and never a paid extra. (parkinsons-law, cognitive-bias)
- Every attribute but class and style is the field's: autocomplete="country", required and wire:model go on the tag, where the browser and the form see them. (parkinsons-law)
- Its options come in the order they are looked for: times and sizes in their own order, names alphabetically. (mental-model)
