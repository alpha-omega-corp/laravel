@php
    /**
     * The screen the people who work here have open all day: the counters, the
     * one table they act on, and what is wrong right now. There is no banner
     * and no call to action, because nobody arrives here to be convinced.
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

    <div class="grid gap-4 sm:grid-cols-3">
        @foreach ($data['stats'] as $stat)
            <x-kit.stat :label="$stat['label']" :value="$stat['value']"
                        :change="$stat['change'] ?? null" :direction="$stat['direction'] ?? null" />
        @endforeach
    </div>

    <x-kit.table :title="$data['tableTitle']" :description="$data['tableBody']"
                 :columns="$data['columns']" :rows="$data['rows']">
        <x-slot:actions>
            <x-kit.button size="sm" variant="secondary">Exporter</x-kit.button>
        </x-slot:actions>
    </x-kit.table>

    <div class="grid items-start gap-6 lg:grid-cols-2">
        <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
            {{ $data['alert']['body'] }}
        </x-kit.alert>

        <x-kit.action-panel inline :title="$data['panelTitle']">
            {{ $data['panelBody'] }}

            <x-slot:action>
                <x-kit.button variant="secondary" :href="$url($site['cta']['primary']['to'])">{{ $site['cta']['primary']['label'] }}</x-kit.button>
            </x-slot:action>
        </x-kit.action-panel>
    </div>
</div>
