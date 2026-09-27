@props([
    'brand' => null,
    'items' => [],
    'action' => null,
    'status' => null,
    'phone' => null,
])

@php
    /**
     * The bar at the top of a public site: the name, the page's own anchors
     * and the one thing to do, with an optional line above it for today's
     * status and the phone — each only as the brief gives it.
     *
     * An anchor is `#<id>`, and the section it names carries `id="<id>"` on
     * its own tag — `id="carte"` on the menu, which every section passes to
     * its root. No component sets one, so an item whose target was not given
     * its id is a link that goes nowhere. kit.css keeps the target clear of
     * the header when it scrolls there.
     *
     * The root is a `div` because the layout's stub already wraps this region
     * in a `<header>`, and a header inside a header is not valid HTML. The
     * `nav` carries no label: it is the page's only one, and a label would be
     * a fixed string.
     *
     * @var array<int, array{label?: string, href?: string}> $items
     * @var array{label?: string, href?: string}|null $action
     */
    $items = array_values(array_filter($items, fn ($item) => filled($item['label'] ?? null)));

    $ref = '<x-kit.site-header />';
@endphp

<div data-ref="{{ $ref }}" data-kit="site-header" {{ $attributes->class(['space-y-3']) }}>
    @if (filled($status) || filled($phone))
        <div data-kit-part="site-header-bar" class="flex flex-wrap items-center justify-between gap-x-6 gap-y-1 text-sm text-ink-soft">
            @if (filled($status))
                <p data-kit-part="site-header-status">{{ $status }}</p>
            @endif

            @if (filled($phone))
                <a data-kit-part="site-header-phone" href="tel:{{ preg_replace('/[^+0-9]/', '', $phone) }}" class="font-medium text-ink">{{ $phone }}</a>
            @endif
        </div>
    @endif

    <nav data-kit-part="site-header-nav" class="flex flex-wrap items-center justify-between gap-x-8 gap-y-3 py-3">
        @if (filled($brand))
            <a data-kit-part="site-header-brand" href="/" class="font-display text-xl text-ink">{{ $brand }}</a>
        @endif

        @if (count($items))
            <ul data-kit-part="site-header-links" role="list" class="flex flex-wrap gap-x-6 gap-y-2 text-sm">
                @foreach ($items as $item)
                    <li><a href="{{ $item['href'] ?? '#' }}" class="text-ink-soft hover:text-ink">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        @endif

        @if (filled($action['label'] ?? null))
            <a data-kit-part="site-header-action" href="{{ $action['href'] ?? '#' }}" class="btn btn-md btn-primary">{{ $action['label'] }}</a>
        @endif
    </nav>
</div>
