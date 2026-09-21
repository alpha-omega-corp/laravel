@props([
    'title' => '',
    'action' => null,
    'inline' => false,
])

@php
    /**
     * The action panel, re-themed from the kit's forms/action-panels group: a
     * panel whose whole purpose is the one control at the end of it.
     */
    $ref = '<x-kit.action-panel'.($inline ? ' inline' : '').' />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel p-6']) }}>
    <div @class(['gap-4', 'sm:flex sm:items-center sm:justify-between' => $inline])>
        <div class="min-w-0">
            <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>
            <div class="mt-1 max-w-prose text-sm text-ink-soft">{{ $slot }}</div>
        </div>

        @if ($action)
            <div @class(['mt-4', 'sm:mt-0 sm:shrink-0' => $inline])>{{ $action }}</div>
        @endif
    </div>
</div>
