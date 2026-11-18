@php
    use Workbench\App\Framework\Record;
    use Workbench\App\Framework\Site;
    use Workbench\App\Framework\Views;

    /*
     * The record of a run: how the business views beside it came to be. What
     * was asked, then each step with the reasons for it and the pictures sent
     * back while it ran, then what each writer reported, what is known and not
     * mended, and what is still owed outside the kit.
     *
     * It is an account, written once (`workbench/record/<date>`), and the
     * pictures are what the work looked like on the day; the links under a
     * step lead to the same view as it is drawn now.
     */
    $run = Record::run(request()->string('run')->toString() ?: null);

    abort_if($run === null, 404);

    $picture = fn (string $file): string => route('framework.record.picture', ['run' => $run['name'], 'file' => $file]);
    $businesses = (array) ($run['writers']['businesses'] ?? []);
    $directions = (array) ($run['writers']['directions'] ?? []);
    $drawn = Site::businesses();
@endphp

<x-layouts.shell :title="__('framework.title')" :description="__('framework.record.intro')" wide>
    {{-- One of the framework tab's views: framework.js swaps it in from the side column, as it does the others. --}}
    <div class="space-y-4" data-framework-root>
        <div class="grid items-start gap-4 lg:grid-cols-[18rem_minmax(0,1fr)]">
            @include('framework.controls', ['rows' => [Views::row('record')], 'label' => __('framework.record.title')])

            <div class="min-w-0 space-y-10" data-framework-main data-framework-part="record">
                <header class="space-y-6" data-ref="framework.record">
                    <div class="space-y-1">
                        <p class="font-mono text-xs text-ink-soft">{{ $run['date'] }}</p>
                        <h2 class="font-display text-title text-ink">{{ $run['title'] }}</h2>
                    </div>

                    <dl class="grid gap-x-8 gap-y-4 grid-cols-[repeat(auto-fit,minmax(9rem,1fr))]">
                        @foreach ($run['totals'] as $total)
                            <div class="border-t-2 border-ink pt-3">
                                <dd class="font-display text-3xl tabular-nums text-ink">{{ $total['value'] }}</dd>
                                <dt class="text-sm text-ink-soft">{{ $total['label'] }}</dt>
                            </div>
                        @endforeach
                    </dl>

                    <div class="max-w-prose space-y-3">
                        <h3 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.record.asked') }}</h3>

                        @foreach ($run['asked'] as $paragraph)
                            <p class="text-ink">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </header>

                <section class="space-y-6">
                    <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.record.steps') }}</h2>

                    <ol role="list" class="space-y-6">
                        @foreach ($run['steps'] as $step)
                            <li class="panel overflow-hidden" data-ref="framework.record.step">
                                <div class="grid gap-x-10 gap-y-4 px-4 py-5 sm:px-6 lg:grid-cols-[minmax(0,1fr)_14rem]">
                                    <div class="max-w-prose space-y-3">
                                        <h3 class="flex items-baseline gap-3 font-display text-xl text-ink">
                                            <span class="font-mono text-sm tabular-nums text-accent">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                            {{ $step['title'] }}
                                        </h3>

                                        @foreach ($step['why'] as $paragraph)
                                            <p class="text-sm text-ink">{{ $paragraph }}</p>
                                        @endforeach
                                    </div>

                                    @if (! empty($step['see']))
                                        <div class="space-y-2">
                                            <h4 class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('framework.record.see') }}</h4>

                                            <ul role="list" class="space-y-1 text-sm">
                                                @foreach ($step['see'] as $view)
                                                    <li><a href="{{ route($view['route'], $view['query']) }}" class="text-accent hover:text-accent-strong">{{ $view['label'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                @if (! empty($step['pictures']))
                                    {{--
                                        The pictures as they were sent: each at the column's width, and one taller than
                                        the window in a box of its own that scrolls, so a ten-thousand-pixel contact
                                        sheet does not push the next step off the page.
                                    --}}
                                    <div class="grid gap-5 border-t border-rule bg-canvas-alt px-4 py-5 sm:px-6 grid-cols-[repeat(auto-fit,minmax(min(100%,22rem),1fr))]">
                                        @foreach ($step['pictures'] as $shot)
                                            <figure class="space-y-2">
                                                <a href="{{ $picture($shot['file']) }}" title="{{ __('framework.record.picture') }}"
                                                   class="block max-h-[34rem] overflow-y-auto overscroll-contain rounded-control border border-rule bg-canvas">
                                                    <img src="{{ $picture($shot['file']) }}" alt="{{ $shot['caption'] }}" width="{{ $shot['width'] }}" height="{{ $shot['height'] }}"
                                                         loading="lazy" decoding="async" class="h-auto w-full">
                                                </a>

                                                <figcaption class="text-xs text-ink-soft">{{ $shot['caption'] }}</figcaption>
                                            </figure>
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </section>

                @if ($businesses !== [])
                    <section class="space-y-4" data-ref="framework.record.writers">
                        <div class="max-w-prose space-y-1">
                            <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.record.writers') }}</h2>
                            <p class="text-sm text-ink-soft">{{ __('framework.record.writers_intro') }}</p>
                        </div>

                        <div class="panel divide-y divide-rule">
                            @foreach ($businesses as $name => $report)
                                {{-- A business's tab links here by name, and its notes are then the ones open. --}}
                                <details class="group scroll-mt-24" id="writer-{{ $name }}" @if (request()->string('open')->toString() === $name) open @endif>
                                    <summary class="flex cursor-pointer flex-wrap items-baseline gap-x-4 gap-y-1 px-4 py-3 sm:px-6">
                                        <span class="w-28 shrink-0 font-semibold text-ink">{{ ucfirst($name) }}</span>
                                        <span class="min-w-0 flex-1 basis-64 text-sm text-ink-soft">{{ $report['brand'] }}</span>
                                        <span class="font-mono text-xs text-ink-soft">{{ $report['designs_now'] ?? count($report['designs']) }} {{ __('framework.record.designs') }} · {{ count($report['noticed']) }} {{ __('framework.record.notes') }}</span>
                                    </summary>

                                    <div class="space-y-4 border-t border-rule bg-canvas-alt px-4 py-4 sm:px-6">
                                        <ul role="list" class="flex flex-wrap gap-1.5">
                                            @foreach ($report['designs'] as $design)
                                                <li class="rounded-control bg-canvas px-2 py-0.5 text-xs text-ink">{{ $design['name'] }} <span class="font-mono text-ink-soft">{{ $design['direction'] }} · {{ $design['palette'] }}</span></li>
                                            @endforeach
                                        </ul>

                                        @if ($report['noticed'] !== [])
                                            <ul role="list" class="max-w-prose list-disc space-y-2 ps-5 text-sm text-ink">
                                                @foreach ($report['noticed'] as $note)
                                                    <li>{{ $note }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        @if (isset($drawn[$name]))
                                            <p class="flex flex-wrap gap-x-4 text-sm">
                                                <a href="{{ route('framework.businesses', ['business' => $name]) }}" class="text-accent hover:text-accent-strong">{{ __('framework.record.tab') }}</a>
                                                <a href="{{ route('framework.sheet', ['business' => $name]) }}" class="text-accent hover:text-accent-strong">{{ __('framework.record.sheet') }}</a>
                                            </p>
                                        @endif
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($directions !== [])
                    <section class="space-y-4" data-ref="framework.record.directions">
                        <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.record.directions') }}</h2>

                        <div class="grid gap-6 lg:grid-cols-2">
                            <div class="panel divide-y divide-rule">
                                <h3 class="px-4 py-3 text-xs font-semibold tracking-wide text-ink-soft uppercase sm:px-6">{{ __('framework.record.specs') }}</h3>

                                @foreach ((array) ($directions['specs'] ?? []) as $name => $spec)
                                    <div class="space-y-1 px-4 py-3 sm:px-6">
                                        <p class="font-semibold text-ink">{{ ucfirst($name) }}</p>
                                        <p class="text-sm text-ink-soft">{{ $spec['summary'] }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="panel divide-y divide-rule">
                                <h3 class="px-4 py-3 text-xs font-semibold tracking-wide text-ink-soft uppercase sm:px-6">{{ __('framework.record.dressed') }}</h3>

                                @foreach ((array) ($directions['dressed'] ?? []) as $name => $dress)
                                    <details>
                                        <summary class="flex cursor-pointer flex-wrap items-baseline gap-x-4 px-4 py-3 sm:px-6">
                                            <span class="font-semibold text-ink">{{ ucfirst($name) }}</span>
                                            <span class="font-mono text-xs text-ink-soft">{{ $dress['rules'] }} {{ __('framework.record.rules') }}</span>
                                        </summary>

                                        <ul role="list" class="space-y-2 border-t border-rule bg-canvas-alt px-4 py-4 text-sm text-ink sm:px-6">
                                            @foreach ((array) ($dress['points'] ?? []) as $point)
                                                {{-- A line that ends on a colon heads the ones after it. --}}
                                                <li @class(['list-disc ms-5' => ! str_ends_with($point, ':'), 'pt-2 text-xs font-semibold tracking-wide text-ink-soft uppercase' => str_ends_with($point, ':')])>{{ rtrim($point, ':') }}</li>
                                            @endforeach
                                        </ul>
                                    </details>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endif

                <section class="grid gap-6 lg:grid-cols-2">
                    <div class="space-y-3">
                        <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.record.open') }}</h2>

                        <ul role="list" class="list-disc space-y-2 ps-5 text-sm text-ink">
                            @foreach ($run['open'] as $line)
                                <li>{{ $line }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="space-y-3">
                        <h2 class="font-display text-lg font-bold text-ink">{{ __('framework.record.owed') }}</h2>

                        <ul role="list" class="list-disc space-y-2 ps-5 text-sm text-ink">
                            @foreach ($run['owed'] as $line)
                                <li>{{ $line }}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-layouts.shell>
