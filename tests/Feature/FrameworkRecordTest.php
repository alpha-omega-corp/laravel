<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Vite;
use Workbench\App\Framework\Kit;
use Workbench\App\Framework\Record;

use function Orchestra\Testbench\package_path;

/*
 * The record of a run on the framework tab: what was asked, what was decided
 * at each step and why, and the pictures sent back while it ran. It is an
 * account kept where the views it explains are, so it is held to being whole:
 * every step says why, every picture it names is there and is served, and
 * nothing in it points at a file that only existed while the work ran.
 */

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
});

it('keeps a run with what was asked, its steps and what is owed', function () {
    expect(Record::runs())->not->toBeEmpty();

    foreach (Record::runs() as $name) {
        $run = Record::run($name);

        expect($run['title'])->not->toBeEmpty()
            ->and($run['asked'])->not->toBeEmpty()
            ->and($run['steps'])->not->toBeEmpty()
            ->and($run['owed'])->not->toBeEmpty();

        foreach ($run['steps'] as $step) {
            expect($step['title'])->not->toBeEmpty()
                ->and($step['why'])->not->toBeEmpty("{$step['title']} does not say why");

            foreach ($step['see'] ?? [] as $view) {
                $this->get(route($view['route'], $view['query']))->assertOk();
            }
        }
    }
});

it('has every picture a step shows, and no picture no step shows', function () {
    foreach (Record::runs() as $name) {
        $shown = array_merge(...array_map(
            fn (array $step): array => array_column($step['pictures'] ?? [], 'file'),
            Record::run($name)['steps'],
        ));

        $kept = array_map('basename', glob(package_path("workbench/record/{$name}/pictures/*.webp")) ?: []);

        sort($shown);
        sort($kept);

        expect($shown)->toBe($kept);

        foreach (Record::run($name)['steps'] as $step) {
            foreach ($step['pictures'] ?? [] as $picture) {
                [$width, $height] = (array) getimagesize(package_path("workbench/record/{$name}/pictures/{$picture['file']}"));

                expect([$picture['width'], $picture['height']])->toBe([$width, $height])
                    ->and($picture['caption'])->not->toBeEmpty();
            }
        }
    }
});

it('serves a picture of a run, and nothing that is not one', function () {
    $name = Record::runs()[0];
    $file = Record::run($name)['steps'][1]['pictures'][0]['file'];

    $response = $this->get(route('framework.record.picture', ['run' => $name, 'file' => $file]))->assertOk();

    expect($response->headers->get('Content-Type'))->toBe('image/webp');

    $this->get(route('framework.record.picture', ['run' => $name, 'file' => 'run.php']))->assertNotFound();
    $this->get(route('framework.record.picture', ['run' => 'nowhere', 'file' => $file]))->assertNotFound();
});

it('keeps what each writer reported, for every business, with nothing that points at a scratch folder', function () {
    $name = Record::runs()[0];
    $writers = Record::run($name)['writers'];

    expect(array_keys($writers['businesses']))->toEqualCanonicalizing(array_keys(Kit::businesses()));

    foreach ($writers['businesses'] as $report) {
        expect($report['brand'])->not->toBeEmpty()
            ->and($report['designs'])->not->toBeEmpty();
    }

    $raw = (string) file_get_contents(package_path("workbench/record/{$name}/writers.json")).(string) file_get_contents(package_path("workbench/record/{$name}/run.php"));

    expect($raw)->not->toContain('/tmp/')->not->toContain('scratchpad')->not->toContain('/home/');
});

it('draws the record on the framework tab, linked from its other views', function () {
    $html = $this->get(route('framework.record'))->assertOk()->getContent();
    $run = Record::run(null);

    expect($html)->toContain('data-ref="framework.record"')
        ->toContain(e($run['title']))
        ->and(substr_count($html, 'data-ref="framework.record.step"'))->toBe(count($run['steps']));

    foreach ($run['steps'] as $step) {
        foreach ($step['pictures'] ?? [] as $picture) {
            expect($html)->toContain(route('framework.record.picture', ['run' => $run['name'], 'file' => $picture['file']]));
        }
    }

    foreach (['framework', 'framework.businesses', 'framework.sheet'] as $view) {
        expect($this->get(route($view))->getContent())->toContain(e(route('framework.record')));
    }
});
