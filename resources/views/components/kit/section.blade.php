@props([
    'eyebrow' => null,
    'title' => null,
    'lead' => null,
    'level' => 2,
])

@php
    /**
     * A titled band of copy: an eyebrow, a heading with the accent mark under
     * it, a lead, and whatever the slot holds. It is what a site's own words
     * are written into — a story, a paragraph about the house — so every word
     * in it is a prop or the slot, and bare it is an empty section.
     *
     * One DOM whatever the page looks like: a direction restyles it through
     * `data-kit` and `data-kit-part`, never through a prop.
     *
     * **`level` 1 when the section opens the page** — carte's lead, a board's
     * opening — which then has no hero, and so no other `<h1>`. A page needs
     * exactly one: it is what a search engine and a screen reader take the page
     * to be about, and a site whose every page opens on an `<h2>` is one both
     * read as untitled. Anything but 1 is 2.
     */
    $heading = (int) $level === 1 ? 'h1' : 'h2';

    $ref = '<x-kit.section />';
@endphp

<section data-ref="{{ $ref }}" data-kit="section" {{ $attributes->class(['space-y-8']) }}>
    @if (filled($eyebrow) || filled($title) || filled($lead))
        <header data-kit-part="section-head" class="max-w-3xl space-y-3">
            @if (filled($eyebrow))
                <p data-kit-part="section-eyebrow" class="text-sm font-medium uppercase tracking-[0.14em] text-accent">{{ $eyebrow }}</p>
            @endif

            @if (filled($title))
                <{{ $heading }} data-kit-part="section-title" class="font-display text-title text-ink">{{ $title }}</{{ $heading }}>
                <span data-kit-part="section-mark" aria-hidden="true" class="block h-[3px] w-14 bg-accent"></span>
            @endif

            @if (filled($lead))
                <p data-kit-part="section-lead" class="max-w-prose text-lg text-ink-soft">{{ $lead }}</p>
            @endif
        </header>
    @endif

    @if ($slot->isNotEmpty())
        <div data-kit-part="section-body">{{ $slot }}</div>
    @endif
</section>
