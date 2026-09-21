@props([
    'name' => '',
    'src' => null,
    'size' => 'md',
    'square' => false,
    'status' => null,
])

@php
    /**
     * The avatar, re-themed from the kit's elements/avatars group.
     *
     * The kit ships circular and rounded copies at five sizes, and again with a
     * status dot; here the corner belongs to the palette, so `square` is the
     * override and the dot is a prop rather than a second component.
     */
    $size = in_array($size, ['xs', 'sm', 'md', 'lg', 'xl'], true) ? $size : 'md';
    $status = in_array($status, ['online', 'offline', 'busy'], true) ? $status : null;

    $ref = '<x-kit.avatar size="'.$size.'"'.($square ? ' square' : '').' />';

    $box = ['xs' => 'size-6 text-xs', 'sm' => 'size-8 text-sm', 'md' => 'size-10 text-sm', 'lg' => 'size-12 text-base', 'xl' => 'size-14 text-lg'][$size];
    $dot = ['xs' => 'size-1.5', 'sm' => 'size-2', 'md' => 'size-2.5', 'lg' => 'size-3', 'xl' => 'size-3.5'][$size];

    $initials = mb_strtoupper(mb_substr(trim($name) ?: '?', 0, 1));
@endphp

<span data-ref="{{ $ref }}" {{ $attributes->class(['relative inline-flex shrink-0']) }}>
    @if ($src)
        <img src="{{ $src }}" alt="{{ $name }}"
             @class(['border border-rule object-cover', $box, 'rounded-panel' => $square, 'rounded-full' => ! $square]) />
    @else
        <span aria-hidden="true"
              @class(['grid place-items-center bg-accent font-display font-bold text-on-accent', $box, 'rounded-panel' => $square, 'rounded-full' => ! $square])>{{ $initials }}</span>
        <span class="sr-only">{{ $name }}</span>
    @endif

    @if ($status)
        <span @class([
            'absolute right-0 bottom-0 rounded-full ring-2 ring-canvas',
            $dot,
            'bg-accent' => $status === 'online',
            'bg-rule' => $status === 'offline',
            'bg-highlight' => $status === 'busy',
        ])>
            <span class="sr-only">{{ $status }}</span>
        </span>
    @endif
</span>
