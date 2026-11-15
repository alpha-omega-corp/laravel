@props([
    'title' => null,
    'intro' => null,
    'note' => null,
    'scopes' => null,
    'budgets' => null,
    'action' => null,
    'variant' => null,
])

@php
    /**
     * A request for a quote: what the job is, how big, by when and for how
     * much, which the business answers with a figure. A prefab — a builder, a
     * garage, an architect and an agency all price work they have not seen
     * yet, and all need the same five answers before they can.
     *
     * **More than a booking, and still short.** The form posts `name`,
     * `contact` (an email or a phone, one field), `scope` (one of `scopes`:
     * the kinds of job the business takes), `place` (where the work is),
     * `budget` (one of `budgets`: bands the owner wrote, "moins de CHF
     * 20 000", never a free amount a visitor has to guess), `deadline` (a
     * date, optional) and `message`, with the decoy `website` nobody fills
     * in. It works with no script and comes back at #quote: the endpoint
     * flashes `site.quote_sent`, and then the thanks stand where the form was.
     *
     * **`note` says what happens next**, in the owner's words — "Nous
     * répondons sous deux jours ouvrables" — and is printed under the button:
     * a visitor who has just described a roof wants to know when somebody
     * reads it. It is never a promise the kit makes up. Photographs are asked
     * for in the answer, not here: this kit draws no file field yet.
     *
     * **Explicit props win, then what the site binds as `kit.quote`**, taken
     * as a set and only when the tag gives no `action`. With no action from
     * either it renders nothing: a form posting nowhere loses the request of
     * whoever trusted it.
     *
     * @var list<string> $scopes
     * @var list<string> $budgets
     */
    if ($action === null) {
        $bound = app()->bound('kit.quote') ? app('kit.quote') : [];
        $action = $bound['action'] ?? null;
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
        $note ??= $bound['note'] ?? null;
        $scopes ??= $bound['scopes'] ?? [];
        $budgets ??= $bound['budgets'] ?? [];
    }

    $scopes = array_values(array_filter((array) $scopes, 'filled'));
    $budgets = array_values(array_filter((array) $budgets, 'filled'));
    $sent = (bool) session('site.quote_sent');
    $fault = fn (string $field): ?string => isset($errors) ? ($errors->first($field) ?: null) : null;

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['split', 'plain'], true) ? $variant : null;

    $ref = '<x-kit.quote />';
@endphp

@if ($action)
    <section data-ref="{{ $ref }}" data-kit="quote" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['panel p-5 sm:p-6'])->merge(['id' => 'quote']) }}>
        <div data-kit-part="quote-copy" class="space-y-3">
            @if ($title)
                <h2 data-kit-part="quote-title" class="font-display text-title text-ink">{{ $title }}</h2>
            @endif

            @if ($intro)
                <p data-kit-part="quote-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
            @endif
        </div>

        @if ($sent)
            <p data-kit-part="quote-sent" role="status" class="mt-6 text-ink">{{ __('kit.quote.sent') }}</p>
        @else
            <form data-kit-part="quote-form" method="POST" action="{{ $action }}" class="mt-6 grid gap-4 sm:grid-cols-2">
                @csrf

                @if ($error = $fault('form'))
                    <div role="alert" class="flex items-start gap-2 text-sm font-medium text-danger sm:col-span-2">
                        <x-kit.icon name="circle-alert" class="mt-0.5 size-4 shrink-0" />
                        <p>{{ $error }}</p>
                    </div>
                @endif

                <x-kit.field name="name" :label="__('kit.quote.name')" id="quote-name" required autocomplete="name" maxlength="120" data-kit-part="quote-field" />

                {{-- Text, not email or tel: either is an answer. --}}
                <x-kit.field name="contact" :label="__('kit.quote.contact')" id="quote-contact" required autocomplete="email" maxlength="180" data-kit-part="quote-field" />

                @if ($scopes !== [])
                    <x-kit.field name="scope" :label="__('kit.quote.scope')" :options="$scopes" :choose="__('kit.quote.choose')" id="quote-scope" required data-kit-part="quote-field" />
                @endif

                <x-kit.field name="place" :label="__('kit.quote.place')" id="quote-place" autocomplete="address-level2" maxlength="180" data-kit-part="quote-field" />

                @if ($budgets !== [])
                    <x-kit.field name="budget" :label="__('kit.quote.budget')" :options="$budgets" :choose="__('kit.quote.choose')" id="quote-budget" data-kit-part="quote-field" />
                @endif

                <x-kit.field name="deadline" type="date" :label="__('kit.quote.deadline')" id="quote-deadline" :min="now()->toDateString()" data-kit-part="quote-field" />

                <x-kit.field name="message" type="long" :label="__('kit.quote.message')" rows="4" maxlength="4000" id="quote-message" required
                             data-kit-part="quote-field" class="sm:col-span-2" />

                {{-- The decoy: off-screen and out of the tab order, so only a script fills it. --}}
                <div aria-hidden="true" class="absolute -left-[9999px] size-px overflow-hidden">
                    <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                </div>

                <div data-kit-part="quote-actions" class="flex flex-wrap items-center gap-x-5 gap-y-2 sm:col-span-2">
                    <x-kit.button type="submit">{{ __('kit.quote.send') }}</x-kit.button>

                    @if ($note)
                        <p data-kit-part="quote-note" class="text-sm text-ink-soft">{{ $note }}</p>
                    @endif
                </div>
            </form>
        @endif
    </section>
@endif
