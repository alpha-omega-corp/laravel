@props([
    'month' => null,
    'selected' => null,
    'marked' => [],
])

@php
    use Illuminate\Support\Carbon;

    /**
     * The calendar, re-themed from the kit's data-display/calendars group.
     *
     * The grid is computed rather than written out: the kit's markup is one
     * month of hard-coded cells, which is a month that never changes. The
     * weekdays are the locale's, starting where it starts its week; each day
     * says its whole date to a screen reader, today is ringed, the choice filled.
     *
     * @var array<int, int> $marked
     */
    $first = $month ? Carbon::parse($month)->startOfMonth() : Carbon::now()->startOfMonth();
    $start = $first->copy()->startOfWeek();
    $end = $first->copy()->endOfMonth()->endOfWeek();

    $ref = '<x-kit.calendar />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel p-4']) }}>
    <div class="flex items-center justify-between px-1 pb-3">
        <p class="text-sm font-semibold text-ink">{{ ucfirst($first->translatedFormat('F Y')) }}</p>
    </div>

    <div class="grid grid-cols-7 gap-px text-center text-xs text-ink-soft">
        {{-- The week's own first day and names, in the page's language: the grid starts where the locale starts its week. --}}
        @for ($weekday = $start->copy(), $i = 0; $i < 7; $weekday->addDay(), $i++)
            <abbr aria-hidden="true" title="{{ ucfirst($weekday->translatedFormat('l')) }}" class="py-1 font-medium no-underline">{{ mb_strtoupper(mb_substr($weekday->translatedFormat('D'), 0, 2)) }}</abbr>
        @endfor

        @for ($day = $start->copy(); $day <= $end; $day->addDay())
            @php
                $isMonth = $day->month === $first->month;
                $isSelected = $selected && $day->isSameDay(Carbon::parse($selected));
                $isToday = $day->isToday();
                $isMarked = $isMonth && in_array($day->day, $marked, true);
            @endphp

            <button type="button"
                    aria-label="{{ $day->translatedFormat('l j F Y') }}"
                    aria-pressed="{{ $isSelected ? 'true' : 'false' }}"
                    @if ($isToday) aria-current="date" @endif
                    @class([
                // min-h keeps the marked dot off the row above when the calendar
                // is given a narrow column: aspect-square alone collapses the cell.
                'relative aspect-square min-h-8 rounded-control text-sm tabular-nums transition-colors',
                'text-ink hover:bg-canvas-alt' => $isMonth && ! $isSelected,
                'text-ink-soft/50 hover:bg-canvas-alt/60' => ! $isMonth,
                'bg-accent font-semibold text-on-accent' => $isSelected,
                // Today is ringed, not filled: the fill is the choice.
                'font-semibold ring-1 ring-inset ring-accent' => $isToday && ! $isSelected,
            ])>
                {{ $day->day }}

                @if ($isMarked && ! $isSelected)
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-1 mx-auto size-1 rounded-full bg-accent"></span>
                @endif
            </button>
        @endfor
    </div>
</div>
