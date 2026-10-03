@props([
    'title' => null,
    'members' => null,
    'variant' => null,
])

@php
    /**
     * The people a visitor will meet: a photo, a name, a role and a line about
     * each. A prefab — a salon's stylists, a practice's therapists and a
     * studio's coaches are shown the same way.
     *
     * A member with no photo keeps the photo's frame, so a row of cards stays a
     * row; a portrait is never invented for somebody real.
     *
     * **Explicit props win, then what the site binds as `kit.team`**, keyed by
     * these same names, taken as a set and only when the tag gives no
     * `members`. With no members from either it renders nothing.
     *
     * @var array<int, array{name: string, role?: string, bio?: string, image?: string}> $members
     */
    if ($members === null) {
        $bound = app()->bound('kit.team') ? app('kit.team') : [];
        $members = $bound['members'] ?? [];
        $title ??= $bound['title'] ?? null;
    }

    // Its arrangement, when the tag chooses one of its own: kit.css draws it
    // over the direction's, and any other word is the direction's own drawing.
    $variant = in_array($variant, ['list'], true) ? $variant : null;

    $ref = '<x-kit.team />';
@endphp

@if (filled($members))
    <section data-ref="{{ $ref }}" data-kit="team" @if ($variant) data-variant="{{ $variant }}" @endif {{ $attributes->class(['space-y-6']) }}>
        @if ($title)
            <h2 data-kit-part="team-title" class="font-display text-title text-ink">{{ $title }}</h2>
        @endif

        <ul data-kit-part="team-list" role="list" class="grid gap-6 grid-cols-[repeat(auto-fill,minmax(min(100%,13rem),1fr))]">
            @foreach ($members as $member)
                <li data-kit-part="team-member" class="panel flex flex-col overflow-hidden">
                    @if (! empty($member['image']))
                        <img data-kit-part="team-image" src="{{ $member['image'] }}" alt="{{ $member['name'] }}" loading="lazy" class="aspect-[4/5] w-full object-cover">
                    @else
                        <div data-kit-part="team-frame" aria-hidden="true" class="aspect-[4/5] w-full bg-canvas-alt"></div>
                    @endif

                    <div class="flex flex-1 flex-col gap-1 p-4">
                        <h3 data-kit-part="team-name" class="font-medium text-ink">{{ $member['name'] }}</h3>

                        @if (! empty($member['role']))
                            <p data-kit-part="team-role" class="text-sm text-ink">{{ $member['role'] }}</p>
                        @endif

                        @if (! empty($member['bio']))
                            <p data-kit-part="team-bio" class="mt-1 text-sm text-ink-soft">{{ $member['bio'] }}</p>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endif
