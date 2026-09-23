<div class="space-y-4">
    <x-kit.stacked-list :items="[
        ['title' => 'Atelier Verd', 'subtitle' => 'atelier-verd.ch', 'meta' => 'CHF 1 240', 'caption' => __('ui_kit.demo.list.monthly')],
        ['title' => 'Maison Blanc', 'subtitle' => 'maison-blanc.ch', 'meta' => 'CHF 890', 'caption' => __('ui_kit.demo.list.monthly')],
    ]" />

    <x-kit.stacked-list separate :items="[
        ['title' => 'Atelier Verd', 'subtitle' => 'atelier-verd.ch', 'meta' => 'CHF 1 240'],
        ['title' => 'Maison Blanc', 'subtitle' => 'maison-blanc.ch', 'meta' => 'CHF 890'],
    ]" />
</div>
