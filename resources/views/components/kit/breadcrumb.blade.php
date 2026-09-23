@props([
    'items' => [],
])

@php
    /**
     * The breadcrumb, re-themed from the kit's navigation/breadcrumbs group.
     *
     * @var array<int, array{label: string, href?: string}> $items
     */
    $ref = '<x-kit.breadcrumb />';
@endphp

<nav data-ref="{{ $ref }}" aria-label="{{ __('kit.breadcrumb') }}" {{ $attributes }}>
    <ol role="list" class="flex flex-wrap items-center gap-1 text-sm">
        @foreach ($items as $item)
            <li class="flex items-center gap-1">
                @unless ($loop->first)
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4 text-ink-soft">
                        <path d="m8 5 4 5-4 5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                @endunless

                @if (isset($item['href']) && ! $loop->last)
                    <a href="{{ $item['href'] }}" class="text-ink-soft hover:text-ink">{{ $item['label'] }}</a>
                @else
                    <span @class(['font-medium text-ink' => $loop->last, 'text-ink-soft' => ! $loop->last]) @if ($loop->last) aria-current="page" @endif>{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
