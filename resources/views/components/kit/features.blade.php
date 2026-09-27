@props([
    'eyebrow' => null,
    'title' => null,
    'lead' => null,
    'items' => [],
])

@php
    /**
     * A section of blocks — the house, the rooms, what the place is known
     * for — so one tag covers the whole section: a heading over a list, each
     * block a photograph and a few words.
     *
     * An item is `{title, body?, image?, subject?, href?, label?, icon?}`; the
     * icon is a Lucide name drawn in the accent above the title — a service,
     * a product line — and never in place of the photograph. `image`
     * and `subject` go to `media`, so a block with no photograph yet shows the
     * frame captioned with what belongs in it. `href` makes the block a link,
     * labelled `label` or else its title.
     *
     * One DOM whatever the page looks like: doors, alternating blocks,
     * portraits and a bento board are directions over this markup.
     *
     * An item puts its photograph beside its words while the item is wide
     * enough for both, read off its own width rather than the window's: a
     * board's tile a third of a page wide is a phone's width on a wide screen.
     *
     * @var array<int, array{title?: string, body?: string, image?: string, subject?: string, href?: string, label?: string, icon?: string}> $items
     */
    $ref = '<x-kit.features />';
@endphp

<section data-ref="{{ $ref }}" data-kit="features" {{ $attributes->class(['space-y-10']) }}>
    @if (filled($eyebrow) || filled($title) || filled($lead))
        <header data-kit-part="features-head" class="max-w-3xl space-y-3">
            @if (filled($eyebrow))
                <p data-kit-part="features-eyebrow" class="text-sm font-medium uppercase tracking-[0.14em] text-accent">{{ $eyebrow }}</p>
            @endif

            @if (filled($title))
                <h2 data-kit-part="features-title" class="font-display text-title text-ink">{{ $title }}</h2>
                <span data-kit-part="features-mark" aria-hidden="true" class="block h-[3px] w-14 bg-accent"></span>
            @endif

            @if (filled($lead))
                <p data-kit-part="features-lead" class="max-w-prose text-lg text-ink-soft">{{ $lead }}</p>
            @endif
        </header>
    @endif

    @if (count($items))
        <ul data-kit-part="features-list" role="list" class="grid gap-10">
            @foreach ($items as $item)
                <li data-kit-part="features-item" class="relative grid items-center gap-6 grid-cols-[repeat(auto-fit,minmax(min(100%,16rem),1fr))]">
                    <div data-kit-part="features-media">
                        <x-kit.media :src="$item['image'] ?? null" :subject="$item['subject'] ?? null" ratio="4/3" />
                    </div>

                    <div data-kit-part="features-copy" class="space-y-3">
                        @if (filled($item['icon'] ?? null))
                            <x-kit.icon :name="$item['icon']" class="size-6 text-accent" />
                        @endif

                        @if (filled($item['title'] ?? null))
                            <h3 data-kit-part="features-item-title" class="font-display text-xl text-ink">{{ $item['title'] }}</h3>
                        @endif

                        @if (filled($item['body'] ?? null))
                            <p data-kit-part="features-body" class="text-ink-soft">{{ $item['body'] }}</p>
                        @endif

                        @if (filled($item['href'] ?? null) && filled($item['label'] ?? $item['title'] ?? null))
                            <a data-kit-part="features-link" href="{{ $item['href'] }}" class="font-medium text-accent hover:text-accent-strong">{{ $item['label'] ?? $item['title'] }}</a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</section>
