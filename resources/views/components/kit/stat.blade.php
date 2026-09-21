@props([
    'label' => '',
    'value' => '',
    'change' => null,
    'direction' => null,
])

@php
    /**
     * The stat, re-themed from the kit's data-display/stats group.
     *
     * The figure uses the palette's own --text-figure step, which is why it is
     * a tight 4rem in orchard and 2.5rem in graphite without a size prop.
     */
    $direction = in_array($direction, ['up', 'down'], true) ? $direction : null;

    $ref = '<x-kit.stat />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel p-6']) }}>
    <p class="text-sm font-medium text-ink-soft">{{ $label }}</p>

    <div class="mt-2 flex items-baseline gap-2">
        <p class="font-display text-figure text-ink">{{ $value }}</p>

        @if ($change)
            <p @class(['inline-flex items-center gap-0.5 text-sm font-semibold', 'text-accent' => $direction !== 'down', 'text-ink-soft' => $direction === 'down'])>
                @if ($direction)
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-3.5">
                        <path d="{{ $direction === 'up' ? 'M10 15.5v-11m0 0-4.5 4.5M10 4.5l4.5 4.5' : 'M10 4.5v11m0 0-4.5-4.5M10 15.5l4.5-4.5' }}" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                @endif
                {{ $change }}
            </p>
        @endif
    </div>
</div>
