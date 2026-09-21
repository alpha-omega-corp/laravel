@props([
    'id' => null,
    'title' => '',
    'tone' => 'neutral',
    'actions' => null,
    'open' => false,
])

@php
    /**
     * The modal dialog, re-themed from the kit's overlays/modal-dialogs group.
     *
     * A native <dialog>: the top layer, the backdrop, the escape key and the
     * focus trap are the browser's, and the kit's own version reimplements all
     * four. `open` renders it in place instead, which is how the page shows one
     * without opening it.
     */
    $id ??= 'modal-'.uniqid();
    $tone = in_array($tone, ['neutral', 'danger'], true) ? $tone : 'neutral';

    $ref = '<x-kit.modal tone="'.$tone.'" />';

    $panel = 'panel panel-raised w-full max-w-lg space-y-4 p-6 text-left';
@endphp

@if ($open)
    {{-- Shown in place, so a page can document the dialog without opening it. --}}
    <div data-ref="{{ $ref }}" {{ $attributes->class([$panel]) }}>
@else
    <dialog id="{{ $id }}" data-ref="{{ $ref }}"
            {{ $attributes->class([$panel, 'backdrop:bg-ink/60']) }}>
@endif

    <div class="flex items-start gap-4">
        <span @class([
            'grid size-10 shrink-0 place-items-center rounded-full',
            'bg-canvas-alt text-accent' => $tone === 'neutral',
            'bg-highlight/20 text-highlight' => $tone === 'danger',
        ])>
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-5">
                <path d="{{ $tone === 'danger' ? 'M10 7v4m0 3h.01M8.7 2.8 1.9 14.2A1.5 1.5 0 0 0 3.2 16.5h13.6a1.5 1.5 0 0 0 1.3-2.3L11.3 2.8a1.5 1.5 0 0 0-2.6 0Z' : 'M10 8.5v5m0-8h.01M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z' }}" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>

        <div class="min-w-0 flex-1">
            <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>
            <div class="mt-1 text-sm text-ink-soft">{{ $slot }}</div>
        </div>
    </div>

    @if ($actions)
        <div class="flex flex-wrap items-center justify-end gap-3">{{ $actions }}</div>
    @endif

@if ($open)
    </div>
@else
    </dialog>
@endif
