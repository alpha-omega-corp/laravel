@php
    /**
     * A menu, set like a printed card: two columns of courses, a dotted leader
     * to the price, and no panel anywhere. It is deliberately not the price
     * list — the same rows drawn as boxed rows would make a catalogue out of
     * something that is read standing up, once, before ordering.
     *
     * Dense, it gives in and becomes a table, because a kitchen reading its own
     * card in a back office is reading a list of prices.
     *
     * @var array<string, mixed> $data
     * @var array<string, mixed> $site
     * @var bool $dense
     * @var \App\Enums\Variation $variation
     * @var \Closure(string): string $url
     */
@endphp

<div class="{{ $variation->rhythm() }}">
    @include('framework.lead', ['title' => $data['title'], 'body' => $data['body']])

    @if ($dense)
        <x-kit.table :title="$data['title']" :description="$data['body']"
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
        <div class="mx-auto max-w-3xl space-y-10 sm:columns-2 sm:gap-10 sm:space-y-0">
            @foreach ($data['groups'] as $group => $items)
                <section class="break-inside-avoid pb-10">
                    <h4 class="mb-4 text-center font-display text-sm font-bold tracking-[0.2em] text-ink uppercase">{{ $group }}</h4>

                    <ul role="list" class="space-y-4">
                        @foreach ($items as $item)
                            <li>
                                <div class="flex items-baseline gap-2">
                                    <span class="font-medium text-ink">{{ $item['title'] }}</span>
                                    <span aria-hidden="true" class="min-w-6 flex-1 border-b border-dotted border-rule"></span>
                                    <span class="shrink-0 text-sm text-ink">{{ $item['meta'] }}</span>
                                </div>

                                @if ($variation->showsFlourish())
                                    <p class="text-xs text-ink-soft">{{ $item['subtitle'] }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endforeach
        </div>

        <p class="text-center text-xs text-ink-soft">{{ $data['note'] }}</p>
    @endif

    <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
        {{ $data['alert']['body'] }}
    </x-kit.alert>
</div>
