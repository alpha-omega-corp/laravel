@props([
    'eyebrow' => null,
    'title' => null,
    'lead' => null,
    'links' => [],
    'details' => [],
])

@php
    /**
     * The last thing a visitor is asked to do — book, order, call, come by —
     * set in the layout's `band` region with the facts that make it possible.
     *
     * `links` are `[{label, href}]`, the first the main action. `details` are
     * `[{label, value, href?, icon?}]` — the address, the hours, the phone —
     * and only facts the brief gives; a value with an `href` is a link. The
     * icon is a Lucide name, and without one a `tel:`, `mailto:` or maps link
     * says which it is: a phone, an envelope, a pin.
     *
     * One DOM whatever the page looks like: whether the band is the accent, the
     * ink or the page's second ground is the direction's to say.
     *
     * **It wraps rather than breaking at a window width**: the copy and the
     * actions share a line while there is room for both, and the details take
     * as many columns as fit under them. A layout without a band frame puts it
     * in a column — a board's last tile — where a window-wide breakpoint laid
     * three detail columns and two buttons into a third of a page.
     *
     * @var array<int, array{label?: string, href?: string}> $links
     * @var array<int, array{label?: string, value?: string, href?: string, icon?: string}> $details
     */
    $links = array_values(array_filter($links, fn ($link) => filled($link['label'] ?? null)));
    $details = array_values(array_filter($details, fn ($detail) => filled($detail['value'] ?? null)));

    $iconOf = fn (array $detail): string => $detail['icon'] ?? match (true) {
        str_starts_with($detail['href'] ?? '', 'tel:') => 'phone',
        str_starts_with($detail['href'] ?? '', 'mailto:') => 'mail',
        str_contains($detail['href'] ?? '', 'maps') => 'map-pin',
        default => '',
    };

    $ref = '<x-kit.cta-band />';
@endphp

<div data-ref="{{ $ref }}" data-kit="cta-band" {{ $attributes->class(['flex flex-wrap items-end justify-between gap-x-12 gap-y-8']) }}>
    <div data-kit-part="cta-band-copy" class="min-w-0 flex-[1_1_24rem] space-y-3">
        @if (filled($eyebrow))
            <p data-kit-part="cta-band-eyebrow" class="text-sm font-medium uppercase tracking-[0.14em] text-accent">{{ $eyebrow }}</p>
        @endif

        @if (filled($title))
            <h2 data-kit-part="cta-band-title" class="font-display text-title text-ink">{{ $title }}</h2>
            <span data-kit-part="cta-band-mark" aria-hidden="true" class="block h-[3px] w-14 bg-accent"></span>
        @endif

        @if (filled($lead))
            <p data-kit-part="cta-band-lead" class="max-w-prose text-lg text-ink-soft">{{ $lead }}</p>
        @endif
    </div>

    @if (count($links))
        <div data-kit-part="cta-band-actions" class="flex flex-wrap gap-3">
            @foreach ($links as $link)
                <a href="{{ $link['href'] ?? '#' }}" @class(['btn btn-lg', 'btn-primary' => $loop->first, 'btn-secondary' => ! $loop->first])>{{ $link['label'] }}</a>
            @endforeach
        </div>
    @endif

    @if (count($details))
        <dl data-kit-part="cta-band-details" class="grid basis-full gap-6 grid-cols-[repeat(auto-fit,minmax(min(100%,11rem),1fr))]">
            @foreach ($details as $detail)
                <div data-kit-part="cta-band-detail">
                    <dt class="flex items-center gap-1.5 text-sm text-ink-soft"><x-kit.icon :name="$iconOf($detail)" />{{ $detail['label'] ?? '' }}</dt>
                    {{-- One line: the value may run over several, and pre-line would keep this file's indentation as blank ones. --}}
                    <dd class="whitespace-pre-line text-ink">@if (filled($detail['href'] ?? null))<a href="{{ $detail['href'] }}" class="hover:text-accent">{{ $detail['value'] }}</a>@else{{ $detail['value'] }}@endif</dd>
                </div>
            @endforeach
        </dl>
    @endif
</div>
