@props([
    'title' => null,
    'intro' => null,
    'plans' => null,
    'note' => null,
    'variant' => null,
])

@php
    /**
     * What it costs, plan by plan: a name, a price and its period, one line on
     * who it is for, what it includes and the one thing to do. A prefab — a
     * software product's tiers, a coworking space's memberships, a gym's
     * passes and a school's terms are all two to four plans read side by side.
     *
     * **The price is printed as the owner wrote it**, currency and all — "CHF
     * 29", "dès 480.–", "Sur devis" — and is never computed, converted or made
     * up; `period` is the words after it ("par mois", "par poste"). One plan
     * may be `featured`, and its `flag` says why in the owner's words ("Le
     * plus choisi"): with no flag it is only drawn stronger, since a badge
     * that claims popularity nobody measured is a lie with a border.
     *
     * **It never takes a payment.** A plan's `href` leads somewhere — a
     * contact form, a sign-up, a call — under its own `label`. Charging a card
     * is deployer's `/stripe`, which wires a checkout to the catalogue; a
     * pricing table that posted money would be a second one nobody tested.
     *
     * **Explicit props win, then what the site binds as `kit.pricing`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `plans`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, price: string, period?: string, line?: string, includes?: list<string>, href?: string, label?: string, featured?: bool, flag?: string}> $plans
     */
    if ($plans === null) {
        $bound = app()->bound('kit.pricing') ? app('kit.pricing') : [];
        $plans = $bound['plans'] ?? [];
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
        $note ??= $bound['note'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['rows'], true) ? $variant : null;

    $ref = '<x-kit.pricing />';
@endphp

@if (filled($plans))
    <section data-ref="{{ $ref }}" data-kit="pricing" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="pricing-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @if ($intro)
            <p data-kit-part="pricing-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
        @endif

        <ul data-kit-part="pricing-list" role="list" class="grid items-stretch gap-5 grid-cols-[repeat(auto-fit,minmax(min(100%,16rem),1fr))]">
            @foreach ($plans as $plan)
                <li data-kit-part="pricing-plan" @class(['panel flex flex-col gap-4 p-6', 'panel-raised ring-2 ring-accent' => ! empty($plan['featured'])])>
                    <div class="flex items-center justify-between gap-3">
                        <h3 data-kit-part="pricing-name" class="font-display text-lg text-ink">{{ $plan['name'] }}</h3>

                        @if (! empty($plan['featured']) && ! empty($plan['flag']))
                            <p data-kit-part="pricing-flag" class="rounded-control bg-highlight px-2 py-0.5 text-xs font-semibold text-on-highlight">{{ $plan['flag'] }}</p>
                        @endif
                    </div>

                    <p class="flex flex-wrap items-baseline gap-x-2">
                        <span data-kit-part="pricing-price" class="font-display text-4xl tabular-nums text-ink">{{ $plan['price'] }}</span>

                        @if (! empty($plan['period']))
                            <span data-kit-part="pricing-period" class="text-sm text-ink-soft">{{ $plan['period'] }}</span>
                        @endif
                    </p>

                    @if (! empty($plan['line']))
                        <p data-kit-part="pricing-line" class="text-sm text-ink-soft">{{ $plan['line'] }}</p>
                    @endif

                    @if (! empty($plan['includes']))
                        <ul data-kit-part="pricing-includes" role="list" class="space-y-2 border-t border-rule pt-4 text-sm text-ink">
                            @foreach ($plan['includes'] as $included)
                                <li data-kit-part="pricing-include" class="flex items-start gap-2">
                                    <x-kit.icon name="check" class="mt-0.5 size-4 shrink-0 text-accent" />
                                    <span>{{ $included }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (! empty($plan['href']))
                        <p data-kit-part="pricing-action" class="mt-auto pt-2">
                            <x-kit.button :variant="empty($plan['featured']) ? 'secondary' : 'primary'" :href="$plan['href']" class="w-full">{{ $plan['label'] ?? __('kit.pricing.choose') }}</x-kit.button>
                        </p>
                    @endif
                </li>
            @endforeach
        </ul>

        @if ($note)
            <p data-kit-part="pricing-note" class="text-sm text-ink-soft">{{ $note }}</p>
        @endif
    </section>
@endif
