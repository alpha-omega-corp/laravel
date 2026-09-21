<x-kit.form-layout :title="__('ui_kit.demo.form.title')" :description="__('ui_kit.demo.form.description')">
    <x-kit.input name="demo-first" :label="__('ui_kit.demo.form.first')" />
    <x-kit.input name="demo-last" :label="__('ui_kit.demo.form.last')" />
    <x-kit.input name="demo-email" type="email" :label="__('ui_kit.demo.form.email')" class="sm:col-span-2" />
    <x-kit.textarea name="demo-about" :label="__('ui_kit.demo.form.about')" class="sm:col-span-2" />

    <x-slot:actions>
        <x-kit.button variant="ghost">{{ __('ui_kit.demo.cancel') }}</x-kit.button>
        <x-kit.button>{{ __('ui_kit.demo.save') }}</x-kit.button>
    </x-slot:actions>
</x-kit.form-layout>
