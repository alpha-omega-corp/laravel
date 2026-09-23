<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

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
 * The graph tab: the four enums and the kit's components drawn as one graph,
 * from Workbench\App\Support\DesignGraph. Every edge is read out of the views rather
 * than declared, and every node links to the page that shows it.
 */
Route::view('/graph', 'graph')->name('graph');
