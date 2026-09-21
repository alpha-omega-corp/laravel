<div class="space-y-4">
    <div class="flex flex-wrap items-center gap-3">
        <x-kit.button>{{ __('ui_kit.demo.save') }}</x-kit.button>
        <x-kit.button variant="secondary">{{ __('ui_kit.demo.cancel') }}</x-kit.button>
        <x-kit.button variant="soft">{{ __('ui_kit.demo.duplicate') }}</x-kit.button>
        <x-kit.button variant="ghost">{{ __('ui_kit.demo.discard') }}</x-kit.button>
        <x-kit.button disabled>{{ __('ui_kit.demo.disabled') }}</x-kit.button>
    </div>

    <div class="flex flex-wrap items-center gap-3">
        @foreach (['xs', 'sm', 'md', 'lg', 'xl'] as $size)
            <x-kit.button :size="$size" variant="secondary">{{ $size }}</x-kit.button>
        @endforeach

        <x-kit.button icon round aria-label="{{ __('ui_kit.demo.add') }}">
            <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="size-4">
                <path d="M10 4.5v11M4.5 10h11" stroke-linecap="round" />
            </svg>
        </x-kit.button>
    </div>
</div>
