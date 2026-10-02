# notification

A raised note that something has just happened, such as saved, sent or failed to send, with an icon for its tone, a line of detail and at most an undo, stacked in a corner the application keeps for it.

## Placement

- * — never: it stacks in a corner the application keeps for it, never in a region; and never on a public page, where a form says how it went in place

## Limits

- actions — 2 (hicks-law)

## Behaviour

- It reports what the user has just done, such as Saved or Sent, and never carries what they must still act on, which stays on the screen. (selective-attention, flow)
- It is role="status", read out when the reader is free, so an error that stops the task is an alert on the form instead. (flow)
- Its tone is its icon as well as its colour: success for done, warning for what needs a look. (von-restorff-effect)
- Its close button is drawn and not wired: the application closes it, or passes :dismissible="false". (mental-model)
- One at a time, about one change: a stack of them is noise. (selective-attention, cognitive-load)
