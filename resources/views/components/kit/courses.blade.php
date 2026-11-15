@props([
    'title' => null,
    'courses' => null,
    'variant' => null,
])

@php
    /**
     * What can be signed up for, and whether there is still room: a row per
     * session with its date, its name, who it is for, what it costs and the
     * places left. A prefab — a ski school's weeks, a tutor's terms, a
     * studio's workshops and an association's trainings are all dated
     * sessions with a number of seats.
     *
     * **It is not the agenda.** An event is something to come to; a course is
     * something to enrol in, so each row ends in the way to do it (`href`,
     * under `label`) and says how full it is. `seats` is printed as the
     * business writes it — "3 places", "Dernière place" — and `full` closes
     * the row: the name stays, the action goes, and the word is the kit's own
     * ("Complet"). A places-left figure nobody keeps up to date is worse than
     * none, so it is the owner's row or it is absent.
     *
     * **The date leads**, as the business says it ("du 9 au 14 février"), and
     * is never parsed here: `datetime` is what a machine reads, on the
     * `<time>`. `level` is who it is for ("Débutants", "Dès 8 ans"), `place`
     * where, and `price` what it costs, as written.
     *
     * **Explicit props win, then what the site binds as `kit.courses`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `courses`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, date: string, datetime?: string, time?: string, level?: string, place?: string, price?: string, seats?: string, full?: bool, href?: string, label?: string}> $courses
     */
    if ($courses === null) {
        $bound = app()->bound('kit.courses') ? app('kit.courses') : [];
        $courses = $bound['courses'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['cards'], true) ? $variant : null;

    $ref = '<x-kit.courses />';
@endphp

@if (filled($courses))
    <section data-ref="{{ $ref }}" data-kit="courses" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-4']) }}>
        @if ($title)
            <h2 data-kit-part="courses-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ol data-kit-part="courses-list" role="list" class="divide-y divide-rule border-y border-rule">
            @foreach ($courses as $course)
                @php
                    $meta = implode(' · ', array_filter([$course['level'] ?? null, $course['place'] ?? null], 'filled'));
                    $full = ! empty($course['full']);
                @endphp

                <li data-kit-part="courses-item" class="flex flex-wrap items-center gap-x-6 gap-y-3 py-5">
                    <p class="flex basis-44 flex-col gap-1">
                        <time data-kit-part="courses-date" @if (! empty($course['datetime'])) datetime="{{ $course['datetime'] }}" @endif class="font-display text-lg text-ink">{{ $course['date'] }}</time>

                        @if (! empty($course['time']))
                            <span data-kit-part="courses-time" class="text-sm tabular-nums text-ink-soft">{{ $course['time'] }}</span>
                        @endif
                    </p>

                    <div class="min-w-0 basis-56 grow space-y-1">
                        <h3 data-kit-part="courses-name" class="font-medium text-ink">{{ $course['name'] }}</h3>

                        @if ($meta !== '')
                            <p data-kit-part="courses-meta" class="text-sm text-ink-soft">{{ $meta }}</p>
                        @endif
                    </div>

                    <div data-kit-part="courses-end" class="flex flex-wrap items-center gap-x-4 gap-y-2">
                        @if (! empty($course['price']))
                            <p data-kit-part="courses-price" class="font-medium tabular-nums text-ink">{{ $course['price'] }}</p>
                        @endif

                        @if ($full)
                            <p data-kit-part="courses-seats" class="rounded-control bg-canvas-alt px-2.5 py-1 text-sm text-ink-soft">{{ __('kit.courses.full') }}</p>
                        @elseif (! empty($course['seats']))
                            <p data-kit-part="courses-seats" class="rounded-control bg-highlight px-2.5 py-1 text-sm font-medium text-on-highlight">{{ $course['seats'] }}</p>
                        @endif

                        @if (! $full && ! empty($course['href']))
                            <x-kit.button variant="secondary" size="sm" :href="$course['href']" data-kit-part="courses-action">{{ $course['label'] ?? __('kit.courses.enrol') }}</x-kit.button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </section>
@endif
