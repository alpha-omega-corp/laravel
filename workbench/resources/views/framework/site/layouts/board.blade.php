{{-- board: a short opening, then a board of tiles, the first one large. The frames are the worker's stub's, class for class. --}}
<header class="wrap pt-4">
    {!! $regions['nav'] ?? '' !!}
</header>

<main id="main" tabindex="-1" class="outline-none">
    <section class="py-12 sm:py-16 [&:not(:has(>.wrap>*))]:hidden">
        <div class="wrap">
            {!! $regions['hero'] ?? '' !!}
        </div>
    </section>

    <div class="wrap pb-16 [&:not(:has(>div>*))]:hidden">
        <div class="grid gap-6 [--gap:1.5rem] sm:grid-cols-2 sm:[--cols:2] lg:grid-cols-3 lg:[--cols:3] lg:[&>:first-child]:col-span-2 lg:[&>:first-child]:row-span-2 [&>*]:min-w-0">
            {!! $regions['main'] ?? '' !!}
        </div>
    </div>
</main>

<footer class="border-t border-rule">
    <div class="wrap py-12">
        {!! $regions['footer'] ?? '' !!}
    </div>
</footer>
