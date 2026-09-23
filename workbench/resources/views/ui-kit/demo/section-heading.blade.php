<x-kit.section-heading :title="__('ui_kit.demo.heading.section')" :description="__('ui_kit.demo.heading.section_description')">
    <x-slot:actions>
        <x-kit.button size="sm">{{ __('ui_kit.demo.add') }}</x-kit.button>
    </x-slot:actions>

    <x-slot:tabs>
        <x-kit.tabs :items="[
            ['label' => __('ui_kit.demo.tab.overview'), 'current' => true],
            ['label' => __('ui_kit.demo.tab.billing')],
        ]" />
    </x-slot:tabs>
</x-kit.section-heading>
