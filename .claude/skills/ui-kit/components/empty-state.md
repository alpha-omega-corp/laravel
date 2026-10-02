# empty-state

What a list, a table or a panel shows while it has nothing: what will be there, and the one way to add the first.

## Placement

- console.main — fits: in the place of the list or the table that has nothing yet
- stacked.main — fits: one card of the grid, in the place of the one that has nothing yet
- focus.main — fits: in the place of the list the step would choose from
- workspace.list — fits: in the place of the list when it is empty or nothing matches the filter
- workspace.detail — fits: until an item is chosen, saying what choosing one shows
- * — never: a public page shows no empty list, since a prefab with no data renders nothing and its region hides itself, and a bar or a title strip is not a list

## Limits

- title — 48 characters (law-of-pragnanz)

## Behaviour

- It stands in the place of the one list, table or panel that is empty, never beside it, and says what will be there once there is something. (flow, zeigarnik-effect)
- Its action is the one way to add the first item, a primary button and the screen's one primary while the list is empty. (goal-gradient-effect, von-restorff-effect)
- A list that is empty because of a filter says so and offers to clear it, rather than inviting a first item. (flow, mental-model)
- Its words are one sentence on what goes there and how it fills, since nobody reads more before trying. (paradox-of-the-active-user)
- `dashed` is for a place where something is dropped or added, and the plain panel for a list with nothing in it yet. (mental-model, law-of-similarity)
