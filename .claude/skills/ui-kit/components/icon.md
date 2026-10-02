# icon

One Lucide line icon by name, in the colour and at the size of the words beside it, and hidden from screen readers since those words already say it.

## Placement

- * — never: an icon is drawn beside a word, inside a component or on a line of the page's own markup, and never stands on its own in a region

## Behaviour

- It sits beside or above a word that says the same thing, such as a phone number, an address or a service's title, and never stands for a word on its own, least of all in a navigation. (cognitive-load, hicks-law)
- A control that is only an icon is an `<x-kit.button icon>` with its own aria-label, never this icon on its own, which screen readers do not hear. (postels-law)
- Its name is lucide.dev's, one the site has installed as search-ui-icons answers: a name the set lacks draws nothing and leaves the word bare. (postels-law)
- One thing has one icon across the whole site, phone for the phone and map-pin for the address, so it is recognised rather than read. (law-of-similarity, jakobs-law)
- It is a line icon at the size of the text around it: a picture is the library's, never an icon scaled up to fill a frame. (law-of-pragnanz, aesthetic-usability-effect)
