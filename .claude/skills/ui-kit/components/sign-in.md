# sign-in

The sign-in form: a title, then the fields and the button that signs in, on a card of its own or straight on the page.

## Placement

- focus.main — fits: the step itself, 24rem wide and centred in the 36rem column
- * — never: a site's visitors never sign in, and the admin's door is the footer's link to /admin, whose sign-in the base draws

## Limits

- title — 48 characters (law-of-pragnanz)
- per-page — 1 (cognitive-load)

## Behaviour

- Its action is the route that signs in, and its slot opens with @csrf; left at its default of # it posts the password back to the page itself. (flow)
- Its fields are the email, type="email" with autocomplete="username", and the password with autocomplete="current-password", so the browser and a password manager fill both. (parkinsons-law)
- Its button is an x-kit.button with type="submit", the last thing and the page's one primary; a forgotten password is a link beside it, never a second button. (von-restorff-effect, fittss-law)
- It is always given a title, since an empty one still writes an empty h2 into the page. (chunking)
- Signing in is one step, so its focus page shows no progress. (goal-gradient-effect)
- A refusal says in an alert above the fields that the email and the password do not match, and keeps the email as typed. (flow, postels-law)
