@php
    use Workbench\App\Enums\KitComponent;
    use Workbench\App\Enums\Theme;

    /** @var array<int, array{heading: string, items: array<int, array{label: string, href: string, current?: bool, badge?: string, icon?: string}>}> $demo */
    $demo = [
        [
            'heading' => __('ui_kit.side_nav.demo.heading'),
            'items' => [
                ['label' => __('ui_kit.side_nav.demo.overview'), 'href' => '#', 'current' => true, 'icon' => KitComponent::Buttons->icon()],
                ['label' => __('ui_kit.side_nav.demo.clients'), 'href' => '#', 'badge' => '12', 'icon' => KitComponent::SideNav->icon()],
                ['label' => __('ui_kit.side_nav.demo.sites'), 'href' => '#', 'icon' => KitComponent::Layouts->icon()],
            ],
        ],
    ];
@endphp

<x-layouts.ui-kit :title="KitComponent::SideNav->label()" :description="KitComponent::SideNav->summary()">
    <div class="space-y-8">
        <p class="max-w-prose text-ink-soft">{{ KitComponent::SideNav->summary() }}</p>

        <section id="variants" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.side_nav.variants.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.side_nav.variants.description') }}</p>
            </header>

            <div class="grid gap-5 sm:grid-cols-2">
                <x-kit.side-nav :groups="$demo" class="w-full" />
                <x-kit.side-nav :groups="$demo" variant="brand" class="w-full" />
            </div>

            <code class="block w-fit rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">&lt;x-kit.side-nav variant="brand" :groups="$groups" /&gt;</code>
        </section>

        <section id="rows" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.side_nav.rows.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.side_nav.rows.description') }}</p>
            </header>

            <div class="grid gap-5 sm:grid-cols-2">
                {{-- An icon and a count are both optional; a row with neither is just a label. --}}
                <x-kit.side-nav class="w-full" :groups="[[
                    'items' => [
                        ['label' => __('ui_kit.side_nav.demo.overview'), 'href' => '#', 'current' => true],
                        ['label' => __('ui_kit.side_nav.demo.clients'), 'href' => '#'],
                        ['label' => __('ui_kit.side_nav.demo.sites'), 'href' => '#'],
                    ],
                ]]" />

                <x-kit.side-nav class="w-full" :groups="[[
                    'items' => [
                        ['label' => __('ui_kit.side_nav.demo.overview'), 'href' => '#', 'current' => true, 'badge' => '3', 'icon' => KitComponent::Buttons->icon()],
                        ['label' => __('ui_kit.side_nav.demo.clients'), 'href' => '#', 'badge' => '12', 'icon' => KitComponent::SideNav->icon()],
                        ['label' => __('ui_kit.side_nav.demo.sites'), 'href' => '#', 'badge' => '20+', 'icon' => KitComponent::Layouts->icon()],
                    ],
                ]]" />
            </div>

            <code class="block w-fit rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">['label' =&gt; '…', 'href' =&gt; '…', 'badge' =&gt; '12', 'icon' =&gt; '…']</code>
        </section>

        <section id="groups" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.side_nav.groups.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.side_nav.groups.description') }}</p>
            </header>

            {{-- The navigation of this very section: the rows are the KitComponent cases. --}}
            <div class="max-w-xs">
                <x-kit.side-nav :groups="KitComponent::navigation()" />
            </div>

            <code class="block w-fit rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">&lt;x-kit.side-nav :groups="KitComponent::navigation()" /&gt;</code>
        </section>

        <section id="current" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.side_nav.current.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.side_nav.current.description') }}</p>
            </header>

            <div class="max-w-xs">
                <x-kit.side-nav :groups="[[
                    'items' => [
                        ['label' => KitComponent::SideNav->label(), 'href' => route(KitComponent::SideNav->route())],
                        ['label' => KitComponent::Buttons->label(), 'href' => route(KitComponent::Buttons->route())],
                    ],
                ]]" />
            </div>
        </section>

        {{--
            The same navigation, seven times. Each panel carries its own data-palette,
            so nothing here is styled by hand: the tokens of the palette it names take
            over inside it, exactly as they would if the navigation bar had switched to
            it. None of them carries a data-theme — color-scheme inherits, so every
            panel is drawn in the scheme the page is in, light or dark.
        --}}
        <section id="palettes" class="space-y-5">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.side_nav.palettes.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.side_nav.palettes.description') }}</p>
            </header>

            <div class="grid gap-5 lg:grid-cols-2">
                @foreach (Theme::cases() as $palette)
                    <div data-palette="{{ $palette->value }}" class="panel space-y-4 p-6">
                        <header class="space-y-1">
                            {{-- No weight utility here: the display weight is the palette's own. --}}
                            <h3 class="font-display text-base text-ink">{{ $palette->label() }}</h3>
                            <p class="text-sm text-ink-soft">{{ $palette->summary() }}</p>
                        </header>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <x-kit.side-nav :groups="$demo" class="w-full" />
                            <x-kit.side-nav :groups="$demo" variant="brand" class="w-full" />
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layouts.ui-kit>
