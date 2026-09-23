@php
    /**
     * What a trade charges: rows with the price on the right, grouped by
     * family. A list, not a grid of cards — a grid would make nine equal things
     * out of a price list that has an order.
     *
     * Dense, the whole thing becomes one table: a back office reads a price
     * list the way it reads every other list it holds.
     *
     * @var array<string, mixed> $data
     * @var array<string, mixed> $site
     * @var string $key
     * @var bool $dense
     * @var \Workbench\App\Enums\Variation $variation
     * @var \Closure(string): string $url
     */
@endphp

<div class="{{ $variation->rhythm() }}">
    @include('framework.lead', ['title' => $data['title'], 'body' => $data['body']])

    @if ($dense)
        <x-kit.table :title="$data['title']" :description="$data['body']"
                     {{-- Three columns, not four: a dense layout gives this a narrow
                          column, and the kit's table clips rather than scrolls. --}}
                     :columns="$data['columns']"
                     :rows="collect($data['groups'])->flatMap(fn (array $items, string $group): array => array_map(
                         fn (array $item): array => [$group, $item['title'], $item['meta']],
                         $items,
                     ))->all()">
            <x-slot:actions>
                <x-kit.button size="sm" variant="secondary">Imprimer</x-kit.button>
            </x-slot:actions>
        </x-kit.table>
    @else
        @if ($variation->showsFlourish())
            {{--
                The families as labels, not as tabs. They were a tab strip whose
                every tab pointed at the page it was already on — navigation
                that navigates nowhere, and a third list of the same groups the
                headings below already name.
            --}}
            <div class="flex flex-wrap justify-center gap-2">
                @foreach ($data['tabs'] as $tab)
                    <x-kit.badge tone="outline">{{ $tab }}</x-kit.badge>
                @endforeach
            </div>
        @endif

        <div class="space-y-8">
            @foreach ($data['groups'] as $group => $items)
                <div class="space-y-3">
                    <h4 class="border-b border-rule pb-2 font-display text-lg font-bold text-ink">{{ $group }}</h4>
                    <x-kit.stacked-list :items="$items" />
                </div>
            @endforeach
        </div>
    @endif

    <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
        {{ $data['alert']['body'] }}
    </x-kit.alert>
</div>
