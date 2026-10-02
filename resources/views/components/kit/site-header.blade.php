@props([
    'brand' => null,
    'items' => [],
    'action' => null,
    'status' => null,
    'phone' => null,
])

@php
    /**
     * The bar at the top of a public site: the name, the site's pages or the
     * page's own anchors, and the one thing to do, with an optional line
     * above it for today's status and the phone — each only as the brief
     * gives it.
     *
     * **Given no items, it draws the site's pages.** A site that routes
     * several shares them with every view as `$siteNav`, `[{label, href,
     * current}]` in the navigation's order, so each page's bar is the same
     * one rather than a copy that drifts from the others. Items on the tag
     * win, and a view rendered outside such a site has no `$siteNav`.
     *
     * **The page being shown is marked**, `aria-current="page"` and the ink
     * underlined rather than a colour alone: by its `current` key, which
     * `$siteNav` always sets, else when its path is the request's. An anchor
     * never is — `#carte` on home, `/#carte` from another page — since it
     * names a section, and a mark on it would claim the whole page.
     *
     * An anchor is `#<id>`, and the section it names carries `id="<id>"` on
     * its own tag — `id="carte"` on the menu, which every section passes to
     * its root. No component sets one, so an item whose target was not given
     * its id is a link that goes nowhere. kit.css keeps the target clear of
     * the header when it scrolls there.
     *
     * **On a phone the links are one strip under the name and the action**, and
     * it scrolls sideways past its end. Wrapped, four or five labels in the
     * site's own language were three rows of links between the name and the
     * page — the one pattern a phone's visitor reads as a site that was not
     * made for their screen.
     *
     * The root is a `div` because the layout's stub already wraps this region
     * in a `<header>`, and a header inside a header is not valid HTML. The
     * `nav` carries no label: it is the page's only one, and a label would be
     * a fixed string.
     *
     * @var array<int, array{label?: string, href?: string, current?: bool}> $items
     * @var array{label?: string, href?: string}|null $action
     */
    $items = array_values(array_filter($items ?: ($siteNav ?? []), fn ($item) => filled($item['label'] ?? null)));

    $here = '/'.trim(request()->path(), '/');

    foreach ($items as $index => $item) {
        $href = (string) ($item['href'] ?? '');
        $host = parse_url($href, PHP_URL_HOST);

        // Another site's page is never this one, whatever its path.
        $samePage = ($host === null || $host === request()->getHost())
            && '/'.trim((string) parse_url($href, PHP_URL_PATH), '/') === $here;

        $items[$index]['current'] = $href !== '' && ! str_contains($href, '#') && (bool) ($item['current'] ?? $samePage);
    }

    $ref = '<x-kit.site-header />';
@endphp

<div data-ref="{{ $ref }}" data-kit="site-header" {{ $attributes->class(['space-y-3']) }}>
    @if (filled($status) || filled($phone))
        <div data-kit-part="site-header-bar" class="flex flex-wrap items-center justify-between gap-x-6 gap-y-1 text-sm text-ink-soft">
            @if (filled($status))
                <p data-kit-part="site-header-status">{{ $status }}</p>
            @endif

            @if (filled($phone))
                <a data-kit-part="site-header-phone" href="tel:{{ preg_replace('/[^+0-9]/', '', $phone) }}" class="font-medium text-ink"><x-kit.icon name="phone" class="me-1.5 inline size-[1em] align-[-0.125em]" />{{ $phone }}</a>
            @endif
        </div>
    @endif

    <nav data-kit-part="site-header-nav" class="flex flex-wrap items-center justify-between gap-x-8 gap-y-3 py-3">
        @if (filled($brand))
            <a data-kit-part="site-header-brand" href="/" class="font-display text-xl text-ink">{{ $brand }}</a>
        @endif

        @if (count($items))
            <ul data-kit-part="site-header-links" role="list" class="order-last flex basis-full gap-x-6 overflow-x-auto whitespace-nowrap text-sm [scrollbar-width:none] md:order-none md:basis-auto md:flex-wrap md:gap-y-2 md:overflow-visible">
                @foreach ($items as $item)
                    <li><a href="{{ $item['href'] ?? '#' }}" @if ($item['current']) aria-current="page" @endif @class(['text-ink underline decoration-accent decoration-2 underline-offset-[0.4em]' => $item['current'], 'text-ink-soft hover:text-ink' => ! $item['current']])>{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        @endif

        @if (filled($action['label'] ?? null))
            <a data-kit-part="site-header-action" href="{{ $action['href'] ?? '#' }}" class="btn btn-md btn-primary">{{ $action['label'] }}</a>
        @endif
    </nav>
</div>
