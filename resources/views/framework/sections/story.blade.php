@php
    /**
     * What the place is: a banner, three things it does, and what it has on
     * this week beside the one thing the page is for.
     *
     * `$dense` is the layout speaking — a hero on a console screen is a hero in
     * the wrong building, so it gets the counters instead. `$variation` is the
     * viewer speaking, and it decides how much of the banner there is.
     *
     * @var array<string, mixed> $data
     * @var array<string, mixed> $site
     * @var bool $dense
     * @var \App\Enums\Variation $variation
     * @var \Closure(string): string $url
     */
    $cta = $site['cta'];
@endphp

<div class="{{ $variation->rhythm() }}">
    @unless ($dense)
        <section class="space-y-6 text-center">
            @if ($variation->showsFlourish())
                <x-kit.badge tone="highlight">{{ $data['badge'] }}</x-kit.badge>
            @endif

            <h3 class="font-display {{ $variation->display() }} text-ink">{{ $data['title'] }}</h3>

            <p class="mx-auto max-w-prose text-lg text-ink-soft">{{ $data['body'] }}</p>

            <div class="flex flex-wrap justify-center gap-3">
                <x-kit.button size="lg" :href="$url($cta['primary']['to'])">{{ $cta['primary']['label'] }}</x-kit.button>
                <x-kit.button size="lg" variant="secondary" :href="$url($cta['secondary']['to'])">{{ $cta['secondary']['label'] }}</x-kit.button>
            </div>

            @if ($variation->showsMedia())
                <x-kit.placeholder class="h-56 w-full sm:h-72" />
            @endif
        </section>
    @else
        <div class="grid gap-4 sm:grid-cols-3">
            @foreach ($data['stats'] as $stat)
                <x-kit.stat :label="$stat['label']" :value="$stat['value']"
                            :change="$stat['change'] ?? null" :direction="$stat['direction'] ?? null" />
            @endforeach
        </div>
    @endunless

    <section class="grid gap-6 sm:grid-cols-3">
        @foreach ($data['cards'] as $card)
            <div class="panel space-y-2 p-6">
                @if ($variation->showsMedia(false))
                    <x-kit.placeholder class="h-24 w-full" />
                @endif

                <h4 class="font-display text-lg font-bold text-ink">{{ $card['title'] }}</h4>
                <p class="text-sm text-ink-soft">{{ $card['body'] }}</p>
            </div>
        @endforeach
    </section>

    <section class="grid items-start gap-8 lg:grid-cols-2">
        <div class="space-y-4">
            <x-kit.section-heading :title="$data['listTitle']" :description="$data['listBody']">
                <x-slot:actions>
                    <x-kit.button size="sm" variant="secondary" :href="$url($cta['secondary']['to'])">{{ $cta['secondary']['label'] }}</x-kit.button>
                </x-slot:actions>
            </x-kit.section-heading>

            <x-kit.stacked-list :items="$data['list']" />
        </div>

        <div class="space-y-4">
            <x-kit.description-list striped :title="$data['asideTitle']" :description="$data['asideBody']" :items="$data['aside']" />

            <x-kit.action-panel :title="$data['panelTitle']">
                {{ $data['panelBody'] }}

                <x-slot:action>
                    <x-kit.button variant="secondary" :href="$url($cta['primary']['to'])">{{ $cta['primary']['label'] }}</x-kit.button>
                </x-slot:action>
            </x-kit.action-panel>
        </div>
    </section>
</div>
