@props([
    'title' => '',
    'description' => null,
    'actions' => null,
])

@php
    /**
     * The card heading, re-themed from the kit's headings/card-headings group:
     * the header band of a panel, with the rule that divides it from the body.
     */
    $ref = '<x-kit.card-heading />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['flex items-center justify-between gap-4 border-b border-rule px-4 py-4 sm:px-6']) }}>
    <div class="min-w-0">
        <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>

        @if ($description)
            <p class="mt-1 truncate text-sm text-ink-soft">{{ $description }}</p>
        @endif
    </div>

    @if ($actions)
        <div class="shrink-0">{{ $actions }}</div>
    @endif
</div>
