@props([
    'buttons' => [],
])

@php
    /**
     * The button group, re-themed from the kit's elements/button-groups group.
     *
     * The kit fuses its buttons with -space-x-px and unrounds the middle of the
     * bar. The corner belongs to the palette here — it is a pill in blossom and
     * square in vellum — so the group sets the corner on the two ends and lets
     * everything between it stay square.
     *
     * @var array<int, array{label: string, href?: string, current?: bool, icon?: string}> $buttons
     */
    $ref = '<x-kit.button-group />';
@endphp

<span data-ref="{{ $ref }}" role="group" {{ $attributes->class(['isolate inline-flex rounded-control']) }}>
    @foreach ($buttons as $index => $button)
        <{{ isset($button['href']) ? 'a' : 'button' }}
            @isset($button['href']) href="{{ $button['href'] }}" @else type="button" @endisset
            @if ($button['current'] ?? false) aria-current="true" @endif
            @class([
                'relative -ml-px inline-flex items-center gap-x-1.5 border border-rule px-3 py-2 text-sm font-semibold focus:z-10',
                'ml-0 rounded-l-[inherit]' => $index === 0,
                'rounded-r-[inherit]' => $index === count($buttons) - 1,
                'bg-accent text-on-accent' => $button['current'] ?? false,
                'bg-canvas text-ink hover:bg-canvas-alt' => ! ($button['current'] ?? false),
            ])>
            @if (! empty($button['icon']))
                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
                    <path d="{{ $button['icon'] }}" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            @endif
            {{ $button['label'] }}
        </{{ isset($button['href']) ? 'a' : 'button' }}>
    @endforeach
</span>
