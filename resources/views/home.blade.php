{{--
    The home page: what this application is, and the four pages it is made of.

    The shell already prints the title, so the body opens on the intro the way
    every other page does. Each card summarises a tab in one line and links to
    it — the tabs' own intros say the rest, and are not repeated here.
--}}
<x-layouts.shell :title="__('home.title')" :description="__('home.intro')">
    <div class="space-y-8">
        <p class="max-w-prose text-ink-soft">{{ __('home.intro') }}</p>

        <div class="grid gap-4 sm:grid-cols-2">
            @foreach ([
                'ui_kit' => 'ui-kit',
                'layouts' => 'layouts',
                'framework' => 'framework',
                'graph' => 'graph',
            ] as $tab => $route)
                <x-kit.action-panel :title="__('shell.nav.'.$tab)">
                    {{ __('home.tab.'.$tab) }}

                    <x-slot:action>
                        <x-kit.button variant="secondary" :href="route($route)">{{ __('home.open') }}</x-kit.button>
                    </x-slot:action>
                </x-kit.action-panel>
            @endforeach
        </div>

        <p class="max-w-prose text-sm text-ink-soft">{{ __('home.picker') }}</p>
    </div>
</x-layouts.shell>
