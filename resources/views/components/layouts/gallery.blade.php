@props([
    'title' => null,
    'description' => null,
    'groups' => [],
])

@php
    /*
     * A gallery page, in one of two views.
     *
     * Desktop is the page itself. Mobile is the same page loaded into a frame
     * 390 pixels wide, because the components answer Tailwind's breakpoints and
     * those read the viewport — narrowing a column would squeeze the desktop
     * layout rather than show the mobile one. A frame has a viewport of its own,
     * so `sm:` and `lg:` resolve there the way they would on a phone.
     *
     * The frame is this same route with ?frame=1, rendered bare. It is the same
     * origin, so the script in the head reads back the same remembered palette
     * and appearance as the page around it.
     */
    $frame = request()->boolean('frame');
    $view = request()->query('view') === 'mobile' ? 'mobile' : 'desktop';

    /*
     * Built from the current URL rather than from the path, because a gallery
     * may hold state of its own in the query — the framework tab keeps its
     * project, palette and screen there — and switching to the phone must not
     * drop it.
     */
    $desktop = request()->fullUrlWithoutQuery(['view']);
    $mobile = request()->fullUrlWithQuery(['view' => 'mobile']);
    $source = $desktop.(str_contains($desktop, '?') ? '&' : '?').'frame=1';

    $icons = [
        'desktop' => 'M4 5.5h12a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1Zm3 11h6',
        'mobile' => 'M6.5 2.5h7a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1Zm2.5 12h2',
    ];
@endphp

@if ($frame)
    <x-layouts.shell bare :title="$title">
        {{ $slot }}
    </x-layouts.shell>
@else
    <x-layouts.shell :title="$title" :description="$description">
        <div class="space-y-6">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <p class="text-sm text-ink-soft">{{ __('ui_kit.view.label') }}</p>

                <x-kit.button-group :buttons="[
                    ['label' => __('ui_kit.view.desktop'), 'href' => $desktop, 'current' => $view === 'desktop', 'icon' => $icons['desktop']],
                    ['label' => __('ui_kit.view.mobile'), 'href' => $mobile, 'current' => $view === 'mobile', 'icon' => $icons['mobile']],
                ]" />
            </div>

            @if ($view === 'mobile')
                {{-- The phone scrolls itself, so the index down the left has nothing to point at. --}}
                <div class="flex justify-center">
                    <iframe src="{{ $source }}"
                            title="{{ __('ui_kit.view.mobile') }}"
                            loading="lazy"
                            class="h-[844px] w-[390px] rounded-panel border border-rule bg-canvas"></iframe>
                </div>
            @else
                <div class="lg:grid lg:grid-cols-[15rem_minmax(0,1fr)] lg:gap-10">
                    <x-kit.side-nav :groups="$groups"
                                    class="mb-8 lg:sticky lg:top-8 lg:mb-0 lg:max-h-[calc(100vh-4rem)] lg:self-start" />

                    <div class="min-w-0">
                        {{ $slot }}
                    </div>
                </div>
            @endif
        </div>
    </x-layouts.shell>
@endif
