@php
    /**
     * What happens and when, as a timeline under day headings. The farm's
     * events and the practice's diary are the same shape and nothing else here
     * is: a list whose order is time, where the next item matters more than the
     * one after it.
     *
     * Dense, it flattens to a table, because a back office sorts and scans a
     * day rather than reading down it.
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
                     :rows="collect($data['groups'])->flatMap(fn (array $items): array => array_map(
                         fn (array $item): array => [$item['time'], $item['text']],
                         $items,
                     ))->all()" />
    @else
        <div class="grid items-start gap-6 lg:grid-cols-2">
            @foreach ($data['groups'] as $group => $items)
                <div class="panel space-y-4 p-6">
                    <h4 class="font-display text-lg font-bold text-ink">{{ $group }}</h4>

                    <x-kit.feed :items="$variation->showsFlourish()
                        ? $items
                        : array_map(fn (array $item): array => ['text' => $item['text'], 'time' => $item['time']], $items)" />
                </div>
            @endforeach
        </div>
    @endif

    <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
        {{ $data['alert']['body'] }}
    </x-kit.alert>
</div>
