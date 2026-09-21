@props([
    'name' => '',
    'label' => null,
    'rows' => 4,
    'hint' => null,
    'placeholder' => null,
])

@php
    /**
     * The textarea, re-themed from the kit's forms/textareas group. Same field
     * furniture as the input, which is why the two read the same here.
     */
    $id = $name !== '' ? $name : 'textarea-'.uniqid();

    $ref = '<x-kit.textarea rows="'.$rows.'" />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['space-y-1.5']) }}>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $label }}</label>
    @endif

    <textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}"
              @if ($placeholder) placeholder="{{ $placeholder }}" @endif
              @if ($hint) aria-describedby="{{ $id }}-description" @endif
              class="block w-full rounded-control border border-rule bg-canvas px-3 py-2 text-sm text-ink placeholder:text-ink-soft focus:border-accent focus:outline-hidden">{{ $slot }}</textarea>

    @if ($hint)
        <p id="{{ $id }}-description" class="text-xs text-ink-soft">{{ $hint }}</p>
    @endif
</div>
