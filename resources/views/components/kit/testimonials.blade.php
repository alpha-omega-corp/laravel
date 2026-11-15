@props([
    'title' => null,
    'testimonials' => null,
    'variant' => null,
])

@php
    /**
     * What customers said, in their words and under their name: a quotation,
     * who said it and what they are to the business — a client, a member, a
     * family who stayed. A prefab: a builder, a school, a guide and a studio
     * are all chosen on somebody else's word.
     *
     * **A quotation is somebody's, or it is not printed.** Each one carries
     * the `name` of who said it; `role` says who they are ("Maître d'ouvrage,
     * Renens"), `image` is their portrait and is never a stand-in. One with no
     * name is left out rather than signed "a customer": an unsigned line of
     * praise is the business praising itself, and reads that way.
     *
     * **Explicit props win, then what the site binds as `kit.testimonials`**,
     * keyed by these same names, taken as a set and only when the tag gives no
     * `testimonials`. With none from either it renders nothing — and a session
     * building a page never writes one on the tag: the owner enters what was
     * really said.
     *
     * @var array<int, array{quote: string, name: string, role?: string, image?: string}> $testimonials
     */
    if ($testimonials === null) {
        $bound = app()->bound('kit.testimonials') ? app('kit.testimonials') : [];
        $testimonials = $bound['testimonials'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Unsigned praise is never printed.
    $testimonials = array_values(array_filter((array) $testimonials, fn ($said): bool => filled($said['quote'] ?? null) && filled($said['name'] ?? null)));

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['lead', 'wall'], true) ? $variant : null;

    $ref = '<x-kit.testimonials />';
@endphp

@if (filled($testimonials))
    <section data-ref="{{ $ref }}" data-kit="testimonials" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="testimonials-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ul data-kit-part="testimonials-list" role="list" class="grid gap-5 grid-cols-[repeat(auto-fit,minmax(min(100%,18rem),1fr))]">
            @foreach ($testimonials as $said)
                <li data-kit-part="testimonials-item" class="panel p-6">
                    <figure class="flex h-full flex-col gap-5">
                        <blockquote data-kit-part="testimonials-quote" class="text-lg text-ink">
                            <p>{{ $said['quote'] }}</p>
                        </blockquote>

                        <figcaption data-kit-part="testimonials-author" class="mt-auto flex items-center gap-3">
                            @if (! empty($said['image']))
                                <img data-kit-part="testimonials-image" src="{{ $said['image'] }}" alt="" loading="lazy" class="size-11 shrink-0 rounded-full bg-canvas-alt object-cover">
                            @endif

                            <div class="min-w-0">
                                <p data-kit-part="testimonials-name" class="font-medium text-ink">{{ $said['name'] }}</p>

                                @if (! empty($said['role']))
                                    <p data-kit-part="testimonials-role" class="text-sm text-ink-soft">{{ $said['role'] }}</p>
                                @endif
                            </div>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        </ul>
    </section>
@endif
