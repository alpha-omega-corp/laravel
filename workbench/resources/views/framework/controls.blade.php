{{--
    The framework tab's controls, beside the site rather than over it: the site
    is what the tab is for, so it takes the main column and the height the
    window has, and every axis that decides it is one column of rows at its
    side. A row is a heading over its choices, so a long one (nine projects,
    a business's dozen pages) wraps inside the column instead of pushing the
    site down.

    Sticky from `lg` up, under the bar, and scrolling itself when it is taller
    than the window, so the pointer finds the controls where it left them
    however far the site has been read. Below `lg` the column comes first and
    the site under it, as the rows used to stand.

    A row of more than ten choices is folded under the one chosen, and drawn
    open when it says `open` (the contact sheet's businesses, which are the
    whole of its column). Given
    `rows` (the axes) and, on the business views, `arrangements`: one row
    a component of the page that can be arranged, folded under its own summary
    and opened when the address already overrides one.
--}}
@php
    $arrangements ??= [];
    $arranged ??= false;
    $long = 10;
@endphp

<aside data-ref="framework.controls" aria-label="{{ $label }}"
       class="panel divide-y divide-rule lg:sticky lg:top-20 lg:max-h-[calc(100dvh-6rem)] lg:overflow-y-auto lg:overscroll-contain">
    @foreach ($rows as $row)
        @if (count($row['items']) > $long)
            {{-- A long row (the forty-odd businesses, a dozen designs, twenty palettes) is folded under its current choice, or it would be the whole column. --}}
            <details class="group px-3 py-2.5" @if (! empty($row['open'])) open @endif>
                <summary class="flex cursor-pointer items-baseline gap-2 text-xs">
                    <span class="font-semibold tracking-wide text-ink-soft uppercase">{{ $row['heading'] }}</span>
                    <span class="min-w-0 truncate text-sm font-medium text-ink">{{ collect($row['items'])->firstWhere('current', true)['label'] ?? '' }}</span>
                    <span class="ms-auto text-ink-soft">{{ count($row['items']) }}</span>
                </summary>
                <x-kit.tabs variant="pill" class="mt-1.5" :items="$row['items']" :aria-label="$row['heading']" />
            </details>
        @else
            <div class="space-y-1.5 px-3 py-2.5">
                <span class="block text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ $row['heading'] }}</span>
                <x-kit.tabs variant="pill" :items="$row['items']" :aria-label="$row['heading']" />
            </div>
        @endif
    @endforeach

    @if ($arrangements !== [])
        <details data-ref="framework.arrangements" @if ($arranged) open @endif>
            <summary class="cursor-pointer px-3 py-2.5 text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.arrangements') }} · {{ count($arrangements) }}</summary>

            <div class="divide-y divide-rule border-t border-rule">
                @foreach ($arrangements as $row)
                    <div class="space-y-1.5 px-3 py-2.5">
                        <span class="block font-mono text-xs text-ink">{{ $row['heading'] }}</span>
                        <x-kit.tabs variant="pill" :items="$row['items']" :aria-label="$row['heading']" />
                    </div>
                @endforeach
            </div>
        </details>
    @endif
</aside>
