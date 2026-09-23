@php
    $rows = [[
        'heading' => __('ui_kit.demo.nav.workspace'),
        'items' => [
            ['label' => __('ui_kit.demo.crumb.home'), 'href' => '#', 'current' => true],
            ['label' => __('ui_kit.demo.crumb.clients'), 'href' => '#', 'badge' => '12'],
            ['label' => __('ui_kit.demo.table.site'), 'href' => '#'],
        ],
    ]];
@endphp

<div class="grid gap-4 sm:grid-cols-2">
    <x-kit.side-nav :groups="$rows" />
    <x-kit.side-nav :groups="$rows" variant="brand" />
</div>
