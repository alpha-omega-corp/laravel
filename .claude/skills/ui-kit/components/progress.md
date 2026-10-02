# progress

How far along something is: a filled bar, or a row of segments for a task of several steps, with its label and its value.

## Placement

- focus.header — first: how far along the task is, above the step's title
- stacked.main — fits: one card of the grid, a goal and how near it is
- * — never: a page that is not a step of a task has nothing to progress through, and a site's booking of several steps is pages in focus

## Limits

- steps — 5; advice 3 (goal-gradient-effect, parkinsons-law)
- per-page — 1 (goal-gradient-effect)

## Behaviour

- In a task of several pages it is stepped, `steps` the number of pages, and starts above zero: step k of n is k/n, so the first page already shows one step done. (goal-gradient-effect, zeigarnik-effect)
- Every page of the task draws it in the same place with the same steps, so the pages read as one path. (law-of-uniform-connectedness, law-of-similarity)
- In a stepped task its label names the step in the task's words and `show-value` is false, since a percentage says less than Step 2 of 4. (cognitive-load, mental-model)
- The last step is named as the last, Confirm or Pay, and the page after it confirms the task instead of drawing the bar again. (goal-gradient-effect, peak-end-rule)
- On a dashboard card the plain bar measures a goal, and its label says what fills it. (goal-gradient-effect)
