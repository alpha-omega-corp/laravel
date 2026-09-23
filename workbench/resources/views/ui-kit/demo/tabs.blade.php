<div class="space-y-6">
    <x-kit.tabs :items="[
        ['label' => __('ui_kit.demo.tab.overview'), 'current' => true],
        ['label' => __('ui_kit.demo.crumb.clients'), 'badge' => '12'],
        ['label' => __('ui_kit.demo.tab.billing')],
    ]" />

    <x-kit.tabs variant="pill" class="w-fit" :items="[
        ['label' => __('ui_kit.demo.tab.overview'), 'current' => true],
        ['label' => __('ui_kit.demo.crumb.clients')],
        ['label' => __('ui_kit.demo.tab.billing')],
    ]" />
</div>
