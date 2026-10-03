@props([
    'title' => null,
    'events' => null,
    'variant' => null,
])

@php
    /**
     * What is on: dated happenings — a market day, a tasting, a concert night,
     * an open cellar. A prefab: a farm, a winery and a restaurant all hold
     * them, and a visitor asks the same two things of each, when and what.
     *
     * **The date leads every row**, as the business would say it ("samedi 12
     * octobre"), and is never parsed here: `datetime` is what a machine reads,
     * on the `<time>`. A row wraps its date above its name when the column is
     * narrow — the column decides, never the window.
     *
     * **Explicit props win, then what the site binds as `kit.events`**, keyed
     * by these same names — the base package binds it to the events the owner
     * keeps, with those already over left out. Bound data is taken **as a set,
     * and only when the tag gives no `events`**. With no events from either it
     * renders nothing: a heading over an empty agenda says the business holds
     * nothing, which is not what an empty table means.
     *
     * @var array<int, array{date: string, time?: string, datetime?: string, name: string, description?: string, image?: string}> $events
     */
    if ($events === null) {
        $bound = app()->bound('kit.events') ? app('kit.events') : [];
        $events = $bound['events'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['timeline', 'cards'], true) ? $variant : null;

    $ref = '<x-kit.events />';
@endphp

@if (filled($events))
    <section data-ref="{{ $ref }}" data-kit="events" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-4']) }}>
        @if ($title)
            <h2 data-kit-part="events-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ol data-kit-part="events-list" role="list" class="divide-y divide-rule">
            @foreach ($events as $event)
                <li data-kit-part="events-item" class="flex flex-wrap gap-x-6 gap-y-2 py-5">
                    <p class="flex basis-44 flex-col gap-1">
                        <time data-kit-part="events-date" @if (! empty($event['datetime'])) datetime="{{ $event['datetime'] }}" @endif class="font-display text-lg text-ink">{{ $event['date'] }}</time>

                        @if (! empty($event['time']))
                            <span data-kit-part="events-time" class="text-sm tabular-nums text-ink-soft">{{ $event['time'] }}</span>
                        @endif
                    </p>

                    <div class="flex min-w-0 basis-64 grow items-start gap-4">
                        <div class="min-w-0 flex-1 space-y-1">
                            <h3 data-kit-part="events-name" class="font-medium text-ink">{{ $event['name'] }}</h3>

                            @if (! empty($event['description']))
                                <p data-kit-part="events-description" class="max-w-prose text-sm text-ink-soft">{{ $event['description'] }}</p>
                            @endif
                        </div>

                        @if (! empty($event['image']))
                            <img data-kit-part="events-image" src="{{ $event['image'] }}" alt="" loading="lazy" class="size-20 shrink-0 rounded-control bg-canvas-alt object-cover">
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </section>
@endif
