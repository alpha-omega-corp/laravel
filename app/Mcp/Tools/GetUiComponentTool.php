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

#[Name('get-ui-component')]
#[IsReadOnly]
#[IsIdempotent]
#[Description('Read one component from the shared UI kit. Accepts a full reference such as "layout/cards/01-basic-card", or the shorthand the ui-kit skill uses, such as "::card". Component names are not unique on their own, so a shorthand that matches more than one component returns the candidates instead of the markup.')]
class GetUiComponentTool extends Tool
{
    /**
     * Handle the tool request.
     */
    public function handle(Request $request): Response
    {
        $request->validate([
            'reference' => ['required', 'string', 'max:200'],
        ]);

        $resolved = UiKit::resolve((string) $request->get('reference'));

        if ($resolved['match'] === null) {
            return Response::text($this->renderCandidates(
                (string) $request->get('reference'),
                $resolved['candidates']
            ));
        }

        $component = $resolved['match'];

        return Response::text(implode("\n", [
            '# '.$component['title'],
            '',
            'Reference: '.$component['reference'],
            'Blade tag: '.$component['tag'],
            'Slot:      '.($component['hasSlot'] ? 'yes — pass content between the tags' : 'no'),
            '',
            '```blade',
            UiKit::markup($component),
            '```',
        ]));
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, Type>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'reference' => $schema->string()
                ->description('A full reference like "layout/cards/01-basic-card", or a shorthand like "::card" or "card".')
                ->required(),
        ];
    }

    /**
     * The disambiguation listing shown when a shorthand matches several components.
     *
     * @param  list<array<string, mixed>>  $candidates
     */
    private function renderCandidates(string $reference, array $candidates): string
    {
        if ($candidates === []) {
            return sprintf(
                'No component matches [%s]. Use list-ui-components to browse the %d available components.',
                $reference,
                count(UiKit::all())
            );
        }

        $lines = [
            sprintf('[%s] matches %d components. Ask again with one of these full references:', $reference, count($candidates)),
            '',
        ];

        foreach (array_slice($candidates, 0, 40) as $component) {
            $lines[] = sprintf('%-52s %s', $component['reference'], $component['tag']);
        }

        if (count($candidates) > 40) {
            $lines[] = sprintf('... and %d more.', count($candidates) - 40);
        }

        return implode("\n", $lines);
    }
}
