@props([
    'items' => [],
    'variant' => 'chevron',
])

@php
    /**
     * The breadcrumb, re-themed from the kit's navigation/breadcrumbs group.
     *
     * Three styles, as the kit ships them: `chevron` divides the levels with a
     * small chevron; `slash` with a slash, the lightest; `contained` sets the
     * trail in a strip of its own, the levels divided by tall arrows the
     * strip's height, for a trail that stands under a bar rather than in a
     * heading.
     *
     * @var array<int, array{label: string, href?: string}> $items
     */
    $variant = in_array($variant, ['chevron', 'slash', 'contained'], true) ? $variant : 'chevron';

    // The chevron trail keeps the name it always had, so a page that looks for it still finds it.
    $ref = $variant === 'chevron' ? '<x-kit.breadcrumb />' : '<x-kit.breadcrumb variant="'.$variant.'" />';

    $isContained = $variant === 'contained';
@endphp

<nav data-ref="{{ $ref }}" aria-label="{{ __('kit.breadcrumb') }}" {{ $attributes->class([
    'flex w-fit max-w-full rounded-panel border border-rule bg-canvas px-4' => $isContained,
]) }}>
    <ol role="list" @class([
        'flex flex-wrap items-center text-sm',
        'gap-1' => $variant === 'chevron',
        'gap-2' => $variant === 'slash',
        'gap-3' => $isContained,
    ])>
        @foreach ($items as $item)
            <li @class([
                'flex items-center',
                'gap-1' => $variant === 'chevron',
                'gap-2' => $variant === 'slash',
                'h-10 gap-3' => $isContained,
            ])>
                @unless ($loop->first)
                    @if ($variant === 'chevron')
                        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4 text-ink-soft">
                            <path d="m8 5 4 5-4 5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    @elseif ($variant === 'slash')
                        <span aria-hidden="true" class="text-rule select-none">/</span>
                    @else
                        <svg viewBox="0 0 24 44" preserveAspectRatio="none" fill="none" stroke="currentColor" aria-hidden="true" class="h-full w-4 shrink-0 text-rule">
                            <path d="M.5 0 23.5 22 .5 44" vector-effect="non-scaling-stroke" />
                        </svg>
                    @endif
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
