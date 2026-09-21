<div class="grid gap-4 lg:grid-cols-2">
    <x-kit.modal open :title="__('ui_kit.demo.modal.title')">
        {{ __('ui_kit.demo.modal.body') }}

        <x-slot:actions>
            <x-kit.button size="sm" variant="ghost">{{ __('ui_kit.demo.cancel') }}</x-kit.button>
            <x-kit.button size="sm">{{ __('ui_kit.demo.confirm') }}</x-kit.button>
        </x-slot:actions>
    </x-kit.modal>

    <x-kit.modal open tone="danger" :title="__('ui_kit.demo.modal.danger')">
        {{ __('ui_kit.demo.modal.danger_body') }}

        <x-slot:actions>
            <x-kit.button size="sm" variant="ghost">{{ __('ui_kit.demo.cancel') }}</x-kit.button>
            <x-kit.button size="sm">{{ __('ui_kit.demo.delete') }}</x-kit.button>
        </x-slot:actions>
    </x-kit.modal>
</div>
