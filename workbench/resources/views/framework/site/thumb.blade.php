{{--
    One view, small: the page itself in a frame a quarter of its size, under a
    link to the tab that shows it whole. The frame loads only once it is near the
    window, so a sheet of forty pages asks for the first few.
--}}
<figure class="w-[320px] space-y-1.5">
    <a href="{{ $href }}" class="relative block h-[220px] w-[320px] overflow-hidden rounded-control border border-rule bg-canvas hover:border-accent" title="{{ $label }}">
        <iframe src="{{ $src }}" title="{{ $label }}" loading="lazy" tabindex="-1" aria-hidden="true" scrolling="no"
                class="pointer-events-none absolute start-0 top-0 h-[880px] w-[1280px] origin-top-left scale-[0.25] border-0"></iframe>
    </a>

    <figcaption class="flex flex-wrap items-baseline justify-between gap-x-2 text-xs">
        <span class="font-medium text-ink">{{ $label }}</span>

        @if (! empty($sub))
            <span class="font-mono text-ink-soft">{{ $sub }}</span>
        @endif
    </figcaption>
</figure>
