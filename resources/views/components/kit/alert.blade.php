@props([
    'tone' => 'info',
    'title' => null,
    'actions' => null,
])

@php
    /**
     * The alert, re-themed from the kit's feedback/alerts group.
     *
     * The kit colours its four tones from four hues of Tailwind's palette. A
     * palette here has one accent and one highlight, so the tone is carried by
     * the icon and a tint of those, and the surface stays the page's own.
     */
    $tone = in_array($tone, ['info', 'success', 'warning', 'danger'], true) ? $tone : 'info';

    $ref = '<x-kit.alert tone="'.$tone.'" />';

    $icons = [
        'info' => 'M10 8.5v5m0-8h.01M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z',
        'success' => 'm6 10.5 2.5 2.5 5.5-6M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z',
        'warning' => 'M10 7v4m0 3h.01M8.7 2.8 1.9 14.2A1.5 1.5 0 0 0 3.2 16.5h13.6a1.5 1.5 0 0 0 1.3-2.3L11.3 2.8a1.5 1.5 0 0 0-2.6 0Z',
        'danger' => 'm7 7 6 6m0-6-6 6M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z',
    ];
@endphp

<div data-ref="{{ $ref }}" role="alert" {{ $attributes->class([
    'flex gap-3 rounded-panel border p-4',
    'border-rule bg-canvas-alt' => in_array($tone, ['info', 'success'], true),
    'border-highlight bg-highlight/15' => $tone === 'warning',
    'border-accent bg-accent/10' => $tone === 'danger',
]) }}>
    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"
         @class(['mt-0.5 size-5 shrink-0', 'text-accent' => $tone !== 'warning', 'text-highlight' => $tone === 'warning'])>
        <path d="{{ $icons[$tone] }}" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    <div class="min-w-0 flex-1 space-y-1">
        @if ($title)
            <p class="text-sm font-semibold text-ink">{{ $title }}</p>
        @endif

        <div class="text-sm text-ink-soft">{{ $slot }}</div>

        @if ($actions)
            <div class="flex flex-wrap items-center gap-3 pt-1">{{ $actions }}</div>
        @endif
    </div>
</div>
