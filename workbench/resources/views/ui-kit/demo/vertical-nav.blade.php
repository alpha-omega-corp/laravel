@php
    $rows = [
        ['label' => __('ui_kit.demo.tab.overview'), 'current' => true],
        ['label' => __('ui_kit.demo.crumb.clients'), 'badge' => '12'],
        ['label' => __('ui_kit.demo.tab.billing')],
    ];
@endphp

<div class="grid max-w-md gap-6 sm:grid-cols-2">
    <x-kit.vertical-nav :items="$rows" />
    <x-kit.vertical-nav bordered :items="$rows" />
</div>
