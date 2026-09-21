{{--
    marketing — no app shell at all: a bar, a stack of centred sections, a
    footer. The public face of the place.
--}}
<div class="space-y-14 bg-canvas p-4 sm:p-6">
    @include('framework.navbar')

    <div class="mx-auto max-w-4xl">
        @include($section['view'], ['data' => $section['data'], 'dense' => false])
    </div>

    @include('framework.footer')
</div>
