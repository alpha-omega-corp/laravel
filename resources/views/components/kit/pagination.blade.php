@props([
    'page' => 1,
    'pages' => 1,
    'simple' => false,
])

@php
    /**
     * The pagination, re-themed from the kit's navigation/pagination group.
     * `simple` is the kit's previous/next copy with no numbers between them.
     */
    $page = max(1, (int) $page);
    $pages = max($page, (int) $pages);

    $ref = '<x-kit.pagination'.($simple ? ' simple' : '').' />';
@endphp

<nav data-ref="{{ $ref }}" aria-label="{{ __('kit.pagination') }}"
     {{ $attributes->class(['flex items-center justify-between gap-3 border-t border-rule pt-3']) }}>
    <x-kit.button variant="secondary" size="sm" href="#">{{ __('kit.previous') }}</x-kit.button>

    @if ($simple)
        <p class="text-sm text-ink-soft">{{ $page }} / {{ $pages }}</p>
    @else
        <ol role="list" class="hidden items-center gap-1 sm:flex">
            @for ($number = 1; $number <= $pages; $number++)
                <li>
                    <a href="#" @if ($number === $page) aria-current="page" @endif
                       @class([
                           'inline-flex min-w-9 items-center justify-center rounded-control px-2 py-1.5 text-sm font-medium',
                           'bg-accent text-on-accent' => $number === $page,
                           'text-ink-soft hover:bg-canvas-alt hover:text-ink' => $number !== $page,
                       ])>{{ $number }}</a>
                </li>
            @endfor
        </ol>
    @endif

    <x-kit.button variant="secondary" size="sm" href="#">{{ __('kit.next') }}</x-kit.button>
</nav>
