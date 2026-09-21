@php
    /**
     * An appointment: the day, the slot and what it is for on one side, what
     * the appointment actually is on the other. The form posts nowhere — this
     * is a mockup, and a live one would need a route, a FormRequest and a
     * mailable behind it.
     *
     * @var array<string, mixed> $data
     * @var array<string, mixed> $site
     * @var bool $dense
     * @var \App\Enums\Variation $variation
     * @var \Closure(string): string $url
     */
@endphp

<div class="{{ $variation->rhythm() }}">
    @include('framework.lead', ['title' => $data['title'], 'body' => $data['body']])

    <div class="grid items-start gap-6 lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)]">
        <x-kit.form-layout :title="$data['title']" :description="$data['body']">
            <x-kit.input name="booking-name" label="Nom" placeholder="Camille Rey" />
            <x-kit.input name="booking-phone" type="tel" label="Téléphone" placeholder="079 000 00 00" />
            <x-kit.input name="booking-email" type="email" label="Courriel" class="sm:col-span-2" />

            <x-kit.input name="booking-date" type="date" label="Date" />

            <x-kit.select name="booking-slot" :label="$data['slotLabel']" :selected="$data['slot']" :options="$data['slots']" />

            <x-kit.radio-group name="booking-subject" :legend="$data['legend']" :selected="$data['selected']" cards
                               class="sm:col-span-2" :options="$data['options']" />

            <x-kit.textarea name="booking-message" label="Message" rows="3" class="sm:col-span-2"
                            :placeholder="$data['placeholder']" />

            <x-slot:actions>
                <x-kit.button variant="ghost">Effacer</x-kit.button>
                <x-kit.button type="submit">Demander ce créneau</x-kit.button>
            </x-slot:actions>
        </x-kit.form-layout>

        <div class="space-y-6">
            <x-kit.description-list :title="$data['summaryTitle']" :items="$data['summary']" />

            <x-kit.description-list striped title="Nous trouver" :items="[
                ['term' => 'Adresse', 'value' => $site['address']],
                ['term' => 'Téléphone', 'value' => $site['phone']],
                ['term' => 'Accès', 'value' => $site['transport']],
            ]" />

            <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
                {{ $data['alert']['body'] }}
            </x-kit.alert>
        </div>
    </div>
</div>
