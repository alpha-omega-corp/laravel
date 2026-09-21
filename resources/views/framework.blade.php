@php
    use App\Enums\KitLayout;
    use App\Enums\Project;
    use App\Enums\Theme;
    use App\Enums\Variation;

    /*
     * One card holding one demonstration framework, with every control for it
     * in one navigation directly above — a row per axis, so the pointer never
     * leaves that block between two choices and never crosses the page to
     * reach the next one.
     *
     * Nine independent projects — five small businesses and four back offices.
     * No two are built the same way: a project declares its own sections, so
     * switching project changes what the site is made of and not only its
     * words. The restaurant has a menu and opening hours, the farm has a shop,
     * events and market days, the salon has a catalogue of what it has cut.
     *
     * The point of the tab is that a different kind of work wants a different
     * design: a counter is a console, a brochure page is not. So the layout is
     * not a fixed default but the one the project chose for that section, the
     * palette follows the layout, and the degree follows it too — plain in a
     * back office, rich on a public page.
     *
     * All three remain the viewer's to override, and an override is what puts
     * `layout`, `theme` or `variation` in the query string. Absent means
     * fitting, which is why every row opens with a chip that removes it again.
     *
     * The axes live in the query string, so the server renders exactly one
     * combination and a chosen one is a URL that can be linked, bookmarked and
     * stepped back through. There is no phone preview here, which is why this
     * page does not use the gallery layout: the framework already renders whole
     * layouts, and previewing a layout at phone width is the Layouts tab.
     */
    $project = Project::tryFrom(request()->string('project')->toString()) ?? Project::default();
    $sections = $project->sections();
    $key = $project->key(request()->string('screen')->toString());
    $section = $sections[$key];

    $chosenLayout = KitLayout::tryFrom(request()->string('layout')->toString());
    $chosenTheme = Theme::tryFrom(request()->string('theme')->toString());
    $chosenVariation = Variation::tryFrom(request()->string('variation')->toString());

    $fittingLayout = $section['layout'];
    $layout = $chosenLayout ?? $fittingLayout;

    $fittingTheme = $layout->palette();
    $theme = $chosenTheme ?? $fittingTheme;

    $fittingVariation = $layout->variation();
    $variation = $chosenVariation ?? $fittingVariation;

    $site = $project->site();

    /**
     * Every link keeps the axes it is not changing, and leaves out the ones the
     * viewer has not chosen — a null is the absence of an override, not a value.
     * Switching project keeps the section only when the project it lands on has
     * one by that name, because the sets differ.
     */
    $to = fn (Project $other, string $slug, ?Theme $palette, ?KitLayout $chrome, ?Variation $degree): string => route('framework', array_filter([
        'project' => $other->value,
        'theme' => $palette?->value,
        'layout' => $chrome?->value,
        'variation' => $degree?->value,
        'screen' => $other->key($slug),
    ], fn (?string $value): bool => $value !== null));

    /** What the framework itself is given: a section key in, a URL out. */
    $url = fn (string $slug): string => $to($project, $slug, $chosenTheme, $chosenLayout, $chosenVariation);

    /** A row's first chip: the axis handed back to the section that knows best. */
    $fitting = fn (string $label, string $href, bool $current): array => [
        'label' => __('framework.fitting'),
        'badge' => $label,
        'href' => $href,
        'current' => $current,
    ];

    /*
     * The one navigation: four rows, one axis each, in the order a viewer
     * decides them — which business, how it is arranged, how it is coloured,
     * how much of it is shown.
     */
    $rows = [
        [
            'heading' => __('framework.projects'),
            'items' => array_map(fn (Project $other): array => [
                'label' => $other->label(),
                'href' => $to($other, $key, $chosenTheme, $chosenLayout, $chosenVariation),
                'current' => $other === $project,
            ], Project::cases()),
        ],
        [
            'heading' => __('framework.layouts'),
            'items' => array_merge(
                [$fitting($fittingLayout->label(), $to($project, $key, $chosenTheme, null, $chosenVariation), $chosenLayout === null)],
                array_map(fn (KitLayout $chrome): array => [
                    'label' => $chrome->label(),
                    'href' => $to($project, $key, $chosenTheme, $chrome, $chosenVariation),
                    'current' => $chrome === $chosenLayout,
                ], KitLayout::cases()),
            ),
        ],
        [
            'heading' => __('framework.palettes'),
            'items' => array_merge(
                [$fitting($fittingTheme->label(), $to($project, $key, null, $chosenLayout, $chosenVariation), $chosenTheme === null)],
                array_map(fn (Theme $palette): array => [
                    'label' => $palette->label(),
                    'href' => $to($project, $key, $palette, $chosenLayout, $chosenVariation),
                    'current' => $palette === $chosenTheme,
                ], Theme::cases()),
            ),
        ],
        [
            'heading' => __('framework.variations'),
            'items' => array_merge(
                [$fitting($fittingVariation->label(), $to($project, $key, $chosenTheme, $chosenLayout, null), $chosenVariation === null)],
                array_map(fn (Variation $degree): array => [
                    'label' => $degree->label(),
                    'href' => $to($project, $key, $chosenTheme, $chosenLayout, $degree),
                    'current' => $degree === $chosenVariation,
                ], Variation::cases()),
            ),
        ],
    ];

    $framework = [
        'project' => $project,
        'sections' => $sections,
        'key' => $key,
        'section' => $section,
        'site' => $site,
        'variation' => $variation,
        'url' => $url,
    ];
@endphp

<x-layouts.shell :title="__('framework.title')" :description="__('framework.intro')">
    <div class="space-y-4">
        {{--
            Sticky from `lg` up, because the card below can be dragged taller
            than the window and the controls should stay where the pointer left
            them. Not below it: the four rows wrap to a dozen lines on a phone,
            and a sticky box taller than the viewport pins nothing and hides
            everything.
        --}}
        <div class="panel z-10 divide-y divide-rule lg:sticky lg:top-4">
            @foreach ($rows as $row)
                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 px-3 py-2">
                    <span class="w-28 shrink-0 text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ $row['heading'] }}</span>
                    <x-kit.tabs variant="pill" class="min-w-0 flex-1" :items="$row['items']" :aria-label="$row['heading']" />
                </div>
            @endforeach
        </div>

        <div class="panel overflow-hidden">
            <header class="space-y-1 border-b border-rule px-4 py-3 sm:px-6">
                <div class="flex flex-wrap items-center gap-2">
                    <h2 class="font-display text-lg font-bold text-ink">{{ $project->label() }}</h2>
                    <x-kit.badge :tone="$chosenLayout === null ? 'accent' : 'outline'">{{ $layout->label() }}</x-kit.badge>
                    <x-kit.badge :tone="$chosenTheme === null ? 'accent' : 'outline'">{{ $theme->label() }}</x-kit.badge>
                    <x-kit.badge :tone="$chosenVariation === null ? 'accent' : 'outline'">{{ $variation->label() }}</x-kit.badge>
                    <span class="font-mono text-xs text-ink-soft">{{ $key }}</span>
                </div>

                <p class="max-w-prose text-sm text-ink-soft">{{ $project->summary() }}</p>
            </header>

            {{--
                The framework itself, in its own palette. No border and no corner of
                its own: the card is the frame. It is sized to what the viewport has
                left under the navigation above it, scrolls itself and can be dragged
                taller, because scrolling the page to read a screen would take the
                controls off the top.
            --}}
            <div data-palette="{{ $theme->value }}"
                 data-ref="framework.layouts.{{ $layout->value }}"
                 data-variation="{{ $variation->value }}"
                 class="h-[calc(100dvh-36rem)] min-h-[24rem] resize-y overflow-y-auto overscroll-contain bg-canvas font-body text-ink">
                @include('framework.layouts.'.$layout->value, $framework)
            </div>
        </div>

    </div>
</x-layouts.shell>
