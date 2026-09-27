@props([
    'eyebrow' => null,
    'title' => null,
    'lead' => null,
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
     */
    $ref = '<x-kit.section />';
@endphp

<section data-ref="{{ $ref }}" data-kit="section" {{ $attributes->class(['space-y-8']) }}>
    @if (filled($eyebrow) || filled($title) || filled($lead))
        <header data-kit-part="section-head" class="max-w-3xl space-y-3">
            @if (filled($eyebrow))
                <p data-kit-part="section-eyebrow" class="text-sm font-medium uppercase tracking-[0.14em] text-accent">{{ $eyebrow }}</p>
            @endif

            @if (filled($title))
                <h2 data-kit-part="section-title" class="font-display text-title text-ink">{{ $title }}</h2>
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
