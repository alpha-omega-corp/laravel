# calendar

One month as a grid of days, the chosen day filled and the days that hold something marked with a dot.

## Placement

- focus.main — fits: the day to choose, above the form that takes the rest of the booking
- stacked.main — fits: one card of the grid, the month with its marked days
- * — never: its square days make a wide column's month taller than the screen, a side column or a list has another job, and a site's hours are the schedule, which a direction draws

## Limits

- per-page — 1 (cognitive-load)

## Behaviour

- Every day is a button, so it goes only where choosing a day does something: a form that takes the date, or a script that shows that day. (flow)
- Its weekday initials are written in English, M T W T F S S, so a page in another language does not use it until they follow the locale. (cognitive-load)
- A marked day shows only a dot, so what is on that day is said beside the calendar in words. (von-restorff-effect)
- It holds dates and not what happens on them: a day's entries are a feed or a stacked-list beside it. (chunking)
