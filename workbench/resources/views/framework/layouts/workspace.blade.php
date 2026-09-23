@php
    /*
     * workspace — an icon rail, a column of the project's sections, and the one
     * that is open beside them. No page header at all: the list is the
     * navigation and the detail column is the whole of the rest.
     *
     * The rail carries the mark and nothing else. It used to carry a lettered
     * button per section, which is the list column's job spelled in initials.
     */
@endphp

<div class="flex min-h-[32rem] bg-canvas-alt">
    <div class="hidden w-14 shrink-0 flex-col items-center gap-3 border-r border-rule bg-canvas py-4 sm:flex">
        <x-kit.avatar :name="$site['brand']" size="sm" square />
    </div>

    <div class="hidden w-64 shrink-0 flex-col border-r border-rule bg-canvas sm:flex">
        <div class="border-b border-rule p-4">
            <x-kit.input name="workspace-search" placeholder="Chercher…" />
        </div>

        <div class="min-h-0 flex-1 overflow-y-auto p-3">
            <x-kit.vertical-nav :items="array_map(
                fn (string $slug, array $item): array => [
                    'label' => $item['label'],
                    'href' => $url($slug),
                    'current' => $slug === $key,
                ],
                array_keys($sections),
                $sections,
            )" />
        </div>
    </div>

    <div class="min-w-0 flex-1 space-y-6 p-6">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-rule pb-3">
            <h3 class="font-display text-xl font-bold text-ink">{{ $section['label'] }}</h3>
            <x-kit.badge tone="accent" dot>{{ $site['status'] }}</x-kit.badge>
        </div>

        @include($section['view'], ['data' => $section['data'], 'dense' => true])
    </div>
</div>
