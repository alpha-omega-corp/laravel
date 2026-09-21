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
     * month of hard-coded cells, which is a month that never changes.
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
        <p class="text-sm font-semibold text-ink">{{ $first->translatedFormat('F Y') }}</p>
    </div>

    <div class="grid grid-cols-7 gap-px text-center text-xs text-ink-soft">
        @foreach (['M', 'T', 'W', 'T', 'F', 'S', 'S'] as $weekday)
            <div class="py-1 font-medium">{{ $weekday }}</div>
        @endforeach

        @for ($day = $start->copy(); $day <= $end; $day->addDay())
            @php
                $isMonth = $day->month === $first->month;
                $isSelected = $selected && $day->isSameDay(Carbon::parse($selected));
            @endphp

            <button type="button" @class([
                // min-h keeps the marked dot off the row above when the calendar
                // is given a narrow column: aspect-square alone collapses the cell.
                'relative aspect-square min-h-8 rounded-control text-sm',
                'text-ink hover:bg-canvas-alt' => $isMonth && ! $isSelected,
                'text-ink-soft/50' => ! $isMonth,
                'bg-accent font-semibold text-on-accent' => $isSelected,
            ])>
                {{ $day->day }}

                @if ($isMonth && in_array($day->day, $marked, true) && ! $isSelected)
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-1 mx-auto size-1 rounded-full bg-accent"></span>
                @endif
            </button>
        @endfor
    </div>
</div>
