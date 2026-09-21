<?php

declare(strict_types=1);

/**
 * The application stores nothing, so it must run with no database at all.
 * These tests fail the moment something starts needing one.
 */
beforeEach(function () {
    config([
        'session.driver' => 'file',
        'cache.default' => 'file',
        'queue.default' => 'sync',
        'database.default' => 'unreachable',
        'database.connections.unreachable' => [
            'driver' => 'pgsql',
            'host' => '127.0.0.1',
            'port' => 1,
            'database' => 'unreachable',
            'username' => 'unreachable',
            'password' => 'unreachable',
        ],
    ]);
});

it('serves every page with no database reachable', function (string $url) {
    $this->get($url)->assertOk();
})->with([
    'home' => fn () => route('home'),
    'ui kit' => fn () => route('ui-kit'),
    'layouts' => fn () => route('layouts'),
    'health' => '/up',
]);

it('keeps a session across requests without one', function () {
    $this->get(route('home'))->assertOk();
    $this->get(route('ui-kit'))->assertOk()->assertSessionHasNoErrors();
});

it('ships an environment file that needs no database', function () {
    $env = (string) file_get_contents(base_path('.env.example'));

    expect($env)->toContain('SESSION_DRIVER=file')
        ->and($env)->toContain('CACHE_STORE=file')
        ->and($env)->toContain('QUEUE_CONNECTION=sync');

    /** @var array<int, string> $active */
    $active = array_filter(
        explode("\n", $env),
        fn (string $line): bool => $line !== '' && ! str_starts_with(trim($line), '#'),
    );

    expect(array_filter($active, fn (string $line): bool => str_ends_with($line, '=database')))->toBe([]);
});
