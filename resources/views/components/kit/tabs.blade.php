@props([
    'items' => [],
    'variant' => 'underline',
])

@php
    /**
     * The tabs, re-themed from the kit's navigation/tabs group.
     *
     * The kit ships underline, pill and bar copies, each with a few fills; the
     * fill and the corner belong to the palette here, so there is one file and
     * a variant a style:
     *
     * - `underline`: the tab shown underlined in the accent, on a rule.
     * - `pill`: the tab shown raised out of a sunken track.
     * - `bar`: the tabs as one strip of equal cells, the one shown with an
     *   accent bar along its foot; for two to five views that share the width.
     * - `enclosed`: the tab shown joined to the panel under it, the others
     *   open; for tabs that sit on a panel's top edge.
     *
     * @var array<int, array{label: string, href?: string, current?: bool, badge?: string}> $items
     */
    $variant = in_array($variant, ['underline', 'pill', 'bar', 'enclosed'], true) ? $variant : 'underline';

    $ref = '<x-kit.tabs variant="'.$variant.'" />';
@endphp

<nav data-ref="{{ $ref }}" {{ $attributes->class([
    'flex flex-wrap items-center gap-1' => $variant === 'underline' || $variant === 'pill',
    'border-b border-rule' => $variant === 'underline' || $variant === 'enclosed',
    'rounded-control bg-canvas-alt p-1' => $variant === 'pill',
    // Cells of one width that wrap to a second row of the same width rather than squeezing, ruled by the gap.
    'grid grid-cols-[repeat(auto-fit,minmax(7rem,1fr))] gap-px overflow-hidden rounded-panel border border-rule bg-rule' => $variant === 'bar',
    'flex flex-wrap items-end gap-1 px-2' => $variant === 'enclosed',
]) }}>
    @foreach ($items as $item)
        @php($current = $item['current'] ?? false)
        <a href="{{ $item['href'] ?? '#' }}"
           @if ($current) aria-current="page" @endif
           @class([
               'inline-flex items-center gap-2 text-sm font-medium',
               '-mb-px border-b-2 px-3 py-2' => $variant === 'underline',
               'border-accent text-ink' => $variant === 'underline' && $current,
               'border-transparent text-ink-soft hover:border-rule hover:text-ink' => $variant === 'underline' && ! $current,
               'rounded-control px-3 py-1.5' => $variant === 'pill',
               'bg-canvas text-ink shadow-sm' => $variant === 'pill' && $current,
               'text-ink-soft hover:text-ink' => ($variant === 'pill' || $variant === 'enclosed') && ! $current,
               'relative justify-center bg-canvas px-4 py-2.5 text-center' => $variant === 'bar',
               'text-ink' => $variant === 'bar' && $current,
               'text-ink-soft hover:bg-canvas-alt hover:text-ink' => $variant === 'bar' && ! $current,
               '-mb-px rounded-t-control border px-4 py-2' => $variant === 'enclosed',
               'border-rule border-b-canvas bg-canvas text-ink' => $variant === 'enclosed' && $current,
               'border-transparent' => $variant === 'enclosed' && ! $current,
           ])>
            {{ $item['label'] }}

            @if (! empty($item['badge']))
                <x-kit.badge size="sm" :tone="$current ? 'accent' : 'neutral'">{{ $item['badge'] }}</x-kit.badge>
            @endif

            @if ($variant === 'bar' && $current)
                <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-0.5 bg-accent"></span>
            @endif
        </a>
    @endforeach
</nav>
