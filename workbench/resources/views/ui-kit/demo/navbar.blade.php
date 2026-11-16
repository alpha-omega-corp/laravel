@php
    $items = [
        ['label' => __('ui_kit.demo.crumb.home'), 'current' => true],
        ['label' => __('ui_kit.demo.crumb.clients')],
        ['label' => __('ui_kit.demo.table.site')],
    ];
@endphp

<div class="space-y-6">
    @foreach (['plain', 'underline', 'centred', 'brand'] as $variant)
        <div class="space-y-2">
            <p class="font-mono text-xs text-ink-soft">{{ $variant }}</p>

            <x-kit.navbar brand="Cleaner" :variant="$variant" :items="$items">
                <x-slot:actions>
                    <x-kit.button size="sm" :variant="$variant === 'brand' ? 'secondary' : 'primary'">{{ __('ui_kit.demo.add') }}</x-kit.button>
                </x-slot:actions>
            </x-kit.navbar>
        </div>
    @endforeach
</div>
