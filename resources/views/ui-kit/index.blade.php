@php
    use App\Enums\KitComponent;
@endphp

{{--
    The UI kit: one section per element, in the order App\Enums\KitComponent
    declares them, each demonstrated by its own partial under ui-kit/demo. An
    element added to that enum needs a partial and nothing else — the heading,
    the anchor and the row in the side navigation all come from the case.
--}}
<x-layouts.gallery :title="__('ui_kit.index.title')"
                   :description="__('ui_kit.index.intro')"
                   :groups="KitComponent::navigation()">
    <div class="space-y-12">
        <p class="max-w-prose text-ink-soft">{{ __('ui_kit.index.intro') }}</p>

        @foreach (KitComponent::groups() as $group)
            <div class="space-y-8">
                <h2 class="font-display text-xl text-ink">{{ __('ui_kit.group.'.str_replace('-', '_', $group)) }}</h2>

                @foreach (KitComponent::inGroup($group) as $element)
                    <section id="{{ $element->value }}" class="panel space-y-5 p-6">
                        <header class="space-y-1">
                            <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-1">
                                <h3 class="text-lg font-semibold text-ink">{{ $element->label() }}</h3>
                                <code class="rounded-control bg-canvas-alt px-2 py-1 font-mono text-xs text-ink-soft">&lt;x-{{ $element->tag() }} /&gt;</code>
                            </div>

                            <p class="max-w-prose text-sm text-ink-soft">{{ $element->summary() }}</p>
                        </header>

                        @include('ui-kit.demo.'.$element->value)
                    </section>
                @endforeach
            </div>
        @endforeach
    </div>
</x-layouts.gallery>
