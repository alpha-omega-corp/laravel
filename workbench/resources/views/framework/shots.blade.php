@php
    use Illuminate\Support\Str;
    use Workbench\App\Framework\Shots;
    use Workbench\App\Framework\Views;

    /*
     * Claude's shots: the pictures deployer keeps of this project, one of the
     * framework tab's views. Each is the image as it was filed, its note, when
     * it was taken and the page it shows, newest first.
     *
     * A note that opens with a word and a middle dot ("Designs · bakery · …")
     * is filed under that word, and the side column narrows the shots to one
     * such set; a note without one is filed under the rest. The page a shot
     * shows is linked on this host when it is one of the tab's own, since the
     * server that answered when it was taken may not answer now.
     */
    $shots = Shots::all();
    $set = fn (array $shot): string => Str::contains($shot['note'], ' · ') ? Str::before($shot['note'], ' · ') : __('framework.shots.title');
    $sets = array_count_values(array_map($set, $shots));
    $asked = request()->string('set')->toString();
    $current = isset($sets[$asked]) ? $asked : null;
    $shown = array_values(array_filter($shots, fn (array $shot): bool => $current === null || $set($shot) === $current));

    $page = function (string $url): ?string {
        $path = (string) parse_url($url, PHP_URL_PATH);
        $query = (string) parse_url($url, PHP_URL_QUERY);

        if ($path === '') {
            return null;
        }

        return str_starts_with($path, '/framework') ? url($path).($query === '' ? '' : '?'.$query) : $url;
    };

    $rows = [Views::row('shots')];

    if (count($sets) > 1) {
        $rows[] = [
            'heading' => __('framework.shots.count'),
            'items' => array_merge(
                [['label' => __('framework.businesses.all'), 'badge' => (string) count($shots), 'href' => route('framework.shots'), 'current' => $current === null]],
                array_map(fn (string $name, int $count): array => [
                    'label' => $name,
                    'badge' => (string) $count,
                    'href' => route('framework.shots', ['set' => $name]),
                    'current' => $name === $current,
                ], array_keys($sets), array_values($sets)),
            ),
        ];
    }
@endphp

<x-layouts.shell :title="__('framework.title')" :description="__('framework.shots.intro')" wide>
    {{-- One of the framework tab's views: framework.js swaps it in from the side column, as it does the others. --}}
    <div class="space-y-4" data-framework-root>
        <div class="grid items-start gap-4 lg:grid-cols-[18rem_minmax(0,1fr)]">
            @include('framework.controls', ['rows' => $rows, 'label' => __('framework.shots.title')])

            <div class="min-w-0 space-y-6" data-framework-main data-framework-part="shots" data-framework-top data-ref="framework.shots">
                <header class="panel space-y-1 px-4 py-3 sm:px-6">
                    <h2 class="font-display text-lg font-bold text-ink">{{ $current ?? __('framework.shots.title') }} · {{ count($shown) }} {{ __('framework.shots.count') }}</h2>
                    <p class="max-w-prose text-sm text-ink-soft">{{ __('framework.shots.intro') }}</p>
                </header>

                @if ($shown === [])
                    <p class="panel px-4 py-6 text-sm text-ink-soft sm:px-6">{{ __('framework.shots.empty') }}</p>
                @else
                    <ul role="list" class="grid gap-5 grid-cols-[repeat(auto-fill,minmax(20rem,1fr))]">
                        @foreach ($shown as $shot)
                            @php
                                $src = route('framework.shots.picture', ['file' => $shot['file']]);
                                $href = $page($shot['url']);
                            @endphp

                            <li class="panel overflow-hidden" data-ref="framework.shots.shot">
                                <a href="{{ $src }}" target="_blank" rel="noopener" class="block border-b border-rule bg-canvas-alt">
                                    <img src="{{ $src }}" alt="{{ $shot['note'] }}" loading="lazy" decoding="async"
                                         width="{{ $shot['width'] }}" height="{{ $shot['height'] }}"
                                         class="aspect-[16/10] w-full object-cover object-top" />
                                </a>

                                <div class="space-y-1.5 px-4 py-3">
                                    <p class="text-sm text-ink">{{ $current === null ? $shot['note'] : Str::after($shot['note'], ' · ') }}</p>

                                    <p class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-ink-soft">
                                        @if ($shot['at'] !== '')
                                            <time datetime="{{ $shot['at'] }}" class="font-mono">{{ \Illuminate\Support\Carbon::parse($shot['at'])->timezone(config('app.timezone'))->format('Y-m-d H:i') }}</time>
                                        @endif

                                        @if ($shot['kind'] === 'example')
                                            <x-kit.badge size="sm">{{ __('framework.shots.example') }}</x-kit.badge>
                                        @endif

                                        @if ($href !== null)
                                            <a href="{{ $href }}" class="text-accent hover:text-accent-strong">{{ __('framework.shots.open') }}</a>
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-layouts.shell>
