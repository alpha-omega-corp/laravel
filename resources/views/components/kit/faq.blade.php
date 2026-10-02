@props([
    'title' => null,
    'entries' => null,
])

@php
    /**
     * The questions people phone to ask — parking, allergies, gift cards, the
     * delivery area — each with its answer. A prefab: nearly every business
     * that answers a telephone answers the same five questions on it.
     *
     * Each entry is a native `<details>`, so the questions read as a list and
     * an answer opens with no script. The answer keeps the owner's line breaks
     * and nothing else: it is text, escaped, never markup.
     *
     * **Explicit props win, then what the site binds as `kit.faq`**, keyed by
     * these same names, taken as a set and only when the tag gives no
     * `entries`. With no entries from either it renders nothing.
     *
     * @var array<int, array{question: string, answer: string}> $entries
     */
    if ($entries === null) {
        $bound = app()->bound('kit.faq') ? app('kit.faq') : [];
        $entries = $bound['entries'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    $ref = '<x-kit.faq />';
@endphp

@if (filled($entries))
    <section data-ref="{{ $ref }}" data-kit="faq" {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="faq-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <div data-kit-part="faq-list" class="divide-y divide-rule border-y border-rule">
            @foreach ($entries as $entry)
                <details data-kit-part="faq-entry" class="py-4">
                    <summary data-kit-part="faq-question" class="cursor-pointer font-medium text-ink marker:text-ink-soft">{{ $entry['question'] }}</summary>

                    @if (filled($entry['answer'] ?? null))
                        <p data-kit-part="faq-answer" class="mt-3 max-w-prose whitespace-pre-line text-sm text-ink-soft">{{ $entry['answer'] }}</p>
                    @endif
                </details>
            @endforeach
        </div>
    </section>
@endif
