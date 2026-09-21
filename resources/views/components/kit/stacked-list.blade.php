@props([
    'items' => [],
    'separate' => false,
])

@php
    /**
     * The stacked list, re-themed from the kit's lists/stacked-lists group.
     * `separate` is the kit's "separate cards" copy: one panel per row.
     *
     * @var array<int, array{title: string, subtitle?: string, meta?: string, caption?: string}> $items
     */
    $ref = '<x-kit.stacked-list'.($separate ? ' separate' : '').' />';
@endphp

<ul role="list" data-ref="{{ $ref }}" {{ $attributes->class(['space-y-3' => $separate, 'panel divide-y divide-rule overflow-hidden' => ! $separate]) }}>
    @foreach ($items as $item)
        <li @class(['flex items-center justify-between gap-4 px-4 py-4 sm:px-6', 'panel' => $separate])>
            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-ink">{{ $item['title'] }}</p>

                @if (! empty($item['subtitle']))
                    <p class="mt-0.5 truncate text-sm text-ink-soft">{{ $item['subtitle'] }}</p>
                @endif
            </div>

            <div class="shrink-0 text-right">
                @if (! empty($item['meta']))
                    <p class="text-sm text-ink">{{ $item['meta'] }}</p>
                @endif

                @if (! empty($item['caption']))
                    <p class="mt-0.5 text-xs text-ink-soft">{{ $item['caption'] }}</p>
                @endif
            </div>
        </li>
    @endforeach
</ul>
