@php
    /*
     * stacked — a bar, a page header band, and the section on a panel over a
     * tinted page. The same site run as a product rather than a brochure.
     *
     * The bar is the navigation. A tab strip under the page header would be
     * the same sections a second time, three rows below the first.
     */
@endphp

<div class="space-y-6 bg-canvas-alt p-4 sm:p-6">
    @include('framework.navbar')

    <x-kit.page-heading :title="$section['label']" :meta="[$site['brand'], $site['address']]">
        <x-slot:actions>
            <x-kit.button size="sm" variant="secondary" :href="$url($site['cta']['secondary']['to'])">{{ $site['cta']['secondary']['label'] }}</x-kit.button>
            <x-kit.button size="sm" :href="$url($site['cta']['primary']['to'])">{{ $site['cta']['primary']['label'] }}</x-kit.button>
        </x-slot:actions>
    </x-kit.page-heading>


    <div class="panel p-6">
        @include($section['view'], ['data' => $section['data'], 'dense' => false])
    </div>

    @include('framework.footer')
</div>
