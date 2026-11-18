@props([
    'title' => null,
    'intro' => null,
    'deals' => null,
    'note' => null,
    'variant' => null,
])

@php
    /**
     * The house's offers: what costs less, when, and how to take it — a
     * pizzeria's Tuesday two-for-one, a bakery's bag of yesterday's bread, a
     * café's lunch formula, a garage's winter check. A prefab: any business
     * that sells the same things at another price on some days owes its
     * visitor the day and the price side by side.
     *
     * **An offer is the owner's, in their words and at their price.** Each has
     * its `name`, one `line` on what is in it, its `price` as written ("2 pour
     * 30.–", "dès 12.50") and `was`, the usual price, struck through beside it
     * only when the owner gives one; `when` says when it holds ("Le mardi
     * soir", "Jusqu'au 30 novembre"), and `flag` one short word on the corner
     * ("Nouveau"). An offer with no day is a price, and belongs on the menu.
     * Four at most: past that none of them is an offer.
     *
     * **It never takes an order itself.** An offer's `href` leads to the menu,
     * the basket or the phone, under its own `label`; checkout is deployer's
     * `/stripe` on the catalogue.
     *
     * **Explicit props win, then what the site binds as `kit.deals`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `deals`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, price: string, was?: string, line?: string, when?: string, flag?: string, href?: string, label?: string}> $deals
     */
    if ($deals === null) {
        $bound = app()->bound('kit.deals') ? app('kit.deals') : [];
        $deals = $bound['deals'] ?? [];
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
        $note ??= $bound['note'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['ticket', 'banner'], true) ? $variant : null;

    $ref = '<x-kit.deals />';
@endphp

@if (filled($deals))
    <section data-ref="{{ $ref }}" data-kit="deals" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="deals-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @if ($intro)
            <p data-kit-part="deals-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
        @endif

        <ul data-kit-part="deals-list" role="list" class="flex flex-wrap items-stretch gap-5 [--row-item:17rem]">
            @foreach ($deals as $deal)
                <li data-kit-part="deals-item" class="panel relative flex flex-col gap-3 p-6">
                    @if (! empty($deal['when']) || ! empty($deal['flag']))
                        <div data-kit-part="deals-head" class="flex flex-wrap items-center justify-between gap-2">
                            @if (! empty($deal['when']))
                                <p data-kit-part="deals-when" class="inline-flex items-center gap-1.5 text-sm font-medium text-ink-soft">
                                    <x-kit.icon name="calendar-clock" class="size-4 shrink-0" />
                                    <span>{{ $deal['when'] }}</span>
                                </p>
                            @endif

                            @if (! empty($deal['flag']))
                                <p data-kit-part="deals-flag" class="rounded-control bg-highlight px-2 py-0.5 text-xs font-semibold text-on-highlight">{{ $deal['flag'] }}</p>
                            @endif
                        </div>
                    @endif

                    <h3 data-kit-part="deals-name" class="font-display text-xl text-ink">{{ $deal['name'] }}</h3>

                    @if (! empty($deal['line']))
                        <p data-kit-part="deals-line" class="text-sm text-ink-soft">{{ $deal['line'] }}</p>
                    @endif

                    <div data-kit-part="deals-foot" class="mt-auto flex flex-wrap items-end justify-between gap-x-4 gap-y-3 pt-2">
                        <p data-kit-part="deals-prices" class="flex flex-wrap items-baseline gap-x-2">
                            <span data-kit-part="deals-price" class="font-display text-3xl tabular-nums text-ink">{{ $deal['price'] }}</span>

                            @if (! empty($deal['was']))
                                <s data-kit-part="deals-was" class="text-sm tabular-nums text-ink-soft"><span class="sr-only">{{ __('kit.deals.was') }}</span> {{ $deal['was'] }}</s>
                            @endif
                        </p>

                        @if (! empty($deal['href']))
                            <x-kit.button :href="$deal['href']" size="sm" data-kit-part="deals-action">{{ $deal['label'] ?? __('kit.deals.take') }}</x-kit.button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>

        @if ($note)
            <p data-kit-part="deals-note" class="text-sm text-ink-soft">{{ $note }}</p>
        @endif
    </section>
@endif
