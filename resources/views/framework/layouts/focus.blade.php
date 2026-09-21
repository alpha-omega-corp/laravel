@php
    /*
     * focus — one narrow column and a progress bar, nothing else. The project's
     * sections read as steps, which is what a booking flow would make of them,
     * and the only way out of a step is the pills at the foot.
     */
    $step = array_search($key, array_keys($sections), true) + 1;
    $total = count($sections);
@endphp

<div class="bg-canvas-alt px-4 py-10 sm:px-6">
    <div class="mx-auto w-full max-w-xl space-y-6">
        <x-kit.progress :value="(int) round($step / $total * 100)" :steps="$total"
                        :label="'Étape '.$step.' sur '.$total.' · '.$section['label']" />

        @include($section['view'], ['data' => $section['data'], 'dense' => false])

        <x-kit.tabs variant="pill" class="justify-center" :items="array_map(
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
