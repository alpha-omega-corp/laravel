@props([
    'title' => null,
    'sections' => null,
    'variant' => null,
])

@php
    /**
     * A restaurant's menu: sections of dishes, each a name, a price and a line
     * about it. A prefab rather than a table, because a price is read along a
     * line from its dish, which is what the dotted leader is for.
     *
     * Prices are strings as the business writes them ("14.50", "CHF 14.–"):
     * formatting a number here would be this component choosing a currency.
     *
     * **Explicit props win, then what the site binds as `kit.menu`**, keyed by
     * these same names, taken as a set and only when the tag gives no
     * `sections`. With no sections from either it renders nothing.
     *
     * @var array<int, array{title?: string, items?: array<int, array{name: string, price?: string, description?: string}>}> $sections
     */
    if ($sections === null) {
        $bound = app()->bound('kit.menu') ? app('kit.menu') : [];
        $sections = $bound['sections'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['columns', 'cards'], true) ? $variant : null;

    $ref = '<x-kit.menu />';
@endphp

@if (filled($sections))
    <section data-ref="{{ $ref }}" data-kit="menu" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-8']) }}>
        @if ($title)
            <h2 data-kit-part="menu-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @foreach ($sections as $section)
            <div data-kit-part="menu-section">
                @if (! empty($section['title']))
                    <h3 data-kit-part="menu-section-title" class="border-b border-rule pb-2 font-display text-lg text-ink">{{ $section['title'] }}</h3>
                @endif

                <ul data-kit-part="menu-list" role="list" class="mt-4 space-y-4">
                    @foreach ($section['items'] ?? [] as $item)
                        <li data-kit-part="menu-item">
                            <div data-kit-part="menu-row" class="flex items-baseline gap-3">
                                <p data-kit-part="menu-name" class="font-medium text-ink">{{ $item['name'] }}</p>
                                <span data-kit-part="menu-leader" aria-hidden="true" class="flex-1 -translate-y-1 border-b border-dotted border-rule"></span>

                                @if (! empty($item['price']))
                                    <p data-kit-part="menu-price" class="shrink-0 tabular-nums text-ink">{{ $item['price'] }}</p>
                                @endif
                            </div>

                            @if (! empty($item['description']))
                                <p data-kit-part="menu-description" class="mt-1 max-w-prose text-sm text-ink-soft">{{ $item['description'] }}</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </section>
@endif
