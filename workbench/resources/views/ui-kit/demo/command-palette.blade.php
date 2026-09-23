<div class="max-w-lg">
    <x-kit.command-palette :placeholder="__('ui_kit.demo.palette.placeholder')" :items="[
        ['label' => __('ui_kit.demo.palette.new_client'), 'hint' => 'C', 'current' => true],
        ['label' => __('ui_kit.demo.palette.new_site'), 'hint' => 'S'],
        ['label' => __('ui_kit.demo.palette.settings'), 'hint' => ','],
    ]" />
</div>
