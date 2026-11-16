@php
    $items = [
        ['label' => __('ui_kit.demo.crumb.home'), 'href' => '#'],
        ['label' => __('ui_kit.demo.crumb.clients'), 'href' => '#'],
        ['label' => 'Atelier Verd'],
    ];
@endphp

<div class="space-y-6">
    @foreach (['chevron', 'slash', 'contained'] as $variant)
        <div class="space-y-2">
            <p class="font-mono text-xs text-ink-soft">{{ $variant }}</p>

            <x-kit.breadcrumb :variant="$variant" :items="$items" />
        </div>
    @endforeach
</div>
