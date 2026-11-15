@props([
    'title' => null,
    'intro' => null,
    'steps' => null,
    'variant' => null,
])

@php
    /**
     * How it goes, in the order it goes: numbered steps from the first call to
     * the handover — a builder's phases, a lawyer's first meeting to the
     * judgment, a guide's week, an enrolment. A prefab: any business whose
     * customer commits before they see the result owes them the road ahead.
     *
     * **The number is the step's place, so the list is ordered and the number
     * is written.** Each step has its `name` and one `line`; `duration` says
     * how long it takes as the business would — "2 semaines", "le jour même" —
     * and is left out rather than promised. Seven steps at most hold together
     * as one road; past that it is a manual, and belongs on a page of its own.
     *
     * **Explicit props win, then what the site binds as `kit.process`**, keyed
     * by these same names, taken as a set and only when the tag gives no
     * `steps`. With none from either it renders nothing.
     *
     * @var array<int, array{name: string, line?: string, duration?: string}> $steps
     */
    if ($steps === null) {
        $bound = app()->bound('kit.process') ? app('kit.process') : [];
        $steps = $bound['steps'] ?? [];
        $title ??= $bound['title'] ?? null;
        $intro ??= $bound['intro'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['timeline', 'row'], true) ? $variant : null;

    $ref = '<x-kit.process />';
@endphp

@if (filled($steps))
    <section data-ref="{{ $ref }}" data-kit="process" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="process-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        @if ($intro)
            <p data-kit-part="process-intro" class="max-w-prose text-ink-soft">{{ $intro }}</p>
        @endif

        <ol data-kit-part="process-list" role="list" class="grid gap-5 grid-cols-[repeat(auto-fit,minmax(min(100%,14rem),1fr))]">
            @foreach ($steps as $step)
                <li data-kit-part="process-step" class="flex flex-col gap-2 border-t-2 border-ink pt-4">
                    <p data-kit-part="process-number" class="font-display text-3xl tabular-nums text-accent">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>

                    <h3 data-kit-part="process-name" class="font-display text-lg text-ink">{{ $step['name'] }}</h3>

                    @if (! empty($step['line']))
                        <p data-kit-part="process-line" class="text-sm text-ink-soft">{{ $step['line'] }}</p>
                    @endif

                    @if (! empty($step['duration']))
                        <p data-kit-part="process-duration" class="mt-auto text-sm font-medium text-ink">{{ $step['duration'] }}</p>
                    @endif
                </li>
            @endforeach
        </ol>
    </section>
@endif
