@props([
    'title' => null,
    'sections' => [],
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
     * @var array<int, array{title?: string, items?: array<int, array{name: string, price?: string, description?: string}>}> $sections
     */
    $ref = '<x-kit.menu />';
@endphp

<section data-ref="{{ $ref }}" {{ $attributes->class(['space-y-8']) }}>
    @if ($title)
        <h2 class="font-display text-title text-ink">{{ $title }}</h2>
    @endif

    @foreach ($sections as $section)
        <div>
            @if (! empty($section['title']))
                <h3 class="border-b border-rule pb-2 font-display text-lg text-ink">{{ $section['title'] }}</h3>
            @endif

            <ul role="list" class="mt-4 space-y-4">
                @foreach ($section['items'] ?? [] as $item)
                    <li>
                        <div class="flex items-baseline gap-3">
                            <p class="font-medium text-ink">{{ $item['name'] }}</p>
                            <span aria-hidden="true" class="flex-1 -translate-y-1 border-b border-dotted border-rule"></span>

                            @if (! empty($item['price']))
                                <p class="shrink-0 tabular-nums text-ink">{{ $item['price'] }}</p>
                            @endif
                        </div>

                        @if (! empty($item['description']))
                            <p class="mt-1 max-w-prose text-sm text-ink-soft">{{ $item['description'] }}</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</section>
