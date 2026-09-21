@php
    /**
     * The people: a grid of names with what each one does, the facts about the
     * place beside them, and the one caveat worth reading before booking.
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

    <x-kit.grid-list :items="$data['people']" :columns="2" />

    <div class="grid items-start gap-6 lg:grid-cols-2">
        <x-kit.description-list striped :title="$data['factsTitle']" :items="$data['facts']" />

        <div class="space-y-4">
            <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
                {{ $data['alert']['body'] }}
            </x-kit.alert>

            <x-kit.action-panel inline :title="$site['cta']['primary']['label']">
                {{ $site['phone'] }} · {{ $site['email'] }}

                <x-slot:action>
                    <x-kit.button variant="secondary" :href="$url($site['cta']['primary']['to'])">{{ $site['cta']['primary']['label'] }}</x-kit.button>
                </x-slot:action>
            </x-kit.action-panel>
        </div>
    </div>
</div>
