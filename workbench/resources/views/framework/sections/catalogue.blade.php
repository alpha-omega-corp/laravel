@php
    /**
     * Things to buy or to join, as a grid of cards: a picture, a price, and the
     * one button that acts. Unlike the price list, every item here is equal and
     * independently takeable, which is exactly what a grid says.
     *
     * `capacity` is optional and only the school uses it — a course that is
     * full is still on the shelf, and the bar is what says so.
     *
     * @var array<string, mixed> $data
     * @var array<string, mixed> $site
     * @var bool $dense
     * @var \Workbench\App\Enums\Variation $variation
     * @var \Closure(string): string $url
     */
@endphp

<div class="{{ $variation->rhythm() }}">
    @include('framework.lead', ['title' => $data['title'], 'body' => $data['body']])

    @if ($dense)
        <x-kit.table :title="$data['title']" :description="$data['body']"
                     :columns="$data['columns']"
                     :rows="array_map(
                         fn (array $item): array => [$item['title'], $item['subtitle'], $item['tag'], $item['meta']],
                         $data['items'],
                     )">
            <x-slot:actions>
                <x-kit.button size="sm" variant="secondary">Exporter</x-kit.button>
            </x-slot:actions>
        </x-kit.table>
    @else
        <ul role="list" class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($data['items'] as $item)
                <li class="panel flex flex-col gap-3 p-4">
                    @if ($variation->showsMedia())
                        <x-kit.placeholder class="h-32 w-full" />
                    @endif

                    <div class="flex items-start justify-between gap-2">
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-ink">{{ $item['title'] }}</p>
                            <p class="mt-0.5 text-xs text-ink-soft">{{ $item['subtitle'] }}</p>
                        </div>

                        @if ($variation->showsFlourish())
                            <x-kit.badge size="sm" tone="outline">{{ $item['tag'] }}</x-kit.badge>
                        @endif
                    </div>

                    @isset ($item['capacity'])
                        <x-kit.progress :value="$item['capacity']" :show-value="false" />
                    @endisset

                    <div class="mt-auto flex items-center justify-between gap-3 pt-1">
                        <span class="text-sm font-semibold text-ink">{{ $item['meta'] }}</span>
                        <x-kit.button size="sm" variant="secondary" :href="$url($site['cta']['primary']['to'])">{{ $data['action'] }}</x-kit.button>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
        {{ $data['alert']['body'] }}
    </x-kit.alert>
</div>
