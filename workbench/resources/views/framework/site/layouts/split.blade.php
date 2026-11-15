{{-- split: the opening in two halves, what the business is and when and where, then its sections; the footer is the close. The frames are the worker's stub's, class for class. --}}
<header class="wrap pt-4">
    {!! $regions['nav'] ?? '' !!}
</header>

<main id="main" tabindex="-1" class="outline-none">
    <div class="py-12 sm:py-16 [&:not(:has(>div>*>*))]:hidden">
        <div class="wrap grid items-center gap-10 lg:[&:has(>aside>*)]:grid-cols-[minmax(0,7fr)_minmax(0,5fr)]">
            <div class="min-w-0 [&:not(:has(>*))]:hidden">
                {!! $regions['hero'] ?? '' !!}
            </div>

            <aside class="min-w-0 space-y-6 [&:not(:has(>*))]:hidden">
                {!! $regions['visit'] ?? '' !!}
            </aside>
        </div>
    </div>

    <div class="wrap space-y-24 py-16 [&:not(:has(>*))]:hidden">
        {!! $regions['main'] ?? '' !!}
    </div>
</main>

<footer class="border-t border-rule">
    <div class="wrap py-12">
        {!! $regions['footer'] ?? '' !!}
    </div>
</footer>
