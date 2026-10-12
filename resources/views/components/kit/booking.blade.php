@props([
    'title' => null,
    'intro' => null,
    'url' => null,
    'services' => null,
    'action' => null,
    'variant' => null,
])

@php
    /**
     * A request to book: a table, an appointment, a stay or a quote, which the
     * owner confirms by hand. A prefab — a restaurant, a salon and a guest house
     * all take one, and none of them needs a calendar of availability to do it.
     *
     * **A form where it is given an `action`, a link where it is given a `url`.**
     * The form posts `name`, `contact` (an email or a phone, one field because
     * a public form is short), `service`, `date`, `time`, `party` and
     * `message` with the decoy `website` nobody fills in, works
     * with no script, and comes back at #booking: the base's endpoint flashes
     * `site.booking_sent`, and then the thanks stand where the form was. A
     * business already on an outside booking system (OpenTable, Planity) gives
     * its `url`, and the button opens that rather than asking twice.
     *
     * **Explicit props win, then what the site binds as `kit.booking`**, taken
     * as a set and only when the tag gives neither `action` nor `url`. With
     * neither from either it renders nothing: a form posting nowhere loses the
     * request of whoever trusted it.
     *
     * @var list<string> $services
     */
    if ($action === null && $url === null) {
        $bound = app()->bound('kit.booking') ? app('kit.booking') : [];
        $url = $bound['url'] ?? null;
        $action = $bound['action'] ?? null;
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
        $services ??= $bound['services'] ?? [];
    }

    $services = array_values(array_filter((array) $services, 'filled'));
    $sent = (bool) session('site.booking_sent');
    $fault = fn (string $field): ?string => isset($errors) ? ($errors->first($field) ?: null) : null;

    // ponytail: the browser's floor is the server's date, while the base judges
    // the identity's timezone; the two differ only around midnight, and the
    // base's refusal says which day to choose then.
    $fields = [
        ['name' => 'name', 'type' => 'text', 'attributes' => ['required' => true, 'autocomplete' => 'name', 'maxlength' => 120]],
        // Text, not email or tel: either is an answer, and the base sorts them by the @.
        ['name' => 'contact', 'type' => 'text', 'attributes' => ['required' => true, 'autocomplete' => 'email', 'maxlength' => 180]],
        ['name' => 'date', 'type' => 'date', 'attributes' => ['required' => true, 'min' => now()->toDateString()]],
        ['name' => 'time', 'type' => 'time', 'attributes' => []],
        ['name' => 'party', 'type' => 'number', 'attributes' => ['min' => 1, 'max' => 50, 'inputmode' => 'numeric']],
    ];

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['split', 'plain'], true) ? $variant : null;

    $ref = '<x-kit.booking />';
@endphp

@if ($url || $action)
    <section data-ref="{{ $ref }}" data-kit="booking" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['panel p-5 sm:p-6'])->merge(['id' => 'booking']) }}>
        @if ($title)
            <h2 data-kit-part="booking-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @if ($intro)
            <p data-kit-part="booking-intro" @class(['text-ink-soft', 'mt-3' => $title])>{{ $intro }}</p>
        @endif

        @if ($url)
            <p @class(['mt-6' => $title || $intro])>
                <x-kit.button :href="$url" target="_blank" rel="noopener" data-kit-part="booking-link">{{ __('kit.booking.book') }}</x-kit.button>
            </p>
        @elseif ($sent)
            <p data-kit-part="booking-sent" role="status" @class(['text-ink', 'mt-6' => $title || $intro])>{{ __('kit.booking.sent') }}</p>
        @else
            <form data-kit-part="booking-form" method="POST" action="{{ $action }}" @class(['grid gap-4 sm:grid-cols-2', 'mt-6' => $title || $intro])>
                @csrf

                @if ($error = $fault('form'))
                    <p role="alert" class="text-sm text-accent sm:col-span-2">{{ $error }}</p>
                @endif

                @foreach ($fields as $field)
                    <x-kit.field :name="$field['name']" :type="$field['type']" :label="__('kit.booking.'.$field['name'])" :id="'booking-'.$field['name']"
                                 :attributes="new \Illuminate\View\ComponentAttributeBag($field['attributes'])" data-kit-part="booking-field" />
                @endforeach

                @if ($services !== [])
                    <x-kit.field name="service" :label="__('kit.booking.service')" :options="$services" :choose="__('kit.booking.choose')" id="booking-service"
                                 data-kit-part="booking-field" class="sm:col-span-2" />
                @endif

                <x-kit.field name="message" type="long" :label="__('kit.booking.message')" rows="3" maxlength="2000" id="booking-message"
                             data-kit-part="booking-field" class="sm:col-span-2" />

                {{-- The decoy: off-screen and out of the tab order, so only a script fills it. --}}
                <div aria-hidden="true" class="absolute -left-[9999px] size-px overflow-hidden">
                    <input type="text" name="website" tabindex="-1" autocomplete="off" value="">
                </div>

                <div data-kit-part="booking-actions" class="sm:col-span-2">
                    <x-kit.button type="submit">{{ __('kit.booking.send') }}</x-kit.button>
                </div>
            </form>
        @endif
    </section>
@endif
