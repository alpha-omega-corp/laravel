@props([
    'items' => [],
    'columns' => 3,
])

@php
    /**
     * The grid list, re-themed from the kit's lists/grid-lists group.
     *
     * @var array<int, array{title: string, subtitle?: string, initials?: string}> $items
     */
    $columns = in_array((int) $columns, [2, 3, 4], true) ? (int) $columns : 3;

    $ref = '<x-kit.grid-list columns="'.$columns.'" />';
@endphp

<ul role="list" data-ref="{{ $ref }}" {{ $attributes->class([
    'grid gap-4 sm:grid-cols-2',
    'lg:grid-cols-3' => $columns >= 3,
    'xl:grid-cols-4' => $columns === 4,
]) }}>
    @foreach ($items as $item)
        <li class="panel flex items-center gap-3 p-4">
            <x-kit.avatar :name="$item['title']" size="sm" />

            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-ink">{{ $item['title'] }}</p>

                @if (! empty($item['subtitle']))
                    <p class="truncate text-xs text-ink-soft">{{ $item['subtitle'] }}</p>
                @endif
            </div>
        </li>
    @endforeach
</ul>
