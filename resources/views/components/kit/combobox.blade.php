@props([
    'name' => '',
    'label' => null,
    'options' => [],
    'placeholder' => null,
])

@php
    /**
     * The combobox, re-themed from the kit's forms/comboboxes group.
     *
     * An <input list> against a <datalist>: type to filter, or open the list.
     * The kit's own version is a popover plus a few hundred lines of script for
     * the same two behaviours, and this one falls back to a plain text field.
     *
     * @var array<int, string> $options
     */
    $id = $name !== '' ? $name : 'combobox-'.uniqid();

    $ref = '<x-kit.combobox />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['space-y-1.5']) }}>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $label }}</label>
    @endif

    <input type="text" name="{{ $name }}" id="{{ $id }}" list="{{ $id }}-options" autocomplete="off"
           @if ($placeholder) placeholder="{{ $placeholder }}" @endif
           class="block w-full rounded-control border border-rule bg-canvas px-3 py-2 text-sm text-ink placeholder:text-ink-soft focus:border-accent focus:outline-hidden" />

    <datalist id="{{ $id }}-options">
        @foreach ($options as $option)
            <option value="{{ $option }}"></option>
        @endforeach
    </datalist>
</div>
