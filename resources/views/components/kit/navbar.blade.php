@props([
    'brand' => null,
    'items' => [],
    'actions' => null,
])

@php
    /**
     * The navbar, re-themed from the kit's navigation/navbars group.
     *
     * The application shell has its own, with a mobile disclosure and an account
     * menu; this is the bar on its own, for a page that is not the shell.
     *
     * Which is why the links wrap rather than hide below `sm`: upstream they
     * sit behind a hamburger, and a bar with no disclosure and no links is a
     * page a phone cannot leave.
     *
     * @var array<int, array{label: string, href?: string, current?: bool}> $items
     */
    $ref = '<x-kit.navbar />';
@endphp

<nav data-ref="{{ $ref }}" {{ $attributes->class(['rounded-panel border border-rule bg-canvas px-4 sm:px-6']) }}>
    <div class="flex h-14 items-center justify-between gap-6">
        <div class="flex min-w-0 items-center gap-6">
            @if ($brand)
                <span class="font-display text-base font-bold tracking-tight text-ink">{{ $brand }}</span>
            @endif

            <div class="flex flex-wrap items-center gap-1">
                @foreach ($items as $item)
                    <a href="{{ $item['href'] ?? '#' }}"
                       @if ($item['current'] ?? false) aria-current="page" @endif
                       @class([
                           'rounded-control px-3 py-1.5 text-sm font-medium',
                           'bg-canvas-alt text-ink' => $item['current'] ?? false,
                           'text-ink-soft hover:bg-canvas-alt hover:text-ink' => ! ($item['current'] ?? false),
                       ])>{{ $item['label'] }}</a>
                @endforeach
            </div>
        </div>

        @if ($actions)
            <div class="flex shrink-0 items-center gap-2">{{ $actions }}</div>
        @endif
    </div>
</nav>
