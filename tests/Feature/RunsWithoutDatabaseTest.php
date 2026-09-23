<?php

declare(strict_types=1);

use function Orchestra\Testbench\package_path;

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

it('serves the workbench with an environment that needs no database', function () {
    $config = (string) file_get_contents(package_path('testbench.yaml'));

    expect($config)->toContain('SESSION_DRIVER=file')
        ->and($config)->toContain('CACHE_STORE=file')
        ->and($config)->toContain('QUEUE_CONNECTION=sync')
        ->and($config)->not->toContain('=database');
});
