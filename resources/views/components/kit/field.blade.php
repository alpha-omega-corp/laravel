@props([
    'name' => '',
    'label' => '',
    'type' => 'text',
    'options' => null,
    'value' => null,
    'hint' => null,
    'choose' => null,
    'rows' => 4,
    'describedby' => null,
    'icon' => null,
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
     * password. `describedby` names text outside it that describes it too — one hint two
     * fields share — read before its own hint and error. Every attribute but `class`,
     * `style` and `data-kit-part` is the control's; those three place the field in its
     * form. `data-field` on the control is how check_site tells a field drawn here from
     * one written by hand.
     *
     * **Three input styles, one markup**: the site picks one with `<html data-inputs>` —
     * absent or `default` the label over the box, `floating` the label inside the box
     * rising out of the way as it is typed in, `icon` an icon at the box's left. The
     * markup is the same in all three (the label, the control, the icon, the hint, the
     * error, in that order, so a direction's `> :nth-child(2)` is still the control) and
     * kit.css draws the difference. That is why a line or a long text always has a
     * placeholder, if only a space: `:placeholder-shown` is how the floating label knows
     * the box is empty. The icon is `icon` when given, else what the type, the
     * autocomplete or the name says the field is for.
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
    $described = implode(' ', array_filter([$describedby, $hint ? $id.'-hint' : null, $error ? $id.'-error' : null])) ?: null;
    // A list is its own values: ['Coupe', 'Couleur'] posts the word it shows.
    $choices = $kind === 'choice' ? (array_is_list($options) ? array_combine($options, $options) : $options) : [];

    $autocomplete = (string) $attributes->get('autocomplete', '');
    $icon ??= match (true) {
        $kind === 'long' => 'message-square',
        $kind === 'choice' => 'list',
        $type === 'email' || str_contains($autocomplete, 'email') => 'mail',
        $type === 'tel' || str_contains($autocomplete, 'tel') => 'phone',
        $type === 'url' => 'link',
        $type === 'date', $type === 'datetime-local' => 'calendar',
        $type === 'time' => 'clock',
        $type === 'password' => 'lock',
        $type === 'search' => 'search',
        str_contains($autocomplete, 'address'), (bool) preg_match('/place|address|city|town/', $key) => 'map-pin',
        (bool) preg_match('/party|guests|people/', $key) => 'users',
        $type === 'number' => 'hash',
        str_contains($autocomplete, 'name'), (bool) preg_match('/name/', $key) => 'user',
        default => 'pen-line',
    };

    // A space when nothing else: the floating label reads an empty box off :placeholder-shown, which an empty placeholder never is.
    // Written in the tag, not the bag, which trims a value to nothing.
    $placeholder = (string) ($attributes->get('placeholder') ?: ' ');

    $control = $attributes->except(['class', 'style', 'id', 'data-kit-part', 'placeholder'])->merge([
        'name' => $name, 'id' => $id, 'data-field' => $kind,
        'aria-invalid' => $error ? 'true' : null, 'aria-describedby' => $described,
    ])->class([
        // The edge, the focus ring and the invalid state are .control's, read off aria-invalid.
        'control block w-full px-3 py-2 text-sm text-ink placeholder:text-ink-soft',
    ]);
@endphp

<div data-kit="field" {{ $attributes->only(['class', 'style', 'data-kit-part'])->class(['space-y-1.5']) }}>
    <label for="{{ $id }}" class="block text-sm font-medium text-ink">{{ $label }}</label>

    @if ($kind === 'long')
        <textarea rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $control }}>{{ $current }}</textarea>
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
        <input type="{{ $type }}" @if ($current !== null) value="{{ $current }}" @endif placeholder="{{ $placeholder }}" {{ $control }}>
    @endif

    {{-- Drawn only where <html data-inputs="icon"> asks for it; after the control, so the control stays the second child. --}}
    <x-kit.icon :name="$icon" data-kit-part="field-icon" class="size-4 shrink-0" />

    @if ($hint)
        <p id="{{ $id }}-hint" class="text-xs text-ink-soft">{{ $hint }}</p>
    @endif

    @if ($error)
        {{-- The icon beside the words, not in them: the paragraph is what aria-describedby reads out. --}}
        <div class="flex items-start gap-1.5 text-xs font-medium text-danger">
            <x-kit.icon name="circle-alert" class="mt-px size-3.5 shrink-0" />
            <p id="{{ $id }}-error">{{ $error }}</p>
        </div>
    @endif
</div>
