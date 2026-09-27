@props([
    'eyebrow' => null,
    'title' => null,
    'lead' => null,
    'image' => null,
    'subject' => null,
    'links' => [],
    'note' => null,
    'facts' => [],
])

@php
    /**
     * The page's opening: the name, a line about it, the one thing to do, and
     * the photograph it opens on.
     *
     * `image` and `subject` go to `media`, so with no photograph the frame
     * says which one is owed. `links` are `[{label, href}]` and the first is
     * the page's main action. `note` is one line under them — today's status,
     * a booking note — and `facts` (`[{value, label}]`) only what the brief
     * states: an invented figure on a business's page is a false claim.
     *
     * One DOM whatever the page looks like: the full-bleed photograph, the
     * split and the stacked panorama are directions over this markup.
     *
     * @var array<int, array{label?: string, href?: string}> $links
     * @var array<int, array{value?: string, label?: string}> $facts
     */
    $links = array_values(array_filter($links, fn ($link) => filled($link['label'] ?? null)));
    $facts = array_values(array_filter($facts, fn ($fact) => filled($fact['value'] ?? null)));

    $ref = '<x-kit.hero />';
@endphp

<div data-ref="{{ $ref }}" data-kit="hero" {{ $attributes->class(['grid items-center gap-10 lg:grid-cols-[1.15fr_1fr]']) }}>
    <div data-kit-part="hero-copy" class="space-y-6">
        @if (filled($eyebrow))
            <p data-kit-part="hero-eyebrow" class="text-sm font-medium uppercase tracking-[0.14em] text-accent">{{ $eyebrow }}</p>
        @endif

        @if (filled($title))
            <h1 data-kit-part="hero-title" class="max-w-[16ch] font-display text-display text-ink">{{ $title }}</h1>
            <span data-kit-part="hero-mark" aria-hidden="true" class="block h-[3px] w-14 bg-accent"></span>
        @endif

        @if (filled($lead))
            <p data-kit-part="hero-lead" class="max-w-xl text-lg text-ink-soft">{{ $lead }}</p>
        @endif

        @if (count($links))
            <div data-kit-part="hero-actions" class="flex flex-wrap gap-3">
                @foreach ($links as $link)
                    <a href="{{ $link['href'] ?? '#' }}" @class(['btn btn-lg', 'btn-primary' => $loop->first, 'btn-secondary' => ! $loop->first])>{{ $link['label'] }}</a>
                @endforeach
            </div>
        @endif

        @if (filled($note))
            <p data-kit-part="hero-note" class="text-sm text-ink-soft">{{ $note }}</p>
        @endif

        @if (count($facts))
            <dl data-kit-part="hero-facts" class="grid grid-cols-2 gap-6 border-t border-rule pt-6 sm:grid-cols-3">
                @foreach ($facts as $fact)
                    <div data-kit-part="hero-fact">
                        <dt class="text-sm text-ink-soft">{{ $fact['label'] ?? '' }}</dt>
                        <dd class="font-display text-figure text-ink">{{ $fact['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif
    </div>

    <div data-kit-part="hero-media">
        <x-kit.media :src="$image" :subject="$subject" ratio="4/3" :priority="true" />
    </div>
</div>
