@props([
    'locales' => null,
    'current' => null,
    'action' => null,
])

@php
    /**
     * The site's languages, side by side as their codes — FR DE IT EN, the
     * current one in the ink — as apdigital.ch shows its own: every language
     * in sight, one tap away, rather than behind a menu. Each is named in its
     * own words for a screen reader and on hover — Français, Deutsch,
     * Italiano — since a visitor who cannot read the page cannot read the name
     * of their language in it either. A prefab: a Swiss business speaks two or
     * three of them, and every page offers the switch in the same place.
     *
     * One form of submit buttons, so it works with no script: each posts
     * `locale` to `action`, which the base answers by keeping the choice and
     * coming back to the same page.
     *
     * **Explicit props win, then what the site binds as
     * `kit.language-picker`**, keyed by these same names, taken as a set and
     * only when the tag gives no `locales`. With fewer than two languages, or
     * nowhere to post the choice, it renders nothing: a menu of one is a
     * control that does nothing.
     *
     * @var array<string, string> $locales each language's code => its name in itself
     */
    if ($locales === null) {
        $bound = app()->bound('kit.language-picker') ? app('kit.language-picker') : [];
        $locales = $bound['locales'] ?? [];
        $current ??= $bound['current'] ?? null;
        $action ??= $bound['action'] ?? null;
    }

    $current ??= app()->getLocale();

    $ref = '<x-kit.language-picker />';
@endphp

@if (count($locales) > 1 && filled($action))
    <form data-ref="{{ $ref }}" data-kit="language-picker" method="POST" action="{{ $action }}" role="group" aria-label="{{ __('kit.language') }}" {{ $attributes->class(['flex items-center']) }}>
        @csrf
        @foreach ($locales as $code => $name)
            <button data-kit-part="language-picker-option" type="submit" name="locale" value="{{ $code }}" lang="{{ $code }}" title="{{ $name }}" aria-label="{{ $name }} ({{ strtoupper($code) }})" @if ($code === $current) aria-current="true" @endif
                    class="min-h-10 rounded-control px-1.5 text-xs font-medium uppercase tracking-[0.08em] text-ink-soft hover:text-ink aria-[current=true]:font-semibold aria-[current=true]:text-ink">{{ $code }}</button>
        @endforeach
    </form>
@endif
