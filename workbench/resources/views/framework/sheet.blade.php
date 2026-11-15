@php
    use Workbench\App\Framework\Kit;
    use Workbench\App\Framework\Site;

    /*
     * The contact sheet of the business views. With no business it is the
     * index: every kind of business the skill describes, its first design's
     * home page and how many views it has. With one, it is that business laid
     * out whole: every page of every design, then its home page once in each
     * palette its directions recommend — what a roll may draw before a design
     * settles it. Every thumbnail is the page itself, small, and leads to the
     * tab that shows it with its axes.
     */
    $businesses = Site::businesses();
    $business = $businesses[request()->string('business')->toString()] ?? null;

    $site = fn (array $query): string => route('framework.site', array_diff_key($query, ['label' => 1, 'verdict' => 1]));
    $tab = fn (array $query): string => route('framework.businesses', array_diff_key($query, ['label' => 1, 'verdict' => 1]));

    $designs = $business ? Site::designs($business['name']) : [];
    $content = $business ? (array) Site::content($business['name']) : [];
    $rolls = $business ? Site::rolls($business['name']) : [];
    // A page with no place in the navigation is named by what it is for: home, or the words of its own opening.
    $pageLabel = fn (array $page): string => $content['pages'][$page['path']]['label']
        ?? $page['label']
        ?? ($page['path'] === '/' ? __('framework.businesses.home') : ($content['pages'][$page['path']]['hero']['eyebrow'] ?? ucfirst($page['role'])));

    $total = fn (string $name): int => Site::views($name) + array_sum(array_map('count', Site::rolls($name)));
@endphp

<x-layouts.shell :title="__('framework.businesses.sheet')" :description="__('framework.businesses.sheet_intro')">
    <div class="space-y-8">
        <p class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
            <a href="{{ route('framework') }}" class="text-ink-soft hover:text-ink">{{ __('framework.projects') }}</a>
            <a href="{{ route('framework.businesses', $business ? ['business' => $business['name']] : []) }}" class="text-ink-soft hover:text-ink">{{ __('framework.businesses.title') }}</a>

            <a href="{{ route('framework.record') }}" class="text-ink-soft hover:text-ink">{{ __('framework.record.title') }}</a>

            @if ($business)
                <a href="{{ route('framework.sheet') }}" class="text-ink-soft hover:text-ink">{{ __('framework.businesses.sheet') }}</a>
                <span aria-current="page" class="font-semibold text-ink">{{ ucfirst($business['name']) }}</span>
                <span class="text-ink-soft">{{ $total($business['name']) }} {{ __('framework.businesses.views') }}</span>
            @else
                <span aria-current="page" class="font-semibold text-ink">{{ __('framework.businesses.sheet') }}</span>
                <span class="text-ink-soft">{{ count($businesses) }} {{ __('framework.businesses.kinds') }} · {{ array_sum(array_map($total, array_keys($businesses))) }} {{ __('framework.businesses.views') }}</span>
            @endif
        </p>

        @if (! $business)
            <ul role="list" data-ref="framework.sheet.index" class="flex flex-wrap justify-center gap-x-6 gap-y-8">
                @foreach ($businesses as $other)
                    @php
                        $first = Site::designs($other['name'])[0] ?? null;
                    @endphp

                    <li class="space-y-2">
                        @include('framework.site.thumb', [
                            'src' => $site(['business' => $other['name']]),
                            'href' => route('framework.sheet', ['business' => $other['name']]),
                            'label' => ucfirst($other['name']),
                            'sub' => $total($other['name']).' '.__('framework.businesses.views'),
                        ])

                        <p class="w-[320px] text-xs text-ink-soft">{{ implode(' · ', array_keys($other['directions'])) }}@if ($first) — {{ count(Site::designs($other['name'])) }} {{ __('framework.businesses.designs') }}@endif</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="max-w-prose text-sm text-ink-soft">{{ $business['summary'] }}</p>

            @if (Kit::designsSummary($business['name']) !== '')
                <p class="max-w-prose text-sm text-ink">{{ Kit::designsSummary($business['name']) }}</p>
            @endif

            <section class="space-y-6" data-ref="framework.sheet.designs">
                <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.businesses.by_design') }}</h2>

                @foreach ($designs as $design)
                    <div class="space-y-3">
                        <div class="space-y-1">
                            <h3 class="flex flex-wrap items-center gap-2 text-sm font-semibold text-ink">
                                {{ $design['name'] }}
                                <x-kit.badge size="sm" tone="accent">{{ $design['direction'] }}</x-kit.badge>
                                <x-kit.badge size="sm">{{ $design['palette'] }}</x-kit.badge>
                            </h3>

                            @if ($design['why'] !== '')
                                <p class="max-w-prose text-sm text-ink-soft">{{ $design['why'] }}</p>
                            @endif
                        </div>

                        <div class="flex flex-wrap justify-center gap-5">
                            @foreach ($business['pages'] as $page)
                                @php
                                    $query = array_filter(['business' => $business['name'], 'design' => $design['slug'], 'page' => $page['path'] === '/' ? null : $page['path']]);
                                @endphp

                                @include('framework.site.thumb', [
                                    'src' => $site($query),
                                    'href' => $tab($query),
                                    'label' => $pageLabel($page),
                                    'sub' => $design['pages'][$page['path']] ?? '',
                                ])
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </section>

            <section class="space-y-6" data-ref="framework.sheet.rolls">
                <div class="space-y-1">
                    <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.businesses.by_palette') }}</h2>
                    <p class="max-w-prose text-sm text-ink-soft">{{ __('framework.businesses.by_palette_intro') }}</p>
                </div>

                @foreach ($rolls as $direction => $views)
                    <div class="space-y-3">
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-ink">{{ ucfirst($direction) }}</h3>
                            <p class="max-w-prose text-sm text-ink-soft">{{ $business['directions'][$direction] }}</p>
                        </div>

                        <div class="flex flex-wrap justify-center gap-5">
                            @foreach ($views as $view)
                                @include('framework.site.thumb', [
                                    'src' => $site($view),
                                    'href' => $tab($view),
                                    'label' => ucfirst($view['label']),
                                    'sub' => $view['verdict'],
                                ])
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </section>
        @endif
    </div>
</x-layouts.shell>
