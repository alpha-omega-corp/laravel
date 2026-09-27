@props([
    'brand' => null,
    'blurb' => null,
    'address' => null,
    'phone' => null,
    'email' => null,
    'links' => [],
    'note' => null,
])

@php
    /**
     * The foot of a public site: the name and a line about it, how to reach
     * the place, the links, and the small print under a rule.
     *
     * `address` may run over several lines and is no more precise than the
     * brief: a street number nobody gave is a door somebody walks to. The
     * phone is dialled as its digits, the email as written.
     *
     * @var array<int, array{label?: string, href?: string}> $links
     */
    $links = array_values(array_filter($links, fn ($link) => filled($link['label'] ?? null)));

    /*
     * Every website has an admin section, and this is its door. The footer
     * draws it itself whenever the base's admin is installed, so no page is
     * built without one and no session has to remember it; the label is the
     * base's own word for it, in the site's language. `nofollow`, because it
     * is the owner's way in rather than a page for a visitor or a crawler.
     */
    $admin = \Illuminate\Support\Facades\Route::has('site.admin.dashboard') ? route('site.admin.dashboard') : null;

    $ref = '<x-kit.site-footer />';
@endphp

<div data-ref="{{ $ref }}" data-kit="site-footer" {{ $attributes->class(['grid gap-10 md:grid-cols-[1.4fr_1fr_1fr]']) }}>
    <div data-kit-part="site-footer-about" class="space-y-3">
        @if (filled($brand))
            <p data-kit-part="site-footer-brand" class="font-display text-xl text-ink">{{ $brand }}</p>
        @endif

        @if (filled($blurb))
            <p data-kit-part="site-footer-blurb" class="max-w-sm text-sm text-ink-soft">{{ $blurb }}</p>
        @endif
    </div>

    @if (filled($address) || filled($phone) || filled($email))
        <address data-kit-part="site-footer-contact" class="space-y-1 text-sm not-italic text-ink-soft">
            @if (filled($address))
                <p class="whitespace-pre-line">{{ $address }}</p>
            @endif

            @if (filled($phone))
                <a href="tel:{{ preg_replace('/[^+0-9]/', '', $phone) }}" class="block hover:text-ink">{{ $phone }}</a>
            @endif

            @if (filled($email))
                <a href="mailto:{{ $email }}" class="block hover:text-ink">{{ $email }}</a>
            @endif
        </address>
    @endif

    @if (count($links))
        <ul data-kit-part="site-footer-links" role="list" class="space-y-2 text-sm">
            @foreach ($links as $link)
                <li><a href="{{ $link['href'] ?? '#' }}" class="text-ink-soft hover:text-ink">{{ $link['label'] }}</a></li>
            @endforeach
        </ul>
    @endif

    @if (filled($note))
        <p data-kit-part="site-footer-note" class="border-t border-rule pt-6 text-xs text-ink-soft md:col-span-3">{{ $note }}</p>
    @endif

    @if ($admin)
        <p data-kit-part="site-footer-admin" class="flex justify-end md:col-span-3">
            <a href="{{ $admin }}" rel="nofollow" class="btn btn-secondary btn-sm">{{ __('site::admin.title') }}</a>
        </p>
    @endif
</div>
