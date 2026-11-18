@props([
    'title' => null,
    'intro' => null,
    'zones' => null,
    'note' => null,
    'variant' => null,
])

@php
    /**
     * Where the business comes to you, and on what terms: a zone a row — a
     * town, a district, a ring of postcodes — with what the delivery costs
     * there, the least order it takes and how long it is on the way. A
     * prefab: a pizzeria's towns, a florist's rounds, a caterer's radius, a
     * farm's box scheme all answer "do you come to me, and what does it cost"
     * before anything is ordered.
     *
     * **The terms are the owner's, as written**: `fee` ("4.–", "Offerte"),
     * `minimum` ("25.–") and `time` ("30–45 min", "le jour même") are printed
     * as given and never computed, and a term a zone does not have is left
     * out rather than shown empty. `line` names what the zone also covers
     * ("Et Pully, Lutry"). Twelve zones at most; a place not listed is not
     * delivered, which `note` may say in so many words.
     *
     * **Explicit props win, then what the site binds as `kit.delivery`**,
     * keyed by these same names, taken as a set and only when the tag gives no
     * `zones`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, line?: string, fee?: string, minimum?: string, time?: string}> $zones
     */
    if ($zones === null) {
        $bound = app()->bound('kit.delivery') ? app('kit.delivery') : [];
        $zones = $bound['zones'] ?? [];
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
        $note ??= $bound['note'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['table', 'cards'], true) ? $variant : null;

    $terms = ['fee' => __('kit.delivery.fee'), 'minimum' => __('kit.delivery.minimum'), 'time' => __('kit.delivery.time')];

    $ref = '<x-kit.delivery />';
@endphp

@if (filled($zones))
    <section data-ref="{{ $ref }}" data-kit="delivery" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="delivery-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @if ($intro)
            <p data-kit-part="delivery-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
        @endif

        <ul data-kit-part="delivery-list" role="list" class="panel divide-y divide-rule px-6 py-2">
            @foreach ($zones as $zone)
                <li data-kit-part="delivery-zone" class="flex flex-wrap items-center justify-between gap-x-6 gap-y-2 py-4">
                    <div data-kit-part="delivery-place" class="flex min-w-0 items-start gap-3">
                        <x-kit.icon name="map-pin" class="mt-1 size-4 shrink-0 text-ink-soft" />
                        <div class="min-w-0">
                            <h3 data-kit-part="delivery-name" class="font-display text-lg text-ink">{{ $zone['name'] }}</h3>

                            @if (! empty($zone['line']))
                                <p data-kit-part="delivery-line" class="text-sm text-ink-soft">{{ $zone['line'] }}</p>
                            @endif
                        </div>
                    </div>

                    @if (array_filter(array_intersect_key($zone, $terms)))
                        <dl data-kit-part="delivery-terms" class="flex flex-wrap gap-x-6 gap-y-1 text-sm">
                            @foreach ($terms as $key => $label)
                                @if (! empty($zone[$key]))
                                    <div data-kit-part="delivery-term" data-term="{{ $key }}" class="flex items-baseline gap-1.5">
                                        <dt class="text-ink-soft">{{ $label }}</dt>
                                        <dd class="font-semibold tabular-nums text-ink">{{ $zone[$key] }}</dd>
                                    </div>
                                @endif
                            @endforeach
                        </dl>
                    @endif
                </li>
            @endforeach
        </ul>

        @if ($note)
            <p data-kit-part="delivery-note" class="text-sm text-ink-soft">{{ $note }}</p>
        @endif
    </section>
@endif
