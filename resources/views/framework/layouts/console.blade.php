@php
    /*
     * console — a permanent sidebar, a breadcrumb, a page header, and the
     * section on a panel. The back office of the same business: `dense` is on,
     * so the bodies drop their banners and the price list becomes a table.
     */
@endphp

<div class="flex gap-6 bg-canvas-alt p-4 sm:p-6">
    <x-kit.side-nav class="hidden w-52 shrink-0 self-start lg:flex" :groups="[[
        'heading' => $site['brand'],
        'items' => array_map(
            fn (string $slug, array $item): array => [
                'label' => $item['label'],
                'href' => $url($slug),
                'current' => $slug === $key,
            ],
            array_keys($sections),
            $sections,
        ),
    ]]" />

    <div class="min-w-0 flex-1 space-y-6">
        <x-kit.page-heading :title="$section['label']" :meta="$site['meta']">
            <x-slot:breadcrumb>
                <x-kit.breadcrumb :items="[
                    ['label' => $site['brand'], 'href' => $url(array_key_first($sections))],
                    ['label' => $section['label']],
                ]" />
            </x-slot:breadcrumb>

            <x-slot:actions>
                <x-kit.button size="sm" variant="secondary">Exporter</x-kit.button>
                <x-kit.button size="sm" :href="$url($site['cta']['primary']['to'])">{{ $site['cta']['primary']['label'] }}</x-kit.button>
            </x-slot:actions>
        </x-kit.page-heading>

        <div class="panel p-6">
            @include($section['view'], ['data' => $section['data'], 'dense' => true])
        </div>
    </div>
</div>
