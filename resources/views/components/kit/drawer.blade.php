@props([
    'id' => null,
    'title' => '',
    'side' => 'end',
    'open' => false,
    'actions' => null,
])

@php
    /**
     * The drawer, re-themed from the kit's overlays/drawers group: the modal's
     * panel, pinned to one edge and full height. Same native <dialog>, same
     * `open` prop for showing it on a page rather than over one.
     */
    $side = in_array($side, ['start', 'end'], true) ? $side : 'end';

    $id ??= 'drawer-'.uniqid();

    $ref = '<x-kit.drawer side="'.$side.'" />';
@endphp

@if ($open)
    <div data-ref="{{ $ref }}" {{ $attributes->class(['panel flex h-80 w-full max-w-sm flex-col overflow-hidden']) }}>
@else
    <dialog id="{{ $id }}" data-ref="{{ $ref }}"
            {{ $attributes->class([
                'panel panel-raised flex h-full w-full max-w-sm flex-col overflow-hidden backdrop:bg-ink/60',
                'mr-auto ml-0' => $side === 'start',
                'mr-0 ml-auto' => $side === 'end',
            ]) }}>
@endif

    <header class="flex items-center justify-between gap-4 border-b border-rule px-4 py-3">
        <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>

        <button type="button" @if (! $open) command="close" commandfor="{{ $id }}" @endif
                class="rounded-control p-1 text-ink-soft hover:bg-canvas-alt hover:text-ink">
            <span class="sr-only">{{ __('ui_kit.element.drawer.close') }}</span>
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
                <path d="m5 15 10-10M5 5l10 10" stroke-linecap="round" />
            </svg>
        </button>
    </header>

    <div class="min-h-0 flex-1 overflow-y-auto px-4 py-4 text-sm text-ink-soft">{{ $slot }}</div>

    @if ($actions)
        <footer class="flex items-center justify-end gap-3 border-t border-rule px-4 py-3">{{ $actions }}</footer>
    @endif

@if ($open)
    </div>
@else
    </dialog>
@endif
