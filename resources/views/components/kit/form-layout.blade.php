@props([
    'title' => null,
    'description' => null,
    'columns' => 2,
    'actions' => null,
])

@php
    /**
     * The form layout, re-themed from the kit's forms/form-layouts group.
     *
     * The kit ships stacked, two-column, two-column-with-cards and labels-on-left
     * as four files; the difference between them is the column count and whether
     * there is a panel round it, so both are props.
     */
    $columns = in_array((int) $columns, [1, 2], true) ? (int) $columns : 2;

    $ref = '<x-kit.form-layout columns="'.$columns.'" />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel space-y-6 p-6']) }}>
    @if ($title || $description)
        <header class="space-y-1">
            @if ($title)
                <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>
            @endif

            @if ($description)
                <p class="max-w-prose text-sm text-ink-soft">{{ $description }}</p>
            @endif
        </header>
    @endif

    <div @class(['grid gap-x-6 gap-y-5', 'sm:grid-cols-2' => $columns === 2])>
        {{ $slot }}
    </div>

    @if ($actions)
        <footer class="flex items-center justify-end gap-3 border-t border-rule pt-5">{{ $actions }}</footer>
    @endif
</div>
