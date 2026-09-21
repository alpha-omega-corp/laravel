@props([
    'columns' => [],
    'rows' => [],
    'title' => null,
    'description' => null,
    'actions' => null,
])

@php
    /**
     * The table, re-themed from the kit's lists/tables group.
     *
     * @var array<int, string> $columns
     * @var array<int, array<int, string>> $rows
     */
    $ref = '<x-kit.table />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['panel overflow-hidden']) }}>
    @if ($title || $actions)
        <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-6">
            <div class="min-w-0">
                @if ($title)
                    <h3 class="text-base font-semibold text-ink">{{ $title }}</h3>
                @endif

                @if ($description)
                    <p class="mt-1 text-sm text-ink-soft">{{ $description }}</p>
                @endif
            </div>

            @if ($actions)
                <div class="shrink-0">{{ $actions }}</div>
            @endif
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-rule border-t border-rule text-sm">
            <thead class="bg-canvas-alt">
                <tr>
                    @foreach ($columns as $column)
                        <th scope="col" class="px-4 py-3 text-left font-semibold whitespace-nowrap text-ink sm:px-6">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody class="divide-y divide-rule">
                @foreach ($rows as $row)
                    <tr class="hover:bg-canvas-alt">
                        @foreach ($row as $index => $cell)
                            <td @class(['px-4 py-3 whitespace-nowrap sm:px-6', 'font-medium text-ink' => $index === 0, 'text-ink-soft' => $index !== 0])>{{ $cell }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
