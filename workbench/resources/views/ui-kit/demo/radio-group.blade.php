<div class="grid gap-6 sm:grid-cols-2">
    <x-kit.radio-group name="demo-plan" selected="team" :legend="__('ui_kit.demo.radio.legend')" :options="[
        ['value' => 'solo', 'label' => __('ui_kit.demo.radio.solo')],
        ['value' => 'team', 'label' => __('ui_kit.demo.radio.team')],
    ]" />

    <x-kit.radio-group name="demo-plan-cards" cards selected="team" :options="[
        ['value' => 'solo', 'label' => __('ui_kit.demo.radio.solo'), 'hint' => __('ui_kit.demo.radio.solo_hint')],
        ['value' => 'team', 'label' => __('ui_kit.demo.radio.team'), 'hint' => __('ui_kit.demo.radio.team_hint')],
    ]" />
</div>
