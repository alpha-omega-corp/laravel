@props([
    'name' => '',
    'label' => null,
    'type' => 'text',
    'hint' => null,
    'error' => null,
    'leading' => null,
    'trailing' => null,
    'value' => null,
    'placeholder' => null,
])

@php
    /**
     * The text input, re-themed from the kit's forms/input-groups group.
     *
     * The kit ships the label, the hint, the error and the leading add-on as
     * separate files; they are props here, because a field with a label is not a
     * different component from a field without one.
     */
    $id = $name !== '' ? $name : 'input-'.uniqid();
    $describedBy = ($hint || $error) ? $id.'-description' : null;

    $ref = '<x-kit.input type="'.$type.'" />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['space-y-1.5']) }}>
    @if ($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $label }}</label>
    @endif

    <div @class(['flex items-center rounded-control border bg-canvas', 'border-accent' => (bool) $error, 'border-rule focus-within:border-accent' => ! $error])>
        @if ($leading)
            <span class="pl-3 text-sm text-ink-soft">{{ $leading }}</span>
        @endif

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
               @if ($value !== null) value="{{ $value }}" @endif
               @if ($placeholder) placeholder="{{ $placeholder }}" @endif
               @if ($error) aria-invalid="true" @endif
               @if ($describedBy) aria-describedby="{{ $describedBy }}" @endif
               class="w-full bg-transparent px-3 py-2 text-sm text-ink placeholder:text-ink-soft focus:outline-hidden" />

        @if ($trailing)
            <span class="pr-3 text-sm text-ink-soft">{{ $trailing }}</span>
        @endif
    </div>

    @if ($error || $hint)
        <p id="{{ $describedBy }}" @class(['text-xs', 'text-accent' => (bool) $error, 'text-ink-soft' => ! $error])>{{ $error ?: $hint }}</p>
    @endif
</div>
