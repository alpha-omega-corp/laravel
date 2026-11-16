@props([
    'brand' => null,
    'items' => [],
    'actions' => null,
    'variant' => 'plain',
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
     * Four styles over one markup reading tokens, so each is the palette's:
     * `plain` marks the current screen with a filled control; `underline` with
     * an accent rule along the bar's foot, the shell's own way; `centred` puts
     * the links in the middle with the brand and the actions either side of
     * them; `brand` fills the bar with the accent. In every one the current
     * screen is marked by more than its colour.
     *
     * @var array<int, array{label: string, href?: string, current?: bool}> $items
     */
    $variant = in_array($variant, ['plain', 'underline', 'centred', 'brand'], true) ? $variant : 'plain';

    // The plain bar keeps the name it always had, so a page that looks for it still finds it.
    $ref = $variant === 'plain' ? '<x-kit.navbar />' : '<x-kit.navbar variant="'.$variant.'" />';

    $isBrand = $variant === 'brand';
    $isUnderline = $variant === 'underline';
    $isCentred = $variant === 'centred';
@endphp

<nav data-ref="{{ $ref }}" {{ $attributes->class([
    'rounded-panel px-4 sm:px-6',
    'border border-rule bg-canvas' => ! $isBrand,
    'bg-accent text-on-accent' => $isBrand,
]) }}>
    {{--
        Three parts, the brand, the links and the actions: in a row with the
        actions pushed to the end, or, centred, a grid of three whose middle is
        the links. Below `sm` the brand and the actions share the first line and
        the links have the second to themselves, wrapping there if they must.
    --}}
    <div @class([
        'flex min-h-14 flex-wrap items-center gap-x-6',
        'gap-y-2 py-2' => ! $isUnderline,
        'pt-2 sm:pt-0' => $isUnderline,
        'sm:grid sm:grid-cols-[1fr_auto_1fr] sm:py-0' => $isCentred,
    ])>
        {{-- Centred, the brand's cell is drawn even empty: the links are the grid's middle, not its first. --}}
        @if ($brand || $isCentred)
            <span @class([
                'font-display text-base font-bold tracking-tight',
                'text-ink' => ! $isBrand,
                'text-on-accent' => $isBrand,
            ])>{{ $brand }}</span>
        @endif

        <div @class([
            'flex flex-wrap items-center',
            'gap-1' => ! $isUnderline,
            'gap-x-6 self-stretch' => $isUnderline,
            'order-last basis-full sm:order-none sm:basis-auto',
            'sm:me-auto' => ! $isCentred,
            'sm:justify-center' => $isCentred,
        ])>
            @foreach ($items as $item)
                @php($current = $item['current'] ?? false)
                <a href="{{ $item['href'] ?? '#' }}"
                   @if ($current) aria-current="page" @endif
                   @class([
                       'text-sm font-medium',
                       'rounded-control px-3 py-1.5' => ! $isUnderline,
                       'bg-canvas-alt text-ink' => ($variant === 'plain' || $isCentred) && $current,
                       'text-ink-soft hover:bg-canvas-alt hover:text-ink' => ($variant === 'plain' || $isCentred) && ! $current,
                       'inline-flex min-h-12 items-center border-b-2 px-1 sm:min-h-14' => $isUnderline,
                       'border-accent text-ink' => $isUnderline && $current,
                       'border-transparent text-ink-soft hover:border-rule hover:text-ink' => $isUnderline && ! $current,
                       'bg-on-accent/15 font-semibold text-on-accent ring-1 ring-on-accent/30' => $isBrand && $current,
                       'text-on-accent/80 hover:bg-on-accent/10 hover:text-on-accent' => $isBrand && ! $current,
                   ])>{{ $item['label'] }}</a>
            @endforeach
        </div>

        @if ($actions)
            <div @class(['ms-auto flex shrink-0 items-center gap-2', 'sm:ms-0 sm:justify-self-end' => $isCentred])>{{ $actions }}</div>
        @endif
    </div>
</nav>
