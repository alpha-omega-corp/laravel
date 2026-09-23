@props([
    'title' => '',
    'tone' => 'neutral',
    'actions' => null,
    'dismissible' => true,
])

@php
    /**
     * The notification, re-themed from the kit's overlays/notifications group: a
     * raised panel that a live region stacks in a corner. It is shown in place
     * here, because that corner is the application's to decide.
     */
    $tone = in_array($tone, ['neutral', 'success', 'warning'], true) ? $tone : 'neutral';

    $ref = '<x-kit.notification tone="'.$tone.'" />';

    $icons = [
        'neutral' => 'M10 8.5v5m0-8h.01M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z',
        'success' => 'm6 10.5 2.5 2.5 5.5-6M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z',
        'warning' => 'M10 7v4m0 3h.01M8.7 2.8 1.9 14.2A1.5 1.5 0 0 0 3.2 16.5h13.6a1.5 1.5 0 0 0 1.3-2.3L11.3 2.8a1.5 1.5 0 0 0-2.6 0Z',
    ];
@endphp

<div data-ref="{{ $ref }}" role="status" {{ $attributes->class(['panel panel-raised flex w-full max-w-sm gap-3 p-4']) }}>
    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"
         @class(['mt-0.5 size-5 shrink-0', 'text-accent' => $tone !== 'warning', 'text-highlight' => $tone === 'warning'])>
        <path d="{{ $icons[$tone] }}" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    <div class="min-w-0 flex-1">
        <p class="text-sm font-semibold text-ink">{{ $title }}</p>
        <div class="mt-0.5 text-sm text-ink-soft">{{ $slot }}</div>

        @if ($actions)
            <div class="mt-2 flex flex-wrap items-center gap-3">{{ $actions }}</div>
        @endif
    </div>

    @if ($dismissible)
        <button type="button" class="-m-1 shrink-0 self-start rounded-control p-1 text-ink-soft hover:bg-canvas-alt hover:text-ink">
            <span class="sr-only">{{ __('kit.dismiss') }}</span>
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
                <path d="m5 15 10-10M5 5l10 10" stroke-linecap="round" />
            </svg>
        </button>
    @endif
</div>
