{{-- carte: no hero; the page opens on what is offered, the hours and the way in held beside it. The frames are the worker's stub's, class for class. --}}
<header class="wrap pt-4">
    {!! $regions['nav'] ?? '' !!}
</header>

<main id="main" tabindex="-1" class="outline-none">
    <div class="wrap pt-12 sm:pt-16 [&:not(:has(>*))]:hidden">
        {!! $regions['lead'] ?? '' !!}
    </div>

    <div class="py-12 sm:py-16 [&:not(:has(>div>*>*))]:hidden">
        <div class="wrap grid items-start gap-12 lg:[&:has(>aside>*)]:grid-cols-[minmax(0,1fr)_22rem]">
            <div class="min-w-0 space-y-16 [&:not(:has(>*))]:hidden">
                {!! $regions['offer'] ?? '' !!}
            </div>

            <aside class="min-w-0 space-y-6 lg:sticky lg:top-36 [&:not(:has(>*))]:hidden">
                {!! $regions['visit'] ?? '' !!}
            </aside>
        </div>
    </div>

    <div class="wrap space-y-24 pb-16 [&:not(:has(>*))]:hidden">
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
