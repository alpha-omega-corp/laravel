@props([
    'address' => null,
    'title' => null,
    'zoom' => null,
    'variant' => null,
])

@php
    /**
     * Where the business is: a Google Maps embed of an address, and a link that
     * opens the same search in Maps for directions. A prefab — nearly every
     * business somebody walks into needs one.
     *
     * **The embed needs no API key.** `maps.google.com/maps?q=…&output=embed` is
     * the search Google renders in a frame for anybody, which is all a site that
     * wants a pin needs; the Embed API's key is for modes this does not offer,
     * and a key written into markup is one every visitor can copy.
     *
     * **Explicit props win, then what the site binds as `kit.map`**, keyed by
     * these same names — the base package binds it to the site's identity —
     * taken as a set and only when the tag gives no `address`, so a tag's own
     * address is never captioned with the site's name. No address from either
     * renders nothing, never an embed of an empty search: that renders the
     * whole world and reads as a map that works.
     */
    if ($address === null) {
        $bound = app()->bound('kit.map') ? app('kit.map') : [];
        $address = $bound['address'] ?? '';
        $title ??= $bound['title'] ?? null;
        $zoom ??= $bound['zoom'] ?? null;
    }

    $address = trim((string) $address);
    $zoom = max(1, min(21, (int) ($zoom ?? 15)));
    $query = rawurlencode($address);

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['wide', 'plain'], true) ? $variant : null;

    $ref = '<x-kit.map />';
@endphp

@if ($address !== '')
    <figure data-ref="{{ $ref }}" data-kit="map" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['panel overflow-hidden']) }}>
        <iframe
            data-kit-part="map-frame"
            src="https://maps.google.com/maps?q={{ $query }}&amp;z={{ $zoom }}&amp;output=embed"
            title="{{ __('kit.map', ['address' => $address]) }}"
            class="block aspect-[4/3] max-h-[min(70svh,30rem)] w-full border-0 sm:aspect-[16/9]"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen
        ></iframe>

        <figcaption data-kit-part="map-caption" class="flex flex-wrap items-center justify-between gap-3 border-t border-rule px-4 py-3 text-sm">
            <span data-kit-part="map-address" class="text-ink">{{ $title ?: $address }}</span>

            <a href="https://www.google.com/maps/search/?api=1&amp;query={{ $query }}" data-kit-part="map-directions" target="_blank" rel="noopener"
               class="inline-flex items-center gap-1.5 font-medium text-accent hover:text-accent-strong"><x-kit.icon name="navigation" />{{ __('kit.directions') }}</a>
        </figcaption>
    </figure>
@endif
