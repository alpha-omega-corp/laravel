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
     * `[{label, value, href?}]` — the address, the hours, the phone — and
     * only facts the brief gives; a value with an `href` is a link.
     *
     * One DOM whatever the page looks like: whether the band is the accent, the
     * ink or the page's second ground is the direction's to say.
     *
     * @var array<int, array{label?: string, href?: string}> $links
     * @var array<int, array{label?: string, value?: string, href?: string}> $details
     */
    $links = array_values(array_filter($links, fn ($link) => filled($link['label'] ?? null)));
    $details = array_values(array_filter($details, fn ($detail) => filled($detail['value'] ?? null)));

    $ref = '<x-kit.cta-band />';
@endphp

<div data-ref="{{ $ref }}" data-kit="cta-band" {{ $attributes->class(['grid gap-8 lg:grid-cols-[minmax(0,1fr)_auto] lg:items-end']) }}>
    <div data-kit-part="cta-band-copy" class="space-y-3">
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
        <dl data-kit-part="cta-band-details" class="grid gap-6 sm:grid-cols-3 lg:col-span-2">
            @foreach ($details as $detail)
                <div data-kit-part="cta-band-detail">
                    <dt class="text-sm text-ink-soft">{{ $detail['label'] ?? '' }}</dt>
                    {{-- One line: the value may run over several, and pre-line would keep this file's indentation as blank ones. --}}
                    <dd class="whitespace-pre-line text-ink">@if (filled($detail['href'] ?? null))<a href="{{ $detail['href'] }}" class="hover:text-accent">{{ $detail['value'] }}</a>@else{{ $detail['value'] }}@endif</dd>
                </div>
            @endforeach
        </dl>
    @endif
</div>
