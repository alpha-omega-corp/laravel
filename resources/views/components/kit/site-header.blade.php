@props([
    'brand' => null,
    'items' => [],
    'action' => null,
    'status' => null,
    'phone' => null,
    'variant' => null,
    'themePicker' => false,
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
     * **The name stands alone at the left; the links, the theme and language
     * menus and the action keep together at the right**, as apdigital.ch draws
     * its own bar. **On a phone the bar is one row** — the name, the action
     * and a menu button, a native `<details>` that opens the links and the
     * menus under it. Wrapped, four or five labels were three rows of links
     * between the name and the page, and as a sideways strip they were a
     * second row the sticky bar carried down every page.
     *
     * **Its arrangement is the site's when the tag chooses one**: `centred`,
     * the name centred over the pages, or `split`, the pages at the left, the
     * name in the middle and the action at the right — chosen on deployer's
     * mockup and written by the build as `variant`, the same on every page.
     * kit.css lays them out from a tablet's width up; on a phone every one is
     * the bar above. The menus, the action and the phone's menu button keep
     * together at the bar's end (`site-header-end`), so an arrangement places
     * three things — the name, the pages and that end — rather than five.
     *
     * **The theme menu is the site's to offer.** It is drawn only when the tag
     * asks for it — `:theme-picker="true"`, which the build writes when the
     * mockup chose it — and the site binds `kit.theme-picker`, whose script
     * applies a choice: a menu nobody asked for is one more control on every
     * page. The language menu needs no asking: it is there once the site has
     * two languages.
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

    // The theme and language menus, drawn before the action: the theme's when the
    // tag asks for it and the site binds it, the languages from two up (each
    // picker renders nothing otherwise).
    $themes = (bool) $themePicker && app()->bound('kit.theme-picker');
    $options = $themes || count((app()->bound('kit.language-picker') ? app('kit.language-picker') : [])['locales'] ?? []) > 1;

    $variant = in_array($variant, ['centred', 'split'], true) ? $variant : null;

    $ref = '<x-kit.site-header />';
@endphp

<div data-ref="{{ $ref }}" data-kit="site-header" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-3']) }}>
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

    <nav data-kit-part="site-header-nav" class="relative flex items-center justify-end gap-x-6 py-3">
        @if (filled($brand))
            <a data-kit-part="site-header-brand" href="/" class="me-auto min-w-0 truncate font-display text-xl text-ink">{{ $brand }}</a>
        @endif

        @if (count($items))
            <ul data-kit-part="site-header-links" role="list" class="hidden flex-wrap gap-x-6 gap-y-2 text-sm md:flex">
                @foreach ($items as $item)
                    <li><a href="{{ $item['href'] ?? '#' }}" @if ($item['current']) aria-current="page" @endif @class(['text-ink underline decoration-accent decoration-2 underline-offset-[0.4em]' => $item['current'], 'text-ink-soft hover:text-ink' => ! $item['current']])>{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        @endif

        @if ($options || filled($action['label'] ?? null) || count($items))
            <div data-kit-part="site-header-end" class="flex shrink-0 items-center gap-x-4">
                @if ($options)
                    <div data-kit-part="site-header-options" class="hidden items-center gap-2 md:flex">
                        @if ($themes)
                            <x-kit.theme-picker />
                        @endif
                        <x-kit.language-picker />
                    </div>
                @endif

                @if (filled($action['label'] ?? null))
                    <a data-kit-part="site-header-action" href="{{ $action['href'] ?? '#' }}" class="btn btn-md btn-primary shrink-0">{{ $action['label'] }}</a>
                @endif

                @if (count($items) || $options)
                    <details data-kit-part="site-header-menu" class="group md:hidden">
                        <summary aria-label="{{ __('kit.menu') }}" class="flex size-10 cursor-pointer list-none items-center justify-center rounded-control text-ink hover:bg-canvas-alt [&::-webkit-details-marker]:hidden">
                            <x-kit.icon name="menu" class="size-5 group-open:hidden" />
                            <x-kit.icon name="x" class="hidden size-5 group-open:block" />
                        </summary>

                        <div class="panel panel-raised absolute inset-x-0 top-full z-30 mt-2 space-y-3 p-3">
                            @if (count($items))
                                <ul data-kit-part="site-header-links" role="list" class="text-base">
                                    @foreach ($items as $item)
                                        <li><a href="{{ $item['href'] ?? '#' }}" @if ($item['current']) aria-current="page" @endif @class(['block rounded-control px-2 py-2.5', 'text-ink underline decoration-accent decoration-2 underline-offset-[0.4em]' => $item['current'], 'text-ink-soft hover:text-ink' => ! $item['current']])>{{ $item['label'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif

                            @if ($options)
                                <div data-kit-part="site-header-options" class="flex items-center justify-end gap-2 border-t border-rule pt-3">
                                    @if ($themes)
                                        <x-kit.theme-picker />
                                    @endif
                                    <x-kit.language-picker />
                                </div>
                            @endif
                        </div>
                    </details>
                @endif
            </div>
        @endif
    </nav>
</div>
