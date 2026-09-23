<div class="flex flex-wrap gap-4">
    <x-kit.notification tone="success" :title="__('ui_kit.demo.notify.saved')">
        {{ __('ui_kit.demo.notify.body') }}
    </x-kit.notification>

    <x-kit.notification tone="warning" :title="__('ui_kit.demo.notify.expiring')">
        {{ __('ui_kit.demo.notify.body') }}

        <x-slot:actions>
            <x-kit.button size="sm" variant="secondary">{{ __('ui_kit.demo.review') }}</x-kit.button>
        </x-slot:actions>
    </x-kit.notification>
</div>
