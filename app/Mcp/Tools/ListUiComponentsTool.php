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

#[Name('list-ui-components')]
#[IsReadOnly]
#[IsIdempotent]
#[Description('Browse the shared UI kit. Called with no arguments it returns every category and group with its component count. Pass a category, and optionally a group, to list the components inside.')]
class ListUiComponentsTool extends Tool
{
    /**
     * Handle the tool request.
     */
    public function handle(Request $request): Response
    {
        $category = $request->get('category');
        $group = $request->get('group');

        if ($category === null) {
            return Response::text($this->renderTree());
        }

        $components = array_filter(
            UiKit::all(),
            fn (array $component): bool => $component['category'] === $category
                && ($group === null || $component['group'] === $group)
        );

        if ($components === []) {
            return Response::error(sprintf(
                'No components found for category [%s]%s. Known categories: %s.',
                $category,
                $group !== null ? " and group [{$group}]" : '',
                implode(', ', array_keys(UiKit::tree()))
            ));
        }

        return Response::text($this->renderComponents($components));
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, Type>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'category' => $schema->string()
                ->description('Limit the listing to one category, for example "layout" or "forms".'),

            'group' => $schema->string()
                ->description('Limit the listing further to one group within the category, for example "cards".'),
        ];
    }

    /**
     * The category and group overview.
     */
    private function renderTree(): string
    {
        $lines = ['# Shared UI kit', '', sprintf('%d components across %d categories.', count(UiKit::all()), count(UiKit::tree())), ''];

        foreach (UiKit::tree() as $category => $groups) {
            $lines[] = sprintf('## %s (%d)', $category, array_sum($groups));

            foreach ($groups as $group => $count) {
                $lines[] = sprintf('  %s/%s — %d', $category, $group, $count);
            }

            $lines[] = '';
        }

        $lines[] = 'Use get-ui-component with a reference such as "layout/cards/01-basic-card" to read the markup.';

        return implode("\n", $lines);
    }

    /**
     * A flat listing of the matched components.
     *
     * @param  array<string, array<string, mixed>>  $components
     */
    private function renderComponents(array $components): string
    {
        $lines = [sprintf('%d components:', count($components)), ''];

        foreach ($components as $component) {
            $lines[] = sprintf(
                '%-52s %s%s',
                $component['reference'],
                $component['tag'],
                $component['hasSlot'] ? ' [accepts a slot]' : ''
            );
        }

        return implode("\n", $lines);
    }
}
