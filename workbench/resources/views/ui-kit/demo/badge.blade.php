<div class="flex flex-wrap items-center gap-3">
    @foreach (['neutral', 'accent', 'highlight', 'outline'] as $tone)
        <x-kit.badge :tone="$tone">{{ ucfirst($tone) }}</x-kit.badge>
    @endforeach

    <x-kit.badge tone="outline" dot>{{ __('ui_kit.demo.live') }}</x-kit.badge>
    <x-kit.badge size="sm">{{ __('ui_kit.demo.small') }}</x-kit.badge>
</div>
