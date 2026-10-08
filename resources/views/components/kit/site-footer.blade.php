@props([
    'brand' => null,
    'blurb' => null,
    'address' => null,
    'phone' => null,
    'email' => null,
    'links' => [],
    'note' => null,
    'credit' => null,
    'variant' => null,
])

@php
    /**
     * The foot of a public site, as apdigital.ch closes its own: the name and a
     * line about it, then the site's pages and how to reach the place, each
     * under a small heading, and a bar under a rule: the small print, who made
     * the site and the admin's door.
     *
     * **Given no links, it lists the site's pages** — the `$siteNav` the
     * header draws from — so a visitor at the foot of a long page has the way
     * on without scrolling back up.
     *
     * `address` may run over several lines and is no more precise than the
     * brief: a street number nobody gave is a door somebody walks to. The
     * phone is dialled as its digits, the email as written.
     *
     * `credit` is who made the site, at the very bottom beside the admin's
     * door: their name, their site and their mark, unmodified (an image beside
     * the name, since a mark at footer size cannot be read on its own). A site
     * made from the worker template is given its maker's by default.
     *
     * **Its arrangement is the site's when the tag chooses one**: `centred`,
     * everything on one centred column, or `compact`, the name, the pages and
     * the contact each on a line — chosen on deployer's mockup and written by
     * the build as `variant`, the same on every page. With none, or a word it
     * does not take, the direction draws it its own way.
     *
     * @var array<int, array{label?: string, href?: string}> $links
     * @var ?array{name: string, href: string, logo?: string} $credit
     */
    $links = array_values(array_filter($links ?: ($siteNav ?? []), fn ($link) => filled($link['label'] ?? null)));

    /*
     * Every website has an admin section, and this is its door. The footer
     * draws it itself whenever the base's admin is installed, so no page is
     * built without one and no session has to remember it; the label is the
     * base's own word for it, in the site's language. `nofollow`, because it
     * is the owner's way in rather than a page for a visitor or a crawler.
     */
    $admin = \Illuminate\Support\Facades\Route::has('site.admin.dashboard') ? route('site.admin.dashboard') : null;

    $credited = filled($credit['name'] ?? null);

    $variant = in_array($variant, ['centred', 'compact'], true) ? $variant : null;

    $ref = '<x-kit.site-footer />';
@endphp

<div data-ref="{{ $ref }}" data-kit="site-footer" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['grid gap-10 md:grid-cols-[1.4fr_1fr_1fr]']) }}>
    <div data-kit-part="site-footer-about" class="space-y-3">
        @if (filled($brand))
            <p data-kit-part="site-footer-brand" class="font-display text-xl text-ink">{{ $brand }}</p>
        @endif

        @if (filled($blurb))
            <p data-kit-part="site-footer-blurb" class="max-w-sm text-sm text-ink-soft">{{ $blurb }}</p>
        @endif
    </div>

    @if (count($links))
        <div class="space-y-4">
            <p data-kit-part="site-footer-eyebrow" class="text-xs font-semibold uppercase tracking-[0.14em] text-accent-strong">{{ __('kit.footer.pages') }}</p>
            <ul data-kit-part="site-footer-links" role="list" class="space-y-2 text-sm">
                @foreach ($links as $link)
                    <li><a href="{{ $link['href'] ?? '#' }}" class="text-ink hover:text-accent-strong">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (filled($address) || filled($phone) || filled($email))
        <div class="space-y-4">
            <p data-kit-part="site-footer-eyebrow" class="text-xs font-semibold uppercase tracking-[0.14em] text-accent-strong">{{ __('kit.footer.contact') }}</p>
            <address data-kit-part="site-footer-contact" class="space-y-2 text-sm not-italic text-ink-soft">
                @if (filled($address))
                    <p class="flex gap-2"><x-kit.icon name="map-pin" class="mt-[0.2em] size-[1.1em] shrink-0" /><span class="whitespace-pre-line">{{ $address }}</span></p>
                @endif

                @if (filled($phone))
                    <a href="tel:{{ preg_replace('/[^+0-9]/', '', $phone) }}" class="flex items-center gap-2 text-ink hover:text-accent-strong"><x-kit.icon name="phone" />{{ $phone }}</a>
                @endif

                @if (filled($email))
                    <a href="mailto:{{ $email }}" class="flex items-center gap-2 text-ink hover:text-accent-strong"><x-kit.icon name="mail" />{{ $email }}</a>
                @endif
            </address>
        </div>
    @endif

    {{-- The bottom bar, under a rule: the small print, then who made the site — first when there is none — and the admin's door at the end of the line. --}}
    @if (filled($note) || $credited || $admin)
        <div data-kit-part="site-footer-end" class="flex flex-wrap items-center justify-end gap-x-6 gap-y-3 border-t border-rule pt-6 text-xs text-ink-soft md:col-span-3">
            @if (filled($note))
                <p data-kit-part="site-footer-note" class="me-auto">{{ $note }}</p>
            @endif

            @if ($credited)
                <a data-kit-part="site-footer-credit" href="{{ $credit['href'] ?? '#' }}" target="_blank" rel="noopener" @class(['inline-flex items-center gap-1.5 hover:text-ink', 'me-auto' => blank($note)])>
                    {{ __('kit.credit') }}
                    @if (filled($credit['logo'] ?? null))
                        <img src="{{ $credit['logo'] }}" alt="" width="16" height="16" class="size-4 rounded-[3px] ring-1 ring-rule">
                    @endif
                    <span class="font-medium text-ink">{{ $credit['name'] }}</span>
                </a>
            @endif

            @if ($admin)
                <p data-kit-part="site-footer-admin">
                    <a href="{{ $admin }}" rel="nofollow" class="btn btn-secondary btn-sm">{{ __('site::admin.title') }}</a>
                </p>
            @endif
        </div>
    @endif
</div>
