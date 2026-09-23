<x-kit.drawer open :title="__('ui_kit.demo.drawer.title')">
    {{ __('ui_kit.demo.drawer.body') }}

    <x-slot:actions>
        <x-kit.button size="sm" variant="ghost">{{ __('ui_kit.demo.cancel') }}</x-kit.button>
        <x-kit.button size="sm">{{ __('ui_kit.demo.save') }}</x-kit.button>
    </x-slot:actions>
</x-kit.drawer>
