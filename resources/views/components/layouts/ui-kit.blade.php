@props([
    'title' => null,
    'description' => null,
])

@php
    use App\Enums\KitComponent;
@endphp

{{--
    The UI kit section: the application shell, with the kit's own side navigation
    beside the page. The rows come from App\Enums\KitComponent, so a component
    documented there appears here without this file being touched, and the nav
    works out for itself which row is the current one.
--}}
<x-layouts.shell :title="$title" :description="$description">
    <div class="lg:grid lg:grid-cols-[15rem_minmax(0,1fr)] lg:gap-10">
        <x-kit.side-nav :groups="KitComponent::navigation()"
                        class="mb-8 lg:sticky lg:top-20 lg:mb-0 lg:self-start" />

        <div class="min-w-0">
            {{ $slot }}
        </div>
    </div>
</x-layouts.shell>
