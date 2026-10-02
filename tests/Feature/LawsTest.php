<?php

declare(strict_types=1);

use function Orchestra\Testbench\package_path;

/*
 * laws.md: the thirty laws of lawsofux.com, by the slugs every component rule,
 * every business page and every finding of deployer's checks cites, and the
 * thresholds those checks count against. Deployer reads the thresholds from this
 * file and keeps the same numbers built in for a machine without it, so the keys
 * are a contract; the numbers are this file's to tune.
 */

function lawsFile(): string
{
    return (string) file_get_contents(package_path('.claude/skills/ui-kit/laws.md'));
}

it('lists the thirty laws of lawsofux.com by their slugs, each in the site\'s words', function () {
    expect(lawsFile())->toStartWith("# Laws of UX\n\n")
        ->and(preg_match('/^# [^\n]+\n\n([^\n#][^\n]+)/', lawsFile()))->toBe(1, 'laws.md has no summary');

    foreach (specSection(lawsFile(), 'Laws') as $line) {
        expect($line)->toMatch('/^- [a-z0-9]+(?:-[a-z0-9]+)* — \S.*\.$/u');
    }

    // The site's own slugs, but for Prägnanz's umlaut, so that every one is a plain word.
    expect(lawSlugs())->toBe([
        'aesthetic-usability-effect', 'choice-overload', 'chunking', 'cognitive-bias', 'cognitive-load',
        'doherty-threshold', 'fittss-law', 'flow', 'goal-gradient-effect', 'hicks-law', 'jakobs-law',
        'law-of-common-region', 'law-of-proximity', 'law-of-pragnanz', 'law-of-similarity',
        'law-of-uniform-connectedness', 'mental-model', 'millers-law', 'occams-razor',
        'paradox-of-the-active-user', 'pareto-principle', 'parkinsons-law', 'peak-end-rule', 'postels-law',
        'selective-attention', 'serial-position-effect', 'teslers-law', 'von-restorff-effect',
        'working-memory', 'zeigarnik-effect',
    ]);
});

it('writes every threshold as a limit, each serving laws the file lists', function () {
    $keys = [];

    foreach (specSection(lawsFile(), 'Thresholds') as $line) {
        $threshold = specLimit($line);

        expect($threshold)->not->toBeNull("\"{$line}\" is not `- <key> — <number>[; advice <n>] (<law>, …)`");
        assert($threshold !== null);

        expect($threshold['laws'])->not->toBeEmpty("{$threshold['measure']} serves no law")
            ->and(array_values(array_diff($threshold['laws'], lawSlugs())))->toBe([]);

        $keys[] = $threshold['measure'];
    }

    expect($keys)->toEqualCanonicalizing([
        'nav-items', 'actions-per-region', 'primary-per-screen', 'pages', 'main-components', 'catalogue-items',
        'menu-section-items', 'form-fields', 'target-px', 'server-ms', 'title-characters', 'nav-strip-px',
    ]);
});

it('says how the kit applies every one of them', function () {
    $applied = (string) strstr(lawsFile(), "\n## How this kit applies them");

    expect($applied)->not->toBe('');

    foreach (lawSlugs() as $slug) {
        expect($applied)->toMatch('/(?<![\w-])'.preg_quote($slug, '/').'(?![\w-])/');
    }
});
