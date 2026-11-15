@props([
    'title' => null,
    'credentials' => null,
    'variant' => null,
])

@php
    /**
     * What vouches for the business: the certifications it holds, the bodies
     * it belongs to, the clients it has worked for — each a name, what it is,
     * and its mark when there is one. A prefab: a builder's ISO and SIA, a
     * lawyer's bar, a guide's UIAGM badge and an agency's client logos all
     * answer the same doubt, and a visitor only glances at them.
     *
     * **Only what can be checked.** Each credential has its `name` as its
     * issuer writes it and a `detail` — the number, the year, the scope —
     * and neither is ever invented: a licence number made up to fill a card
     * is a false statement under the firm's name. A `logo` is the mark's own
     * file, drawn in the ink; with none the name is set in type, which is
     * better than a stand-in. `href` leads to the register or the issuer that
     * confirms it.
     *
     * **Explicit props win, then what the site binds as `kit.credentials`**,
     * keyed by these same names, taken as a set and only when the tag gives no
     * `credentials`. With none from either it renders nothing — and a session
     * building a page never writes one on the tag from memory.
     *
     * @var array<int, array{name: string, detail?: string, logo?: string, href?: string}> $credentials
     */
    if ($credentials === null) {
        $bound = app()->bound('kit.credentials') ? app('kit.credentials') : [];
        $credentials = $bound['credentials'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['logos', 'list'], true) ? $variant : null;

    $ref = '<x-kit.credentials />';
@endphp

@if (filled($credentials))
    <section data-ref="{{ $ref }}" data-kit="credentials" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-5']) }}>
        @if ($title)
            <h2 data-kit-part="credentials-title" class="font-display text-lg text-ink">{{ $title }}</h2>
        @endif

        <ul data-kit-part="credentials-list" role="list" class="grid gap-4 grid-cols-[repeat(auto-fill,minmax(min(100%,13rem),1fr))]">
            @foreach ($credentials as $credential)
                <li data-kit-part="credentials-item" class="relative flex flex-col gap-2 border-t border-rule pt-4">
                    @if (! empty($credential['logo']))
                        <img data-kit-part="credentials-logo" src="{{ $credential['logo'] }}" alt="" loading="lazy" class="h-9 w-auto max-w-[9rem] object-contain object-left">
                    @endif

                    <p data-kit-part="credentials-name" class="font-medium text-ink">
                        @if (! empty($credential['href']))
                            <a data-kit-part="credentials-link" href="{{ $credential['href'] }}" rel="noopener" class="after:absolute after:inset-0">{{ $credential['name'] }}</a>
                        @else
                            {{ $credential['name'] }}
                        @endif
                    </p>

                    @if (! empty($credential['detail']))
                        <p data-kit-part="credentials-detail" class="text-sm tabular-nums text-ink-soft">{{ $credential['detail'] }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
@endif
