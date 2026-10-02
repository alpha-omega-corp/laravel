<?php

use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind different classes or traits.
|
| The suite needs no database, because the application needs none: sessions, cache
| and queue are file and sync drivers. RefreshDatabase is deliberately not applied
| here — a project that adds tables adds it back on the tests that touch them,
| rather than on the whole Feature suite.
|
*/

pest()->extend(TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

/*
|--------------------------------------------------------------------------
| The ui-kit skill, read as data
|--------------------------------------------------------------------------
|
| Deployer reads the skill's markdown as data — a layout's recipe, a business's
| pages, a component's rules, the laws — so several tests hold its grammar, and
| read it the way deployer's section() does: the lines under one heading up to
| the next heading of any level, trimmed, blank ones dropped.
|
*/

/**
 * The non-empty lines under one `## heading`, trimmed, up to the next heading.
 *
 * @return list<string>
 */
function specSection(string $body, string $heading): array
{
    $lines = [];
    $inside = false;

    foreach (preg_split('/\R/', $body) ?: [] as $line) {
        $line = trim($line);

        if (str_starts_with($line, '#')) {
            if ($inside) {
                break;
            }

            $inside = strcasecmp(trim(ltrim($line, '# ')), $heading) === 0;

            continue;
        }

        if ($inside && $line !== '') {
            $lines[] = $line;
        }
    }

    return $lines;
}

/**
 * `- <name> — <rest>` items under one heading, as name to rest.
 *
 * @return array<string, string>
 */
function specItems(string $body, string $heading): array
{
    $items = [];

    foreach (specSection($body, $heading) as $line) {
        if (preg_match('/^- ([a-z][a-z0-9-]*) — (.+)$/u', $line, $match)) {
            $items[$match[1]] = trim($match[2]);
        }
    }

    return $items;
}

/**
 * The recipe lines of a `## Regions`: region to the component names it places.
 *
 * @return array<string, list<string>>
 */
function specRecipe(string $body): array
{
    $recipe = [];

    foreach (specItems($body, 'Regions') as $region => $slots) {
        $recipe[$region] = array_values(array_filter(array_map('trim', preg_split('/[,|+]/', $slots) ?: [])));
    }

    return $recipe;
}

/**
 * A `## Limits` line of a component's rules, or a `## Thresholds` line of the
 * laws — `- <measure> — <max>[ <unit>][; advice <n>][ (<law>, …)]` — or null
 * when the line is not one.
 *
 * @return array{measure: string, max: int, unit: ?string, advice: ?int, laws: list<string>}|null
 */
function specLimit(string $line): ?array
{
    if (! preg_match('/^- ([a-z][a-z0-9-]*) — (\d+)(?: ([a-z]+))?(?:; advice (\d+))?(?: \(([a-z0-9-]+(?:, [a-z0-9-]+)*)\))?$/u', $line, $match)) {
        return null;
    }

    return [
        'measure' => $match[1],
        'max' => (int) $match[2],
        'unit' => ($match[3] ?? '') !== '' ? $match[3] : null,
        'advice' => ($match[4] ?? '') !== '' ? (int) $match[4] : null,
        'laws' => ($match[5] ?? '') !== '' ? explode(', ', $match[5]) : [],
    ];
}

/**
 * @return list<string> the slugs of the laws `laws.md` lists, the only ones a rule may cite
 */
function lawSlugs(): array
{
    $body = (string) file_get_contents(Orchestra\Testbench\package_path('.claude/skills/ui-kit/laws.md'));

    return array_values(array_filter(array_map(
        fn (string $line): ?string => preg_match('/^- ([a-z0-9]+(?:-[a-z0-9]+)*) — /u', $line, $match) ? $match[1] : null,
        specSection($body, 'Laws'),
    )));
}

/**
 * Rendered markup, parsed the way a browser reads it and ready to be asked by XPath.
 */
function renderedXPath(string $html): DOMXPath
{
    $document = new DOMDocument;
    $document->loadHTML('<?xml encoding="utf-8"?>'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);

    return new DOMXPath($document);
}
