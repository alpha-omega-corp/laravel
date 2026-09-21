<div class="flex flex-wrap gap-3">
    <x-kit.dropdown :label="__('ui_kit.demo.options')" :items="[
        ['label' => __('ui_kit.demo.edit')],
        ['label' => __('ui_kit.demo.duplicate')],
        ['label' => __('ui_kit.demo.archive'), 'divider' => true],
    ]" />

    <x-kit.dropdown align="end" :label="__('ui_kit.demo.sort')" :items="[
        ['label' => __('ui_kit.demo.newest')],
        ['label' => __('ui_kit.demo.oldest')],
    ]" />
</div>
