@props([
    'name' => '',
    'label' => '',
    'hint' => null,
    'checked' => false,
    'disabled' => false,
])

@php
    /**
     * The checkbox, re-themed from the kit's forms/checkboxes group.
     *
     * accent-color is what paints the native control, so the box is the browser's
     * and the colour is still the palette's — no drawn square, no script.
     */
    $id = $name !== '' ? $name : 'checkbox-'.uniqid();

    $ref = '<x-kit.checkbox />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['flex gap-3']) }}>
    <input type="checkbox" name="{{ $name }}" id="{{ $id }}" @checked($checked) @disabled($disabled)
           @if ($hint) aria-describedby="{{ $id }}-description" @endif
           class="mt-0.5 size-4 shrink-0 rounded-control border-rule accent-accent disabled:opacity-55" />

    <div class="min-w-0">
        <label for="{{ $id }}" @class(['block text-sm font-medium', 'text-ink' => ! $disabled, 'text-ink-soft' => $disabled])>{{ $label }}</label>

        @if ($hint)
            <p id="{{ $id }}-description" class="text-xs text-ink-soft">{{ $hint }}</p>
        @endif
    </div>
</div>
