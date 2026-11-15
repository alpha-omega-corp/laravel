{{-- poster: the whole business on one screen, the hours and the way in along its foot, the rest quietly below. The frames are the worker's stub's, class for class. --}}
<header class="wrap pt-4">
    {!! $regions['nav'] ?? '' !!}
</header>

<main id="main" tabindex="-1" class="outline-none">
    <section class="grid min-h-[calc(100svh-5rem)] content-between gap-10 py-16 [&:not(:has(>div>*))]:hidden">
        <div class="wrap self-center">
            {!! $regions['hero'] ?? '' !!}
        </div>

        <div class="mx-auto grid w-full max-w-(--container-wrap) gap-8 [--gap:2rem] border-t border-rule px-5 pt-8 md:grid-cols-2 md:[--cols:2] md:px-10 [&:not(:has(>*))]:hidden">
            {!! $regions['facts'] ?? '' !!}
        </div>
    </section>

    <div class="wrap space-y-24 py-16 [&:not(:has(>*))]:hidden">
        {!! $regions['main'] ?? '' !!}
    </div>
</main>

<footer class="border-t border-rule">
    <div class="wrap py-12">
        {!! $regions['footer'] ?? '' !!}
    </div>
</footer>
