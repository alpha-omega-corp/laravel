# input

A labelled text field, for a name, an email, a phone or a search, with its hint or its error under it and a unit or a prefix beside the value.

## Placement

- focus.main — fits: one field of the step, as wide as the 36rem column and 1.5rem from the next
- workspace.list — fits: the search above the list, as wide as the 20rem column, which has no padding of its own
- console.main — fits: the search or the filter above the table or the list it narrows
- * — never: a field of a form goes inside its form-layout or its sign-in, and on a site page main sets each of its components a section apart

## Behaviour

- It always has a label, or an aria-label for a search whose icon says what it is; a placeholder is an example of an answer, never the label, and it is gone as soon as one types. (paradox-of-the-active-user)
- A personal field says what it is so the browser can fill it: autocomplete="name", type="email" with autocomplete="email", type="tel" with autocomplete="tel", and autocomplete="street-address"; every attribute but class and style reaches the field. (parkinsons-law)
- A name or a phone takes whatever is typed: no pattern, and no maxlength shorter than the server's, so a phone in any spacing is accepted. (postels-law)
- An error says in words what would be accepted, under the field and not by the border's colour alone: error draws both and marks the field aria-invalid. (postels-law, von-restorff-effect)
- The hint is the help, beside the field that needs it and nowhere else: no instructions above the form and no tooltip. (paradox-of-the-active-user)
- Its id is its name unless one is given, so two fields of one name on one page, such as the footer's email and a form's, each take an id of their own, or the second label focuses the first field. (fittss-law)
