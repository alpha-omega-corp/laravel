<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Workbench\App\Framework\Picture;
use Workbench\App\Framework\Record;

Route::view('/', 'home')->name('home');

/*
 * Two galleries of parts, one page each. The UI kit renders a section per case
 * of Workbench\App\Enums\KitComponent; the Layouts page is the kit's layout and
 * application-shell categories, which are structure rather than elements.
 */
Route::view('/ui-kit', 'ui-kit.index')->name('ui-kit');
Route::view('/layouts', 'layouts')->name('layouts');

/*
 * The framework tab: one whole small-business site at a time, from
 * Workbench\App\Enums\Project — nine independent projects, each declaring the
 * sections it is built from. The project, the palette, the layout, the
 * degree and the section are all query parameters.
 */
Route::view('/framework', 'framework')->name('framework');

/*
 * The framework tab's business views: one page of one kind of business, drawn
 * from the skill's own files (businesses, directions, layouts, palettes and the
 * worked designs) by Workbench\App\Framework\Site. `site` is the page alone, a
 * document whose <html> carries the palette and the direction as a built site's
 * does; `businesses` is the tab that frames it with every axis above it; `sheet`
 * lays every design of a business out page by page.
 *
 * Each site, design and page is a path of its own (/framework/businesses/
 * bakery/<design>/menu), written by Site::url and read by Site::asked; the
 * overrides of a design stay in the query, and an address that names all of it
 * in the query still opens.
 */
$segment = '[a-z0-9][a-z0-9_-]*';

Route::view('/framework/site/{business?}/{design?}/{path?}', 'framework.site.document')
    ->where(['business' => $segment, 'design' => $segment, 'path' => $segment])
    ->name('framework.site');
Route::view('/framework/businesses/{business?}/{design?}/{path?}', 'framework.businesses')
    ->where(['business' => $segment, 'design' => $segment, 'path' => $segment])
    ->name('framework.businesses');
Route::view('/framework/sheet/{business?}', 'framework.sheet')
    ->where(['business' => $segment])
    ->name('framework.sheet');

/*
 * The record of the run that made the business views: what was asked, what was
 * decided at each step and why, and the pictures sent back while it ran
 * (Workbench\App\Framework\Record, workbench/record/<date>).
 */
Route::view('/framework/record', 'framework.record')->name('framework.record');
Route::get('/framework/record/{run}/{file}', function (string $run, string $file) {
    $path = Record::picture($run, $file);

    abort_if($path === null, 404);

    return response()->file($path, ['Content-Type' => 'image/webp', 'Cache-Control' => 'public, max-age=86400']);
})->name('framework.record.picture');

// The photograph a demo business has not got: the kit's own frame, as an image, captioned with what belongs there.
Route::get('/framework/picture', fn () => response(
    Picture::svg(request()->string('subject')->toString(), request()->integer('w', 1200), request()->integer('h', 900)),
    200,
    ['Content-Type' => 'image/svg+xml', 'Cache-Control' => 'public, max-age=86400'],
))->name('framework.picture');

/*
 * The graph tab: the four enums and the kit's components drawn as one graph,
 * from Workbench\App\Support\DesignGraph. Every edge is read out of the views rather
 * than declared, and every node links to the page that shows it.
 */
Route::view('/graph', 'graph')->name('graph');
