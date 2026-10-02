# textarea

A labelled field for what takes sentences, such as a message, a note or a reply, its height the length that is expected.

## Placement

- workspace.detail — fits: the reply under the chosen item, its button straight after it
- focus.main — fits: one field of the step, as wide as the 36rem column
- * — never: a field of a form goes inside its form-layout, and on a site page main sets each of its components a section apart

## Behaviour

- It is for sentences only: a name, a date or a number is an input, which carries a type and an autocomplete the browser can fill. (parkinsons-law)
- Its rows are the length expected, 4 by default and at most 6 on a public form, since a larger box asks for more than the task needs. (parkinsons-law)
- It always has a label saying what to write, and a hint for what helps, such as the date and the number of guests; a placeholder never stands in for either. (paradox-of-the-active-user)
- A maxlength is the server's own, 2000 characters for the base's contact message, so nothing typed is refused after it is sent. (postels-law)
- It draws no error of its own: a refused message is named in the form's alert, above the fields. (flow)
