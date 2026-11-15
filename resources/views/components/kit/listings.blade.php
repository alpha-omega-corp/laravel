@props([
    'title' => null,
    'listings' => null,
    'variant' => null,
])

@php
    /**
     * Things offered one at a time, each with the facts it is chosen by: a
     * flat with its rooms, its surface and its floor; a car with its year, its
     * mileage and its gearbox; a pitch, a boat, a workshop to let. A prefab —
     * an estate agency, a garage and a campsite all list what they have until
     * it is gone.
     *
     * **It is not the catalogue.** A catalogue sells the same thing again
     * tomorrow; a listing is one object, described by `facts` — `label` and
     * `value`, three to five of them — and it ends: `status` says where it
     * stands in the owner's words ("Réservé", "Vendu", "Nouveau"), and a sold
     * one stays a while because it shows what the agency sells. The `price`
     * is printed as written, "CHF 1 850.–/mois" or "Prix sur demande".
     *
     * A listing with no photograph keeps the photograph's frame; a picture of
     * another flat is never put there. `href` opens the listing's own page.
     *
     * **Explicit props win, then what the site binds as `kit.listings`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `listings`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, place?: string, price?: string, status?: string, facts?: list<array{label: string, value: string}>, image?: string, alt?: string, href?: string}> $listings
     */
    if ($listings === null) {
        $bound = app()->bound('kit.listings') ? app('kit.listings') : [];
        $listings = $bound['listings'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['rows', 'feature'], true) ? $variant : null;

    $ref = '<x-kit.listings />';
@endphp

@if (filled($listings))
    <section data-ref="{{ $ref }}" data-kit="listings" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="listings-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ul data-kit-part="listings-list" role="list" class="grid gap-6 grid-cols-[repeat(auto-fill,minmax(min(100%,17rem),1fr))]">
            @foreach ($listings as $listing)
                <li data-kit-part="listings-item" class="panel relative flex flex-col overflow-hidden">
                    <div data-kit-part="listings-picture" class="relative">
                        @if (! empty($listing['image']))
                            <img data-kit-part="listings-image" src="{{ $listing['image'] }}" alt="{{ $listing['alt'] ?? '' }}" loading="lazy" decoding="async" class="aspect-[4/3] w-full object-cover">
                        @else
                            <div data-kit-part="listings-frame" aria-hidden="true" class="aspect-[4/3] w-full bg-canvas-alt"></div>
                        @endif

                        @if (! empty($listing['status']))
                            <p data-kit-part="listings-status" class="absolute start-3 top-3 rounded-control bg-highlight px-2 py-0.5 text-xs font-semibold text-on-highlight">{{ $listing['status'] }}</p>
                        @endif
                    </div>

                    <div data-kit-part="listings-body" class="flex flex-1 flex-col gap-2 p-5">
                        <h3 data-kit-part="listings-name" class="font-display text-lg text-ink">
                            @if (! empty($listing['href']))
                                <a data-kit-part="listings-link" href="{{ $listing['href'] }}" class="after:absolute after:inset-0">{{ $listing['name'] }}</a>
                            @else
                                {{ $listing['name'] }}
                            @endif
                        </h3>

                        @if (! empty($listing['place']))
                            <p data-kit-part="listings-place" class="text-sm text-ink-soft">{{ $listing['place'] }}</p>
                        @endif

                        @if (! empty($listing['facts']))
                            <dl data-kit-part="listings-facts" class="grid grid-cols-[repeat(auto-fit,minmax(5.5rem,1fr))] gap-x-4 gap-y-2 border-t border-rule pt-3">
                                @foreach ($listing['facts'] as $fact)
                                    <div data-kit-part="listings-fact" class="flex flex-col">
                                        <dt class="text-xs text-ink-soft">{{ $fact['label'] }}</dt>
                                        <dd class="text-sm font-medium tabular-nums text-ink">{{ $fact['value'] }}</dd>
                                    </div>
                                @endforeach
                            </dl>
                        @endif

                        @if (! empty($listing['price']))
                            <p data-kit-part="listings-price" class="mt-auto pt-1 font-display text-xl tabular-nums text-ink">{{ $listing['price'] }}</p>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endif
