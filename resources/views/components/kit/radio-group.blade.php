@props([
    'name' => '',
    'legend' => null,
    'options' => [],
    'selected' => null,
    'cards' => false,
])

@php
    /**
     * The radio group, re-themed from the kit's forms/radio-groups group.
     *
     * `cards` is the kit's "list with description" copy: the same radios, each in
     * a panel that is the whole label rather than a dot beside one.
     *
     * @var array<int, array{value: string, label: string, hint?: string}> $options
     */
    $ref = '<x-kit.radio-group'.($cards ? ' cards' : '').' />';
@endphp

<fieldset data-ref="{{ $ref }}" {{ $attributes->class(['space-y-2']) }}>
    @if ($legend)
        <legend class="text-sm font-medium text-ink">{{ $legend }}</legend>
    @endif

    @foreach ($options as $option)
        @php $id = $name.'-'.$option['value']; @endphp

        <div @class([
            'flex gap-3',
            'rounded-panel border p-3' => $cards,
            'border-accent bg-canvas-alt' => $cards && (string) $option['value'] === (string) $selected,
            'border-rule' => $cards && (string) $option['value'] !== (string) $selected,
        ])>
            <input type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $option['value'] }}"
                   @checked((string) $option['value'] === (string) $selected)
                   class="mt-0.5 size-4 shrink-0 border-rule accent-accent" />

            <div class="min-w-0">
                <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $option['label'] }}</label>

                @if (! empty($option['hint']))
                    <p class="text-xs text-ink-soft">{{ $option['hint'] }}</p>
                @endif
            </div>
        </div>
    @endforeach
</fieldset>
