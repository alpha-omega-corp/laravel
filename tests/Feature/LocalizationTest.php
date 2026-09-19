<?php

declare(strict_types=1);

use Illuminate\Support\Arr;

/**
 * Every locale the application ships. Adding a directory under lang/ without adding it
 * here — or vice versa — fails the first test below.
 */
const LOCALES = ['fr', 'de', 'it', 'en'];

/**
 * The translation groups, taken from the default locale.
 *
 * @return array<int, string>
 */
function translationGroups(): array
{
    return array_map(
        fn (string $path): string => basename($path, '.php'),
        glob(lang_path('fr/*.php')) ?: [],
    );
}

/**
 * @return array<int, string>
 */
function translationKeys(string $locale, string $group): array
{
    $keys = array_keys(Arr::dot(require lang_path($locale.'/'.$group.'.php')));
    sort($keys);

    return $keys;
}

it('ships exactly the locales it claims to', function () {
    $directories = array_map('basename', glob(lang_path('*'), GLOB_ONLYDIR) ?: []);

    sort($directories);
    expect($directories)->toBe(collect(LOCALES)->sort()->values()->all());
});

it('defaults to French and falls back to French', function () {
    expect(config('app.locale'))->toBe('fr')
        ->and(config('app.fallback_locale'))->toBe('fr');
});

it('defines the same groups in every locale', function (string $locale) {
    $groups = array_map(
        fn (string $path): string => basename($path, '.php'),
        glob(lang_path($locale.'/*.php')) ?: [],
    );

    expect($groups)->toBe(translationGroups())
        ->and($groups)->not->toBeEmpty();
})->with(LOCALES);

it('defines the same keys in every locale', function (string $locale) {
    foreach (translationGroups() as $group) {
        expect(translationKeys($locale, $group))->toBe(translationKeys('fr', $group), $locale.'/'.$group);
    }
})->with(LOCALES);

it('leaves no translation string empty', function (string $locale) {
    foreach (translationGroups() as $group) {
        foreach (Arr::dot(require lang_path($locale.'/'.$group.'.php')) as $key => $value) {
            expect($value)->toBeString()->not->toBe('', $locale.'.'.$group.'.'.$key);
        }
    }
})->with(LOCALES);

it('translates a key differently per locale rather than echoing the key back', function () {
    $translations = collect(LOCALES)->mapWithKeys(fn (string $locale): array => [
        $locale => __('shell.skip_to', locale: $locale),
    ]);

    expect($translations->unique())->toHaveCount(count(LOCALES))
        ->and($translations->filter(fn (string $line): bool => $line === 'shell.skip_to'))->toBeEmpty();
});
