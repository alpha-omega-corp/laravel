<?php

declare(strict_types=1);

use Illuminate\Support\Str;

use function Orchestra\Testbench\package_path;

/*
 * components/<name>.md: where each themed kit component may go on each layout's
 * regions, how much of it one page takes, and how it behaves once it is there,
 * each rule tied to a law of laws.md. Deployer's site factory reads these files
 * live with a parser of its own, so the grammar is held here the way it reads
 * it — and held against the layouts, so a rule never names a region that does
 * not exist, or refuses a component where a layout's own recipe places it.
 */

/**
 * @return array<string, string> component name to its rules
 */
function componentRules(): array
{
    $rules = [];

    foreach (glob(package_path('.claude/skills/ui-kit/components/*.md')) ?: [] as $path) {
        if (basename($path) !== 'README.md') {
            $rules[basename($path, '.md')] = (string) file_get_contents($path);
        }
    }

    return $rules;
}

/**
 * @return array<string, array<string, string>> layout to its regions, each with its recipe as written
 */
function layoutRecipes(): array
{
    $layouts = [];

    foreach (glob(package_path('.claude/skills/ui-kit/layouts/*.md')) ?: [] as $path) {
        if (basename($path) !== 'README.md') {
            $layouts[basename($path, '.md')] = specItems((string) file_get_contents($path), 'Regions');
        }
    }

    return $layouts;
}

/**
 * The components a recipe can put first in its region: the first name of each
 * alternative of a slot, and the next slot's too while this one may place nothing.
 *
 * @return list<string>
 */
function recipeOpeners(string $slots): array
{
    $openers = [];

    foreach (array_map('trim', explode(',', $slots)) as $slot) {
        $alternatives = array_map('trim', explode('|', $slot));

        foreach ($alternatives as $alternative) {
            $openers[] = trim(explode('+', $alternative)[0]);
        }

        if (array_intersect($alternatives, ['nothing', 'prefabs']) === []) {
            break;
        }
    }

    return $openers;
}

/**
 * @return list<string> the props a kit component declares, as a tag writes them
 */
function componentProps(string $name): array
{
    $source = (string) file_get_contents(package_path("resources/views/components/kit/{$name}.blade.php"));

    if (! preg_match('/@props\(\[(.*?)\]\)\s*\n/s', $source, $block)) {
        return [];
    }

    // A key, or a prop listed with no default: a quoted word after `[` or `,`, never one after `=>`.
    preg_match_all("/(?:^|[\[,])\s*'([a-zA-Z][a-zA-Z0-9_]*)'/", $block[1], $props);

    return array_map(fn (string $prop): string => Str::kebab($prop), $props[1]);
}

/**
 * @return array<string, string> scope to verdict
 */
function componentPlacement(string $rules): array
{
    $placement = [];

    foreach (specSection($rules, 'Placement') as $line) {
        if (preg_match('/^- (\*|[a-z][a-z0-9-]*\.(?:\*|[a-z][a-z0-9-]*)|\*\.[a-z][a-z0-9-]*) — (fits|first|never)(?:: \S.*)?$/u', $line, $match)) {
            $placement[$match[1]] = $match[2];
        }
    }

    return $placement;
}

/**
 * A region's verdict, the most exact line first, and `fits` when none reaches it.
 *
 * @param  array<string, string>  $placement
 */
function placementVerdict(array $placement, string $layout, string $region): string
{
    foreach (["{$layout}.{$region}", "{$layout}.*", "*.{$region}", '*'] as $scope) {
        if (isset($placement[$scope])) {
            return $placement[$scope];
        }
    }

    return 'fits';
}

// Fails until every component has its file: the list is the ones still owed.
it('has a rules file for every themed component the kit ships', function () {
    $shipped = array_map(fn (string $path): string => basename($path, '.blade.php'), glob(package_path('resources/views/components/kit/*.blade.php')) ?: []);

    expect(array_values(array_diff($shipped, array_keys(componentRules()))))->toBe([]);
});

it('opens on its component\'s name and a summary, and keeps to three sections', function (string $name) {
    $rules = componentRules()[$name];

    expect(package_path("resources/views/components/kit/{$name}.blade.php"))->toBeFile()
        ->and($rules)->toStartWith("# {$name}\n\n")
        ->and(preg_match('/^# [^\n]+\n\n([^\n#][^\n]+)/', $rules))->toBe(1, "{$name}.md has no summary");

    preg_match_all('/^#.*$/m', $rules, $headings);
    $sections = array_slice($headings[0], 1);

    expect(array_values(array_diff($sections, ['## Placement', '## Limits', '## Behaviour'])))->toBe([], "{$name}.md has a section deployer does not read as one")
        ->and($sections)->toBe(array_values(array_unique($sections)))
        ->and(specSection($rules, 'Placement'))->not->toBeEmpty("{$name}.md places nothing")
        ->and(specSection($rules, 'Behaviour'))->not->toBeEmpty("{$name}.md says nothing of how it behaves");
})->with(fn () => array_keys(componentRules()));

it('places it only in layouts and regions that exist, each scope once and with a verdict', function (string $name) {
    $recipes = layoutRecipes();
    $regions = array_merge(...array_values(array_map('array_keys', $recipes)));
    $scopes = [];

    foreach (specSection(componentRules()[$name], 'Placement') as $line) {
        expect(preg_match('/^- (\*|[a-z][a-z0-9-]*\.(?:\*|[a-z][a-z0-9-]*)|\*\.[a-z][a-z0-9-]*) — (fits|first|never)(?:: \S.*)?$/u', $line, $match))
            ->toBe(1, "{$name}.md: \"{$line}\" is not `- <scope> — fits|first|never[: <note>]`");

        [$layout, $region] = array_pad(explode('.', $match[1], 2), 2, '*');

        if ($layout !== '*') {
            expect(isset($recipes[$layout]))->toBeTrue("{$name}.md names a layout there is none of: {$layout}");
        }

        if ($region !== '*') {
            expect($layout === '*' ? $regions : array_keys($recipes[$layout]))->toContain($region);
        }

        $scopes[] = $match[1];
    }

    expect($scopes)->toBe(array_values(array_unique($scopes)), "{$name}.md gives one scope two verdicts");
})->with(fn () => array_keys(componentRules()));

it('counts only its own props and the page, against laws that exist', function (string $name) {
    $measures = [];

    foreach (specSection(componentRules()[$name], 'Limits') as $line) {
        $limit = specLimit($line);

        expect($limit)->not->toBeNull("{$name}.md: \"{$line}\" is not `- <measure> — <max>[ <unit>][; advice <n>][ (<law>, …)]`");
        assert($limit !== null);

        expect([...componentProps($name), 'per-page'])->toContain($limit['measure'])
            ->and(array_values(array_diff($limit['laws'], lawSlugs())))->toBe([], "{$name}.md cites a law laws.md does not list");

        $measures[] = $limit['measure'];
    }

    expect($measures)->toBe(array_values(array_unique($measures)), "{$name}.md limits one measure twice");
})->with(fn () => array_keys(componentRules()));

it('ends a behaviour on the laws it serves, and only laws that exist', function (string $name) {
    foreach (specSection(componentRules()[$name], 'Behaviour') as $line) {
        expect(preg_match('/^- (.+?)(?: \(([^()]*)\))?$/u', $line, $match))->toBe(1, "{$name}.md: \"{$line}\" is not `- <sentence> (<law>, …)`");

        // The last parenthesis of a line is its laws, so one that closes a sentence has to be them.
        if (str_ends_with($line, ')')) {
            expect(array_values(array_diff(explode(', ', $match[2] ?? ''), lawSlugs())))->toBe([], "{$name}.md: \"{$line}\" ends in a parenthesis that is not its laws");
        }
    }
})->with(fn () => array_keys(componentRules()));

it('never refuses a region its layout\'s recipe places it in', function (string $name) {
    $placement = componentPlacement(componentRules()[$name]);
    $refused = [];

    foreach (layoutRecipes() as $layout => $regions) {
        foreach ($regions as $region => $slots) {
            if (! in_array($name, array_map('trim', preg_split('/[,|+]/', $slots) ?: []), true)) {
                continue;
            }

            // `first` refuses it too where the recipe can only place it after something.
            $verdict = placementVerdict($placement, $layout, $region);

            if ($verdict === 'never' || ($verdict === 'first' && ! in_array($name, recipeOpeners($slots), true))) {
                $refused[] = "{$layout}.{$region} ({$verdict})";
            }
        }
    }

    expect($refused)->toBe([], "{$name}.md refuses regions its layouts' recipes place it in");
})->with(fn () => array_keys(componentRules()));

it('puts every region of every layout in exactly one class', function () {
    $readme = (string) file_get_contents(package_path('.claude/skills/ui-kit/components/README.md'));
    preg_match_all('/^\| ([a-z]+) \| ([a-z-]+\.[a-z-]+(?:, [a-z-]+\.[a-z-]+)*) \|/m', $readme, $rows, PREG_SET_ORDER);

    $regions = [];

    foreach (layoutRecipes() as $layout => $recipe) {
        foreach (array_keys($recipe) as $region) {
            $regions[] = "{$layout}.{$region}";
        }
    }

    expect(array_column($rows, 1))->toEqualCanonicalizing(['bar', 'opening', 'side', 'offer', 'main', 'narrow', 'gallery', 'tile', 'band', 'foot', 'focus'])
        ->and(array_merge(...array_map(fn (array $row): array => explode(', ', $row[2]), $rows)))->toEqualCanonicalizing($regions);
});
