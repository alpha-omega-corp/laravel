@php
    /**
     * The heading a section leads with — its own title, not the site's.
     *
     * A dense layout has already drawn a page header, so a second one would be
     * two headings for one screen; the body goes straight to the content
     * instead. How big the heading is, is the viewer's degree.
     *
     * @var string $title
     * @var string $body
     * @var bool $dense
     * @var \App\Enums\Variation $variation
     */
@endphp

@unless ($dense)
    <div class="space-y-3 text-center">
        <h3 class="font-display {{ $variation->display() }} font-bold text-ink">{{ $title }}</h3>
        <p class="mx-auto max-w-prose text-ink-soft">{{ $body }}</p>
    </div>
@endunless
