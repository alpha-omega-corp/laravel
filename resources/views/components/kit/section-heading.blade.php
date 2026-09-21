@props([
    'title' => '',
    'description' => null,
    'actions' => null,
    'tabs' => null,
])

@php
    /**
     * The section heading, re-themed from the kit's headings/section-headings
     * group: the rule under a title, with an action or a row of tabs on it.
     */
    $ref = '<x-kit.section-heading />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['border-b border-rule pb-4']) }}>
    <div class="gap-4 sm:flex sm:items-center sm:justify-between">
        <div class="min-w-0">
            <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>

            @if ($description)
                <p class="mt-1 max-w-prose text-sm text-ink-soft">{{ $description }}</p>
            @endif
        </div>

        @if ($actions)
            <div class="mt-3 flex shrink-0 items-center gap-3 sm:mt-0">{{ $actions }}</div>
        @endif
    </div>

    @if ($tabs)
        <div class="mt-4">{{ $tabs }}</div>
    @endif
</div>
