@props([
    'label' => '',
    'items' => [],
    'align' => 'start',
])

@php
    /**
     * The dropdown, re-themed from the kit's elements/dropdowns group.
     *
     * It is an <el-dropdown> from Tailwind Plus Elements, the same custom element
     * the application shell uses for its account menu, so opening and closing is
     * the browser's job and nothing here is bound in JavaScript.
     *
     * @var array<int, array{label: string, href?: string, divider?: bool}> $items
     */
    $align = in_array($align, ['start', 'end'], true) ? $align : 'start';

    $ref = '<x-kit.dropdown align="'.$align.'" />';
@endphp

<el-dropdown data-ref="{{ $ref }}" {{ $attributes->class(['relative inline-block']) }}>
    <button type="button" class="btn btn-secondary btn-md">
        {{ $label }}
        <svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true" class="size-4">
            <path d="m6 8 4 4 4-4" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>

    <el-menu anchor="bottom {{ $align }}" popover
             class="panel panel-raised w-56 py-1 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-150 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
        @foreach ($items as $item)
            @if ($item['divider'] ?? false)
                <div role="separator" class="my-1 border-t border-rule"></div>
            @endif

            <a href="{{ $item['href'] ?? '#' }}"
               class="block px-4 py-2 text-sm text-ink-soft focus:bg-canvas-alt focus:text-ink focus:outline-hidden hover:bg-canvas-alt hover:text-ink">{{ $item['label'] }}</a>
        @endforeach
    </el-menu>
</el-dropdown>
