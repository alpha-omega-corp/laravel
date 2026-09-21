<x-kit.navbar brand="Cleaner" :items="[
    ['label' => __('ui_kit.demo.crumb.home'), 'current' => true],
    ['label' => __('ui_kit.demo.crumb.clients')],
    ['label' => __('ui_kit.demo.table.site')],
]">
    <x-slot:actions>
        <x-kit.button size="sm">{{ __('ui_kit.demo.add') }}</x-kit.button>
    </x-slot:actions>
</x-kit.navbar>
