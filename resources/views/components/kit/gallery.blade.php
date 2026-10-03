@props([
    'title' => null,
    'pictures' => null,
    'variant' => null,
])

@php
    /**
     * Pictures in the order the business puts them: a salon's portfolio, a
     * restaurant's room, a florist's weddings, a carpenter's work. A prefab —
     * most places that are shown before they are visited need one.
     *
     * Each picture keeps its own `width` and `height` on the `<img>`, so the page
     * holds its box before the file arrives, and a caption only when there is
     * one: a grid of the same photo three times over a caption saying "photo"
     * is noise.
     *
     * **Explicit props win, then what the site binds as `kit.gallery`**, keyed
     * by these same names — the base package binds it to the pictures the owner
     * chooses in the admin — taken as a set and only when the tag gives no
     * `pictures`, so a tag with its own pictures never prints the owner's
     * heading over them. With no pictures from either it renders nothing.
     *
     * @var array<int, array{image: string, alt?: string, caption?: string, width?: int, height?: int}> $pictures
     */
    if ($pictures === null) {
        $bound = app()->bound('kit.gallery') ? app('kit.gallery') : [];
        $pictures = $bound['pictures'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['mosaic', 'strip'], true) ? $variant : null;

    $ref = '<x-kit.gallery />';
@endphp

@if (filled($pictures))
    <section data-ref="{{ $ref }}" data-kit="gallery" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes }}>
        @if ($title)
            <h2 data-kit-part="gallery-title" class="font-display text-lg text-ink">{{ $title }}</h2>
        @endif

        <ul role="list" data-kit-part="gallery-grid" @class(['grid gap-4 grid-cols-[repeat(auto-fill,minmax(min(100%,14rem),1fr))]', 'mt-4' => $title])>
            @foreach ($pictures as $picture)
                <li data-kit-part="gallery-item">
                    <figure>
                        <img data-kit-part="gallery-image" src="{{ $picture['image'] }}" alt="{{ $picture['alt'] ?? '' }}"
                             @if (! empty($picture['width']) && ! empty($picture['height'])) width="{{ $picture['width'] }}" height="{{ $picture['height'] }}" @endif
                             loading="lazy" decoding="async" class="aspect-[4/3] h-auto w-full rounded-control bg-canvas-alt object-cover">

                        @if (! empty($picture['caption']))
                            <figcaption data-kit-part="gallery-caption" class="mt-2 text-sm text-ink-soft">{{ $picture['caption'] }}</figcaption>
                        @endif
                    </figure>
                </li>
            @endforeach
        </ul>
    </section>
@endif
