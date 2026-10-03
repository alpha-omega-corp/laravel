@props([
    'title' => null,
    'days' => null,
    'note' => null,
    'variant' => null,
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
     * **Explicit props win, then what the site binds as `kit.schedule`**, keyed
     * by these same names — the base package binds it to the hours the owner
     * edits. Bound data is taken **as a set, and only when the tag gives no
     * `days`**: a tag with its own week must not print the owner's closure
     * note under it. With no days from either it renders nothing: a week of
     * "closed" nobody entered is a claim, and a false one.
     *
     * @var array<int, array{day: string, hours?: ?string}> $days
     */
    if ($days === null) {
        $bound = app()->bound('kit.schedule') ? app('kit.schedule') : [];
        $days = $bound['days'] ?? [];
        $title ??= $bound['title'] ?? null;
        $note ??= $bound['note'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['strip', 'plain'], true) ? $variant : null;

    $ref = '<x-kit.schedule />';
@endphp

@if (filled($days))
    <section data-ref="{{ $ref }}" data-kit="schedule" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['panel p-5 sm:p-6']) }}>
        @if ($title)
            <h2 data-kit-part="schedule-title" class="font-display text-lg text-ink">{{ $title }}</h2>
        @endif

        <dl data-kit-part="schedule-days" @class(['divide-y divide-rule', 'mt-3' => $title])>
            @foreach ($days as $day)
                <div data-kit-part="schedule-day" class="flex items-baseline justify-between gap-4 py-2.5 text-sm">
                    <dt data-kit-part="schedule-dayname" class="font-medium text-ink">{{ $day['day'] }}</dt>

                    @if (filled($day['hours'] ?? null))
                        <dd data-kit-part="schedule-hours" class="text-right tabular-nums text-ink">{{ $day['hours'] }}</dd>
                    @else
                        <dd data-kit-part="schedule-closed" class="text-right text-ink-soft">{{ __('kit.closed') }}</dd>
                    @endif
                </div>
            @endforeach
        </dl>

        @if ($note)
            <p data-kit-part="schedule-note" class="mt-3 text-sm text-ink-soft">{{ $note }}</p>
        @endif
    </section>
@endif
