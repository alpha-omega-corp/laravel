@php
    /**
     * Whatever the place calls it — contact, order, enrolment, pickup — it is
     * one form and the ways to reach the place beside it. The form posts
     * nowhere: a live one would need a route, a FormRequest and a mailable.
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
        <x-kit.form-layout :title="$data['formTitle']" :description="$data['formBody']">
            <x-kit.input name="contact-name" label="Nom" placeholder="Camille Rey" />
            <x-kit.input name="contact-phone" type="tel" label="Téléphone" placeholder="079 000 00 00" />
            <x-kit.input name="contact-email" type="email" label="Courriel" class="sm:col-span-2" />

            <x-kit.input name="contact-date" type="date" label="Date" />

            <x-kit.select name="contact-choice" :label="$data['choiceLabel']" :selected="$data['choice']" :options="$data['choices']" />

            <x-kit.radio-group name="contact-subject" :legend="$data['legend']" :selected="$data['selected']" cards
                               class="sm:col-span-2" :options="$data['options']" />

            <x-kit.textarea name="contact-message" label="Message" rows="3" class="sm:col-span-2"
                            :placeholder="$data['placeholder']" />

            <x-kit.checkbox name="contact-newsletter" :label="$data['consent']['label']"
                            :hint="$data['consent']['hint']" class="sm:col-span-2" />

            <x-slot:actions>
                <x-kit.button variant="ghost">Effacer</x-kit.button>
                <x-kit.button type="submit">{{ $data['submit'] }}</x-kit.button>
            </x-slot:actions>
        </x-kit.form-layout>

        <div class="space-y-6">
            @if ($variation->showsMedia())
                <x-kit.placeholder class="h-56 w-full" />
            @endif

            <x-kit.description-list title="Nous trouver" :items="[
                ['term' => 'Adresse', 'value' => $site['address']],
                ['term' => 'Téléphone', 'value' => $site['phone']],
                ['term' => 'Courriel', 'value' => $site['email']],
                ['term' => 'Transports', 'value' => $site['transport']],
            ]" />

            <x-kit.alert :tone="$data['alert']['tone']" :title="$data['alert']['title']">
                {{ $data['alert']['body'] }}
            </x-kit.alert>
        </div>
    </div>
</div>
