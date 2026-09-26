@props([
    'title' => null,
    'days' => [],
    'note' => null,
])

@php
    /**
     * Opening hours. A prefab: a piece nearly every kind of business has — a
     * farm and a restaurant are both open some hours and not others.
     *
     * A day with no `hours` is **closed**, said in words rather than left blank:
     * an empty cell reads as a page nobody finished, and "closed" is the one
     * answer a visitor came to check. Hours are a string as the business writes
     * them — "11:30–14:00 · 18:30–22:00" — never parsed here.
     *
     * @var array<int, array{day: string, hours?: ?string}> $days
     */
    $ref = '<x-kit.schedule />';
@endphp

<section data-ref="{{ $ref }}" {{ $attributes->class(['panel p-5 sm:p-6']) }}>
    @if ($title)
        <h2 class="font-display text-lg text-ink">{{ $title }}</h2>
    @endif

    <dl @class(['divide-y divide-rule', 'mt-3' => $title])>
        @foreach ($days as $day)
            <div class="flex items-baseline justify-between gap-4 py-2.5 text-sm">
                <dt class="font-medium text-ink">{{ $day['day'] }}</dt>

                @if (filled($day['hours'] ?? null))
                    <dd class="text-right tabular-nums text-ink">{{ $day['hours'] }}</dd>
                @else
                    <dd class="text-right text-ink-soft">{{ __('kit.closed') }}</dd>
                @endif
            </div>
        @endforeach
    </dl>

    @if ($note)
        <p class="mt-3 text-sm text-ink-soft">{{ $note }}</p>
    @endif
</section>
