<?php

use Illuminate\Support\Facades\Blade;

use function Orchestra\Testbench\package_path;

/*
 * Arrangements: a prefab laid out the way its tag chooses — `variant` — over
 * the one DOM every direction styles. Every site of a direction used to draw
 * its prefabs one way; an arrangement is the site's own choice, and wins over
 * the direction's while the direction's look stays. The component accepts the
 * words kit.css draws, kit.css draws every word a component accepts, and the
 * rules keep a direction's discipline.
 */

/**
 * @return array<string, list<string>> each prefab's arrangements, read off its own file
 */
function prefabArrangements(): array
{
    $found = [];

    foreach (array_keys(prefabData()) as $name) {
        $source = (string) file_get_contents(package_path("resources/views/components/kit/{$name}.blade.php"));

        preg_match('/\$variant = in_array\(\$variant, \[([^\]]*)\], true\)/', $source, $match);
        preg_match_all("/'([a-z-]+)'/", $match[1] ?? '', $words);

        $found[$name] = $words[1];
    }

    return $found;
}

it('gives every prefab arrangements of its own', function () {
    foreach (prefabArrangements() as $name => $variants) {
        expect($variants)->not->toBeEmpty("{$name} takes no variant");
    }
});

it('draws every arrangement a prefab accepts, and none it does not', function () {
    $css = (string) file_get_contents(package_path('resources/css/kit.css'));
    preg_match_all("/\[data-kit='([a-z-]+)'\]\[data-variant='([a-z-]+)'\]/", $css, $drawn, PREG_SET_ORDER);

    $styled = [];

    foreach ($drawn as [, $name, $variant]) {
        $styled[$name][$variant] = true;
    }

    foreach (prefabArrangements() as $name => $variants) {
        foreach ($variants as $variant) {
            expect($styled[$name][$variant] ?? false)->toBeTrue("kit.css draws no {$name} {$variant}");
        }
    }

    foreach ($styled as $name => $variants) {
        expect(array_values(array_diff(array_keys($variants), prefabArrangements()[$name] ?? [])))
            ->toBe([], "kit.css draws a {$name} arrangement the component does not accept");
    }
});

it('puts the chosen arrangement on the root and keeps the owner\'s rows, and nothing for a word it does not know', function (string $name) {
    [$data, $shown] = prefabData()[$name];
    app()->bind("kit.{$name}", fn (): array => $data);

    foreach (prefabArrangements()[$name] as $variant) {
        expect(Blade::render("<x-kit.{$name} variant=\"{$variant}\" />"))
            ->toMatch('/data-kit="'.$name.'"\s+data-variant="'.$variant.'"/')
            ->toContain(...$shown);
    }

    // The direction's own drawing: a word it does not take, the default's
    // name, or none at all.
    expect(Blade::render("<x-kit.{$name} variant=\"anything\" />"))->not->toContain('data-variant')->toContain('data-kit="'.$name.'"')
        ->and(Blade::render("<x-kit.{$name} />"))->not->toContain('data-variant');
})->with(['schedule', 'menu', 'catalogue', 'map', 'booking', 'events', 'faq', 'gallery', 'team']);

it('opens every answer when the questions are laid out open', function () {
    app()->instance('kit.faq', prefabData()['faq'][0]);

    expect(Blade::render('<x-kit.faq variant="open" />'))->toMatch('/<details[^>]*\sopen[\s>]/')
        ->and(Blade::render('<x-kit.faq />'))->not->toMatch('/<details[^>]*\sopen[\s>]/');
});

it('keeps a direction\'s discipline in the arrangements, and weighs them to win over any direction', function () {
    $rules = array_filter(directionRules(), fn (array $rule): bool => str_contains($rule['selector'], 'data-variant'));

    expect(count($rules))->toBeGreaterThan(20);

    foreach ($rules as $rule) {
        expect($rule['selector'])->not->toContain('data-direction', 'an arrangement is every direction\'s')
            ->and($rule['body'])->not->toContain('!important')
            ->and($rule['body'])->not->toMatch('/#[0-9a-f]{3,8}\b/i')
            ->and($rule['body'])->not->toMatch('/\b(?:rgba?|hsla?)\(/i')
            ->and(array_values(array_filter(declaredProperties($rule['body']), fn (string $property): bool => str_starts_with($property, '--'))))
            ->toBe([], 'an arrangement never redeclares a token: '.$rule['selector']);

        // Split at the commas between selectors, not the one inside :is().
        foreach (preg_split('/,(?![^(]*\))/', $rule['selector']) ?: [] as $part) {
            expect($part)->toContain(':is([data-variant], #arrangement)');
        }
    }
});
