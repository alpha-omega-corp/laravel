@php
    /**
     * The bar the public layouts carry. Its links are the framework's own URLs,
     * so clicking inside the mock site moves the tab above it.
     *
     * @var array<string, array<string, mixed>> $sections
     * @var string $key
     * @var array<string, mixed> $site
     * @var \Closure(string): string $url
     */
@endphp

<x-kit.navbar :brand="$site['brand']" :items="array_map(
    fn (string $slug, array $section): array => [
        'label' => $section['label'],
        'href' => $url($slug),
        'current' => $slug === $key,
    ],
    array_keys($sections),
    $sections,
)">
    <x-slot:actions>
        <x-kit.button size="sm" :href="$url($site['cta']['primary']['to'])">{{ $site['cta']['primary']['label'] }}</x-kit.button>
    </x-slot:actions>
</x-kit.navbar>
