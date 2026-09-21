@props([
    'value' => 0,
    'label' => null,
    'steps' => null,
    'showValue' => true,
])

@php
    /**
     * The progress bar, re-themed from the kit's navigation/progress-bars group.
     *
     * `steps` is the kit's stepped copy: the same value drawn as n segments
     * rather than one filled track.
     */
    $value = max(0, min(100, (int) $value));
    $steps = $steps ? max(2, (int) $steps) : null;
    $done = $steps ? (int) round($value / 100 * $steps) : 0;

    $ref = '<x-kit.progress'.($steps ? ' steps="'.$steps.'"' : '').' />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['space-y-2']) }}>
    @if ($label || $showValue)
        <div class="flex items-center justify-between gap-3 text-sm">
            @if ($label)
                <span class="font-medium text-ink">{{ $label }}</span>
            @endif

            @if ($showValue)
                <span class="text-ink-soft">{{ $value }}%</span>
            @endif
        </div>
    @endif

    <div role="progressbar" aria-valuenow="{{ $value }}" aria-valuemin="0" aria-valuemax="100"
         @if ($label) aria-label="{{ $label }}" @endif
         @class(['flex gap-1' => (bool) $steps, 'h-2 overflow-hidden rounded-control bg-canvas-alt' => ! $steps])>
        @if ($steps)
            @for ($step = 1; $step <= $steps; $step++)
                <span @class(['h-2 flex-1 rounded-control', 'bg-accent' => $step <= $done, 'bg-canvas-alt' => $step > $done])></span>
            @endfor
        @else
            <span class="block h-full rounded-control bg-accent" style="width: {{ $value }}%"></span>
        @endif
    </div>
</div>
