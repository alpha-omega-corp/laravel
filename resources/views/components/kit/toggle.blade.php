@props([
    'name' => '',
    'label' => '',
    'hint' => null,
    'checked' => false,
])

@php
    /**
     * The toggle, re-themed from the kit's forms/toggles group.
     *
     * The kit drives it with a script; here it is a checkbox with the label
     * drawing the track, so it submits with a form, works without JavaScript and
     * keeps the keyboard behaviour the browser already gives a checkbox.
     */
    $id = $name !== '' ? $name : 'toggle-'.uniqid();

    $ref = '<x-kit.toggle />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['flex items-start gap-3']) }}>
    <input type="checkbox" role="switch" name="{{ $name }}" id="{{ $id }}" @checked($checked)
           @if ($hint) aria-describedby="{{ $id }}-description" @endif
           class="peer sr-only" />

    {{--
        The knob is a child of the label, not a sibling of the checkbox, so it
        cannot carry peer-checked: itself. The label does, and reaches in.
    --}}
    <label for="{{ $id }}"
           class="mt-0.5 inline-flex h-6 w-11 shrink-0 cursor-pointer items-center rounded-full border border-rule bg-canvas-alt p-0.5 transition-colors peer-checked:border-accent peer-checked:bg-accent peer-checked:[&>span]:translate-x-5 peer-checked:[&>span]:bg-on-accent peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-accent">
        <span aria-hidden="true" class="size-4 rounded-full bg-ink-soft transition-transform"></span>
    </label>

    <div class="min-w-0">
        <label for="{{ $id }}" class="block cursor-pointer text-sm font-medium text-ink">{{ $label }}</label>

        @if ($hint)
            <p id="{{ $id }}-description" class="text-xs text-ink-soft">{{ $hint }}</p>
        @endif
    </div>
</div>
