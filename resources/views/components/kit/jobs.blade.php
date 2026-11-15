@props([
    'title' => null,
    'intro' => null,
    'jobs' => null,
    'variant' => null,
])

@php
    /**
     * The positions that are open: a row per job with its name, where it is,
     * how much of a week it is, a line about it and the way to apply. A
     * prefab — a builder hiring site managers, a practice a hygienist and a
     * school a teacher all post the same four facts.
     *
     * **A row leads with what the job is called**, then the facts a reader
     * filters by — `place` and `hours`, as the business says them ("Lausanne",
     * "80–100 %", "CDI") — and `line` says what the work is, in one sentence.
     * `href` is where to apply: the advert's own page, a PDF, a mailto. A job
     * is taken off when it is filled; one left up for a year tells an
     * applicant nobody reads the page.
     *
     * **Explicit props win, then what the site binds as `kit.jobs`**, keyed by
     * these same names, taken as a set and only when the tag gives no `jobs`.
     * With none from either it renders nothing: "no positions at the moment"
     * under a heading is a section about nothing, and the footer's contact
     * already takes a spontaneous letter.
     *
     * @var array<int, array{name: string, place?: string, hours?: string, line?: string, href?: string}> $jobs
     */
    if ($jobs === null) {
        $bound = app()->bound('kit.jobs') ? app('kit.jobs') : [];
        $jobs = $bound['jobs'] ?? [];
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['cards'], true) ? $variant : null;

    $ref = '<x-kit.jobs />';
@endphp

@if (filled($jobs))
    <section data-ref="{{ $ref }}" data-kit="jobs" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-4']) }}>
        @if ($title)
            <h2 data-kit-part="jobs-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @if ($intro)
            <p data-kit-part="jobs-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
        @endif

        <ul data-kit-part="jobs-list" role="list" class="divide-y divide-rule border-y border-rule">
            @foreach ($jobs as $job)
                @php
                    $meta = array_values(array_filter([$job['place'] ?? null, $job['hours'] ?? null], 'filled'));
                @endphp

                <li data-kit-part="jobs-item" class="relative flex flex-wrap items-center gap-x-6 gap-y-2 py-5">
                    <div class="min-w-0 basis-64 grow space-y-1">
                        <h3 data-kit-part="jobs-name" class="font-display text-lg text-ink">
                            @if (! empty($job['href']))
                                <a data-kit-part="jobs-link" href="{{ $job['href'] }}" class="after:absolute after:inset-0">{{ $job['name'] }}</a>
                            @else
                                {{ $job['name'] }}
                            @endif
                        </h3>

                        @if (! empty($job['line']))
                            <p data-kit-part="jobs-line" class="max-w-prose text-sm text-ink-soft">{{ $job['line'] }}</p>
                        @endif
                    </div>

                    @if ($meta !== [])
                        <ul data-kit-part="jobs-meta" role="list" class="flex flex-wrap gap-2 text-sm text-ink">
                            @foreach ($meta as $fact)
                                <li class="rounded-control bg-canvas-alt px-2.5 py-1">{{ $fact }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if (! empty($job['href']))
                        <x-kit.icon name="arrow-right" data-kit-part="jobs-arrow" class="size-5 shrink-0 text-accent" />
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
@endif
