@php
    $items = [
        ['label' => __('ui_kit.demo.tab.overview'), 'current' => true],
        ['label' => __('ui_kit.demo.crumb.clients'), 'badge' => '12'],
        ['label' => __('ui_kit.demo.tab.billing')],
    ];
@endphp

<div class="space-y-6">
    @foreach (['underline', 'pill', 'bar', 'enclosed'] as $variant)
        <div class="space-y-2">
            <p class="font-mono text-xs text-ink-soft">{{ $variant }}</p>

            <x-kit.tabs :variant="$variant" @class(['w-fit' => $variant === 'pill', 'max-w-xl' => $variant === 'bar']) :items="$items" />
        </div>
    @endforeach
</div>
