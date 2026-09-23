@php
    /**
     * Work to look at. The pictures are the content here, not decoration, so
     * this is the one section where the plain degree changes what is said: with
     * no images it falls back to the captions, which is a list of what was done
     * and by whom — still useful, and honest about what is missing.
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

    @if ($variation->showsMedia())
        <ul role="list" class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($data['items'] as $item)
                <li class="space-y-2">
                    <x-kit.placeholder class="aspect-square w-full rounded-panel" />

                    <div>
                        <p class="text-sm font-semibold text-ink">{{ $item['title'] }}</p>
                        <p class="text-xs text-ink-soft">{{ $item['subtitle'] }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <x-kit.stacked-list :items="array_map(
            fn (array $item): array => ['title' => $item['title'], 'subtitle' => $item['subtitle']],
            $data['items'],
        )" />
    @endif

    <div class="grid items-start gap-6 lg:grid-cols-2">
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
