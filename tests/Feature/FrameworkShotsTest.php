<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Vite;
use Workbench\App\Framework\Shots;

/*
 * Claude's shots on the framework tab: the pictures deployer keeps of this
 * project, read from its folder rather than copied into the package. The
 * folder here is a fixture laid out as deployer lays it out — the images and
 * an index.json newest first — so what is held is the reading: every shot with
 * its note, its image served, a name that is not one of the folder's refused,
 * and the notes' sets offered in the side column.
 */

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');

    $this->folder = sys_get_temp_dir().'/framework-shots-'.bin2hex(random_bytes(4));
    File::ensureDirectoryExists($this->folder);

    // The smallest PNG there is: one transparent pixel.
    $png = (string) base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=');

    $entries = [
        ['id' => '20261118-210000-001', 'kind' => 'progress', 'url' => 'http://127.0.0.1:8123/framework?project=restaurant', 'note' => 'Projets · Osteria Verd, its home page', 'at' => '2026-11-18T21:00:00Z'],
        ['id' => '20261118-200000-002', 'kind' => 'progress', 'url' => 'http://127.0.0.1:8123/framework/businesses/bakery', 'note' => 'Designs · bakery, every design', 'at' => '2026-11-18T20:00:00Z'],
        ['id' => '20261118-190000-003', 'kind' => 'example', 'url' => 'https://example.com/', 'note' => 'A page the work is measured against', 'at' => '2026-11-18T19:00:00Z'],
        // Named in the index, but its image is not in the folder: it is not a shot.
        ['id' => '20261118-180000-004', 'kind' => 'progress', 'url' => '', 'note' => 'Lost', 'at' => '2026-11-18T18:00:00Z'],
    ];

    foreach (array_slice($entries, 0, 3) as $entry) {
        File::put("{$this->folder}/{$entry['id']}.png", $png);
    }

    File::put($this->folder.'/index.json', (string) json_encode(array_map(
        fn (array $entry): array => $entry + ['project' => Shots::PROJECT, 'width' => 1440, 'height' => 900, 'src' => '/progress/'.Shots::PROJECT."/{$entry['id']}.png"],
        $entries,
    )));

    Shots::use($this->folder);
});

afterEach(function () {
    Shots::use(null);
    File::deleteDirectory($this->folder);
});

it('reads every shot deployer filed, newest first, and only those whose image is there', function () {
    expect(array_column(Shots::all(), 'note'))->toBe([
        'Projets · Osteria Verd, its home page',
        'Designs · bakery, every design',
        'A page the work is measured against',
    ]);
});

it('draws every shot with its note and its image, as one of the tab\'s views', function () {
    $html = $this->get(route('framework.shots'))->assertOk()->getContent();

    expect(substr_count($html, 'data-ref="framework.shots.shot"'))->toBe(3)
        ->and($html)->toContain('data-framework-main')
        ->and($html)->toContain(e(route('framework.shots.picture', ['file' => '20261118-210000-001.png'])))
        ->and($html)->toContain(e('Projets · Osteria Verd, its home page'))
        ->and($html)->toContain(e(__('framework.shots.example')))
        // The page a shot shows, linked on this host rather than on the server that answered then.
        ->and($html)->toContain('href="'.e(url('/framework').'?project=restaurant').'"')
        ->and($html)->toContain('href="https://example.com/"');

    // The view is in the side column of every other view too, with its count.
    foreach (['framework', 'framework.businesses', 'framework.sheet', 'framework.record'] as $view) {
        expect($this->get(route($view))->getContent())->toContain('href="'.e(route('framework.shots')).'"');
    }
});

it('narrows the shots to one set of notes from the side column', function () {
    $html = $this->get(route('framework.shots', ['set' => 'Designs']))->assertOk()->getContent();

    expect(substr_count($html, 'data-ref="framework.shots.shot"'))->toBe(1)
        ->and($html)->toContain('href="'.e(route('framework.shots', ['set' => 'Projets'])).'"')
        ->and($html)->toContain(e('bakery, every design'));
});

it('serves a shot\'s image and refuses a name that is not one of the folder\'s', function () {
    $this->get(route('framework.shots.picture', ['file' => '20261118-210000-001.png']))
        ->assertOk()
        ->assertHeader('Content-Type', 'image/png');

    $this->get(route('framework.shots.picture', ['file' => '20261118-180000-004.png']))->assertNotFound();
    $this->get('/framework/shots/..%2Findex.json')->assertNotFound();
    $this->get('/framework/shots/index.json')->assertNotFound();
});

it('says so when there is no shot yet', function () {
    Shots::use($this->folder.'/nowhere');

    expect($this->get(route('framework.shots'))->assertOk()->getContent())
        ->toContain(e(__('framework.shots.empty')));
});
