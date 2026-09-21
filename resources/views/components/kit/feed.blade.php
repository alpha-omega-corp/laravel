@props([
    'items' => [],
])

@php
    /**
     * The feed, re-themed from the kit's lists/feeds group: a timeline with the
     * rule running behind the markers rather than between the rows.
     *
     * @var array<int, array{text: string, time: string, tone?: string}> $items
     */
    $ref = '<x-kit.feed />';
@endphp

<ul role="list" data-ref="{{ $ref }}" {{ $attributes->class(['space-y-0']) }}>
    @foreach ($items as $index => $item)
        <li class="relative flex gap-4 pb-6 last:pb-0">
            @unless ($loop->last)
                <span aria-hidden="true" class="absolute top-6 left-3 -ml-px h-full w-px bg-rule"></span>
            @endunless

            <span @class([
                'relative mt-1 grid size-6 shrink-0 place-items-center rounded-full ring-4 ring-canvas',
                'bg-accent' => ($item['tone'] ?? null) === 'accent',
                'bg-highlight' => ($item['tone'] ?? null) === 'highlight',
                'bg-canvas-alt' => ! isset($item['tone']),
            ])>
                <span @class(['size-1.5 rounded-full', 'bg-on-accent' => isset($item['tone']), 'bg-ink-soft' => ! isset($item['tone'])])></span>
            </span>

            <div class="min-w-0 flex-1 pt-0.5">
                <p class="text-sm text-ink-soft">{{ $item['text'] }}</p>
                <p class="mt-0.5 text-xs text-ink-soft">{{ $item['time'] }}</p>
            </div>
        </li>
    @endforeach
</ul>
