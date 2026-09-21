<div class="space-y-4">
    <x-kit.action-panel inline :title="__('ui_kit.demo.panel.title')">
        {{ __('ui_kit.demo.panel.body') }}

        <x-slot:action>
            <x-kit.button variant="secondary">{{ __('ui_kit.demo.panel.action') }}</x-kit.button>
        </x-slot:action>
    </x-kit.action-panel>
</div>
