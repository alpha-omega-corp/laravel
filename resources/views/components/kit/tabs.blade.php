@props([
    'items' => [],
    'variant' => 'underline',
])

@php
    /**
     * The tabs, re-themed from the kit's navigation/tabs group.
     *
     * The kit ships underline, pill and bar copies; the corner of a pill belongs
     * to the palette here, so there are two variants rather than four files.
     *
     * @var array<int, array{label: string, href?: string, current?: bool, badge?: string}> $items
     */
    $variant = in_array($variant, ['underline', 'pill'], true) ? $variant : 'underline';

    $ref = '<x-kit.tabs variant="'.$variant.'" />';
@endphp

<nav data-ref="{{ $ref }}" {{ $attributes->class([
    'flex flex-wrap items-center gap-1',
    'border-b border-rule' => $variant === 'underline',
    'rounded-control bg-canvas-alt p-1' => $variant === 'pill',
]) }}>
    @foreach ($items as $item)
        <a href="{{ $item['href'] ?? '#' }}"
           @if ($item['current'] ?? false) aria-current="page" @endif
           @class([
               'inline-flex items-center gap-2 text-sm font-medium',
               '-mb-px border-b-2 px-3 py-2' => $variant === 'underline',
               'border-accent text-ink' => $variant === 'underline' && ($item['current'] ?? false),
               'border-transparent text-ink-soft hover:border-rule hover:text-ink' => $variant === 'underline' && ! ($item['current'] ?? false),
               'rounded-control px-3 py-1.5' => $variant === 'pill',
               'bg-canvas text-ink shadow-sm' => $variant === 'pill' && ($item['current'] ?? false),
               'text-ink-soft hover:text-ink' => $variant === 'pill' && ! ($item['current'] ?? false),
           ])>
            {{ $item['label'] }}

            @if (! empty($item['badge']))
                <x-kit.badge size="sm" :tone="($item['current'] ?? false) ? 'accent' : 'neutral'">{{ $item['badge'] }}</x-kit.badge>
            @endif
        </a>
    @endforeach
</nav>
