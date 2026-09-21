@props([
    'title' => '',
    'icon' => null,
    'dashed' => false,
])

@php
    /**
     * The empty state, re-themed from the kit's feedback/empty-states group.
     *
     * `dashed` is the kit's "with dashed border" copy: the same block with an
     * outline that says a thing could be dropped here, rather than that a thing
     * is missing.
     */
    $ref = '<x-kit.empty-state'.($dashed ? ' dashed' : '').' />';

    $icon ??= 'M12 4.5v15m7.5-7.5h-15';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class([
    'rounded-panel px-6 py-10 text-center',
    'border-2 border-dashed border-rule' => $dashed,
    'panel' => ! $dashed,
]) }}>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" aria-hidden="true" class="mx-auto size-10 text-ink-soft">
        <path d="{{ $icon }}" stroke-linecap="round" stroke-linejoin="round" />
    </svg>

    <h3 class="mt-3 text-sm font-semibold text-ink">{{ $title }}</h3>

    <div class="mx-auto mt-1 max-w-sm text-sm text-ink-soft">{{ $slot }}</div>

    @isset($action)
        <div class="mt-5">{{ $action }}</div>
    @endisset
</div>
