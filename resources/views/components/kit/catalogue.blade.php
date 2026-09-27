@props([
    'items' => null,
    'checkout' => null,
])

@php
    /**
     * A preview of what the business sells: a card per item, with a picture, a
     * name, a price and a line about it. A prefab — a farm shop and a boutique
     * sell different things and show them the same way.
     *
     * **It is a preview until it is given somewhere to buy.** With no
     * `checkout`, an item offers its own `href` as a link, or nothing to press —
     * a Buy button that goes nowhere is worse than none. With `checkout`, a URL
     * that takes a POSTed `item` id, each card is a form: that is what deployer's
     * `/stripe` command wires to a Stripe Checkout session, so the upgrade is a
     * prop and a route rather than a second component.
     *
     * **Explicit props win, then what the site binds as `kit.catalogue`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `items`: the bound `checkout` reads each posted id as one of the site's
     * own rows, so a hand-written list given it would sell whatever the site's
     * row of that id is. With no items from either it renders nothing.
     *
     * @var array<int, array{id?: string|int, name: string, price?: string, description?: string, image?: string, href?: string}> $items
     */
    if ($items === null) {
        $bound = app()->bound('kit.catalogue') ? app('kit.catalogue') : [];
        $items = $bound['items'] ?? [];
        $checkout ??= $bound['checkout'] ?? null;
    }

    $ref = '<x-kit.catalogue'.($checkout ? ' checkout' : '').' />';
@endphp

@if (filled($items))
    <ul role="list" data-ref="{{ $ref }}" data-kit="catalogue" {{ $attributes->class(['grid gap-6 grid-cols-[repeat(auto-fill,minmax(min(100%,15rem),1fr))]']) }}>
        @foreach ($items as $item)
            <li data-kit-part="catalogue-item" class="panel flex flex-col overflow-hidden">
                @if (! empty($item['image']))
                    <img data-kit-part="catalogue-image" src="{{ $item['image'] }}" alt="" loading="lazy" class="aspect-[4/3] w-full object-cover">
                @else
                    <div data-kit-part="catalogue-frame" aria-hidden="true" class="aspect-[4/3] w-full bg-canvas-alt"></div>
                @endif

                <div data-kit-part="catalogue-body" class="flex flex-1 flex-col gap-2 p-4">
                    <div data-kit-part="catalogue-row" class="flex items-baseline justify-between gap-3">
                        <h3 data-kit-part="catalogue-name" class="font-medium text-ink">{{ $item['name'] }}</h3>

                        @if (! empty($item['price']))
                            <p data-kit-part="catalogue-price" class="shrink-0 tabular-nums text-ink">{{ $item['price'] }}</p>
                        @endif
                    </div>

                    @if (! empty($item['description']))
                        <p data-kit-part="catalogue-description" class="text-sm text-ink-soft">{{ $item['description'] }}</p>
                    @endif

                    @if ($checkout && isset($item['id']))
                        <form data-kit-part="catalogue-action" method="post" action="{{ $checkout }}" class="mt-auto pt-2">
                            @csrf
                            <input type="hidden" name="item" value="{{ $item['id'] }}">
                            <x-kit.button type="submit" size="sm" class="w-full">{{ __('kit.buy') }}</x-kit.button>
                        </form>
                    @elseif (! empty($item['href']))
                        <x-kit.button variant="secondary" size="sm" :href="$item['href']" data-kit-part="catalogue-action" class="mt-auto w-full">{{ __('kit.view') }}</x-kit.button>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
@endif
