<?php

declare(strict_types=1);

it('names the component in the dev badge with the variant it was given', function () {
    expect(Blade::render('<x-kit.side-nav :groups="[]" />'))
        ->toContain('data-ref="&lt;x-kit.side-nav variant=&quot;plain&quot; /&gt;"');

    expect(Blade::render('<x-kit.side-nav :groups="[]" variant="brand" />'))
        ->toContain('data-ref="&lt;x-kit.side-nav variant=&quot;brand&quot; /&gt;"');
});

it('falls back to the plain variant when given one it does not have', function () {
    $html = Blade::render('<x-kit.side-nav :groups="[]" variant="dark" />');

    expect($html)->toContain('variant=&quot;plain&quot;')
        ->and($html)->toContain('bg-canvas');
});

it('draws a row with or without an icon and a count', function () {
    $html = Blade::render('<x-kit.side-nav :groups="$groups" />', ['groups' => [[
        'heading' => 'Workspace',
        'items' => [
            ['label' => 'Bare', 'href' => '#'],
            ['label' => 'Counted', 'href' => '#', 'badge' => '12'],
            ['label' => 'Iconed', 'href' => '#', 'icon' => 'M0 0h1'],
        ],
    ]]]);

    expect($html)->toContain('Workspace')
        ->and($html)->toContain('Bare')
        ->and($html)->toContain('>12<')
        ->and($html)->toContain('d="M0 0h1"')
        ->and(substr_count($html, '<svg'))->toBe(1);
});

it('marks the row whose href is the url being served', function () {
    $html = Blade::render('<x-kit.side-nav :groups="$groups" />', ['groups' => [[
        'items' => [
            ['label' => 'Here', 'href' => url('/')],
            ['label' => 'Elsewhere', 'href' => url('/somewhere')],
        ],
    ]]]);

    expect(substr_count($html, 'aria-current="page"'))->toBe(1);
});

it('takes a row at its word when it is given one', function () {
    $html = Blade::render('<x-kit.side-nav :groups="$groups" />', ['groups' => [[
        'items' => [
            ['label' => 'Told', 'href' => '#a', 'current' => true],
            ['label' => 'Not told', 'href' => '#b'],
        ],
    ]]]);

    expect(substr_count($html, 'aria-current="page"'))->toBe(1);
});
