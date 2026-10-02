# combobox

A labelled field that suggests answers from a list as one types, such as a dish, a service or a customer, and is a plain text field where the browser shows no list.

## Placement

- focus.main — fits: one field of the step, as wide as the 36rem column
- workspace.list — fits: the search above the list, suggesting as one types, as wide as the 20rem column
- console.main — fits: the search above the table or the list it narrows
- * — never: a field of a form goes inside its form-layout, and on a site page main sets each of its components a section apart

## Behaviour

- It suggests and never restricts: whatever is typed is sent, so an answer that must be one of the options, such as a public form's choice of service, is a select, and the server checks it either way. (postels-law)
- It turns the browser's autofill off, so it is never a personal field: a name, an address or a country the browser already knows is an input or a select with its autocomplete. (parkinsons-law)
- It always has a label, and its placeholder is an example of an answer, never the question. (paradox-of-the-active-user)
- Its options are the answers given most, the most common first, since a phone shows only the first few matches above its keyboard. (serial-position-effect, hicks-law)
