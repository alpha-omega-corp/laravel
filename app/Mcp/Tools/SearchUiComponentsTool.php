<?php

declare(strict_types=1);

namespace App\Mcp\Tools;

use App\Support\UiKit;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\JsonSchema\Types\Type;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Tool;
use Laravel\Mcp\Server\Tools\Annotations\IsIdempotent;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[Name('search-ui-components')]
#[IsReadOnly]
#[IsIdempotent]
#[Description('Search the shared UI kit by keyword. Matches the reference, the human title and the group name, so "card", "sign in" or "pagination" all work.')]
class SearchUiComponentsTool extends Tool
{
    /**
     * Handle the tool request.
     */
    public function handle(Request $request): Response
    {
        $request->validate([
            'query' => ['required', 'string', 'max:100'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $limit = (int) ($request->get('limit') ?? 25);
        $matches = UiKit::search((string) $request->get('query'), $request->get('category'));

        if ($matches === []) {
            return Response::text(sprintf(
                'Nothing matches [%s]. Use list-ui-components to browse the categories.',
                (string) $request->get('query')
            ));
        }

        $lines = [sprintf('%d matches for [%s]%s:', count($matches), (string) $request->get('query'),
            count($matches) > $limit ? ", showing {$limit}" : ''), ''];

        foreach (array_slice($matches, 0, $limit) as $component) {
            $lines[] = sprintf(
                '%-52s %s%s',
                $component['reference'],
                $component['tag'],
                $component['hasSlot'] ? ' [slot]' : ''
            );
        }

        return Response::text(implode("\n", $lines));
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, Type>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'query' => $schema->string()
                ->description('What to look for, for example "card", "sign in form" or "breadcrumb".')
                ->required(),

            'category' => $schema->string()
                ->description('Restrict the search to one category, for example "forms".'),

            'limit' => $schema->integer()
                ->description('How many matches to return. Defaults to 25.'),
        ];
    }
}
