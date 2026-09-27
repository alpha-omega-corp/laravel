@props([
    'name' => null,
])

@php
    /**
     * One icon out of the Lucide set, by its name — `phone`, `wheat`,
     * `scissors`, `map-pin` — drawn in the current colour at the size of the
     * text around it. The names are lucide.dev's — the main set, not its lab,
     * whose prefix the icon factory cannot tell apart from the main one's.
     *
     * **It renders nothing rather than fail.** A name the set does not have,
     * or a site that predates the set being installed, would otherwise be an
     * exception on every request to a page a session wrote one icon wrong on —
     * so an unknown or malformed name is an absent icon, and the page is the
     * page without it. The name is pattern-checked before it reaches the icon
     * factory, which resolves it to a file.
     *
     * Decorative, and hidden from the accessibility tree: every place the kit
     * draws one, a word beside it says the same thing, and an icon read out as
     * well is the same word twice. An icon that stands alone as a control is a
     * button with its own `aria-label`, not this.
     *
     * The set is the application's own dependency (`mallardduck/blade-lucide-icons`),
     * not the kit's: the kit is a dev dependency of a site and its components
     * are copies, so what they render has to be installed in production.
     */
    $name = trim((string) $name);
    $svg = '';

    if (preg_match('/^[a-z0-9]+(-[a-z0-9]+)*$/', $name) && function_exists('svg')) {
        try {
            $svg = svg(
                'lucide-'.$name,
                $attributes->get('class', 'size-[1.1em] shrink-0'),
                ['aria-hidden' => 'true', 'focusable' => 'false', 'data-kit' => 'icon', ...$attributes->except('class')->getAttributes()],
            )->toHtml();
        } catch (\Throwable) {
            $svg = '';
        }
    }
@endphp
{{-- Trimmed, and the file ends on this line: an icon sits flush against the word it goes with. --}}
{!! trim($svg) !!}