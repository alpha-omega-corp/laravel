<x-kit.table :title="__('ui_kit.demo.table.title')"
             :columns="[__('ui_kit.demo.table.client'), __('ui_kit.demo.table.site'), __('ui_kit.demo.table.plan'), __('ui_kit.demo.table.amount')]"
             :rows="[
                 ['Atelier Verd', 'atelier-verd.ch', 'Standard', 'CHF 1 240'],
                 ['Maison Blanc', 'maison-blanc.ch', 'Premium', 'CHF 890'],
                 ['Studio Onze', 'studio-onze.ch', 'Standard', 'CHF 640'],
             ]">
    <x-slot:actions>
        <x-kit.button size="sm" variant="secondary">{{ __('ui_kit.demo.table.export') }}</x-kit.button>
    </x-slot:actions>
</x-kit.table>
