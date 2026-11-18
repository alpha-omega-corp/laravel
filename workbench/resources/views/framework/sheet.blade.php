@php
    use Workbench\App\Framework\Kit;
    use Workbench\App\Framework\Site;
    use Workbench\App\Framework\Views;

    /*
     * The contact sheet of the business views, in one place: every kind of
     * business the skill describes is a choice in the column at the side, and
     * the main column lays the chosen one out whole — every page of every
     * design, then its home page once in each palette its directions recommend,
     * what a roll may draw before a design settles it. There is no index to
     * leave and come back to: a choice in the column swaps the sheet in place
     * (framework.js), and with no business in the address the first is shown.
     *
     * Every thumbnail is the page itself, small, and leads to the tab that
     * shows it with its axes.
     */
    $businesses = Site::businesses();
    $business = $businesses[Site::asked(request())['business'] ?? ''] ?? null;

    abort_if($business === null && filled(Site::asked(request())['business'] ?? null), 404);

    $business ??= reset($businesses);

    $site = fn (array $query): string => Site::url('framework.site', array_diff_key($query, ['label' => 1, 'verdict' => 1]));
    $tab = fn (array $query): string => Site::url('framework.businesses', array_diff_key($query, ['label' => 1, 'verdict' => 1]));

    $designs = Site::designs($business['name']);
    $content = (array) Site::content($business['name']);
    $rolls = Site::rolls($business['name']);
    // A page with no place in the navigation is named by what it is for: home, or the words of its own opening.
    $pageLabel = fn (array $page): string => $content['pages'][$page['path']]['label']
        ?? $page['label']
        ?? ($page['path'] === '/' ? __('framework.businesses.home') : ($content['pages'][$page['path']]['hero']['eyebrow'] ?? ucfirst($page['role'])));

    $total = fn (string $name): int => Site::views($name) + array_sum(array_map('count', Site::rolls($name)));
    $totals = array_map(fn (array $other): int => $total($other['name']), $businesses);

    // The business row, open: the forty-odd businesses are what this tab is chosen by, so they are not folded away.
    $rows = [Views::row('sheet', $business['name']), [
        'heading' => __('framework.businesses.business'),
        'open' => true,
        'items' => array_map(fn (array $other): array => [
            'label' => ucfirst($other['name']),
            'badge' => (string) $totals[$other['name']],
            'href' => route('framework.sheet', ['business' => $other['name']]),
            'current' => $other['name'] === $business['name'],
        ], array_values($businesses)),
    ]];
@endphp

<x-layouts.shell :title="__('framework.title')" :description="__('framework.businesses.sheet_intro')" wide>
    {{-- framework.js swaps the sheet in place when a business is chosen in the side column. --}}
    <div class="space-y-4" data-framework-root>
        <div class="grid items-start gap-4 lg:grid-cols-[18rem_minmax(0,1fr)]">
            @include('framework.controls', ['rows' => $rows, 'label' => __('framework.businesses.sheet')])

            <div class="min-w-0 space-y-8" data-framework-main data-framework-part="sheet" data-framework-top>
                <header class="panel space-y-1 px-4 py-3 sm:px-6">
                    <h2 class="font-display text-lg font-bold text-ink">{{ ucfirst($business['name']) }} · {{ $totals[$business['name']] }} {{ __('framework.businesses.views') }}</h2>
                    <p class="text-xs text-ink-soft">{{ implode(' · ', array_keys($business['directions'])) }} — {{ count($designs) }} {{ __('framework.businesses.designs') }} · {{ count($businesses) }} {{ __('framework.businesses.kinds') }}, {{ array_sum($totals) }} {{ __('framework.businesses.views') }} {{ __('framework.businesses.in_all') }}</p>
                    <p class="max-w-prose text-sm text-ink-soft">{{ $business['summary'] }}</p>

                    @if (Kit::designsSummary($business['name']) !== '')
                        <p class="max-w-prose text-sm text-ink">{{ Kit::designsSummary($business['name']) }}</p>
                    @endif
                </header>

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

                            <div class="flex flex-wrap gap-5">
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

                            <div class="flex flex-wrap gap-5">
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
            </div>
        </div>
    </div>
</x-layouts.shell>
