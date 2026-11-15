@php
    use Workbench\App\Framework\Kit;
    use Workbench\App\Framework\Site;

    /*
     * The framework tab's business views: one page of one kind of business,
     * with every axis that decides it in one navigation above it.
     *
     * Where the projects next door are nine sites written by hand, these are
     * read: a business is a file of the skill (`businesses/<name>.md`), its
     * looks are the directions that file lists, its pages and their prefabs
     * are its `## Pages`, and a design (`designs/<name>.md`) is one settled
     * roll — a direction, a palette, a layout for each page and the
     * arrangements — with the sentence that says why. So what is drawn here is
     * what deployer's build would be handed for that brief, and the panel under
     * the page says which file each part of it came from.
     *
     * A design settles every axis and the viewer may override any one of them;
     * an override the skill would refuse falls back to the design's. Only what
     * was overridden is in the URL, so a design's address is short and a
     * departure from it is visible.
     */
    $choice = Site::choose(request()->query());

    abort_if($choice === null, 404);

    $business = $choice['business'];
    $design = $choice['design'];
    $page = $choice['page'];
    $content = $choice['content'];

    $to = fn (array $changes): string => route('framework.businesses', Site::query($choice, $changes));
    $frame = route('framework.site', Site::query($choice) + ['embed' => 1]);
    $alone = route('framework.site', Site::query($choice));
    $sheet = route('framework.sheet', ['business' => $business['name']]);

    $plan = Site::plan($choice, fn (string $path): string => $to(['page' => $path]));
    $layout = Kit::layouts()[$choice['layout']];
    $direction = Kit::directions()[$choice['direction']];
    $palette = Kit::palettes()[$choice['palette']] ?? null;
    $components = Kit::components();

    $placed = array_values(array_unique(array_merge(...array_values(array_map(
        fn (array $region): array => array_column($region, 'component'),
        $plan,
    )) ?: [[]])));

    // A page with no place in the navigation is named by what it is for: home, or the words of its own opening.
    $pageLabel = fn (array $page): string => $content['pages'][$page['path']]['label']
        ?? $page['label']
        ?? ($page['path'] === '/' ? __('framework.businesses.home') : ($content['pages'][$page['path']]['hero']['eyebrow'] ?? ucfirst($page['role'])));

    $rows = [
        [
            'heading' => __('framework.businesses.business'),
            'items' => array_map(fn (array $other): array => [
                'label' => ucfirst($other['name']),
                'href' => $to(['business' => $other['name']]),
                'current' => $other['name'] === $business['name'],
            ], array_values(Site::businesses())),
        ],
        [
            'heading' => __('framework.businesses.design'),
            'items' => array_map(fn (array $other): array => [
                'label' => $other['name'],
                'badge' => $other['direction'],
                'href' => $to(['design' => $other['slug']]),
                'current' => $other['slug'] === $design['slug'],
            ], $choice['designs']),
        ],
        [
            'heading' => __('framework.businesses.page'),
            'items' => array_map(fn (array $other): array => [
                'label' => $pageLabel($other),
                'badge' => $other['role'],
                'href' => $to(['page' => $other['path']]),
                'current' => $other['path'] === $page['path'],
            ], $business['pages']),
        ],
        [
            'heading' => __('framework.businesses.direction'),
            'items' => array_map(fn (string $name): array => [
                'label' => ucfirst($name),
                'href' => $to(['direction' => $name === $design['direction'] ? null : $name]),
                'current' => $name === $choice['direction'],
            ], array_keys($business['directions'])),
        ],
        [
            'heading' => __('framework.businesses.layout'),
            'items' => array_map(fn (string $name): array => [
                'label' => ucfirst($name),
                'href' => $to(['layout' => $name === ($design['pages'][$page['path']] ?? null) && ! $choice['chosen']['direction'] ? null : $name]),
                'current' => $name === $choice['layout'],
            ], Kit::layoutsFor($page, $choice['direction']) ?: $page['layouts']),
        ],
        [
            'heading' => __('framework.businesses.palette'),
            'items' => array_map(fn (string $name, string $verdict): array => [
                'label' => ucfirst($name),
                'badge' => $verdict,
                'href' => $to(['palette' => $name === $design['palette'] && ! $choice['chosen']['direction'] ? null : $name]),
                'current' => $name === $choice['palette'],
            ], array_keys(Kit::palettesFor($choice['direction'])), Kit::palettesFor($choice['direction'])),
        ],
        [
            'heading' => __('framework.businesses.scheme'),
            'items' => array_map(fn (?string $scheme): array => [
                'label' => __('framework.businesses.'.($scheme ?? 'system')),
                'href' => $to(['scheme' => $scheme === $design['scheme'] ? null : ($scheme ?? 'system')]),
                'current' => $scheme === $choice['scheme'],
            ], $direction['scheme'] === 'any' ? [null, 'light', 'dark'] : [$choice['scheme']]),
        ],
    ];

    /*
     * The arrangements: every component on this page that takes some, each a
     * row of its own. A design chooses a few; the rest are drawn as the
     * direction draws them, which is the first chip of every row.
     */
    $arrange = function (string $component, ?string $variant) use ($choice, $design, $to): string {
        $variants = $choice['variants'];

        if ($variant === null) {
            unset($variants[$component]);
        } else {
            $variants[$component] = $variant;
        }

        return $to(['v' => array_merge(
            array_fill_keys(array_keys(array_diff_key($design['variants'], $variants)), '-'),
            array_diff_assoc($variants, $design['variants']),
        ) ?: null]);
    };

    $arrangements = array_values(array_filter(array_map(fn (string $name): ?array => empty($components[$name]['variants']) ? null : [
        'heading' => $name,
        'items' => array_merge(
            [[
                'label' => __('framework.businesses.own'),
                'href' => $arrange($name, null),
                'current' => ! isset($choice['variants'][$name]),
            ]],
            array_map(fn (string $variant): array => [
                'label' => $variant,
                'href' => $arrange($name, $variant),
                'current' => ($choice['variants'][$name] ?? null) === $variant,
            ], array_keys($components[$name]['variants'])),
        ),
    ], $placed)));

    $files = array_values(array_filter([
        $business['file'],
        Kit::designs($business['name']) !== [] ? "designs/{$business['name']}.md" : null,
        $direction['file'],
        $palette['file'] ?? null,
        $layout['file'],
        ...array_map(fn (string $name): ?string => $components[$name]['file'] ?? null, $placed),
    ]));
@endphp

<x-layouts.shell :title="__('framework.businesses.title')" :description="__('framework.businesses.intro')">
    <div class="space-y-4">
        <p class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
            <a href="{{ route('framework') }}" class="text-ink-soft hover:text-ink">{{ __('framework.projects') }}</a>
            <span aria-current="page" class="font-semibold text-ink">{{ __('framework.businesses.title') }}</span>
            <a href="{{ $sheet }}" class="text-accent hover:text-accent-strong">{{ __('framework.businesses.sheet') }}</a>
            <a href="{{ route('framework.record') }}" class="text-accent hover:text-accent-strong">{{ __('framework.record.title') }}</a>
            <span class="text-ink-soft">{{ count($choice['designs']) }} {{ __('framework.businesses.designs') }} · {{ count($business['pages']) }} {{ __('framework.businesses.pages') }} · {{ Site::views($business['name']) }} {{ __('framework.businesses.views') }}</span>
        </p>

        <div class="panel divide-y divide-rule">
            @foreach ($rows as $row)
                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 px-3 py-2">
                    <span class="w-28 shrink-0 text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ $row['heading'] }}</span>
                    <x-kit.tabs variant="pill" class="min-w-0 flex-1" :items="$row['items']" :aria-label="$row['heading']" />
                </div>
            @endforeach
        </div>

        @if ($arrangements !== [])
            <details class="panel" data-ref="framework.arrangements" @if ($choice['chosen']['variants']) open @endif>
                <summary class="cursor-pointer px-3 py-2 text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.arrangements') }} · {{ count($arrangements) }}</summary>

                <div class="divide-y divide-rule border-t border-rule">
                    @foreach ($arrangements as $row)
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-2 px-3 py-2">
                            <span class="w-28 shrink-0 font-mono text-xs text-ink">{{ $row['heading'] }}</span>
                            <x-kit.tabs variant="pill" class="min-w-0 flex-1" :items="$row['items']" :aria-label="$row['heading']" />
                        </div>
                    @endforeach
                </div>
            </details>
        @endif

        <div class="panel overflow-hidden">
            <header class="space-y-2 border-b border-rule px-4 py-3 sm:px-6">
                <div class="flex flex-wrap items-center gap-2">
                    <h2 class="font-display text-lg font-bold text-ink">{{ ucfirst($business['name']) }} · {{ $design['name'] }}</h2>
                    <x-kit.badge :tone="$choice['chosen']['direction'] ? 'outline' : 'accent'">{{ $choice['direction'] }}</x-kit.badge>
                    <x-kit.badge :tone="$choice['chosen']['palette'] ? 'outline' : 'accent'">{{ $choice['palette'] }}</x-kit.badge>
                    <x-kit.badge :tone="$choice['chosen']['layout'] ? 'outline' : 'accent'">{{ $choice['layout'] }}</x-kit.badge>
                    <span class="font-mono text-xs text-ink-soft">{{ $page['path'] }}</span>
                    <span class="ms-auto flex flex-wrap gap-x-4 text-sm">
                        @if (isset((\Workbench\App\Framework\Record::run(null)['writers']['businesses'] ?? [])[$business['name']]))
                            <a href="{{ route('framework.record', ['open' => $business['name']]) }}#writer-{{ $business['name'] }}" class="text-accent hover:text-accent-strong">{{ __('framework.record.writer') }}</a>
                        @endif

                        <a href="{{ $alone }}" class="text-accent hover:text-accent-strong">{{ __('framework.businesses.open') }}</a>
                    </span>
                </div>

                <p class="max-w-prose text-sm text-ink-soft">{{ $business['summary'] }}</p>

                @if ($design['why'] !== '')
                    <p class="max-w-prose text-sm text-ink"><span class="font-semibold">{{ __('framework.businesses.why') }}</span> {{ $design['why'] }}</p>
                @endif
            </header>

            {{--
                The page itself, a document of its own in a frame: a direction
                finds its frames from <body> and <main>, so it is drawn whole or
                not at all. Sized to what the viewport has left, and draggable
                taller, like the projects' card.
            --}}
            <iframe src="{{ $frame }}" title="{{ ucfirst($business['name']) }} · {{ $design['name'] }} · {{ $page['path'] }}"
                    data-ref="framework.site"
                    class="block h-[calc(100dvh-30rem)] min-h-[32rem] w-full resize-y bg-canvas"></iframe>
        </div>

        <div class="panel divide-y divide-rule" data-ref="framework.pulls">
            <header class="px-4 py-3 sm:px-6">
                <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.businesses.pulls') }}</h2>
                <p class="mt-1 font-mono text-xs text-ink-soft">&lt;html data-palette="{{ $choice['palette'] }}" data-direction="{{ $choice['direction'] }}"&gt; · {{ $choice['layout'] }}</p>
            </header>

            <div class="grid gap-x-10 gap-y-6 px-4 py-4 sm:px-6 lg:grid-cols-2">
                <div class="space-y-3">
                    <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.regions') }}</h3>

                    <dl class="divide-y divide-rule text-sm">
                        @foreach ($plan as $region => $holds)
                            <div class="grid grid-cols-[6rem_minmax(0,1fr)] gap-x-4 py-2">
                                <dt class="font-mono text-xs text-ink">{{ $region }}</dt>
                                <dd class="space-y-1">
                                    <p class="flex flex-wrap gap-1.5">
                                        @forelse ($holds as $one)
                                            <x-kit.badge size="sm" :tone="$one['prefab'] ? 'accent' : 'neutral'">{{ $one['component'] }}@if ($one['variant']) · {{ $one['variant'] }}@endif</x-kit.badge>
                                        @empty
                                            <span class="text-ink-soft">{{ __('framework.businesses.empty') }}</span>
                                        @endforelse
                                    </p>
                                    <p class="text-xs text-ink-soft">{{ $layout['regions'][$region] ?? '' }}</p>
                                </dd>
                            </div>
                        @endforeach
                    </dl>
                </div>

                <div class="space-y-5">
                    <div class="space-y-2">
                        <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.direction') }} · {{ $choice['direction'] }}</h3>
                        <p class="text-sm text-ink-soft">{{ $direction['summary'] }}</p>
                    </div>

                    @if ($palette)
                        <div class="space-y-2">
                            <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.palette') }} · {{ $choice['palette'] }}</h3>
                            <p class="text-sm text-ink-soft">{{ $palette['summary'] }}</p>
                        </div>
                    @endif

                    @if ($choice['variants'] !== [])
                        <div class="space-y-2">
                            <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.arrangements') }}</h3>
                            <ul role="list" class="space-y-1 text-sm text-ink-soft">
                                @foreach ($choice['variants'] as $component => $variant)
                                    <li><span class="font-mono text-xs text-ink">{{ $component }} — {{ $variant }}</span> {{ $components[$component]['variants'][$variant] ?? '' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($palette && $palette['costs'] !== '')
                        <div class="space-y-2">
                            <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.costs') }}</h3>
                            <p class="text-sm text-ink-soft">{{ $palette['costs'] }}</p>
                        </div>
                    @endif

                    <div class="space-y-2">
                        <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.files') }}</h3>
                        <ul role="list" class="flex flex-wrap gap-1.5">
                            @foreach ($files as $file)
                                <li class="rounded-control bg-canvas-alt px-2 py-0.5 font-mono text-xs text-ink">{{ $file }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{--
            The reasons, in the skill's own words and for this page only: why the business has each prefab drawn
            here and why it takes this direction, how the direction draws each component on the page, and what
            each component does once it is placed. Nothing is written for the showcase: every line is read from
            the file named beside it, which is where a session building a site would read it.
        --}}
        <div class="panel divide-y divide-rule" data-ref="framework.reasons">
            <header class="px-4 py-3 sm:px-6">
                <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.businesses.reasons') }}</h2>
            </header>

            <div class="grid gap-x-10 gap-y-6 px-4 py-4 sm:px-6 lg:grid-cols-2">
                <div class="space-y-5">
                    <div class="space-y-2">
                        <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.why_direction') }} <span class="font-mono normal-case">{{ $business['file'] }}</span></h3>
                        <p class="text-sm text-ink"><span class="font-mono text-xs">{{ $choice['direction'] }}</span> — {{ $business['directions'][$choice['direction']] }}</p>
                    </div>

                    @if ($page['prefabs'] !== [])
                        <div class="space-y-2">
                            <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.why_prefabs') }} <span class="font-mono normal-case">{{ $business['file'] }}</span></h3>

                            <ul role="list" class="space-y-1 text-sm text-ink">
                                @foreach ($page['prefabs'] as $name)
                                    <li><span class="font-mono text-xs">{{ $name }}</span> — {{ $business['prefabs'][$name] ?? '' }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-2">
                        <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.how_drawn') }} <span class="font-mono normal-case">{{ $direction['file'] }}</span></h3>

                        @if ($direction['frames'] !== '')
                            <p class="text-sm text-ink-soft">{{ $direction['frames'] }}</p>
                        @endif

                        <ul role="list" class="space-y-1 text-sm text-ink">
                            @foreach ($placed as $name)
                                @if (isset($direction['looks'][$name]))
                                    <li><span class="font-mono text-xs">{{ $name }}</span> — {{ $direction['looks'][$name] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="space-y-2">
                    <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.businesses.behaviour') }}</h3>

                    <div class="divide-y divide-rule border-y border-rule">
                        @foreach ($placed as $name)
                            @if (! empty($components[$name]['behaviour']))
                                <details>
                                    <summary class="flex cursor-pointer flex-wrap items-baseline gap-x-3 py-2 text-sm">
                                        <span class="font-mono text-xs text-ink">{{ $name }}</span>
                                        <span class="min-w-0 flex-1 basis-48 text-ink-soft">{{ $components[$name]['summary'] }}</span>
                                    </summary>

                                    <ul role="list" class="list-disc space-y-1.5 pb-3 ps-5 text-sm text-ink">
                                        @foreach ($components[$name]['behaviour'] as $line)
                                            <li>{{ $line }}</li>
                                        @endforeach
                                    </ul>
                                </details>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.shell>
