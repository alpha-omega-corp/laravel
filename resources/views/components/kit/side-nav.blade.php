@props([
    'groups' => [],
    'variant' => 'plain',
])

@php
    /**
     * The side navigation, re-themed from the kit's navigation/sidebar-navigation group.
     *
     * The kit ships five of these and three of them differ only by what the panel is
     * filled with — white, near-black, indigo. Here the fill is the palette's to decide,
     * so there are two variants and not five: `plain`, which is the page surface with a
     * rule down one side, and `brand`, which is the accent. Everything else is one set
     * of markup reading tokens, so the same nav is a stamped ink block in orchard and a
     * hairline rectangle in vellum.
     *
     * A row is current when it is given `current`, and otherwise when its href is the
     * URL being served — the same rule the application shell uses for its own tabs, so
     * a page never has to say twice where it is.
     *
     * A group's heading is a section title and is set like one: full ink weight, an
     * accent tick beside it, and a rule above every group after the first. The kit's
     * own version is a faint grey line of small caps that a nine-group index — the UI
     * kit page — reads as one long list with pauses in it.
     *
     * @var array<int, array{heading?: string, items: array<int, array{label: string, href: string, current?: bool, badge?: string, icon?: string}>}> $groups
     */
    $variant = in_array($variant, ['plain', 'brand'], true) ? $variant : 'plain';

    $ref = '<x-kit.side-nav variant="'.$variant.'" />';

    $isBrand = $variant === 'brand';

    $groups = array_map(fn (array $group): array => $group + ['heading' => null] + ['items' => []], $groups);
@endphp

<nav data-ref="{{ $ref }}"
     {{ $attributes->class([
         'flex flex-col gap-y-5 overflow-y-auto rounded-panel px-4 py-5',
         'border border-rule bg-canvas' => ! $isBrand,
         'bg-accent text-on-accent' => $isBrand,
     ]) }}>
    @foreach ($groups as $group)
        <div @class([
            'border-t pt-5' => ! $loop->first,
            'border-rule' => ! $loop->first && ! $isBrand,
            'border-on-accent/25' => ! $loop->first && $isBrand,
        ])>
            @if ($group['heading'])
                <p @class([
                    'mb-2.5 flex items-center gap-2 px-2 text-xs font-bold tracking-[0.14em] uppercase',
                    'text-ink' => ! $isBrand,
                    'text-on-accent' => $isBrand,
                ])>
                    <span aria-hidden="true" @class([
                        'h-3.5 w-0.5 shrink-0 rounded-full',
                        'bg-accent' => ! $isBrand,
                        'bg-on-accent/70' => $isBrand,
                    ])></span>

                    <span class="min-w-0 truncate">{{ $group['heading'] }}</span>
                </p>
            @endif

            <ul role="list" class="space-y-1">
                @foreach ($group['items'] as $item)
                    @php
                        $current = $item['current'] ?? (isset($item['href']) && $item['href'] !== '#' && request()->fullUrlIs($item['href']));
                    @endphp

                    <li>
                        <a href="{{ $item['href'] }}"
                           @if ($current) aria-current="page" @endif
                           @class([
                               'group flex items-center gap-x-3 rounded-control p-2 text-sm font-semibold',
                               'bg-canvas-alt text-accent' => $current && ! $isBrand,
                               'text-ink-soft hover:bg-canvas-alt hover:text-ink' => ! $current && ! $isBrand,
                               'bg-on-accent/15 text-on-accent' => $current && $isBrand,
                               'text-on-accent/75 hover:bg-on-accent/10 hover:text-on-accent' => ! $current && $isBrand,
                           ])>
                            @if (! empty($item['icon']))
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-5 shrink-0">
                                    <path d="{{ $item['icon'] }}" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            @endif

                            <span class="min-w-0 flex-1 truncate">{{ $item['label'] }}</span>

                            @if (! empty($item['badge']))
                                <span aria-hidden="true" @class([
                                    'ml-auto shrink-0 rounded-control px-2 py-0.5 text-xs font-medium',
                                    'border border-rule bg-canvas text-ink-soft' => ! $isBrand,
                                    'bg-on-accent/15 text-on-accent' => $isBrand,
                                ])>{{ $item['badge'] }}</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</nav>
