@props([
    'tone' => 'neutral',
    'size' => 'md',
    'dot' => false,
])

@php
    /**
     * The badge, re-themed from the kit's elements/badges group.
     *
     * The kit spends one file per colour of Tailwind's palette; this application
     * has four meanings rather than eleven hues, so the tone is what it is for
     * and the palette decides how that reads.
     */
    $tone = in_array($tone, ['neutral', 'accent', 'highlight', 'outline'], true) ? $tone : 'neutral';
    $size = in_array($size, ['sm', 'md'], true) ? $size : 'md';

    $ref = '<x-kit.badge tone="'.$tone.'" />';
@endphp

<span data-ref="{{ $ref }}" {{ $attributes->class([
    'inline-flex items-center gap-x-1.5 rounded-control font-medium whitespace-nowrap',
    'px-1.5 py-0.5 text-xs' => $size === 'sm',
    'px-2 py-1 text-xs' => $size === 'md',
    'bg-canvas-alt text-ink-soft' => $tone === 'neutral',
    'bg-accent text-on-accent' => $tone === 'accent',
    'bg-highlight text-on-highlight' => $tone === 'highlight',
    'border border-rule text-ink-soft' => $tone === 'outline',
]) }}>
    @if ($dot)
        <span aria-hidden="true" @class(['size-1.5 rounded-full', 'bg-accent' => $tone !== 'accent', 'bg-on-accent' => $tone === 'accent'])></span>
    @endif

    {{ $slot }}
</span>
