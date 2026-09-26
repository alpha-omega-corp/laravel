@props([
    'items' => [],
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
     * @var array<int, array{id?: string|int, name: string, price?: string, description?: string, image?: string, href?: string}> $items
     */
    $ref = '<x-kit.catalogue'.($checkout ? ' checkout' : '').' />';
@endphp

<ul role="list" data-ref="{{ $ref }}" {{ $attributes->class(['grid gap-6 sm:grid-cols-2 lg:grid-cols-3']) }}>
    @foreach ($items as $item)
        <li class="panel flex flex-col overflow-hidden">
            @if (! empty($item['image']))
                <img src="{{ $item['image'] }}" alt="" loading="lazy" class="aspect-[4/3] w-full object-cover">
            @else
                <div aria-hidden="true" class="aspect-[4/3] w-full bg-canvas-alt"></div>
            @endif

            <div class="flex flex-1 flex-col gap-2 p-4">
                <div class="flex items-baseline justify-between gap-3">
                    <h3 class="font-medium text-ink">{{ $item['name'] }}</h3>

                    @if (! empty($item['price']))
                        <p class="shrink-0 tabular-nums text-ink">{{ $item['price'] }}</p>
                    @endif
                </div>

                @if (! empty($item['description']))
                    <p class="text-sm text-ink-soft">{{ $item['description'] }}</p>
                @endif

                @if ($checkout && isset($item['id']))
                    <form method="post" action="{{ $checkout }}" class="mt-auto pt-2">
                        @csrf
                        <input type="hidden" name="item" value="{{ $item['id'] }}">
                        <x-kit.button type="submit" size="sm" class="w-full">{{ __('kit.buy') }}</x-kit.button>
                    </form>
                @elseif (! empty($item['href']))
                    <x-kit.button variant="secondary" size="sm" :href="$item['href']" class="mt-auto w-full">{{ __('kit.view') }}</x-kit.button>
                @endif
            </div>
        </li>
    @endforeach
</ul>
