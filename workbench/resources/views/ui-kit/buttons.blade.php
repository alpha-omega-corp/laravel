@php
    use Workbench\App\Enums\Theme;
@endphp

<x-layouts.ui-kit :title="__('ui_kit.buttons.title')" :description="__('ui_kit.buttons.intro')">
    <div class="space-y-8">
        <p class="max-w-prose text-ink-soft">{{ __('ui_kit.buttons.intro') }}</p>

        <section id="variants" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.buttons.variants.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.buttons.variants.description') }}</p>
            </header>

            <div class="flex flex-wrap items-center gap-3">
                <x-kit.button>{{ __('ui_kit.buttons.label.primary') }}</x-kit.button>
                <x-kit.button variant="secondary">{{ __('ui_kit.buttons.label.secondary') }}</x-kit.button>
                <x-kit.button variant="soft">{{ __('ui_kit.buttons.label.soft') }}</x-kit.button>
                <x-kit.button variant="ghost">{{ __('ui_kit.buttons.label.ghost') }}</x-kit.button>
            </div>

            <code class="block w-fit rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">&lt;x-kit.button variant="secondary" /&gt;</code>
        </section>

        <section id="sizes" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.buttons.sizes.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.buttons.sizes.description') }}</p>
            </header>

            <div class="flex flex-wrap items-center gap-3">
                @foreach (['xs', 'sm', 'md', 'lg', 'xl'] as $size)
                    <x-kit.button :size="$size">{{ $size }}</x-kit.button>
                @endforeach
            </div>

            <code class="block w-fit rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">&lt;x-kit.button size="xl" /&gt;</code>
        </section>

        <section id="icons" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.buttons.icons.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.buttons.icons.description') }}</p>
            </header>

            <div class="flex flex-wrap items-center gap-3">
                <x-kit.button>
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">
                        <path d="M10 4.5v11M4.5 10h11" stroke-linecap="round" />
                    </svg>
                    {{ __('ui_kit.buttons.label.leading') }}
                </x-kit.button>

                <x-kit.button variant="secondary">
                    {{ __('ui_kit.buttons.label.trailing') }}
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">
                        <path d="M4.5 10h11m0 0-4-4m4 4-4 4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-kit.button>

                <x-kit.button icon round aria-label="{{ __('ui_kit.buttons.label.icon_only') }}">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">
                        <path d="M10 4.5v11M4.5 10h11" stroke-linecap="round" />
                    </svg>
                </x-kit.button>

                <x-kit.button variant="secondary" icon aria-label="{{ __('ui_kit.buttons.label.icon_only') }}">
                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
                        <path d="M6 6.5h8m-6.5 0v7m5-7v7M4.5 4.5h11m-9.5 0 .5-2h6l.5 2m-8 0 .8 11h6.4l.8-11" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-kit.button>
            </div>

            <code class="block w-fit rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">&lt;x-kit.button icon round aria-label="…" /&gt;</code>
        </section>

        <section id="states" class="panel space-y-5 p-6">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.buttons.states.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.buttons.states.description') }}</p>
            </header>

            <div class="flex flex-wrap items-center gap-3">
                <x-kit.button>{{ __('ui_kit.buttons.label.rest') }}</x-kit.button>
                <x-kit.button disabled>{{ __('ui_kit.buttons.label.disabled') }}</x-kit.button>
                <x-kit.button variant="secondary" disabled>{{ __('ui_kit.buttons.label.disabled') }}</x-kit.button>
                <x-kit.button :href="route('ui-kit.buttons').'#states'">{{ __('ui_kit.buttons.label.link') }}</x-kit.button>
            </div>
        </section>

        {{--
            The same four buttons, seven times. Each panel carries its own data-palette,
            so nothing here is styled by hand: the tokens of the palette it names take
            over inside it, exactly as they would if the navigation bar had switched to
            it. None of them carries a data-theme — color-scheme inherits, so every
            panel is drawn in the scheme the page is in, light or dark.
        --}}
        <section id="palettes" class="space-y-5">
            <header class="space-y-1">
                <h2 class="text-lg font-semibold text-ink">{{ __('ui_kit.buttons.palettes.title') }}</h2>
                <p class="max-w-prose text-sm text-ink-soft">{{ __('ui_kit.buttons.palettes.description') }}</p>
            </header>

            <div class="grid gap-5 lg:grid-cols-2">
                @foreach (Theme::cases() as $palette)
                    <div data-palette="{{ $palette->value }}" class="panel space-y-5 p-6">
                        <header class="space-y-1">
                            {{-- No weight utility here: the display weight is the palette's own. --}}
                            <h3 class="font-display text-base text-ink">{{ $palette->label() }}</h3>
                            <p class="text-sm text-ink-soft">{{ $palette->summary() }}</p>
                        </header>

                        <div class="flex flex-wrap items-center gap-3">
                            <x-kit.button>{{ __('ui_kit.buttons.label.primary') }}</x-kit.button>
                            <x-kit.button variant="secondary">{{ __('ui_kit.buttons.label.secondary') }}</x-kit.button>
                            <x-kit.button variant="soft">{{ __('ui_kit.buttons.label.soft') }}</x-kit.button>
                            <x-kit.button icon aria-label="{{ __('ui_kit.buttons.label.icon_only') }}">
                                <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">
                                    <path d="M10 4.5v11M4.5 10h11" stroke-linecap="round" />
                                </svg>
                            </x-kit.button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layouts.ui-kit>
