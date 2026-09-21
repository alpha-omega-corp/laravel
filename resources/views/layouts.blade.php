@php
    /**
     * The kit's whole `layout` category — 38 components across five groups — re-themed
     * from Tailwind's default palette to this application's tokens. The kit markup itself
     * stays untouched under resources/views/components/ui; nothing here renders it, because
     * that directory is deliberately outside Tailwind's sources.
     *
     * @var array<int, array{ref: string, classes: string, narrow?: bool}> $containers
     * @var array<int, array{ref: string, wrapper: ?string, list: string, item: string}> $lists
     * @var array<int, array{ref: string, wrapper: string, media: string, figure: string}> $media
     */
    $containers = [
        ['ref' => '01-full-width-on-mobile-constrained-with-padded-content-above', 'classes' => 'mx-auto max-w-wrap sm:px-6 lg:px-8'],
        ['ref' => '02-constrained-with-padded-content', 'classes' => 'mx-auto max-w-wrap px-4 sm:px-6 lg:px-8'],
        ['ref' => '03-full-width-on-mobile-constrained-to-breakpoint-with-padded-content-above-mobile', 'classes' => 'container mx-auto sm:px-6 lg:px-8'],
        ['ref' => '04-constrained-to-breakpoint-with-padded-content', 'classes' => 'container mx-auto px-4 sm:px-6 lg:px-8'],
        ['ref' => '05-narrow-constrained-with-padded-content', 'classes' => 'mx-auto max-w-wrap px-4 sm:px-6 lg:px-8', 'narrow' => true],
    ];

    $lists = [
        ['ref' => '01-simple-with-dividers', 'wrapper' => null, 'list' => 'divide-y divide-rule', 'item' => 'py-4'],
        ['ref' => '02-card-with-dividers', 'wrapper' => 'panel overflow-hidden', 'list' => 'divide-y divide-rule', 'item' => 'px-6 py-4'],
        ['ref' => '03-card-with-dividers-full-width-on-mobile', 'wrapper' => 'panel overflow-hidden rounded-none sm:rounded-panel', 'list' => 'divide-y divide-rule', 'item' => 'px-4 py-4 sm:px-6'],
        ['ref' => '04-separate-cards', 'wrapper' => null, 'list' => 'space-y-3', 'item' => 'panel overflow-hidden px-6 py-4'],
        ['ref' => '05-separate-cards-full-width-on-mobile', 'wrapper' => null, 'list' => 'space-y-3', 'item' => 'panel overflow-hidden rounded-none px-4 py-4 sm:rounded-panel sm:px-6'],
        ['ref' => '06-flat-card-with-dividers', 'wrapper' => 'overflow-hidden rounded-panel border border-rule bg-canvas', 'list' => 'divide-y divide-rule', 'item' => 'px-6 py-4'],
        ['ref' => '07-simple-with-dividers-full-width-on-mobile', 'wrapper' => null, 'list' => 'divide-y divide-rule', 'item' => 'px-4 py-4 sm:px-0'],
    ];

    $media = [
        ['ref' => '01-basic', 'wrapper' => 'flex', 'media' => 'mr-4 shrink-0', 'figure' => 'size-16'],
        ['ref' => '02-aligned-to-center', 'wrapper' => 'flex', 'media' => 'mr-4 shrink-0 self-center', 'figure' => 'size-16'],
        ['ref' => '03-aligned-to-bottom', 'wrapper' => 'flex', 'media' => 'mr-4 shrink-0 self-end', 'figure' => 'size-16'],
        ['ref' => '04-stretched-to-fit', 'wrapper' => 'flex', 'media' => 'mr-4 shrink-0', 'figure' => 'h-full w-16'],
        ['ref' => '06-basic-responsive', 'wrapper' => 'sm:flex', 'media' => 'mb-4 shrink-0 sm:mr-4 sm:mb-0', 'figure' => 'size-16'],
        ['ref' => '07-wide-responsive', 'wrapper' => 'sm:flex', 'media' => 'mb-4 shrink-0 sm:mr-4 sm:mb-0', 'figure' => 'h-32 w-full sm:w-32'],
    ];

    $plus = '<path d="M10 4.5v11M4.5 10h11" stroke-linecap="round" />';

    /*
     * The shells below are schematic on purpose: the kit's own application-shells fill
     * their content area with a dashed placeholder, and so does this. What is real is the
     * structure — which band is where, which column takes the remaining width, and which
     * surface each region sits on. Every fill is a token, so the schemas re-theme with
     * the rest of the page.
     *
     * @var array<int, array{ref: string, nav: string, rows?: int, header?: string, overlap?: bool, page: string}> $stacked
     * @var array<int, array{ref: string, fill: string, header?: bool, constrained?: bool, page: string}> $sidebars
     * @var array<int, array{ref: string, rail?: string, header?: string, constrained?: bool, cols: array<int, array{0: string, 1: string, 2: string}>}> $columns
     */
    $ink = 'bg-ink text-canvas';
    $brand = 'bg-accent text-on-accent';
    $plain = 'bg-canvas text-ink-soft';

    $stacked = [
        ['ref' => '01-with-bottom-border', 'nav' => $plain.' border-b border-rule', 'header' => null, 'page' => 'bg-canvas'],
        ['ref' => '02-on-subtle-background', 'nav' => $plain.' border-b border-rule', 'header' => null, 'page' => 'bg-canvas-alt'],
        ['ref' => '03-with-lighter-page-header', 'nav' => $ink, 'header' => 'tall', 'page' => 'bg-canvas-alt'],
        ['ref' => '04-branded-nav-with-compact-lighter-page-header', 'nav' => $brand, 'header' => 'compact', 'page' => 'bg-canvas-alt'],
        ['ref' => '05-with-overlap', 'nav' => $ink, 'overlap' => true, 'page' => 'bg-canvas-alt'],
        ['ref' => '06-brand-nav-with-overlap', 'nav' => $brand, 'overlap' => true, 'page' => 'bg-canvas-alt'],
        ['ref' => '07-branded-nav-with-lighter-page-header', 'nav' => $brand, 'header' => 'tall', 'page' => 'bg-canvas-alt'],
        ['ref' => '08-with-compact-lighter-page-header', 'nav' => $ink, 'header' => 'compact', 'page' => 'bg-canvas-alt'],
        ['ref' => '09-two-row-navigation-with-overlap', 'nav' => $brand, 'rows' => 2, 'overlap' => true, 'page' => 'bg-canvas-alt'],
    ];

    $sidebars = [
        ['ref' => '01-simple-sidebar', 'fill' => $plain.' border-r border-rule', 'page' => 'bg-canvas'],
        ['ref' => '02-simple-dark-sidebar', 'fill' => $ink, 'page' => 'bg-canvas'],
        ['ref' => '03-sidebar-with-header', 'fill' => $plain.' border-r border-rule', 'header' => true, 'page' => 'bg-canvas'],
        ['ref' => '04-dark-sidebar-with-header', 'fill' => $ink, 'header' => true, 'page' => 'bg-canvas-alt'],
        ['ref' => '05-with-constrained-content-area', 'fill' => $plain.' border-r border-rule', 'header' => true, 'constrained' => true, 'page' => 'bg-canvas'],
        ['ref' => '06-with-off-white-background', 'fill' => $plain.' border-r border-rule', 'page' => 'bg-canvas-alt'],
        ['ref' => '07-simple-brand-sidebar', 'fill' => $brand, 'page' => 'bg-canvas'],
        ['ref' => '08-brand-sidebar-with-header', 'fill' => $brand, 'header' => true, 'page' => 'bg-canvas-alt'],
    ];

    $columns = [
        ['ref' => '01-full-width-three-column', 'cols' => [
            ['w-1/5', $plain.' border-r border-rule', 'sidebar'],
            ['w-1/4', 'border-r border-rule', 'secondary'],
            ['flex-1', '', 'main'],
        ]],
        ['ref' => '02-full-width-secondary-column-on-right', 'cols' => [
            ['w-1/5', $plain.' border-r border-rule', 'sidebar'],
            ['flex-1', '', 'main'],
            ['w-1/4', 'border-l border-rule', 'aside'],
        ]],
        ['ref' => '03-constrained-three-column', 'header' => $ink, 'constrained' => true, 'cols' => [
            ['w-1/5', 'border-r border-rule', 'sidebar'],
            ['flex-1', '', 'main'],
            ['w-1/4', 'border-l border-rule', 'aside'],
        ]],
        ['ref' => '04-constrained-with-sticky-columns', 'header' => $plain.' border-b border-rule', 'constrained' => true, 'cols' => [
            ['w-1/6', '', 'sticky'],
            ['flex-1', '', 'main'],
            ['w-1/4', '', 'sticky'],
        ]],
        ['ref' => '05-full-width-with-narrow-sidebar', 'rail' => $ink, 'cols' => [
            ['w-1/3', 'border-r border-rule', 'secondary'],
            ['flex-1', '', 'main'],
        ]],
        ['ref' => '06-full-width-with-narrow-sidebar-and-header', 'rail' => $ink, 'header' => $plain.' border-b border-rule', 'cols' => [
            ['w-1/3', 'border-r border-rule', 'secondary'],
            ['flex-1', '', 'main'],
        ]],
    ];

    $schema = 'flex h-56 overflow-hidden rounded-panel border border-dashed border-rule';
    $label = 'flex items-center justify-center px-1 text-center text-[0.65rem] leading-tight';
    $fill = 'm-2 flex-1 rounded-control border border-dashed border-rule/70 '.$label;
    $phone = 'flex h-72 w-44 overflow-hidden rounded-panel border border-dashed border-rule';
    $bar = $label.' h-7 justify-between gap-2 px-2';
    $burger = '<svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-3.5"><path d="M3.5 6h13M3.5 10h13M3.5 14h13" stroke-linecap="round" /></svg>';
    $close = '<svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-3.5"><path d="m5 15 10-10M5 5l10 10" stroke-linecap="round" /></svg>';
@endphp

<x-layouts.gallery :title="__('ui_kit.layouts.title')" :description="__('ui_kit.layouts.intro')"
                   :groups="[[
                       'heading' => __('ui_kit.group.layout'),
                       'items' => [
                           ['label' => __('ui_kit.layouts.cards.title'), 'href' => '#cards'],
                           ['label' => __('ui_kit.layouts.containers.title'), 'href' => '#containers'],
                           ['label' => __('ui_kit.layouts.dividers.title'), 'href' => '#dividers'],
                           ['label' => __('ui_kit.layouts.lists.title'), 'href' => '#list-containers'],
                           ['label' => __('ui_kit.layouts.media.title'), 'href' => '#media-objects'],
                           ['label' => __('ui_kit.layouts.shells.title'), 'href' => '#shells'],
                       ],
                   ]]">
    <div class="space-y-12">
        <p class="max-w-prose text-ink-soft">{{ __('ui_kit.layouts.intro') }}</p>

        <section id="cards" class="space-y-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.layouts.cards.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.cards.description') }}</p>
            </header>

            <div class="grid gap-6 lg:grid-cols-2">
                <x-kit.specimen reference="layout/cards/01-basic-card">
                    <div class="panel overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/02-card-edge-to-edge-on-mobile">
                    <div class="panel overflow-hidden rounded-none sm:rounded-panel">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/03-card-with-header">
                    <div class="panel divide-y divide-rule overflow-hidden">
                        <div class="px-4 py-5 sm:px-6">{{ __('ui_kit.layouts.label.header') }}</div>
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/04-card-with-footer">
                    <div class="panel divide-y divide-rule overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                        <div class="px-4 py-4 sm:px-6">{{ __('ui_kit.layouts.label.footer') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/05-card-with-header-and-footer">
                    <div class="panel divide-y divide-rule overflow-hidden">
                        <div class="px-4 py-5 sm:px-6">{{ __('ui_kit.layouts.label.header') }}</div>
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                        <div class="px-4 py-4 sm:px-6">{{ __('ui_kit.layouts.label.footer') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/06-card-with-gray-footer">
                    <div class="panel overflow-hidden">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                        <div class="bg-canvas-alt px-4 py-4 sm:px-6">{{ __('ui_kit.layouts.label.footer') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/07-card-with-gray-body">
                    <div class="panel overflow-hidden">
                        <div class="px-4 py-5 sm:px-6">{{ __('ui_kit.layouts.label.header') }}</div>
                        <div class="bg-canvas-alt px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/08-well">
                    <div class="overflow-hidden rounded-panel bg-canvas-alt">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>

                {{-- The kit's darker well: bg-gray-200 has no token of its own, so the rule colour stands in. --}}
                <x-kit.specimen reference="layout/cards/09-well-on-gray">
                    <div class="overflow-hidden rounded-panel bg-rule">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/cards/10-well-edge-to-edge-on-mobile">
                    <div class="overflow-hidden rounded-none bg-canvas-alt sm:rounded-panel">
                        <div class="px-4 py-5 sm:p-6">{{ __('ui_kit.layouts.label.body') }}</div>
                    </div>
                </x-kit.specimen>
            </div>
        </section>

        <section id="containers" class="space-y-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.layouts.containers.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.containers.description') }}</p>
            </header>

            <div class="space-y-6">
                @foreach ($containers as $container)
                    <x-kit.specimen :reference="'layout/containers/'.$container['ref']">
                        <div class="{{ $container['classes'] }}">
                            @if ($container['narrow'] ?? false)
                                <div class="mx-auto max-w-3xl rounded-panel bg-canvas-alt px-4 py-3 font-mono text-xs text-ink-soft">mx-auto max-w-3xl</div>
                            @else
                                <div class="rounded-panel bg-canvas-alt px-4 py-3 font-mono text-xs text-ink-soft">{{ $container['classes'] }}</div>
                            @endif
                        </div>
                    </x-kit.specimen>
                @endforeach
            </div>
        </section>

        <section id="dividers" class="space-y-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.layouts.dividers.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.dividers.description') }}</p>
            </header>

            <div class="grid gap-6 lg:grid-cols-2">
                <x-kit.specimen reference="layout/dividers/01-with-label">
                    <div class="flex items-center">
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                        <div class="relative flex justify-center">
                            <span class="bg-canvas px-2 text-sm text-ink-soft">{{ __('ui_kit.layouts.label.continue') }}</span>
                        </div>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/dividers/02-with-icon">
                    <div class="flex items-center">
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                        <div class="relative flex justify-center">
                            <span class="bg-canvas px-2 text-ink-soft">
                                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-5">{!! $plus !!}</svg>
                            </span>
                        </div>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/dividers/03-with-label-on-left">
                    <div class="flex items-center">
                        <div class="relative flex justify-start">
                            <span class="bg-canvas pr-2 text-sm text-ink-soft">{{ __('ui_kit.layouts.label.continue') }}</span>
                        </div>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/dividers/04-with-title">
                    <div class="flex items-center">
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                        <div class="relative flex justify-center">
                            <span class="bg-canvas px-3 text-base font-semibold text-ink">{{ __('ui_kit.layouts.label.projects') }}</span>
                        </div>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/dividers/05-with-title-on-left">
                    <div class="flex items-center">
                        <div class="relative flex justify-start">
                            <span class="bg-canvas pr-3 text-base font-semibold text-ink">{{ __('ui_kit.layouts.label.projects') }}</span>
                        </div>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/dividers/06-with-button">
                    <div class="flex items-center gap-3">
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                        <x-kit.button variant="secondary" size="sm" class="shrink-0 whitespace-nowrap">
                            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">{!! $plus !!}</svg>
                            {{ __('ui_kit.layouts.label.action') }}
                        </x-kit.button>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/dividers/07-with-title-and-button">
                    <div class="flex items-center gap-3">
                        <span class="shrink-0 text-base font-semibold text-ink">{{ __('ui_kit.layouts.label.projects') }}</span>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                        <x-kit.button variant="secondary" size="sm" class="shrink-0 whitespace-nowrap">
                            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">{!! $plus !!}</svg>
                            {{ __('ui_kit.layouts.label.action') }}
                        </x-kit.button>
                    </div>
                </x-kit.specimen>

                {{--
                    The kit fuses the four controls into one bar with -space-x-px and rounded ends.
                    Here they are four themed buttons in a row: the theme owns the corner, and a
                    fused bar would need a second set of classes to unround the middle of it.
                --}}
                <x-kit.specimen reference="layout/dividers/08-with-toolbar">
                    <div class="flex items-center gap-3">
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                        <div role="group" class="flex shrink-0 gap-1">
                            @foreach (['edit', 'attach', 'comment', 'delete'] as $action)
                                <x-kit.button variant="secondary" size="sm" icon aria-label="{{ __('ui_kit.layouts.label.'.$action) }}">
                                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
                                        @switch($action)
                                            @case('edit')
                                                <path d="m3 15 1-3.5L13 2.5a2 2 0 0 1 3 3L6.5 15 3 16l0-1Z" stroke-linecap="round" stroke-linejoin="round" />
                                                @break
                                            @case('attach')
                                                <path d="M13 7.5 8 12.5a2 2 0 0 0 3 3l5-5a4 4 0 0 0-6-5.5l-5 5a6 6 0 0 0 8.5 8.5" stroke-linecap="round" stroke-linejoin="round" />
                                                @break
                                            @case('comment')
                                                <path d="M3 5.5A1.5 1.5 0 0 1 4.5 4h11A1.5 1.5 0 0 1 17 5.5v7a1.5 1.5 0 0 1-1.5 1.5H8l-4 3v-3A1.5 1.5 0 0 1 3 12.5v-7Z" stroke-linecap="round" stroke-linejoin="round" />
                                                @break
                                            @default
                                                <path d="M6 6.5h8m-6.5 0v7m5-7v7M4.5 4.5h11m-9.5 0 .5-2h6l.5 2m-8 0 .8 11h6.4l.8-11" stroke-linecap="round" stroke-linejoin="round" />
                                        @endswitch
                                    </svg>
                                </x-kit.button>
                            @endforeach
                        </div>
                        <div aria-hidden="true" class="w-full border-t border-rule"></div>
                    </div>
                </x-kit.specimen>
            </div>
        </section>

        <section id="list-containers" class="space-y-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.layouts.lists.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.lists.description') }}</p>
            </header>

            <div class="grid gap-6 lg:grid-cols-2">
                @foreach ($lists as $list)
                    <x-kit.specimen :reference="'layout/list-containers/'.$list['ref']">
                        @if ($list['wrapper'])
                            <div class="{{ $list['wrapper'] }}">
                        @endif

                        <ul role="list" class="{{ $list['list'] }}">
                            @for ($row = 1; $row <= 3; $row++)
                                <li class="{{ $list['item'] }}">{{ __('ui_kit.layouts.label.item') }} {{ $row }}</li>
                            @endfor
                        </ul>

                        @if ($list['wrapper'])
                            </div>
                        @endif
                    </x-kit.specimen>
                @endforeach
            </div>
        </section>

        <section id="media-objects" class="space-y-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.layouts.media.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.media.description') }}</p>
            </header>

            <div class="grid gap-6 lg:grid-cols-2">
                @foreach ($media as $object)
                    <x-kit.specimen :reference="'layout/media-objects/'.$object['ref']">
                        <div class="{{ $object['wrapper'] }}">
                            <div class="{{ $object['media'] }}">
                                <x-kit.placeholder :class="$object['figure']" />
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-ink">{{ __('ui_kit.layouts.label.media_title') }}</h4>
                                <p class="mt-1 text-ink-soft">{{ __('ui_kit.layouts.label.media_text') }}</p>
                            </div>
                        </div>
                    </x-kit.specimen>
                @endforeach

                <x-kit.specimen reference="layout/media-objects/05-media-on-right">
                    <div class="flex">
                        <div>
                            <h4 class="text-lg font-bold text-ink">{{ __('ui_kit.layouts.label.media_title') }}</h4>
                            <p class="mt-1 text-ink-soft">{{ __('ui_kit.layouts.label.media_text') }}</p>
                        </div>
                        <div class="ml-4 shrink-0">
                            <x-kit.placeholder class="size-16" />
                        </div>
                    </div>
                </x-kit.specimen>

                <x-kit.specimen reference="layout/media-objects/08-nested" class="lg:col-span-2">
                    <div class="flex">
                        <div class="mr-4 shrink-0">
                            <x-kit.placeholder class="size-16" />
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-ink">{{ __('ui_kit.layouts.label.media_title') }}</h4>
                            <p class="mt-1 text-ink-soft">{{ __('ui_kit.layouts.label.media_text') }}</p>

                            @for ($child = 1; $child <= 2; $child++)
                                <div class="mt-6 flex">
                                    <div class="mr-4 shrink-0">
                                        <x-kit.placeholder class="size-12" />
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-bold text-ink">{{ __('ui_kit.layouts.label.media_title') }}</h4>
                                        <p class="mt-1 text-ink-soft">{{ __('ui_kit.layouts.label.media_text') }}</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </x-kit.specimen>
            </div>
        </section>

        {{--
            Not variants of one box: three families that divide the page differently, and
            every shell the kit ships, drawn as the structure it actually is.
        --}}
        <section id="shells" class="space-y-10">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.layouts.shells.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.shells.description') }}</p>
            </header>

            <div class="space-y-4">
                <h3 class="font-display text-base text-ink">{{ __('ui_kit.layouts.shells.stacked') }}</h3>

                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($stacked as $shell)
                        <x-kit.specimen :reference="'application-shells/stacked/'.$shell['ref']">
                            <div class="{{ $schema }} flex-col {{ $shell['page'] }}">
                                <div class="{{ $shell['nav'] }} {{ ($shell['overlap'] ?? false) ? 'pb-10' : '' }}">
                                    <div class="{{ $label }} h-7">{{ __('ui_kit.layouts.label.nav') }}</div>

                                    @if (($shell['rows'] ?? 1) === 2)
                                        <div class="{{ $label }} h-6 border-t border-current/20">{{ __('ui_kit.layouts.label.nav') }}</div>
                                    @endif

                                    {{-- In an overlapping shell the page header lives inside the coloured band. --}}
                                    @if ($shell['overlap'] ?? false)
                                        <div class="{{ $label }} h-8 opacity-75">{{ __('ui_kit.layouts.label.page_header') }}</div>
                                    @endif
                                </div>

                                @if ($shell['header'] ?? null)
                                    <div class="{{ $label }} {{ $shell['header'] === 'compact' ? 'h-6' : 'h-10' }} border-b border-rule bg-canvas text-ink-soft">
                                        {{ __('ui_kit.layouts.label.page_header') }}
                                    </div>
                                @endif

                                {{-- The overlap: the content is pulled back up over the band it sits under. --}}
                                <div class="relative z-10 flex flex-1 {{ ($shell['overlap'] ?? false) ? '-mt-8' : '' }}">
                                    <div class="{{ $fill }} bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.main') }}</div>
                                </div>
                            </div>
                        </x-kit.specimen>
                    @endforeach
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="font-display text-base text-ink">{{ __('ui_kit.layouts.shells.sidebar') }}</h3>

                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($sidebars as $shell)
                        <x-kit.specimen :reference="'application-shells/sidebar/'.$shell['ref']">
                            <div class="{{ $schema }} {{ $shell['page'] }}">
                                <div class="{{ $label }} {{ $shell['fill'] }} w-1/4">{{ __('ui_kit.layouts.label.sidebar') }}</div>

                                <div class="flex flex-1 flex-col">
                                    @if ($shell['header'] ?? false)
                                        <div class="{{ $label }} h-9 border-b border-rule bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.page_header') }}</div>
                                    @endif

                                    <div class="flex flex-1 {{ ($shell['constrained'] ?? false) ? 'justify-center' : '' }}">
                                        <div class="{{ $fill }} bg-canvas text-ink-soft {{ ($shell['constrained'] ?? false) ? 'w-2/3 flex-none' : '' }}">
                                            {{ __('ui_kit.layouts.label.'.(($shell['constrained'] ?? false) ? 'constrained' : 'main')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-kit.specimen>
                    @endforeach
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="font-display text-base text-ink">{{ __('ui_kit.layouts.shells.multi_column') }}</h3>

                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($columns as $shell)
                        <x-kit.specimen :reference="'application-shells/multi-column/'.$shell['ref']">
                            <div class="{{ $schema }} bg-canvas">
                                {{-- The rail runs the whole height, so a header beside it starts after it. --}}
                                @if ($shell['rail'] ?? null)
                                    <div class="{{ $label }} {{ $shell['rail'] }} w-10">{{ __('ui_kit.layouts.label.rail') }}</div>
                                @endif

                                <div class="flex flex-1 flex-col">
                                    @if ($shell['header'] ?? null)
                                        <div class="{{ $label }} {{ $shell['header'] }} h-9">{{ __('ui_kit.layouts.label.page_header') }}</div>
                                    @endif

                                    <div class="flex flex-1 {{ ($shell['constrained'] ?? false) ? 'mx-auto w-11/12' : '' }}">
                                        @foreach ($shell['cols'] as [$width, $surface, $name])
                                            <div class="{{ $label }} {{ $width }} {{ $surface }} text-ink-soft">{{ __('ui_kit.layouts.label.'.$name) }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </x-kit.specimen>
                    @endforeach
                </div>
            </div>

            {{--
                The kit ships no mobile navigation component: every shell carries its own,
                and there are only three of them. A stacked shell expands a disclosure panel
                in flow below the bar; a sidebar or multi-column shell opens its sidebar as
                an off-canvas dialog over a scrim, with the close button in the gutter beside it.
            --}}
            <div class="space-y-4">
                <h3 class="font-display text-base text-ink">{{ __('ui_kit.layouts.shells.mobile') }}</h3>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.layouts.shells.mobile_description') }}</p>

                <div class="grid gap-6 lg:grid-cols-2">
                    <x-kit.specimen reference="application-shells/stacked/* — el-disclosure (sm:hidden)">
                        <div class="flex flex-wrap gap-4">
                            <div class="space-y-1">
                                <div class="{{ $phone }} flex-col bg-canvas-alt">
                                    <div class="{{ $bar }} {{ $plain }} border-b border-rule">
                                        <span>{{ __('ui_kit.layouts.label.nav') }}</span>
                                        {!! $burger !!}
                                    </div>
                                    <div class="flex flex-1">
                                        <div class="{{ $fill }} bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.main') }}</div>
                                    </div>
                                </div>
                                <p class="{{ $label }} text-ink-soft">{{ __('ui_kit.layouts.label.closed') }}</p>
                            </div>

                            {{-- Open, the panel sits in flow and pushes the content down rather than covering it. --}}
                            <div class="space-y-1">
                                <div class="{{ $phone }} flex-col bg-canvas-alt">
                                    <div class="{{ $bar }} {{ $plain }} border-b border-rule">
                                        <span>{{ __('ui_kit.layouts.label.nav') }}</span>
                                        {!! $close !!}
                                    </div>
                                    <div class="{{ $label }} h-20 border-b border-rule bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.menu') }}</div>
                                    <div class="flex flex-1">
                                        <div class="{{ $fill }} bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.main') }}</div>
                                    </div>
                                </div>
                                <p class="{{ $label }} text-ink-soft">{{ __('ui_kit.layouts.label.open') }}</p>
                            </div>
                        </div>
                    </x-kit.specimen>

                    <x-kit.specimen reference="application-shells/sidebar/* — el-dialog (lg:hidden)">
                        <div class="flex flex-wrap gap-4">
                            <div class="space-y-1">
                                <div class="{{ $phone }} flex-col bg-canvas-alt">
                                    <div class="{{ $bar }} {{ $plain }} border-b border-rule">
                                        {!! $burger !!}
                                        <span>{{ __('ui_kit.layouts.label.page_header') }}</span>
                                        <span class="size-3.5 rounded-full bg-rule"></span>
                                    </div>
                                    <div class="flex flex-1">
                                        <div class="{{ $fill }} bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.main') }}</div>
                                    </div>
                                </div>
                                <p class="{{ $label }} text-ink-soft">{{ __('ui_kit.layouts.label.closed') }}</p>
                            </div>

                            {{-- Open, the panel covers the page: a scrim over everything, the close button in the gutter. --}}
                            <div class="space-y-1">
                                <div class="{{ $phone }} relative flex-col bg-canvas-alt">
                                    <div class="{{ $bar }} {{ $plain }} border-b border-rule">
                                        {!! $burger !!}
                                        <span>{{ __('ui_kit.layouts.label.page_header') }}</span>
                                        <span class="size-3.5 rounded-full bg-rule"></span>
                                    </div>
                                    <div class="flex flex-1">
                                        <div class="{{ $fill }} bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.main') }}</div>
                                    </div>

                                    <div class="absolute inset-0 flex">
                                        <div class="{{ $label }} w-3/4 border-r border-rule bg-canvas text-ink">{{ __('ui_kit.layouts.label.drawer') }}</div>
                                        <div class="flex flex-1 flex-col items-center gap-1 bg-ink/70 pt-2 text-canvas">
                                            {!! $close !!}
                                            <span class="{{ $label }} flex-1">{{ __('ui_kit.layouts.label.scrim') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="{{ $label }} text-ink-soft">{{ __('ui_kit.layouts.label.open') }}</p>
                            </div>
                        </div>
                    </x-kit.specimen>

                    <x-kit.specimen reference="application-shells/multi-column/* — el-dialog (lg:hidden)" class="lg:col-span-2">
                        <div class="flex flex-wrap items-start gap-4">
                            <div class="space-y-1">
                                <div class="{{ $phone }} flex-col bg-canvas">
                                    <div class="{{ $bar }} {{ $plain }} border-b border-rule">
                                        {!! $burger !!}
                                        <span>{{ __('ui_kit.layouts.label.page_header') }}</span>
                                        <span class="size-3.5 rounded-full bg-rule"></span>
                                    </div>
                                    <div class="flex flex-1">
                                        <div class="{{ $fill }} bg-canvas text-ink-soft">{{ __('ui_kit.layouts.label.main') }}</div>
                                    </div>
                                </div>
                                <p class="{{ $label }} text-ink-soft">{{ __('ui_kit.layouts.label.closed') }}</p>
                            </div>

                            <p class="max-w-prose flex-1 text-sm text-ink-soft">{{ __('ui_kit.layouts.shells.mobile_columns') }}</p>
                        </div>
                    </x-kit.specimen>
                </div>
            </div>
        </section>
    </div>
</x-layouts.gallery>
