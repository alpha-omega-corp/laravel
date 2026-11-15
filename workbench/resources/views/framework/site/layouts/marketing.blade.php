{{-- marketing: a bar, a full-width opening, the sections one under another, a band and the footer. The frames are the worker's stub's, class for class, so a direction draws here what it draws on a site. --}}
<header class="wrap pt-4">
    {!! $regions['nav'] ?? '' !!}
</header>

<main id="main" tabindex="-1" class="outline-none">
    <section class="py-16 sm:py-24 [&:not(:has(>.wrap>*))]:hidden [&_h1]:text-display [&_h2]:text-display">
        <div class="wrap">
            {!! $regions['hero'] ?? '' !!}
        </div>
    </section>

    <div class="wrap space-y-24 py-16 [&:not(:has(>*))]:hidden">
        {!! $regions['main'] ?? '' !!}
    </div>

    <section class="bg-canvas-alt py-16 sm:py-24 [&:not(:has(>.wrap>*))]:hidden">
        <div class="wrap">
            {!! $regions['band'] ?? '' !!}
        </div>
    </section>
</main>

<footer class="border-t border-rule">
    <div class="wrap py-12">
        {!! $regions['footer'] ?? '' !!}
    </div>
</footer>
