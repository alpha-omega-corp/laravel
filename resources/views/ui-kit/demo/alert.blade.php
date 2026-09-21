<div class="space-y-4">
    @foreach (['info', 'success', 'warning', 'danger'] as $tone)
        <x-kit.alert :tone="$tone" :title="__('ui_kit.demo.alert.'.$tone)">
            {{ __('ui_kit.demo.alert.body') }}
        </x-kit.alert>
    @endforeach

    <x-kit.alert tone="info" :title="__('ui_kit.demo.alert.info')">
        {{ __('ui_kit.demo.alert.body') }}

        <x-slot:actions>
            <x-kit.button size="sm">{{ __('ui_kit.demo.review') }}</x-kit.button>
            <x-kit.button size="sm" variant="ghost">{{ __('ui_kit.demo.dismiss') }}</x-kit.button>
        </x-slot:actions>
    </x-kit.alert>
</div>
