<?php

use Illuminate\Support\Facades\Blade;

use function Orchestra\Testbench\package_path;

/*
 * Arrangements: a prefab laid out the way its tag chooses — `variant` — over
 * the one DOM every direction styles. Every site of a direction used to draw
 * its prefabs one way; an arrangement is the site's own choice, and wins over
 * the direction's while the direction's look stays. The component accepts the
 * words kit.css draws, kit.css draws every word a component accepts, and the
 * rules keep a direction's discipline. The frame — the site-header, the hero
 * and the site-footer — takes arrangements the same way, chosen on deployer's
 * mockup before the site exists.
 */

/**
 * @return array<string, list<string>> each prefab's arrangements, read off its own file
 */
function prefabArrangements(): array
{
    return arrangementsOf(array_keys(prefabData()));
}

/**
 * The frame's types — the site-header, the hero and the site-footer laid out as
 * deployer's mockup chose — which are arrangements too, read the same way.
 *
 * @return array<string, list<string>>
 */
function frameArrangements(): array
{
    return arrangementsOf(['site-header', 'hero', 'site-footer']);
}

/**
 * Each component's arrangements, read off its own file the way deployer reads
 * them to offer them on a mockup.
 *
 * @param  list<string>  $names
 * @return array<string, list<string>>
 */
function arrangementsOf(array $names): array
{
    $found = [];

    foreach ($names as $name) {
        $source = (string) file_get_contents(package_path("resources/views/components/kit/{$name}.blade.php"));

        preg_match('/\$variant = in_array\(\$variant, \[([^\]]*)\], true\)/', $source, $match);
        preg_match_all("/'([a-z-]+)'/", $match[1] ?? '', $words);

        $found[$name] = $words[1];
    }

    return $found;
}

it('gives every prefab and every part of the frame arrangements of its own', function () {
    foreach ([...prefabArrangements(), ...frameArrangements()] as $name => $variants) {
        expect($variants)->not->toBeEmpty("{$name} takes no variant");
    }
});

it('draws every arrangement a component accepts, and none it does not', function () {
    $css = (string) file_get_contents(package_path('resources/css/kit.css'));
    preg_match_all("/\[data-kit='([a-z-]+)'\]\[data-variant='([a-z-]+)'\]/", $css, $drawn, PREG_SET_ORDER);

    $styled = [];

    foreach ($drawn as [, $name, $variant]) {
        $styled[$name][$variant] = true;
    }

    $accepted = [...prefabArrangements(), ...frameArrangements()];

    foreach ($accepted as $name => $variants) {
        foreach ($variants as $variant) {
            expect($styled[$name][$variant] ?? false)->toBeTrue("kit.css draws no {$name} {$variant}");
        }
    }

    foreach ($styled as $name => $variants) {
        expect(array_values(array_diff(array_keys($variants), $accepted[$name] ?? [])))
            ->toBe([], "kit.css draws a {$name} arrangement the component does not accept");
    }
});

// Deployer offers each arrangement on the mockup with the sentence kit.css
// introduces its rules with, so every word has one, in the one shape it reads.
it('says what every arrangement is for, where deployer reads it', function () {
    $css = (string) file_get_contents(package_path('resources/css/kit.css'));
    preg_match_all('#/\* ([a-z][a-z0-9-]*) — ([a-z][a-z0-9-]*): ([^*]+?)\s*\*/#', $css, $said, PREG_SET_ORDER);

    $described = [];

    foreach ($said as [, $name, $variant, $sentence]) {
        $described[$name][$variant] = $sentence;
    }

    foreach ([...prefabArrangements(), ...frameArrangements()] as $name => $variants) {
        foreach ($variants as $variant) {
            expect($described[$name][$variant] ?? '')->not->toBe('', "kit.css says nothing about {$name} — {$variant}");
        }
    }
});

it('puts the frame\'s type on its root, and the direction\'s drawing for a word it does not know', function (string $name, string $tag) {
    foreach (frameArrangements()[$name] as $variant) {
        expect(Blade::render(str_replace('/>', "variant=\"{$variant}\" />", $tag)))
            ->toMatch('/data-kit="'.$name.'"\s+data-variant="'.$variant.'"/');
    }

    expect(Blade::render(str_replace('/>', 'variant="anything" />', $tag)))->not->toContain('data-variant')->toContain('data-kit="'.$name.'"')
        ->and(Blade::render($tag))->not->toContain('data-variant');
})->with([
    'site-header' => ['site-header', '<x-kit.site-header brand="Chez Anna" />'],
    'hero' => ['hero', '<x-kit.hero title="Chez Anna" />'],
    'site-footer' => ['site-footer', '<x-kit.site-footer brand="Chez Anna" />'],
]);

it('opens a statement on the words alone, with no photograph to load', function () {
    expect(Blade::render('<x-kit.hero title="Chez Anna" image="/salle.jpg" variant="statement" />'))
        ->toContain('Chez Anna')->not->toContain('hero-media')->not->toContain('/salle.jpg')
        ->and(Blade::render('<x-kit.hero title="Chez Anna" image="/salle.jpg" variant="cover" />'))->toContain('src="/salle.jpg"');
});

// A direction lays out its own hero and leaves an arranged one to its
// arrangement: an overlay, a bleed or a portrait drawn for every hero would be
// one the arrangement had to undo, four directions over.
it('leaves an arranged hero to its arrangement', function () {
    $layout = ['position', 'inset', 'z-index', 'min-height', 'max-width', 'aspect-ratio', 'grid-template-columns'];

    foreach (directionRules() as $rule) {
        if (! str_contains($rule['selector'], 'data-direction') || ! preg_match("/\[data-kit='hero'\]|\[data-kit-part='hero-(?:media|copy)'\]/", $rule['selector'])) {
            continue;
        }

        if (array_intersect(declaredProperties($rule['body']), $layout) !== []) {
            expect($rule['selector'])->toContain("[data-kit='hero']:not([data-variant])");
        }
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
    // An arrangement names its word; a direction stepping aside for one (`:not([data-variant])`) is the direction's.
    $rules = array_filter(directionRules(), fn (array $rule): bool => str_contains($rule['selector'], "[data-variant='"));

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
