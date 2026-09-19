<?php

declare(strict_types=1);

namespace App\Mcp\Servers;

use App\Mcp\Tools\GetUiComponentTool;
use App\Mcp\Tools\ListUiComponentsTool;
use App\Mcp\Tools\SearchUiComponentsTool;
use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;
use Laravel\Mcp\Server\Tool;

#[Name('UI Kit')]
#[Version('1.0.0')]
#[Instructions(<<<'TXT'
A shared library of Tailwind CSS UI components, available to every project on this machine.

Components are addressed by a three part reference: {category}/{group}/{name}, for example
"layout/cards/01-basic-card". In a Laravel project that has the kit installed they render as
Blade tags such as <x-ui.layout.cards.01-basic-card />; elsewhere, copy the markup this server
returns, which is plain Tailwind HTML.

Start with list-ui-components to see the categories, search-ui-components to find something by
keyword, and get-ui-component to read the markup. Component names are not unique on their own,
so a shorthand like "card" returns candidates rather than a single component.

The markup uses Tailwind's default palette (indigo, gray) and dark: variants. Re-theme it to the
host project's own tokens rather than assuming those colours are wanted.
TXT)]
class UiKitServer extends Server
{
    /**
     * The tools registered with this MCP server.
     *
     * @var array<int, class-string<Tool>>
     */
    protected array $tools = [
        ListUiComponentsTool::class,
        SearchUiComponentsTool::class,
        GetUiComponentTool::class,
    ];
}
