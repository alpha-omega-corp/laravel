@props([
    'title' => '',
    'meta' => [],
    'actions' => null,
    'breadcrumb' => null,
])

@php
    /**
     * The page heading, re-themed from the kit's headings/page-headings group.
     * The title uses the palette's own display face and weight, so no font or
     * weight utility appears here.
     *
     * @var array<int, string> $meta
     */
    $ref = '<x-kit.page-heading />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['space-y-3']) }}>
    @if ($breadcrumb)
        {{ $breadcrumb }}
    @endif

    <div class="gap-4 md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="font-display text-2xl tracking-tight text-ink">{{ $title }}</h2>

            @if (count($meta))
                <div class="mt-1 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-ink-soft">
                    @foreach ($meta as $entry)
                        <span>{{ $entry }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        @if ($actions)
            <div class="mt-4 flex shrink-0 flex-wrap items-center gap-3 md:mt-0">{{ $actions }}</div>
        @endif
    </div>
</div>
