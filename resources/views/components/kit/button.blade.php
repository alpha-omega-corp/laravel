@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => false,
    'round' => false,
    'href' => null,
    'type' => 'button',
])

@php
    /**
     * The button, re-themed from the kit's elements/buttons group.
     *
     * The kit ships five sizes, three fills and a rounded copy of each; here the
     * corner belongs to the theme, so `round` is an override for the rare control
     * that must be a pill rather than a second set of variants. Everything visual is
     * in the .btn classes in resources/css/app.css, which read the theme's tokens —
     * the same markup is a stamped ink block in the light scheme and the same block
     * drawn in a pale rule in the dark one.
     */
    $variant = in_array($variant, ['primary', 'secondary', 'soft', 'ghost'], true) ? $variant : 'primary';
    $size = in_array($size, ['xs', 'sm', 'md', 'lg', 'xl'], true) ? $size : 'md';

    /** The tag this button is written as, defaults left out, for dev mode's badge. */
    $ref = '<x-kit.button'
        .($variant === 'primary' ? '' : ' variant="'.$variant.'"')
        .($size === 'md' ? '' : ' size="'.$size.'"')
        .($icon ? ' icon' : '')
        .($round ? ' round' : '')
        .' />';

    $classes = ['btn', 'btn-'.$variant, 'btn-'.$size, 'btn-icon' => (bool) $icon, 'btn-round' => (bool) $round];
@endphp

@if ($href)
    <a href="{{ $href }}" data-ref="{{ $ref }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" data-ref="{{ $ref }}" {{ $attributes->class($classes) }}>{{ $slot }}</button>
@endif
