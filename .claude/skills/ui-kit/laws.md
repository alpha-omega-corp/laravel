# Laws of UX

The thirty laws of lawsofux.com, Jon Yablonski's collection of the psychology an interface is designed against, as this kit applies them. Each is listed by its slug and in the site's own words; the slug is the address of its page, `https://lawsofux.com/<slug>/`, except `law-of-pragnanz`, which is written without its umlaut (the site's page is `/law-of-prägnanz/`) so that every slug stays a plain word. The component rules (`components/<name>.md`), a business's `## Pages` and deployer's checks of a site cite these slugs, and the thresholds are the numbers those checks count against.

## Laws

- aesthetic-usability-effect — Users often perceive aesthetically pleasing design as design that’s more usable.
- choice-overload — The tendency for people to get overwhelmed when they are presented with a large number of options, often used interchangeably with the term paradox of choice.
- chunking — A process by which individual pieces of an information set are broken down and then grouped together in a meaningful whole.
- cognitive-bias — A systematic error of thinking or rationality in judgment that influence our perception of the world and our decision-making ability.
- cognitive-load — The amount of mental resources needed to understand and interact with an interface.
- doherty-threshold — Productivity soars when a computer and its users interact at a pace (<400ms) that ensures that neither has to wait on the other.
- fittss-law — The time to acquire a target is a function of the distance to and size of the target.
- flow — The mental state in which a person performing some activity is fully immersed in a feeling of energized focus, full involvement, and enjoyment in the process of the activity.
- goal-gradient-effect — The tendency to approach a goal increases with proximity to the goal.
- hicks-law — The time it takes to make a decision increases with the number and complexity of choices.
- jakobs-law — Users spend most of their time on other sites. This means that users prefer your site to work the same way as all the other sites they already know.
- law-of-common-region — Elements tend to be perceived into groups if they are sharing an area with a clearly defined boundary.
- law-of-proximity — Objects that are near, or proximate to each other, tend to be grouped together.
- law-of-pragnanz — People will perceive and interpret ambiguous or complex images as the simplest form possible, because it is the interpretation that requires the least cognitive effort of us.
- law-of-similarity — The human eye tends to perceive similar elements as a complete picture, shape, or group, even if those elements are separated.
- law-of-uniform-connectedness — Elements that are visually connected are perceived as more related than elements with no connection.
- mental-model — A compressed model based on what we think we know about a system and how it works.
- millers-law — The average person can only keep 7 (plus or minus 2) items in their working memory.
- occams-razor — Among competing hypotheses that predict equally well, the one with the fewest assumptions should be selected.
- paradox-of-the-active-user — Users never read manuals but start using the software immediately.
- pareto-principle — The Pareto principle states that, for many events, roughly 80% of the effects come from 20% of the causes.
- parkinsons-law — Any task will inflate until all of the available time is spent.
- peak-end-rule — People judge an experience largely based on how they felt at its peak and at its end, rather than the total sum or average of every moment of the experience.
- postels-law — Be liberal in what you accept, and conservative in what you send.
- selective-attention — The process of focusing our attention only to a subset of stimuli in an environment — usually those related to our goals.
- serial-position-effect — Users have a propensity to best remember the first and last items in a series.
- teslers-law — Tesler's Law, also known as The Law of Conservation of Complexity, states that for any system there is a certain amount of complexity which cannot be reduced.
- von-restorff-effect — The Von Restorff effect, also known as The Isolation Effect, predicts that when multiple similar objects are present, the one that differs from the rest is most likely to be remembered.
- working-memory — A cognitive system that temporarily holds and manipulates information needed to complete tasks.
- zeigarnik-effect — People remember uncompleted or interrupted tasks better than completed tasks.

## Thresholds

- nav-items — 9; advice 5 (hicks-law, millers-law)
- actions-per-region — 2 (hicks-law)
- primary-per-screen — 1 (von-restorff-effect)
- pages — 7; advice 5 (hicks-law, occams-razor)
- main-components — 6 (chunking)
- catalogue-items — 12 (choice-overload)
- menu-section-items — 12 (choice-overload)
- form-fields — 5 (parkinsons-law)
- target-px — 44; advice 24 (fittss-law)
- server-ms — 2000; advice 400 (doherty-threshold)
- title-characters — 48 (law-of-pragnanz)
- nav-strip-px — 335 (zeigarnik-effect)

## Reading the thresholds

A threshold is written the way a component's `## Limits` line is: `- <key> — <number>`, then
`; advice <n>` when there is a gentler number, then the laws it serves. Past the first number a
check fails, and deployer's `check_site` answers that the site is not coherent; past the advice it
only says so. Deployer reads these lines and keeps the same numbers built in for a machine without
this file, so a number is tuned here, without a release of deployer.

Most of them are this factory's defaults rather than the site's. lawsofux.com gives only the
Doherty threshold's 400ms (2000ms being the older standard it replaced) and Miller's seven, plus or
minus two — and that law's own first takeaway warns against using seven to justify a limit, which
is why a navigation fails only past nine and is merely advised from five.

`target-px` is the one floor, and it is not the site's: it comes from WCAG 2.2. 24px is the size
every target must reach (2.5.8, Target Size Minimum) and 44px the size the page's main action
should (2.5.5, Target Size Enhanced). `nav-strip-px` is an estimate — a 375px phone less the page's
two 1.25rem gutters — because nothing that checks a site here lays a page out.

## How this kit applies them

### Deciding and remembering

hicks-law, choice-overload, millers-law, chunking, cognitive-load, working-memory. A visitor decides
faster among fewer things and recognises better than they recall, so the navigation is short —
`nav-items` — with home's anchors dropped before any page, and the site header marks the page being
shown (`aria-current` and an underline) so nobody has to remember where they are. A site is chunked
into pages rather than one endless home: each page has one role, a business's `## Pages` proposes
five at most (`pages`), and a list — the menu, the catalogue, the gallery, the team, the events,
the questions — lives on one page of its own that home links to rather than repeats, as does the
booking form. On a page, main holds at most six components
(`main-components`), a menu section or a catalogue at most twelve entries before it wants sections
or a featured few (`menu-section-items`, `catalogue-items`), a region at most two actions
(`actions-per-region`), and every block carries a heading.

### Familiar and consistent

jakobs-law, mental-model. A visitor brings what other sites taught them. The name sits top left and
links home; the navigation is on top and the same on every page — the same labels in the same order,
drawn from the site's page list (`$siteNav`) rather than copied into each view; the contact is in the
footer. A business's `## Pages` is the set its kind of site has — a restaurant's menu, a salon's
services, a farm's products — named in the site's language, each page with a title of its own and a
navigation label that is the words of that title. A product card carries its price, and a buy button
once there is a checkout: the shop visitors already know.

### Attention and emphasis

von-restorff-effect, selective-attention, serial-position-effect, pareto-principle. What differs is
remembered, so the difference is spent on one thing: one primary action per first screen
(`primary-per-screen`) — the header's action and the hero's first link go to the same place — and
every other button is secondary. It is never colour alone: the current page is underlined, a primary
differs from a secondary in fill and edge, an error has words. Visitors filter out what does not
serve their goal and anything that looks like an advert, so an opening holds what the page is and
how to get there — no alert, badge or promotion above it — and the questions a business's summary
names (open tonight? what does it cost? where is the door?) are answered within one click of every
page and in home's first two screens. The first and the last are remembered: the page a visitor
comes for first leads the navigation and the visit or the contact closes it, the brand at the far
left and the action at the far right.

### Grouping

law-of-proximity, law-of-common-region, law-of-similarity, law-of-uniform-connectedness,
law-of-pragnanz. These are how the layouts are drawn, and every direction keeps them. Main's sections
stand far enough apart to read as separate (6rem in marketing, against 2 to 2.5rem inside one), or
each sits in a panel of its own; the band has a ground of its own; the hours and the map share one
region. Things that look alike read as alike, so one family appears once per page, one palette and
one direction dress every page of a site, a link looks like a link, and a button is always
`<x-kit.button>` or the kit's `.btn`. The menu's dotted leader joins a dish to its price; the map,
its caption and its directions are one figure. Shapes stay simple: Lucide's line icons, drawings in
the kit's eleven colour tokens, and titles short enough to read as one shape (`title-characters`).

### Ends and progress

peak-end-rule, goal-gradient-effect, zeigarnik-effect, flow. A page is remembered by its opening and
its end, so the opening carries the page's photograph, or the frame naming the one that is owed, and
every public page ends on something a visitor can act on: a cta-band in the band, or, in a layout
with no band, a footer with the contact. A task of several steps is pages in the focus layout, with
a stepped progress that starts above zero and ends on a page that confirms it. Nothing leaves a
visitor unsure whether there is more: the navigation strip on a phone scrolls past its end with no
cue, so its labels stay short enough to fit (`nav-strip-px`) or items go; a long list names its
sections. Flow is kept by never breaking it: no modal, drawer, dropdown, command palette,
notification or placeholder on a public page, and no link that answers an error.

### Effort

fittss-law, parkinsons-law, postels-law, paradox-of-the-active-user, teslers-law, doherty-threshold.
A target is easier the larger and nearer it is: none is smaller than WCAG allows (`target-px`), and
an action on one item sits inside that item. A task takes the time it is given, so a public form is
short (`form-fields`) and the browser fills it: every attribute of `<x-kit.input>`, `<x-kit.textarea>`
and `<x-kit.select>` but its `class` and `style` reaches the field, so `autocomplete`, `inputmode`
and `required` work. What the site is given is taken as written — a phone in any spacing is shown as
written and dialled by its digits, hours and prices stay as the owner writes them — and a form
refuses as little: no pattern on a name or a phone, and an error that says what would be accepted.
Nobody reads a manual: every field has a label, help sits beside its field as the hint, and an
action is a verb of the task. The complexity nobody can remove is the system's to carry: the
navigation comes from the page list, the prefabs bind the site's own data, and the owner edits the
content in `/admin` rather than in code. And a page answers quickly (`server-ms`), with one eager
image, the opening's.

### Restraint and trust

occams-razor, aesthetic-usability-effect, cognitive-bias. The simplest site that does the job: only
the pages the brief asks for, no filler — no "why choose us", no team grid nobody gave, no three
equal cards — and no region filled for its own sake. A pleasing page is forgiven its faults, which is
why looking finished is never the proof: every page is judged by `check_site`, and approving a
design on deployer's Design tab does not replace it. The builder's own shortcuts are the bias to
guard against: a layout is rolled rather than reached for, and every fact on a page — a figure, a
status, an opening hour — is one the brief states.
