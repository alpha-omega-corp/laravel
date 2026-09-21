<?php

declare(strict_types=1);

use App\Enums\KitComponent;
use App\Enums\Theme;

it('serves the UI kit page', function () {
    $this->get(route('ui-kit'))->assertOk();
});

it('renders a section for every element, in the enum\'s order', function () {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    $positions = [];

    foreach (KitComponent::cases() as $element) {
        expect($html)->toContain('id="'.$element->value.'"')
            ->and($html)->toContain($element->label())
            ->and($html)->toContain($element->summary())
            ->and($html)->toContain('&lt;x-'.$element->tag().' /&gt;');

        $positions[] = strpos($html, 'id="'.$element->value.'"');
    }

    $sorted = $positions;
    sort($sorted);

    expect($positions)->toBe($sorted);
});

it('actually renders each element, not just its name', function () {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    foreach (KitComponent::cases() as $element) {
        expect($html)->toContain('data-ref="&lt;x-kit.'.$element->value);
    }
});

it('indexes every element in the side navigation', function () {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    foreach (KitComponent::cases() as $element) {
        expect($html)->toContain('href="#'.$element->value.'"')
            ->and($html)->toContain($element->groupLabel());
    }
});

it('names and describes every element in every locale', function (string $locale) {
    app()->setLocale($locale);

    foreach (KitComponent::cases() as $element) {
        expect($element->label())->not->toContain('ui_kit.element')
            ->and($element->summary())->not->toContain('ui_kit.element')
            ->and($element->groupLabel())->not->toContain('ui_kit.group');
    }
})->with(['fr', 'de', 'it', 'en']);

it('leaves no translation key unresolved on the page', function (string $locale) {
    app()->setLocale($locale);

    expect($this->get(route('ui-kit'))->assertOk()->getContent())
        ->not->toContain('ui_kit.');
})->with(['fr', 'de', 'it', 'en']);

it('has a demo partial for every element and no orphans', function () {
    $partials = collect(File::files(resource_path('views/ui-kit/demo')))
        ->map(fn ($file): string => str_replace('.blade.php', '', $file->getFilename()))
        ->sort()
        ->values()
        ->all();

    $elements = collect(KitComponent::cases())->map(fn (KitComponent $case): string => $case->value)->sort()->values()->all();

    expect($partials)->toBe($elements);
});

it('carries no leftover kit palette classes or dark variants', function () {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    expect($html)->not->toContain('indigo')
        ->and($html)->not->toContain('dark:')
        ->and($html)->not->toContain('text-gray-')
        ->and($html)->not->toContain('bg-gray-')
        ->and($html)->not->toContain('border-gray-');
});

it('previews the page in every palette through tokens alone', function () {
    $html = $this->get(route('ui-kit'))->assertOk()->getContent();

    foreach (Theme::cases() as $palette) {
        expect($html)->toContain('data-palette="'.$palette->value.'"');
    }
});
