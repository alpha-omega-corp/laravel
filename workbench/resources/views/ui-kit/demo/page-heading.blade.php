<x-kit.page-heading :title="__('ui_kit.demo.heading.page')" :meta="['Atelier Verd', __('ui_kit.demo.heading.updated')]">
    <x-slot:breadcrumb>
        <x-kit.breadcrumb :items="[
            ['label' => __('ui_kit.demo.crumb.home'), 'href' => '#'],
            ['label' => __('ui_kit.demo.crumb.clients')],
        ]" />
    </x-slot:breadcrumb>

    <x-slot:actions>
        <x-kit.button variant="secondary">{{ __('ui_kit.demo.edit') }}</x-kit.button>
        <x-kit.button>{{ __('ui_kit.demo.publish') }}</x-kit.button>
    </x-slot:actions>
</x-kit.page-heading>
