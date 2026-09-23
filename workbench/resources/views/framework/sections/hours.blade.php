@php
    use Illuminate\Support\Carbon;

    /**
     * When the place is open, or when it leaves: the week as a description
     * list, the month as a calendar with the named days filled in, and the
     * exception of the moment above both.
     *
     * The marked days are computed from the weekdays the content names rather
     * than typed, so the calendar is not a month that quietly goes stale.
     *
     * @var array<string, mixed> $data
     * @var array<string, mixed> $site
     * @var bool $dense
     * @var \Workbench\App\Enums\Variation $variation
     * @var \Closure(string): string $url
     */
    $month = Carbon::now()->startOfMonth();

    $marked = [];

    for ($day = $month->copy(); $day->month === $month->month; $day->addDay()) {
        if (in_array($day->dayOfWeekIso, $data['marked'], true)) {
            $marked[] = $day->day;
        }
    }
@endphp

<div class="{{ $variation->rhythm() }}">
    @include('framework.lead', ['title' => $data['title'], 'body' => $data['body']])

    <x-kit.alert :tone="$data['notice']['tone']" :title="$data['notice']['title']">
        {{ $data['notice']['body'] }}
    </x-kit.alert>

    <div class="grid items-start gap-6 lg:grid-cols-2">
        <div class="space-y-6">
            <x-kit.description-list striped title="La semaine" :items="$data['week']" />

            <x-kit.action-panel inline :title="$data['panelTitle']">
                {{ $data['panelBody'] }}

                <x-slot:action>
                    <x-kit.button variant="secondary" :href="$url($site['cta']['primary']['to'])">{{ $site['cta']['primary']['label'] }}</x-kit.button>
                </x-slot:action>
            </x-kit.action-panel>
        </div>

        <div class="space-y-4">
            <x-kit.calendar :month="$month->toDateString()" :marked="$marked" />

            @if ($variation->showsFlourish())
                <p class="flex items-center gap-2 text-sm text-ink-soft">
                    <span class="size-2 shrink-0 rounded-full bg-accent" aria-hidden="true"></span>
                    {{ $data['legend'] }}
                </p>
            @endif
        </div>
    </div>
</div>
