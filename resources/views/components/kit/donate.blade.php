@props([
    'title' => null,
    'intro' => null,
    'url' => null,
    'label' => null,
    'details' => null,
    'note' => null,
    'variant' => null,
])

@php
    /**
     * How to give: a sentence on what a gift does, the one button that leads
     * to where it is made, and the account for those who give by transfer. A
     * prefab — an association, a club, a parish and a foundation all ask the
     * same way.
     *
     * **A way out, never a till.** `url` is the association's own giving page
     * — Twint, a bank's portal, a platform it already uses — and the button
     * opens it; nothing here takes a card, an amount or a name. A site that
     * must charge is given a checkout by deployer's `/stripe`, with the
     * receipts and the refusals that come with one.
     *
     * **The account is copied, not retyped**: `details` are `label` and
     * `value` pairs — the holder, the IBAN, the reference — printed in a face
     * with even figures so a number is read digit by digit. `note` is what the
     * association may truthfully say about a gift ("Dons déductibles des
     * impôts dans le canton de Vaud") and is never written for it: a tax
     * status made up on a page is the association's to answer for.
     *
     * **Explicit props win, then what the site binds as `kit.donate`**, taken
     * as a set and only when the tag gives neither `url` nor `details`. With
     * neither from either it renders nothing.
     *
     * @var list<array{label: string, value: string}> $details
     */
    if ($url === null && $details === null) {
        $bound = app()->bound('kit.donate') ? app('kit.donate') : [];
        $url = $bound['url'] ?? null;
        $details = $bound['details'] ?? [];
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
        $label ??= $bound['label'] ?? null;
        $note ??= $bound['note'] ?? null;
    }

    $details = array_values(array_filter((array) $details, fn ($detail): bool => filled($detail['label'] ?? null) && filled($detail['value'] ?? null)));

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['split'], true) ? $variant : null;

    $ref = '<x-kit.donate />';
@endphp

@if ($url || $details !== [])
    <section data-ref="{{ $ref }}" data-kit="donate" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['panel space-y-5 p-5 sm:p-6'])->merge(['id' => 'donate']) }}>
        <div data-kit-part="donate-copy" class="space-y-3">
            @if ($title)
                <h2 data-kit-part="donate-title" class="font-display text-title text-ink">{{ $title }}</h2>
            @endif

            @if ($intro)
                <p data-kit-part="donate-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
            @endif

            @if ($url)
                <p data-kit-part="donate-action" class="pt-2">
                    <x-kit.button :href="$url" target="_blank" rel="noopener">{{ $label ?? __('kit.donate.give') }}</x-kit.button>
                </p>
            @endif
        </div>

        @if ($details !== [])
            <dl data-kit-part="donate-details" class="grid gap-x-6 gap-y-3 border-t border-rule pt-5 grid-cols-[repeat(auto-fit,minmax(min(100%,13rem),1fr))]">
                @foreach ($details as $detail)
                    <div data-kit-part="donate-detail" class="flex flex-col gap-0.5">
                        <dt class="text-xs text-ink-soft">{{ $detail['label'] }}</dt>
                        <dd class="font-medium tabular-nums text-ink select-all">{{ $detail['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif

        @if ($note)
            <p data-kit-part="donate-note" class="text-sm text-ink-soft">{{ $note }}</p>
        @endif
    </section>
@endif
