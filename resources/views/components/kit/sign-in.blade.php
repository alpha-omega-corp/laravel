@props([
    'title' => '',
    'action' => '#',
    'panel' => true,
])

@php
    /**
     * The sign-in form, re-themed from the kit's forms/sign-in-forms group.
     * `panel` is the kit's card copy; without it the fields sit on the page.
     */
    $ref = '<x-kit.sign-in'.($panel ? '' : ' :panel="false"').' />';
@endphp

<div data-ref="{{ $ref }}" {{ $attributes->class(['mx-auto w-full max-w-sm']) }}>
    <h2 class="text-center font-display text-xl font-bold text-ink">{{ $title }}</h2>

    <form action="{{ $action }}" method="post" @class(['mt-6 space-y-4', 'panel p-6' => $panel])>
        {{ $slot }}
    </form>
</div>
