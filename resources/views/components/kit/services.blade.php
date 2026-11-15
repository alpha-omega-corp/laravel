@props([
    'title' => null,
    'services' => null,
    'variant' => null,
])

@php
    /**
     * What the business does, a card per service: an icon, its name and one
     * line. A prefab — a law firm's fields of practice, a garage's jobs, a
     * builder's trades and an agency's offers are all a short list of nouns a
     * visitor scans for their own.
     *
     * **One line each, and a price only when it is the owner's.** `line` says
     * what the service is in the customer's words; `price` is printed as it is
     * written — "dès CHF 120", "sur devis" — and is left out rather than
     * guessed. `icon` is a Lucide name (`<x-kit.icon>`): a name the set does
     * not have draws no icon and the card stands without it. `href` makes the
     * whole card the link to the service's own page.
     *
     * It is not `features`: features are the page's own blocks, written with
     * it, each with a photograph; services are the owner's rows, edited in the
     * admin and drawn here whatever the page says.
     *
     * **Explicit props win, then what the site binds as `kit.services`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `services`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, line?: string, icon?: string, price?: string, href?: string}> $services
     */
    if ($services === null) {
        $bound = app()->bound('kit.services') ? app('kit.services') : [];
        $services = $bound['services'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['rows', 'tiles'], true) ? $variant : null;

    $ref = '<x-kit.services />';
@endphp

@if (filled($services))
    <section data-ref="{{ $ref }}" data-kit="services" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="services-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ul data-kit-part="services-list" role="list" class="flex flex-wrap gap-5 [--row-item:16rem]">
            @foreach ($services as $service)
                <li data-kit-part="services-item" class="panel relative flex flex-col gap-3 p-5">
                    @if (! empty($service['icon']))
                        <span data-kit-part="services-icon" class="text-accent">
                            <x-kit.icon :name="$service['icon']" class="size-7" />
                        </span>
                    @endif

                    <h3 data-kit-part="services-name" class="font-display text-lg text-ink">
                        @if (! empty($service['href']))
                            <a data-kit-part="services-link" href="{{ $service['href'] }}" class="after:absolute after:inset-0">{{ $service['name'] }}</a>
                        @else
                            {{ $service['name'] }}
                        @endif
                    </h3>

                    @if (! empty($service['line']))
                        <p data-kit-part="services-line" class="text-sm text-ink-soft">{{ $service['line'] }}</p>
                    @endif

                    @if (! empty($service['price']))
                        <p data-kit-part="services-price" class="mt-auto text-sm font-medium tabular-nums text-ink">{{ $service['price'] }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
@endif
