@props([
    'title' => null,
    'description' => null,
    'items' => [],
    'striped' => false,
])

@php
    /**
     * The description list, re-themed from the kit's data-display/description-lists
     * group. `striped` is the kit's copy that tints every other row.
     *
     * @var array<int, array{term: string, value: string}> $items
     */
    $ref = '<x-kit.description-list'.($striped ? ' striped' : '').' />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel overflow-hidden']) }}>
    @if ($title || $description)
        <div class="px-4 py-5 sm:px-6">
            @if ($title)
                <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>
            @endif

            @if ($description)
                <p class="mt-1 max-w-prose text-sm text-ink-soft">{{ $description }}</p>
            @endif
        </div>
    @endif

    <dl class="border-t border-rule">
        @foreach ($items as $index => $item)
            <div @class([
                'px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6',
                'bg-canvas-alt' => $striped && $index % 2 === 0,
                'border-t border-rule' => ! $striped && $index > 0,
            ])>
                <dt class="text-sm font-medium text-ink">{{ $item['term'] }}</dt>
                <dd class="mt-1 text-sm text-ink-soft sm:col-span-2 sm:mt-0">{{ $item['value'] }}</dd>
            </div>
        @endforeach
    </dl>
</div>
