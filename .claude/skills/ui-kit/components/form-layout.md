# form-layout

The frame of a form: its title and what it is for, its fields one or two across, and its actions at the foot, all on one panel.

## Placement

- marketing.main — fits: a section of its own across main's width; its fields two across from sm and one on a phone
- split.main — fits: a section of its own under the opening; its fields two across from sm and one on a phone
- carte.main — fits: under the offer, for the booking or the order the band asks for; its fields two across from sm and one on a phone
- poster.main — fits: below the fold, the page's one quiet task; its fields two across from sm and one on a phone
- journal.main — fits: in the 48rem column; its fields two across from sm and one on a phone
- journal.story — never: the story's opening is prose, and the form comes after it in journal's main
- console.main — fits: one panel of the admin's column, under the data it edits
- workspace.detail — fits: the chosen item's own form, across the rest of the width
- focus.main — fits: the step's task in the 36rem column; two across only for fields that pair
- board.main — never: a tile is one glance among many and a form is a task; the tile links to the page that holds it
- stacked.main — never: a card of a dashboard is read at a glance; the form it leads to is a screen of its own
- *.band — never: the band is the cta-band's close, which links to the page that holds the form
- * — never: a form is a section of main or a step of focus; the bar, the opening, a side column, the offer, the gallery and the footer each have a job of their own

## Limits

- title — 48 characters (law-of-pragnanz)
- actions — 2 (hicks-law)

## Behaviour

- It draws no form of its own: the page wraps it in a form that posts with @csrf, and the base's contact form posts to its leads.store route and comes back to #contact, so that id is on the form. (flow)
- A public form shows at most five fields and asks only what the reply needs: the base's contact form needs a name and an email or a phone, beside the message. (parkinsons-law, occams-razor)
- Its submit is an x-kit.button with type="submit" in its actions, since the kit's button is type="button" and sends nothing; it comes straight after the fields, it is the form's one primary, its label is the task's verb, such as Book the table, and a second action is secondary. (fittss-law, von-restorff-effect, paradox-of-the-active-user)
- It says how it went where it is: a refusal is an x-kit.alert, which is role="alert", above the fields, and on success the thanks replace the fields in place, which the base flashes as site.lead_sent. (flow, peak-end-rule)
- Its title is an h3, so on a public page it sits under a section's h2 or goes untitled, and the outline never jumps from the page's h1 to an h3. (chunking)
- Two across only for fields that pair, such as a first and a last name or a date and a time: a long field spans both with class="sm:col-span-2", and a form of three fields is columns="1". (law-of-proximity)
- On a site of several pages it lives on the page a visitor comes to write or book, its visit or book page, and every other page links there rather than repeating it; a site of one page carries it on home. (hicks-law, occams-razor)
