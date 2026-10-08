@props([
    'current' => null,
])

@php
    /**
     * Light, dark or as the device has it, as a menu beside the language one
     * and drawn like it: the current choice's icon on the button, the three
     * choices in the list. A prefab: every page offers it in the same place,
     * and the site-header draws it by itself.
     *
     * A native `<details>`, so it opens with no script; a choice is the site's
     * script's to apply (`[data-theme-choice]`): it sets `data-theme` on
     * `<html>` at once, keeps it in a plain `theme` cookie for the next pages,
     * and moves `data-current` here, which is what shows the icon. "Automatic"
     * forgets it, and the operating system's scheme decides.
     *
     * **The prop on the tag wins, then what the site binds as
     * `kit.theme-picker`** — `['current' => 'light'|'dark'|'auto']`, which the
     * base reads off that cookie. With neither it renders nothing: a site that
     * binds none has no script to apply a choice either.
     *
     * @var string|null $current light, dark or auto
     */
    $current ??= app()->bound('kit.theme-picker') ? (app('kit.theme-picker')['current'] ?? 'auto') : null;

    // Each: its icon, and the class that shows that icon on the button while it is the choice (written out for Tailwind).
    $choices = [
        'light' => ['sun', 'group-data-[current=light]:block'],
        'dark' => ['moon', 'group-data-[current=dark]:block'],
        'auto' => ['monitor', 'group-data-[current=auto]:block'],
    ];

    // A value it does not know is the device's scheme, as the base reads an unknown cookie.
    if ($current !== null && ! isset($choices[$current])) {
        $current = 'auto';
    }

    $ref = '<x-kit.theme-picker />';
@endphp

@if ($current !== null)
    <details data-ref="{{ $ref }}" data-kit="theme-picker" data-current="{{ $current }}" {{ $attributes->class(['group relative']) }}>
        <summary data-kit-part="theme-picker-current" aria-label="{{ __('kit.theme.label') }}: {{ __('kit.theme.'.$current) }}"
                 class="flex min-h-10 cursor-pointer list-none items-center gap-1.5 rounded-control px-2 text-sm font-medium text-ink hover:bg-canvas-alt [&::-webkit-details-marker]:hidden">
            @foreach ($choices as [$icon, $shown])
                <x-kit.icon :name="$icon" class="hidden size-4 {{ $shown }}" />
            @endforeach
            <x-kit.icon name="chevron-down" class="size-3.5 text-ink-soft" />
        </summary>

        <div data-kit-part="theme-picker-list" role="group" aria-label="{{ __('kit.theme.label') }}" class="panel panel-raised absolute end-0 z-30 mt-2 min-w-44 p-1">
            @foreach ($choices as $key => [$icon])
                <button data-kit-part="theme-picker-option" type="button" data-theme-choice="{{ $key }}" data-label="{{ __('kit.theme.'.$key) }}" @if ($key === $current) aria-current="true" @endif
                        class="flex w-full items-center gap-3 rounded-control px-3 py-2 text-start text-sm text-ink hover:bg-canvas-alt aria-[current=true]:font-semibold">
                    <x-kit.icon :name="$icon" class="size-4 text-ink-soft" />
                    {{ __('kit.theme.'.$key) }}
                </button>
            @endforeach
        </div>
    </details>
@endif
