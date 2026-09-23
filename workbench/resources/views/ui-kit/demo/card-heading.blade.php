<div class="panel overflow-hidden">
    <x-kit.card-heading :title="__('ui_kit.demo.heading.card')" :description="__('ui_kit.demo.heading.card_description')">
        <x-slot:actions>
            <x-kit.button size="sm" variant="secondary">{{ __('ui_kit.demo.edit') }}</x-kit.button>
        </x-slot:actions>
    </x-kit.card-heading>

    <div class="px-4 py-5 text-sm text-ink-soft sm:px-6">{{ __('ui_kit.demo.heading.card_body') }}</div>
</div>
