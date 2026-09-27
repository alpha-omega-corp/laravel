<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

use function Orchestra\Testbench\package_path;

/*
 * resources/previews/<name>.html: what deployer's mockup preview draws for a kit
 * component it has no Go drawing of. The preview is an iframe with no scripts,
 * and a fragment is pasted into it as it is, so the rules are the ones deployer
 * enforces when it reads one — one root carrying the component's name, no Blade,
 * no script, no comment, no photograph — plus the one that makes it worth
 * drawing: the hooks and classes of the component it stands for, so a direction
 * styles the drawing the way it will style the page.
 */

/**
 * @return array<string, string> name to fragment
 */
function previewFragments(): array
{
    $fragments = [];

    foreach (glob(package_path('resources/previews/*.html')) ?: [] as $path) {
        $fragments[basename($path, '.html')] = (string) file_get_contents($path);
    }

    return $fragments;
}

/**
 * The fragment's elements, parsed as HTML the way a browser would read the markup.
 */
function previewDocument(string $html): DOMDocument
{
    $document = new DOMDocument;
    $document->loadHTML('<?xml encoding="utf-8"?>'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NOERROR | LIBXML_NOWARNING);

    return $document;
}

/**
 * A component's source and those of the kit components it renders: a hero's
 * drawing holds a media frame because the hero holds a media. Its own comes
 * first, so a hook both write is judged by the component's own classes.
 */
function previewSource(string $name): string
{
    $source = (string) file_get_contents(package_path("resources/views/components/kit/{$name}.blade.php"));

    // Its own `$ref` names it too, and is not a component it renders.
    preg_match_all('/<x-kit\.([a-z][a-z0-9-]*)/', $source, $nested);

    return implode("\n", [$source, ...array_map(previewSource(...), array_values(array_diff(array_unique($nested[1]), [$name])))]);
}

/**
 * @return list<string>
 */
function previewHooks(string $name): array
{
    preg_match_all('/data-kit-part="([^"]+)"/', previewSource($name), $hooks);

    return array_values(array_unique($hooks[1]));
}

it('draws each of the sections, and only components the kit ships', function () {
    $shipped = array_map(fn (string $path): string => basename($path, '.blade.php'), glob(package_path('resources/views/components/kit/*.blade.php')) ?: []);

    expect(array_keys(previewFragments()))
        ->toEqualCanonicalizing(['cta-band', 'features', 'hero', 'media', 'section', 'site-footer', 'site-header']);

    expect($shipped)->toContain(...array_keys(previewFragments()));
});

it('is a drawing a sandboxed frame can take as it is', function (string $name) {
    $html = previewFragments()[$name];

    expect(strlen($html))->toBeLessThanOrEqual(16 * 1024);

    foreach (['@', '{{', '<script', '<style', '<!--', 'data-ref', '<img'] as $forbidden) {
        expect(stripos($html, $forbidden))->toBeFalse("{$name}.html contains {$forbidden}");
    }

    $document = previewDocument($html);
    $roots = array_values(array_filter(iterator_to_array($document->childNodes), fn (DOMNode $node): bool => $node instanceof DOMElement));

    expect($roots)->toHaveCount(1)
        ->and($roots[0]->getAttribute('data-kit'))->toBe($name);

    foreach ($document->getElementsByTagName('*') as $element) {
        foreach ($element->attributes ?? [] as $attribute) {
            expect(str_starts_with(strtolower($attribute->name), 'on'))->toBeFalse("{$name}.html has an {$attribute->name} handler");
        }
    }
})->with(fn () => array_keys(previewFragments()));

it('carries the hooks and the classes of the component it stands for', function (string $name) {
    $document = previewDocument(previewFragments()[$name]);
    $blade = previewDocument(Blade::render("<x-kit.{$name} />"));
    $source = previewSource($name);

    // The root is drawn in the classes the component renders bare in.
    expect(trim($document->documentElement?->getAttribute('class') ?? ''))
        ->toBe(trim($blade->documentElement?->getAttribute('class') ?? ''));

    $hooks = previewHooks($name);

    foreach ((new DOMXPath($document))->query('//*[@data-kit-part]') ?: [] as $part) {
        assert($part instanceof DOMElement);
        $hook = $part->getAttribute('data-kit-part');

        expect($hooks)->toContain($hook);

        // A part the component writes with a fixed class list is drawn with the same one; a
        // button is drawn at the preview's own size, as every drawing in deployer draws one.
        if (preg_match('/data-kit-part="'.preg_quote($hook, '/').'"[^>]*?\sclass="([^"{}]*)"/', $source, $class) && ! str_starts_with($class[1], 'btn ')) {
            expect($part->getAttribute('class'))->toBe($class[1], "{$name}.html draws {$hook} in other classes");
        }
    }
})->with(fn () => array_keys(previewFragments()));
