@props([
    'items' => [],
    'bordered' => false,
])

@php
    /**
     * The vertical navigation, re-themed from the kit's navigation/vertical-navigation
     * group. It is the side navigation without the panel: rows for a column that
     * already has a surface of its own.
     *
     * @var array<int, array{label: string, href?: string, current?: bool, badge?: string}> $items
     */
    $ref = '<x-kit.vertical-nav'.($bordered ? ' bordered' : '').' />';
@endphp

<nav data-ref="{{ $ref }}" {{ $attributes }}>
    <ul role="list" @class(['space-y-1', 'border-l border-rule' => $bordered])>
        @foreach ($items as $item)
            <li>
                <a href="{{ $item['href'] ?? '#' }}"
                   @if ($item['current'] ?? false) aria-current="page" @endif
                   @class([
                       'flex items-center gap-3 py-2 text-sm font-medium',
                       'rounded-control px-3' => ! $bordered,
                       '-ml-px border-l-2 pl-3' => $bordered,
                       'border-accent text-accent' => $bordered && ($item['current'] ?? false),
                       'border-transparent text-ink-soft hover:border-rule hover:text-ink' => $bordered && ! ($item['current'] ?? false),
                       'bg-canvas-alt text-accent' => ! $bordered && ($item['current'] ?? false),
                       'text-ink-soft hover:bg-canvas-alt hover:text-ink' => ! $bordered && ! ($item['current'] ?? false),
                   ])>
                    <span class="min-w-0 flex-1 truncate">{{ $item['label'] }}</span>

                    @if (! empty($item['badge']))
                        <x-kit.badge size="sm" tone="outline">{{ $item['badge'] }}</x-kit.badge>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</nav>
