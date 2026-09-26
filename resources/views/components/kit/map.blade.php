@props([
    'address' => '',
    'title' => null,
    'zoom' => 15,
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
     * No address is a dashed box saying so, never an embed of an empty search:
     * that renders the whole world and reads as a map that works.
     */
    $address = trim((string) $address);
    $zoom = max(1, min(21, (int) $zoom));
    $query = rawurlencode($address);

    $ref = '<x-kit.map />';
@endphp

<figure data-ref="{{ $ref }}" {{ $attributes->class(['panel overflow-hidden']) }}>
    @if ($address !== '')
        <iframe
            src="https://maps.google.com/maps?q={{ $query }}&amp;z={{ $zoom }}&amp;output=embed"
            title="{{ __('kit.map', ['address' => $address]) }}"
            class="block aspect-[4/3] w-full border-0 sm:aspect-[16/9]"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen
        ></iframe>

        <figcaption class="flex flex-wrap items-center justify-between gap-3 border-t border-rule px-4 py-3 text-sm">
            <span class="text-ink">{{ $title ?: $address }}</span>

            <a href="https://www.google.com/maps/search/?api=1&amp;query={{ $query }}" target="_blank" rel="noopener"
               class="font-medium text-accent hover:text-accent-strong">{{ __('kit.directions') }}</a>
        </figcaption>
    @else
        <div class="flex aspect-[16/9] items-center justify-center border-2 border-dashed border-rule p-6 text-center text-sm text-ink-soft">
            {{ __('kit.no_address') }}
        </div>
    @endif
</figure>
