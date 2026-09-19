<?php

declare(strict_types=1);

use App\Mcp\Servers\UiKitServer;
use Laravel\Mcp\Facades\Mcp;

/*
|--------------------------------------------------------------------------
| MCP Servers
|--------------------------------------------------------------------------
|
| The UI kit is registered as a local (stdio) server so that any project on
| this machine can reach it, not just this application. Register it in another
| project's MCP client with:
|
|   claude mcp add uikit -- php /home/nanstis/PhpstormProjects/cleaner/artisan mcp:start uikit
|
*/

Mcp::local('uikit', UiKitServer::class);
