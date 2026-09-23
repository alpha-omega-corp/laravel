<div class="grid gap-4 lg:grid-cols-2">
    <x-kit.empty-state :title="__('ui_kit.demo.empty.title')">
        {{ __('ui_kit.demo.empty.body') }}

        <x-slot:action>
            <x-kit.button size="sm">{{ __('ui_kit.demo.add') }}</x-kit.button>
        </x-slot:action>
    </x-kit.empty-state>

    <x-kit.empty-state dashed :title="__('ui_kit.demo.empty.title')">
        {{ __('ui_kit.demo.empty.body') }}
    </x-kit.empty-state>
</div>
