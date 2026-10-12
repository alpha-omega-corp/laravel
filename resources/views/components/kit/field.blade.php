@props([
    'name' => '',
    'label' => '',
    'type' => 'text',
    'options' => null,
    'value' => null,
    'hint' => null,
    'choose' => null,
    'rows' => 4,
])

@php
    /**
     * **The one field every form of a site is drawn with**, in three kinds: a line (an <input>
     * of one of the `$lines` types), a long text (`type="long"`, a <textarea>) and a choice
     * (`options`, a native <select> — the browser's list works on a phone with no script). A
     * page writes it as `@field(...)`, the worker's directive; a kit component as this tag.
     *
     * **Strict, because a form drawn three ways on three pages is the thing it ends**: no
     * field without a name and a label, no input type outside the three kinds (a checkbox, a
     * file or a radio is a form this kit has not drawn yet), no options on anything but a
     * choice. Each is refused while the page is built, never drawn half right.
     *
     * Its error is the one `$errors` holds for its name (`fields[title]` reads
     * `fields.title`), its value what was typed before the form came back — never a
     * password. Every attribute but `class`, `style` and `data-kit-part` is the control's;
     * those three place the field in its form. `data-field` on the control is how
     * check_site tells a field drawn here from one written by hand.
     *
     * @var array<array-key, string>|null $options
     */
    $lines = ['text', 'email', 'tel', 'url', 'number', 'date', 'time', 'datetime-local', 'password', 'search'];
    $kind = $options !== null ? 'choice' : ($type === 'long' ? 'long' : 'line');

    if (trim($name) === '' || trim($label) === '') {
        throw new InvalidArgumentException('A field needs a name and a label: @field(\'email\', label: __(\'E-mail\')).');
    }

    if ($options !== null && $type !== 'text') {
        throw new InvalidArgumentException("The field [{$name}] has options and the type [{$type}]: a choice takes its options and no type.");
    }

    if ($kind === 'choice' && $options === []) {
        throw new InvalidArgumentException("The field [{$name}] is a choice with nothing to choose: leave the field out until there is.");
    }

    if ($kind === 'line' && ! in_array($type, $lines, true)) {
        throw new InvalidArgumentException("The field [{$name}] has the type [{$type}], which is none of the three kinds: a line ("
            .implode(', ', $lines).'), "long" for a long text, or options for a choice.');
    }

    $key = str_replace(['[', ']'], ['.', ''], $name);
    $id = $attributes->get('id') ?: 'field-'.str_replace('.', '-', $key);
    $error = isset($errors) ? ($errors->first($key) ?: null) : null;
    $current = $type === 'password' ? null : old($key, $value);
    $described = trim(($hint ? $id.'-hint ' : '').($error ? $id.'-error' : '')) ?: null;
    // A list is its own values: ['Coupe', 'Couleur'] posts the word it shows.
    $choices = $kind === 'choice' ? (array_is_list($options) ? array_combine($options, $options) : $options) : [];

    $control = $attributes->except(['class', 'style', 'id', 'data-kit-part'])->merge([
        'name' => $name, 'id' => $id, 'data-field' => $kind,
        'aria-invalid' => $error ? 'true' : null, 'aria-describedby' => $described,
    ])->class([
        'block w-full rounded-control border bg-canvas px-3 py-2 text-sm text-ink placeholder:text-ink-soft focus:border-accent focus:outline-hidden',
        'border-accent' => (bool) $error,
        'border-rule' => ! $error,
    ]);
@endphp

<div data-kit="field" {{ $attributes->only(['class', 'style', 'data-kit-part'])->class(['space-y-1.5']) }}>
    <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $label }}</label>

    @if ($kind === 'long')
        <textarea rows="{{ $rows }}" {{ $control }}>{{ $current }}</textarea>
    @elseif ($kind === 'choice')
        <select {{ $control }}>
            @if ($choose !== null)
                <option value="">{{ $choose }}</option>
            @endif
            @foreach ($choices as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" @selected((string) $optionValue === (string) $current)>{{ $optionLabel }}</option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" @if ($current !== null) value="{{ $current }}" @endif {{ $control }}>
    @endif

    @if ($hint)
        <p id="{{ $id }}-hint" class="text-xs text-ink-soft">{{ $hint }}</p>
    @endif

    @if ($error)
        <p id="{{ $id }}-error" class="text-xs text-accent">{{ $error }}</p>
    @endif
</div>
