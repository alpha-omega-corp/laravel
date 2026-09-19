<?php

declare(strict_types=1);

use App\Mcp\Servers\UiKitServer;
use App\Mcp\Tools\GetUiComponentTool;
use App\Mcp\Tools\ListUiComponentsTool;
use App\Mcp\Tools\SearchUiComponentsTool;
use App\Support\UiKit;
use Illuminate\Support\HtmlString;

it('indexes every component generated from the html source', function () {
    $sources = count(glob(base_path('html/*/*/*.html')) ?: []);

    expect(UiKit::all())->toHaveCount($sources)
        ->and($sources)->toBeGreaterThan(0);
});

it('renders every component byte for byte as the source html', function () {
    foreach (UiKit::all() as $component) {
        $source = str_replace(
            [resource_path('views/components/ui'), '.blade.php'],
            [base_path('html'), '.html'],
            $component['path']
        );

        $expected = preg_replace(
            '/^([ \t]*)<!--\s*(?:Content goes here|Your content)\s*-->[ \t]*$/m',
            '$1@@SLOT@@',
            (string) file_get_contents($source)
        );

        $actual = view($component['view'], ['slot' => new HtmlString('@@SLOT@@')])->render();

        expect(rtrim($actual, "\n"))->toBe(rtrim((string) $expected, "\n"), $component['reference']);
    }
});

it('resolves a full reference to exactly one component', function () {
    $resolved = UiKit::resolve('::layout/cards/01-basic-card');

    expect($resolved['match']['tag'])->toBe('<x-ui.layout.cards.01-basic-card />');
});

it('returns candidates rather than guessing when a short name is ambiguous', function () {
    $resolved = UiKit::resolve('::01-simple');

    expect($resolved['match'])->toBeNull()
        ->and(count($resolved['candidates']))->toBeGreaterThan(1);
});

it('resolves a short name that matches only one component', function () {
    $resolved = UiKit::resolve('::08-well');

    expect($resolved['match']['reference'])->toBe('layout/cards/08-well');
});

it('lists the whole kit when the list tool is called with no arguments', function () {
    UiKitServer::tool(ListUiComponentsTool::class, [])
        ->assertOk()
        ->assertSee('Shared UI kit')
        ->assertSee('layout/cards');
});

it('lists only the requested category', function () {
    $response = UiKitServer::tool(ListUiComponentsTool::class, ['category' => 'layout']);

    $response->assertOk()->assertSee('layout/cards/01-basic-card');
});

it('reports an unknown category instead of returning nothing', function () {
    UiKitServer::tool(ListUiComponentsTool::class, ['category' => 'nope'])
        ->assertHasErrors();
});

it('matches a multi word query against a hyphenated group', function (string $query) {
    expect(UiKit::search($query))->not->toBeEmpty()
        ->and(UiKit::search($query)[0]['reference'])->toStartWith('forms/sign-in-forms/');
})->with(['sign in', 'sign-in', 'Sign In']);

it('searches the kit by keyword', function () {
    UiKitServer::tool(SearchUiComponentsTool::class, ['query' => 'pagination'])
        ->assertOk()
        ->assertSee('navigation/pagination');
});

it('returns the markup for an exact reference', function () {
    UiKitServer::tool(GetUiComponentTool::class, ['reference' => 'layout/cards/01-basic-card'])
        ->assertOk()
        ->assertSee('<x-ui.layout.cards.01-basic-card />')
        ->assertSee('rounded-lg');
});

it('returns candidates for an ambiguous shorthand', function () {
    UiKitServer::tool(GetUiComponentTool::class, ['reference' => '::card'])
        ->assertOk()
        ->assertSee('matches')
        ->assertSee('layout/cards/');
});

it('says so when nothing matches', function () {
    UiKitServer::tool(GetUiComponentTool::class, ['reference' => 'definitely-not-a-component'])
        ->assertOk()
        ->assertSee('No component matches');
});
