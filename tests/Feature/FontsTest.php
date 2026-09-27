<?php

declare(strict_types=1);

use Workbench\App\Enums\Theme;

use function Orchestra\Testbench\package_path;

/*
 * resources/css/fonts.json is what a site's vite.config.js loads and what
 * deployer's preview reads; themes.css is what the page is set in. The two name
 * the same faces or a site loads one family and renders in another.
 */

/**
 * @return array<string, array{display: array{family: string, weights: list<int>}, body: array{family: string, weights: list<int>}}>
 */
function paletteFonts(): array
{
    return json_decode(file_get_contents(package_path('resources/css/fonts.json')), true, flags: JSON_THROW_ON_ERROR);
}

/**
 * A stylesheet with its comments taken out, since they quote the rules.
 */
function fontRules(string $path): string
{
    return preg_replace('#/\*.*?\*/#s', '', file_get_contents(package_path($path)));
}

/**
 * The variable laravel-vite-plugin's bunny() defines for a family, by its own
 * rule: `Source Sans 3` is `--font-source-sans-3`.
 */
function fontVariable(string $family): string
{
    return '--font-'.trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($family)), '-');
}

function paletteBlock(string $css, string $palette): string
{
    $start = strpos($css, "[data-palette='{$palette}']");

    return substr($css, $start, strpos($css, "\n}", $start) - $start);
}

it('names both faces of every palette, and of nothing else', function () {
    $fonts = paletteFonts();

    expect(array_keys($fonts))->toBe(array_column(Theme::cases(), 'value'));

    foreach ($fonts as $faces) {
        expect(array_keys($faces))->toBe(['display', 'body']);

        foreach ($faces as $face) {
            expect($face['family'])->toBeString()->not->toBeEmpty()
                ->and($face['weights'])->not->toBeEmpty()->each->toBeInt();
        }
    }
});

it('sets each palette in the faces the map loads, naming the family as the fallback', function (string $palette) {
    $faces = paletteFonts()[$palette];
    $block = paletteBlock(fontRules('resources/css/themes.css'), $palette);

    foreach ($faces as $role => $face) {
        expect($block)->toContain("--font-{$role}: var(".fontVariable($face['family']).", '{$face['family']}'),");
    }

    // A site preloads each face's first weight, so that is what a first paint
    // draws: the heading at the palette's --display-weight, the text at 400.
    preg_match('/--display-weight:\s*(\d+);/', $block, $weight);

    expect($faces['display']['weights'][0])->toBe((int) $weight[1])
        ->and($faces['body']['weights'][0])->toBe(400);
})->with(array_column(Theme::cases(), 'value'));

it('gives the default in kit.css the same faces as orchard', function () {
    $orchard = paletteFonts()['orchard'];
    $kit = fontRules('resources/css/kit.css');

    foreach ($orchard as $role => $face) {
        expect($kit)->toContain("--font-{$role}: var(".fontVariable($face['family']).", '{$face['family']}'),");
    }
});

it('never reads a face without a fallback, which would drop the whole declaration', function (string $path) {
    expect(fontRules($path))->not->toMatch('/var\(--font-(?!display\)|body\))[a-z0-9-]+\)/');
})->with(['resources/css/themes.css', 'resources/css/kit.css']);
