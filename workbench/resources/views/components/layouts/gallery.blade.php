@props([
    'title' => null,
    'description' => null,
    'groups' => [],
])

{{--
    A gallery page: an index down the left, the page beside it.

    There was a desktop/mobile switch here that loaded the same route into a
    390px iframe, because the components answer Tailwind's breakpoints and a
    narrowed column would squeeze the desktop layout rather than show the
    mobile one. It is gone: the pages are responsive in the browser's own
    window, which is where anyone judging them will look.
--}}
<x-layouts.shell :title="$title" :description="$description">
    <div class="lg:grid lg:grid-cols-[15rem_minmax(0,1fr)] lg:gap-10">
        <x-kit.side-nav :groups="$groups"
                        class="mb-8 lg:sticky lg:top-20 lg:mb-0 lg:max-h-[calc(100vh-6rem)] lg:self-start" />

        <div class="min-w-0">
            {{ $slot }}
        </div>
    </div>
</x-layouts.shell>
