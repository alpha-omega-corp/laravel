@props([
    'title' => null,
    'projects' => null,
    'variant' => null,
])

@php
    /**
     * Work done, as the proof it is: a card per project with its photograph,
     * where and when it was built, what it was, and the one figure that sizes
     * it — 4 200 m², 14 months, 38 flats. A prefab: a builder, an architect, an
     * engineer and a software house all show finished work the same way, and a
     * visitor asks the same thing of each — have they done one like mine.
     *
     * **One figure, not a table.** A project carries `figure` and what it
     * counts, `figure_label`, and that is the number a visitor remembers; a
     * second and a third belong on the project's own page, which `href` opens.
     * The place and the year sit in one line above the name, since a row of
     * projects is scanned by where and when before it is read.
     *
     * A project with no photograph keeps the photograph's frame, so a row of
     * cards stays a row; a picture of somebody else's building is never put
     * there to fill it.
     *
     * **Explicit props win, then what the site binds as `kit.projects`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `projects`. With none from either it renders nothing: a heading over no
     * work says the business has done none.
     *
     * @var array<int, array{name: string, place?: string, year?: string|int, kind?: string, figure?: string, figure_label?: string, summary?: string, image?: string, alt?: string, href?: string}> $projects
     */
    if ($projects === null) {
        $bound = app()->bound('kit.projects') ? app('kit.projects') : [];
        $projects = $bound['projects'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['rows', 'index'], true) ? $variant : null;

    $ref = '<x-kit.projects />';
@endphp

@if (filled($projects))
    <section data-ref="{{ $ref }}" data-kit="projects" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="projects-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ul data-kit-part="projects-list" role="list" class="flex flex-wrap gap-6 [--row-item:18rem]">
            @foreach ($projects as $project)
                @php
                    $meta = implode(' · ', array_filter([$project['place'] ?? null, $project['year'] ?? null], 'filled'));
                @endphp

                <li data-kit-part="projects-item" class="panel relative flex flex-col overflow-hidden">
                    @if (! empty($project['image']))
                        <img data-kit-part="projects-image" src="{{ $project['image'] }}" alt="{{ $project['alt'] ?? '' }}" loading="lazy" decoding="async" class="aspect-[4/3] w-full object-cover">
                    @else
                        <div data-kit-part="projects-frame" aria-hidden="true" class="aspect-[4/3] w-full bg-canvas-alt"></div>
                    @endif

                    <div data-kit-part="projects-body" class="flex flex-1 flex-col gap-2 p-5">
                        @if ($meta !== '')
                            <p data-kit-part="projects-meta" class="text-sm tabular-nums text-ink-soft">{{ $meta }}</p>
                        @endif

                        <h3 data-kit-part="projects-name" class="font-display text-xl text-ink">
                            @if (! empty($project['href']))
                                <a data-kit-part="projects-link" href="{{ $project['href'] }}" class="after:absolute after:inset-0">{{ $project['name'] }}</a>
                            @else
                                {{ $project['name'] }}
                            @endif
                        </h3>

                        @if (! empty($project['kind']))
                            <p data-kit-part="projects-kind" class="text-sm font-medium text-ink">{{ $project['kind'] }}</p>
                        @endif

                        @if (! empty($project['summary']))
                            <p data-kit-part="projects-summary" class="text-sm text-ink-soft">{{ $project['summary'] }}</p>
                        @endif

                        @if (! empty($project['figure']))
                            <p data-kit-part="projects-figure" class="mt-auto flex items-baseline gap-2 border-t border-rule pt-3">
                                <span data-kit-part="projects-figure-value" class="font-display text-2xl tabular-nums text-ink">{{ $project['figure'] }}</span>

                                @if (! empty($project['figure_label']))
                                    <span data-kit-part="projects-figure-label" class="text-sm text-ink-soft">{{ $project['figure_label'] }}</span>
                                @endif
                            </p>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endif
