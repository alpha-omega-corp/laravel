<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\ViewException;

/*
 * The one field every form is drawn with: a line, a long text or a choice,
 * each labelled, each marked for check_site, and nothing else accepted.
 */

it('draws the three kinds, each labelled and marked', function (string $template, array $data, string $control, string $kind) {
    $xpath = renderedXPath(Blade::render($template, $data));

    $field = $xpath->query("//{$control}[@data-field='{$kind}']")->item(0);

    assert($field instanceof DOMElement);

    expect($xpath->query("//label[@for='{$field->getAttribute('id')}']")->length)->toBe(1)
        ->and($xpath->query('/*[@data-kit="field"]')->length)->toBe(1);
})->with([
    'a line' => ['<x-kit.field name="email" type="email" label="Courriel" autocomplete="email" />', [], 'input', 'line'],
    'a long text' => ['<x-kit.field name="message" type="long" label="Message" />', [], 'textarea', 'long'],
    'a choice' => ['<x-kit.field name="service" label="Prestation" :options="$options" choose="Choisir" />', ['options' => ['Coupe', 'Couleur']], 'select', 'choice'],
]);

it('posts the word a list shows, and keeps what was chosen', function () {
    $html = Blade::render('<x-kit.field name="service" label="Prestation" :options="$options" value="Couleur" />', ['options' => ['Coupe', 'Couleur']]);

    expect($html)->toContain('<option value="Coupe" >Coupe</option>')->toContain('<option value="Couleur" selected>Couleur</option>');
});

it('says its error under it, keeps what was typed, and never a password', function () {
    View::share('errors', (new ViewErrorBag)->put('default', new MessageBag(['fields.title' => ['Trop long.']])));
    $session = app('session.store');
    $session->put('_old_input', ['fields' => ['title' => 'Un titre'], 'secret' => 'hunter2']);
    request()->setLaravelSession($session);

    $xpath = renderedXPath(Blade::render('<x-kit.field name="fields[title]" label="Titre" hint="Court." />'));
    $input = $xpath->query("//input[@id='field-fields-title']")->item(0);

    assert($input instanceof DOMElement);

    expect($input->getAttribute('value'))->toBe('Un titre')
        ->and($input->getAttribute('aria-invalid'))->toBe('true')
        ->and($input->getAttribute('aria-describedby'))->toBe('field-fields-title-hint field-fields-title-error')
        ->and($xpath->query("//*[@id='field-fields-title-error']")->item(0)?->textContent)->toBe('Trop long.')
        ->and(Blade::render('<x-kit.field name="secret" type="password" label="Mot de passe" />'))->not->toContain('hunter2');

    View::share('errors', null);
});

it('refuses a field it would draw half right', function (string $template, array $data, string $refusal) {
    expect(fn () => Blade::render($template, $data))->toThrow(ViewException::class, $refusal);
})->with([
    'no label' => ['<x-kit.field name="email" />', [], 'needs a name and a label'],
    'a type outside the kinds' => ['<x-kit.field name="cv" type="file" label="CV" />', [], 'none of the three kinds'],
    'options on a line' => ['<x-kit.field name="day" type="date" label="Jour" :options="$options" />', ['options' => ['lundi']], 'a choice takes its options and no type'],
    'nothing to choose' => ['<x-kit.field name="day" label="Jour" :options="[]" />', [], 'nothing to choose'],
]);
