@props([
    'placeholder' => '',
    'items' => [],
    'empty' => null,
])

@php
    /**
     * The command palette, re-themed from the kit's navigation/command-palettes
     * group, shown open: it is a dialog everywhere else, and a dialog on a
     * documentation page is a screenshot of nothing.
     *
     * @var array<int, array{label: string, hint?: string, current?: bool}> $items
     */
    $ref = '<x-kit.command-palette />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel panel-raised overflow-hidden']) }}>
    <div class="flex items-center gap-3 border-b border-rule px-4">
        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4 shrink-0 text-ink-soft">
            <path d="m17 17-3.5-3.5M15 9a6 6 0 1 1-12 0 6 6 0 0 1 12 0Z" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <input type="text" placeholder="{{ $placeholder }}" aria-label="{{ $placeholder }}"
               class="w-full bg-transparent py-3 text-sm text-ink placeholder:text-ink-soft focus:outline-hidden" />
    </div>

    @if (count($items))
        <ul role="list" class="max-h-64 overflow-y-auto p-2">
            @foreach ($items as $item)
                <li>
                    <button type="button" @class([
                        'flex w-full items-center justify-between gap-3 rounded-control px-2 py-2 text-left text-sm',
                        'bg-canvas-alt text-ink' => $item['current'] ?? false,
                        'text-ink-soft hover:bg-canvas-alt hover:text-ink' => ! ($item['current'] ?? false),
                    ])>
                        <span class="min-w-0 truncate">{{ $item['label'] }}</span>

                        @if (! empty($item['hint']))
                            <span class="shrink-0 font-mono text-xs text-ink-soft">{{ $item['hint'] }}</span>
                        @endif
                    </button>
                </li>
            @endforeach
        </ul>
    @else
        <p class="px-4 py-8 text-center text-sm text-ink-soft">{{ $empty }}</p>
    @endif
</div>
