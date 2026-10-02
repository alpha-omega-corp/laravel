# checkbox

One yes or no a visitor ticks, such as a consent, an extra or an option, with its label beside the box and a hint under it.

## Placement

- focus.main — fits: one choice of the step, just above its button
- * — never: a checkbox is a field of a form and goes inside its form-layout or its sign-in

## Behaviour

- It is never ticked in advance on a public form: a consent, a newsletter or a paid extra is the visitor's choice, never the page's. (cognitive-bias)
- Its label is always given and says what ticking it means, such as Send me the menu each week, since the box has no other name. (paradox-of-the-active-user)
- Each box has a name of its own, which is also its id: its label is the larger target, and boxes sharing a name share an id, so every label ticks the first. (fittss-law)
- A disabled box says why in its hint, such as Not available on Sundays, since a greyed choice explains nothing. (paradox-of-the-active-user)
- Its attributes land on its wrapper and not on the box, so a consent that must be ticked is refused by the server's accepted rule, and the refusal is said in the form's alert. (flow)
