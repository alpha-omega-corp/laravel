@props([
    'title' => null,
    'description' => null,
    'skipTo' => null,
    'home' => null,
    'nav' => [],
    'user' => null,
    'userMenu' => null,
])

@php
    $skipTo ??= __('shell.skip_to');
    $home ??= url('/');

    /** @var array<int, array{label: string, href: string, current?: bool}> $items */
    $items = $nav ?: [
        ['label' => __('shell.nav.dashboard'), 'href' => '#'],
        ['label' => __('shell.nav.clients'), 'href' => '#'],
        ['label' => __('shell.nav.sites'), 'href' => '#'],
        ['label' => __('shell.nav.invoices'), 'href' => '#'],
    ];

    $items = array_map(fn (array $item): array => $item + [
        'current' => isset($item['href']) && $item['href'] !== '#' && request()->fullUrlIs($item['href']),
    ], $items);

    /** @var array<int, array{label: string, href: string}> $accountLinks */
    $accountLinks = $userMenu ?: [
        ['label' => __('shell.account.profile'), 'href' => '#'],
        ['label' => __('shell.account.settings'), 'href' => '#'],
        ['label' => __('shell.account.sign_out'), 'href' => '#'],
    ];

    $initials = $user
        ? mb_strtoupper(mb_substr((string) ($user['name'] ?? '?'), 0, 1))
        : null;
@endphp

<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fcfcfa">

    <title>{{ $title }}</title>
    @if ($description)
        <meta name="description" content="{{ $description }}">
    @endif

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    @fonts(['space-grotesk', 'ibm-plex-sans'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-canvas-alt font-body text-ink">
    <a class="skip" href="#content">{{ $skipTo }}</a>

    <div class="min-h-full">
        <nav class="border-b border-rule bg-canvas">
            <div class="mx-auto max-w-wrap px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">
                    <div class="flex">
                        <a href="{{ $home }}" class="flex shrink-0 items-center gap-2 font-display text-lg font-bold tracking-tight">
                            <span class="grid size-8 place-items-center rounded-panel bg-accent text-on-accent">
                                <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                    <path d="M4 10.5 8 14.5 16 5.5" stroke="currentColor" stroke-width="2.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="sr-only sm:not-sr-only">{{ config('app.name') }}</span>
                        </a>

                        <div class="hidden sm:-my-px sm:ml-8 sm:flex sm:space-x-8">
                            @foreach ($items as $item)
                                <a href="{{ $item['href'] }}"
                                   @if ($item['current']) aria-current="page" @endif
                                   @class([
                                       'inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium',
                                       'border-accent text-ink' => $item['current'],
                                       'border-transparent text-ink-soft hover:border-rule hover:text-ink' => ! $item['current'],
                                   ])>{{ $item['label'] }}</a>
                            @endforeach
                        </div>
                    </div>

                    @if ($user)
                        <div class="hidden sm:ml-6 sm:flex sm:items-center">
                            <button type="button" class="relative rounded-full p-1 text-ink-soft hover:text-ink">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">{{ __('shell.notifications') }}</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6">
                                    <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <el-dropdown class="relative ml-3">
                                <button class="relative flex max-w-xs items-center rounded-full">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">{{ __('shell.account_menu') }}</span>
                                    @if (! empty($user['avatar']))
                                        <img src="{{ $user['avatar'] }}" alt="" class="size-8 rounded-full border border-rule object-cover" />
                                    @else
                                        <span class="grid size-8 place-items-center rounded-full bg-accent font-display text-sm font-bold text-on-accent">{{ $initials }}</span>
                                    @endif
                                </button>

                                <el-menu anchor="bottom end" popover class="panel w-48 origin-top-right py-1 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                                    @foreach ($accountLinks as $link)
                                        <a href="{{ $link['href'] }}" class="block px-4 py-2 text-sm text-ink-soft focus:bg-canvas-alt focus:text-ink focus:outline-hidden">{{ $link['label'] }}</a>
                                    @endforeach
                                </el-menu>
                            </el-dropdown>
                        </div>
                    @endif

                    <div class="-mr-2 flex items-center sm:hidden">
                        <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-panel p-2 text-ink-soft hover:bg-canvas-alt hover:text-ink">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">{{ __('shell.main_menu') }}</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
                <div class="space-y-1 pt-2 pb-3">
                    @foreach ($items as $item)
                        <a href="{{ $item['href'] }}"
                           @if ($item['current']) aria-current="page" @endif
                           @class([
                               'block border-l-4 py-2 pr-4 pl-3 text-base font-medium',
                               'border-accent bg-canvas-alt text-accent-strong' => $item['current'],
                               'border-transparent text-ink-soft hover:border-rule hover:bg-canvas-alt hover:text-ink' => ! $item['current'],
                           ])>{{ $item['label'] }}</a>
                    @endforeach
                </div>

                @if ($user)
                    <div class="border-t border-rule pt-4 pb-3">
                        <div class="flex items-center px-4">
                            <div class="shrink-0">
                                @if (! empty($user['avatar']))
                                    <img src="{{ $user['avatar'] }}" alt="" class="size-10 rounded-full border border-rule object-cover" />
                                @else
                                    <span class="grid size-10 place-items-center rounded-full bg-accent font-display font-bold text-on-accent">{{ $initials }}</span>
                                @endif
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-ink">{{ $user['name'] ?? '' }}</div>
                                @if (! empty($user['email']))
                                    <div class="text-sm font-medium text-ink-soft">{{ $user['email'] }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            @foreach ($accountLinks as $link)
                                <a href="{{ $link['href'] }}" class="block px-4 py-2 text-base font-medium text-ink-soft hover:bg-canvas-alt hover:text-ink">{{ $link['label'] }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </el-disclosure>
        </nav>

        <div class="py-10">
            @if ($title)
                <header>
                    <div class="mx-auto max-w-wrap px-4 sm:px-6 lg:px-8">
                        <h1 class="font-display text-3xl font-bold tracking-tight text-ink">{{ $title }}</h1>
                    </div>
                </header>
            @endif

            <main id="content">
                <div class="mx-auto max-w-wrap px-4 py-8 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>
