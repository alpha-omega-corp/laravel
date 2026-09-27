@props([
    'src' => null,
    'subject' => null,
    'ratio' => '4/3',
    'priority' => false,
])

@php
    /**
     * The one element in the kit that holds a photograph, and the frame it
     * leaves when there is none yet.
     *
     * **A new site has no photographs, and this never invents one.** With no
     * `src` it draws the frame at its ratio — a glyph, an edge — and, given a
     * `subject`, a caption naming what goes there ("La salle, le soir"), so the
     * owner reads which photograph is owed rather than a stock picture of
     * somebody else's room. Once there is a `src`, the subject is its alt text.
     *
     * `ratio` is "a/b", one or two digits each; anything else is 4/3, since a
     * frame that collapses to nothing hides the one thing it is for. `priority`
     * marks the page's first photograph, which is fetched at once rather than
     * lazily.
     */
    $ratio = preg_match('/^\s*(\d{1,2})\s*\/\s*(\d{1,2})\s*$/', (string) $ratio, $parts) && (int) $parts[2] > 0
        ? $parts[1].' / '.$parts[2]
        : '4 / 3';

    $ref = '<x-kit.media />';
@endphp

<figure data-ref="{{ $ref }}" data-kit="media" {{ $attributes->class(['relative overflow-hidden rounded-panel bg-canvas-alt aspect-(--media-ratio)'])->merge(['style' => '--media-ratio: '.$ratio]) }}>
    @if (filled($src))
        <img data-kit-part="media-image" src="{{ $src }}" alt="{{ $subject ?? '' }}" @if ($priority) fetchpriority="high" @else loading="lazy" @endif class="absolute inset-0 size-full object-cover">
    @else
        <div data-kit-part="media-frame" aria-hidden="true" class="absolute inset-0 grid place-items-center rounded-[inherit] border border-rule text-ink-soft">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Z" />
            </svg>
        </div>

        @if (filled($subject))
            <figcaption data-kit-part="media-caption" class="absolute inset-x-0 bottom-0 p-3 text-sm text-ink-soft">{{ $subject }}</figcaption>
        @endif
    @endif
</figure>
