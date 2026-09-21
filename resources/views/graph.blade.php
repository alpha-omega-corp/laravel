@php
    use App\Support\DesignGraph;

    /*
     * The application drawn as one graph.
     *
     * Three columns and no force simulation: the layouts are the spine, the
     * components they put on the page hang to the left, and what they dress —
     * projects, palettes, degrees — hangs to the right. Every edge therefore
     * runs between neighbouring columns and none of them cross a column, which
     * is what makes a hundred and nineteen edges readable without any
     * interaction at all.
     *
     * The positions are computed here rather than stored, so adding a case to
     * any of the five enums redraws the page and nothing needs adjusting.
     *
     * Each node is a link: {@see DesignGraph} gives every one of them the route
     * that shows it — a component its section of the UI kit, everything else
     * the framework tab with that axis already chosen.
     */
    $nodes = DesignGraph::nodes();
    $edges = DesignGraph::edges();

    $components = $nodes[DesignGraph::COMPONENT];
    $layouts = $nodes[DesignGraph::LAYOUT];

    /** Column geometry, in the SVG's own user units. */
    $spineX = 520;
    $spineHalf = 68;
    $leftX = 300;
    $rightX = 700;
    $pad = 28;

    $step = 22;
    $spineStep = 96;
    $rightStep = 26;
    $gap = 46;

    /* The right column is three groups in one strip, with a gap between them. */
    $groups = [DesignGraph::PROJECT, DesignGraph::PALETTE, DesignGraph::DEGREE];

    /*
     * The tallest column decides the height. Taking it from the components
     * alone would centre the other two inside a box that may be shorter than
     * they are, and the overflow would simply be clipped — so each column is
     * measured and the drawing grows to the largest of them.
     */
    $rightSpan = (array_sum(array_map(fn (string $kind): int => count($nodes[$kind]), $groups)) - 1) * $rightStep
        + (count($groups) - 1) * ($gap - $rightStep);

    $height = $pad * 2 + max(
        (count($components) - 1) * $step,
        (count($layouts) - 1) * $spineStep,
        $rightSpan,
    );
    $middle = $height / 2;

    $at = [];

    $leftTop = $middle - (count($components) - 1) * $step / 2;

    foreach ($components as $index => $node) {
        $at[$node['id']] = ['x' => $leftX, 'y' => $leftTop + $index * $step];
    }

    $spineTop = $middle - (count($layouts) - 1) * $spineStep / 2;

    foreach ($layouts as $index => $node) {
        $at[$node['id']] = ['x' => $spineX, 'y' => $spineTop + $index * $spineStep];
    }

    $stacked = [];
    $cursor = 0;

    foreach ($groups as $index => $kind) {
        if ($index > 0) {
            $cursor += $gap - $rightStep;
        }

        $stacked[$kind] = $cursor;

        foreach ($nodes[$kind] as $node) {
            $at[$node['id']] = ['x' => $rightX, 'y' => $cursor];
            $cursor += $rightStep;
        }

        $cursor -= $rightStep;
    }

    $offset = $middle - $cursor / 2;

    foreach ($at as $id => $point) {
        if ($point['x'] === $rightX) {
            $at[$id]['y'] += $offset;
        }
    }

    /**
     * One edge, as a curve leaving the spine's edge and arriving beside the dot
     * it joins. Every edge starts at a layout, so the direction is decided by
     * which side of the spine the other end is on.
     */
    $curve = function (array $edge) use ($at, $spineHalf): string {
        $from = $at[$edge['from']];
        $to = $at[$edge['to']];

        $leftwards = $to['x'] < $from['x'];

        $x1 = $leftwards ? $from['x'] - $spineHalf : $from['x'] + $spineHalf;
        $x2 = $leftwards ? $to['x'] + 7 : $to['x'] - 7;
        $mid = ($x1 + $x2) / 2;

        return sprintf('M %.1f %.1f C %.1f %.1f, %.1f %.1f, %.1f %.1f',
            $x1, $from['y'], $mid, $from['y'], $mid, $to['y'], $x2, $to['y']);
    };

    /** The dot colour per kind — the palette's three semantic fills, nothing invented. */
    $fill = [
        DesignGraph::COMPONENT => 'fill-ink-soft',
        DesignGraph::PROJECT => 'fill-accent',
        DesignGraph::PALETTE => 'fill-ink',
        DesignGraph::DEGREE => 'fill-ink-soft',
    ];
@endphp

<x-layouts.shell :title="__('graph.title')" :description="__('graph.intro')">
    <div class="space-y-6">
        <p class="max-w-prose text-ink-soft">{{ __('graph.intro') }}</p>

        <div class="flex flex-wrap items-center gap-2">
            <span class="text-xs font-semibold tracking-wide text-ink-soft uppercase">{{ __('graph.legend') }}</span>

            @foreach (DesignGraph::kinds() as $kind)
                <x-kit.badge tone="outline">{{ __('graph.kind.'.$kind) }} · {{ count($nodes[$kind]) }}</x-kit.badge>
            @endforeach

            <x-kit.badge tone="neutral">{{ count($edges) }} ↔</x-kit.badge>
        </div>

        {{-- The graph scrolls sideways rather than shrinking its type on a phone. --}}
        <div class="panel overflow-x-auto p-4">
            <svg viewBox="150 0 680 {{ $height }}" class="h-auto w-full min-w-[44rem] font-body">
                <title>{{ __('graph.title') }}</title>

                {{-- stroke-rule at half opacity is a hairline at about 1.2:1 on the panel:
                     the relationships this page exists to show were not visible. --}}
                <g class="stroke-ink-soft" fill="none" stroke-width="1">
                    @foreach ($edges as $edge)
                        <path d="{{ $curve($edge) }}" opacity="0.3" />
                    @endforeach
                </g>

                @foreach ($components as $node)
                    <a href="{{ $node['href'] }}" class="group">
                        <title>{{ $node['label'] }} · {{ $node['group'] }}</title>

                        <circle cx="{{ $at[$node['id']]['x'] }}" cy="{{ $at[$node['id']]['y'] }}" r="3.5"
                                class="{{ $fill[DesignGraph::COMPONENT] }} group-hover:fill-accent" />

                        <text x="{{ $at[$node['id']]['x'] - 12 }}" y="{{ $at[$node['id']]['y'] }}"
                              text-anchor="end" dominant-baseline="middle" font-size="11"
                              class="fill-ink-soft group-hover:fill-ink">{{ $node['label'] }}</text>
                    </a>
                @endforeach

                @foreach ($layouts as $node)
                    <a href="{{ $node['href'] }}" class="group">
                        <title>{{ $node['label'] }} · {{ __('graph.kind.layout') }}</title>

                        <rect x="{{ $spineX - $spineHalf }}" y="{{ $at[$node['id']]['y'] - 14 }}"
                              width="{{ $spineHalf * 2 }}" height="28" rx="14"
                              class="fill-accent group-hover:fill-accent-strong" />

                        <text x="{{ $spineX }}" y="{{ $at[$node['id']]['y'] }}"
                              text-anchor="middle" dominant-baseline="middle" font-size="12" font-weight="600"
                              class="fill-on-accent">{{ $node['label'] }}</text>
                    </a>
                @endforeach

                @foreach ($groups as $kind)
                    <text x="{{ $rightX + 12 }}" y="{{ $stacked[$kind] + $offset - 18 }}"
                          font-size="10" letter-spacing="0.08em"
                          class="fill-ink-soft">{{ mb_strtoupper(__('graph.kind.'.$kind)) }}</text>

                    @foreach ($nodes[$kind] as $node)
                        <a href="{{ $node['href'] }}" class="group">
                            <title>{{ $node['label'] }} · {{ __('graph.kind.'.$kind) }}</title>

                            <circle cx="{{ $at[$node['id']]['x'] }}" cy="{{ $at[$node['id']]['y'] }}" r="4"
                                    class="{{ $fill[$kind] }} group-hover:fill-accent" />

                            <text x="{{ $at[$node['id']]['x'] + 12 }}" y="{{ $at[$node['id']]['y'] }}"
                                  dominant-baseline="middle" font-size="12"
                                  class="fill-ink-soft group-hover:fill-ink">{{ $node['label'] }}</text>
                        </a>
                    @endforeach
                @endforeach
            </svg>
        </div>

        <p class="max-w-prose text-sm text-ink-soft">{{ __('graph.note') }}</p>
    </div>
</x-layouts.shell>
