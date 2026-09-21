@props([
    'name' => '',
    'label' => null,
    'options' => [],
    'selected' => null,
    'hint' => null,
])

@php
    /**
     * The select, re-themed from the kit's forms/select-menus group.
     *
     * A native <select>: the kit's listbox versions need a script and a popover
     * to do what the browser already does, and they do not do it on a phone.
     *
     * @var array<string, string> $options
     */
    $id = $name !== '' ? $name : 'select-'.uniqid();

    $ref = '<x-kit.select />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['space-y-1.5']) }}>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $label }}</label>
    @endif

    <select name="{{ $name }}" id="{{ $id }}"
            @if ($hint) aria-describedby="{{ $id }}-description" @endif
            class="block w-full rounded-control border border-rule bg-canvas px-3 py-2 text-sm text-ink focus:border-accent focus:outline-hidden">
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected((string) $optionValue === (string) $selected)>{{ $optionLabel }}</option>
        @endforeach
    </select>

    @if ($hint)
        <p id="{{ $id }}-description" class="text-xs text-ink-soft">{{ $hint }}</p>
    @endif
</div>
