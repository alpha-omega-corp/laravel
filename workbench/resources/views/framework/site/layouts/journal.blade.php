{{-- journal: a lead photograph, the story in one narrow column, broken once by a band of pictures, closing on a colophon. The frames are the worker's stub's, class for class. --}}
<header class="wrap pt-4">
    {!! $regions['nav'] ?? '' !!}
</header>

<main id="main" tabindex="-1" class="outline-none">
    <section class="py-16 sm:py-24 [&:not(:has(>.wrap>*))]:hidden [&_h1]:text-display">
        <div class="wrap">
            {!! $regions['hero'] ?? '' !!}
        </div>
    </section>

    <div class="wrap max-w-3xl space-y-20 py-16 [&:not(:has(>*))]:hidden">
        {!! $regions['story'] ?? '' !!}
    </div>

    <section class="bg-canvas-alt py-16 sm:py-24 [&:not(:has(>.wrap>*))]:hidden">
        <div class="wrap">
            {!! $regions['gallery'] ?? '' !!}
        </div>
    </section>

    <div class="wrap max-w-3xl space-y-20 py-16 [&:not(:has(>*))]:hidden">
        {!! $regions['main'] ?? '' !!}
    </div>
</main>

<footer class="border-t border-rule">
    <div class="wrap py-12">
        {!! $regions['footer'] ?? '' !!}
    </div>
</footer>
