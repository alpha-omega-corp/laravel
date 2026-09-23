@php
    /**
     * The foot of the public layouts: where the place is and how to reach it.
     *
     * It does not repeat the navigation. The bar above carries every section at
     * every width, and a second copy of the same links is the chrome a real
     * site grows by accident — two lists to keep in step, two places to look,
     * and no more ways to get anywhere.
     *
     * @var array<string, mixed> $site
     */
@endphp

<footer class="flex flex-wrap items-center justify-between gap-4 border-t border-rule pt-6 text-sm text-ink-soft">
    <p>{{ $site['brand'] }} · {{ $site['address'] }} · {{ $site['phone'] }}</p>

    <a href="mailto:{{ $site['email'] }}" class="hover:text-ink">{{ $site['email'] }}</a>
</footer>
