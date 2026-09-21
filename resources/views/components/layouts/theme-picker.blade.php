@props(['palette' => null, 'appearance' => null, 'contrast' => null])

@php
    use App\Enums\Appearance;
    use App\Enums\Contrast;
    use App\Enums\Theme;

    $palette ??= Theme::default();
    $appearance ??= Appearance::default();
    $contrast ??= Contrast::default();

    /** The tag this component is written as, for dev mode's badge. */
    $ref = '<x-layouts.theme-picker />';

    /** The sun, the moon and the screen: three shapes that read without a legend. */
    $icons = [
        'light' => 'M12 3v1.5m0 15V21m9-9h-1.5m-15 0H3m15.364-6.364-1.06 1.06M6.697 17.303l-1.061 1.061m12.728 0-1.06-1.06M6.697 6.697 5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z',
        'dark' => 'M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z',
        'normal' => 'M12 3.75a8.25 8.25 0 1 0 0 16.5 8.25 8.25 0 0 0 0-16.5Z',
        'high' => 'M12 3.75a8.25 8.25 0 1 0 0 16.5 8.25 8.25 0 0 0 0-16.5Zm0 0v16.5a8.25 8.25 0 0 0 0-16.5Z',
        'system' => 'M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25',
    ];

    $row = 'flex w-full items-center gap-3 rounded-panel px-2 py-2 text-left hover:bg-canvas-alt focus:bg-canvas-alt focus:outline-hidden';
@endphp

{{--
    The picker: two independent axes in one panel.

    It is an <el-popover> and not an <el-menu> because a menu closes on the first
    click: here one often sets both axes in a row, and watching the page change
    under a panel that stayed open is precisely the feedback that is wanted. The
    button carries popovertarget rather than command/commandfor, because that is
    what <el-popover> looks for — and it is also what makes the panel open without
    JavaScript at all, popovertarget being native.

    A palette row previews the palette it names by carrying its own data-palette
    attribute, so the swatch is the real tokens rather than three hex values
    copied out of themes.css and left to drift. It does not carry a data-theme:
    color-scheme inherits, so each swatch is drawn in the scheme the page is in,
    which is what the viewer would actually get by choosing it.

    The appearance rows need no swatch — the whole page is their preview.
--}}
<div class="relative" data-ref="{{ $ref }}">
    <button type="button" popovertarget="appearance-menu" class="btn btn-secondary btn-md" aria-label="{{ __('theme.choose') }}">
        <span class="flex items-center gap-1" aria-hidden="true">
            <span class="size-3 rounded-full bg-accent"></span>
            <span class="size-3 rounded-full bg-highlight"></span>
        </span>
        <span class="sr-only md:not-sr-only" data-theme-label="palette">{{ $palette->label() }}</span>
        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
            <path d="m6 8 4 4 4-4" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <el-popover id="appearance-menu" anchor="bottom end" popover aria-label="{{ __('theme.choose') }}"
                class="panel panel-raised w-80 origin-top-right p-1.5 backdrop:bg-transparent transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
        <div role="radiogroup" aria-label="{{ __('theme.palette') }}" class="space-y-0.5">
            <p class="px-2 pt-1 pb-2 text-xs font-semibold tracking-wider text-ink-soft uppercase">{{ __('theme.palette') }}</p>

            @foreach (Theme::cases() as $theme)
                <button type="button"
                        role="radio"
                        aria-checked="{{ $theme === $palette ? 'true' : 'false' }}"
                        data-theme-axis="palette"
                        data-theme-option="{{ $theme->value }}"
                        class="{{ $row }}">
                    <span data-palette="{{ $theme->value }}"
                          class="flex shrink-0 items-center gap-1 rounded-panel border border-rule bg-canvas p-1.5"
                          aria-hidden="true">
                        <span class="size-3 rounded-full bg-accent"></span>
                        <span class="size-3 rounded-full bg-highlight"></span>
                        <span class="size-3 rounded-full bg-ink"></span>
                    </span>

                    <span class="min-w-0 flex-1">
                        <span class="block text-sm font-semibold text-ink" data-theme-name>{{ $theme->label() }}</span>
                        <span class="block truncate text-xs text-ink-soft">{{ $theme->summary() }}</span>
                    </span>

                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.25" aria-hidden="true"
                         class="size-4 shrink-0 text-accent opacity-0 in-aria-checked:opacity-100">
                        <path d="m4 10.5 4 4 8-9" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @endforeach
        </div>

        <div role="radiogroup" aria-label="{{ __('theme.appearance') }}" class="mt-2 space-y-0.5 border-t border-rule pt-2">
            <p class="px-2 pt-1 pb-2 text-xs font-semibold tracking-wider text-ink-soft uppercase">{{ __('theme.appearance') }}</p>

            @foreach (Appearance::cases() as $option)
                <button type="button"
                        role="radio"
                        aria-checked="{{ $option === $appearance ? 'true' : 'false' }}"
                        data-theme-axis="theme"
                        data-theme-option="{{ $option->value }}"
                        class="{{ $row }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"
                         class="size-5 shrink-0 text-ink-soft">
                        <path d="{{ $icons[$option->value] }}" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="min-w-0 flex-1">
                        <span class="block text-sm font-semibold text-ink" data-theme-name>{{ $option->label() }}</span>
                        <span class="block truncate text-xs text-ink-soft">{{ $option->summary() }}</span>
                    </span>

                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.25" aria-hidden="true"
                         class="size-4 shrink-0 text-accent opacity-0 in-aria-checked:opacity-100">
                        <path d="m4 10.5 4 4 8-9" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @endforeach
        </div>

        <div role="radiogroup" aria-label="{{ __('theme.contrast') }}" class="mt-2 space-y-0.5 border-t border-rule pt-2">
            <p class="px-2 pt-1 pb-2 text-xs font-semibold tracking-wider text-ink-soft uppercase">{{ __('theme.contrast') }}</p>

            @foreach (Contrast::cases() as $option)
                <button type="button"
                        role="radio"
                        aria-checked="{{ $option === $contrast ? 'true' : 'false' }}"
                        data-theme-axis="contrast"
                        data-theme-option="{{ $option->value }}"
                        class="{{ $row }}">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"
                         class="size-5 shrink-0 text-ink-soft">
                        <path d="{{ $icons[$option->value] }}" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="min-w-0 flex-1">
                        <span class="block text-sm font-semibold text-ink" data-theme-name>{{ $option->label() }}</span>
                        <span class="block truncate text-xs text-ink-soft">{{ $option->summary() }}</span>
                    </span>

                    <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.25" aria-hidden="true"
                         class="size-4 shrink-0 text-accent opacity-0 in-aria-checked:opacity-100">
                        <path d="m4 10.5 4 4 8-9" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            @endforeach
        </div>
    </el-popover>
</div>
