<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/*
 * The form fields: every attribute a tag gives them but its class and style
 * belongs to the field, so the browser can fill a form in (autocomplete) and
 * offer the right keyboard (inputmode), and a required field is one. The
 * wrapper keeps only what places the field in its form.
 */

it('gives the field every attribute but the class that places it', function (string $template, array $data, string $field, array $attributes) {
    $xpath = renderedXPath(Blade::render($template, $data));

    $control = $xpath->query("//{$field}")->item(0);
    $wrapper = $xpath->query('/*[@data-ref]')->item(0);

    assert($control instanceof DOMElement && $wrapper instanceof DOMElement);

    foreach ($attributes as $name => $value) {
        expect($control->getAttribute($name))->toBe($value, "{$field} lost {$name}")
            ->and($wrapper->hasAttribute($name))->toBeFalse("the wrapper kept {$name}");
    }

    expect($wrapper->getAttribute('class'))->toContain('space-y-1.5')->toContain('sm:col-span-2')
        ->and($control->getAttribute('class'))->not->toContain('sm:col-span-2');
})->with([
    'input' => [
        '<x-kit.input name="email" type="email" label="Courriel" autocomplete="email" inputmode="email" required class="sm:col-span-2" />',
        [],
        'input',
        ['type' => 'email', 'name' => 'email', 'autocomplete' => 'email', 'inputmode' => 'email', 'required' => 'required'],
    ],
    'textarea' => [
        '<x-kit.textarea name="message" label="Message" maxlength="500" required class="sm:col-span-2" />',
        [],
        'textarea',
        ['name' => 'message', 'maxlength' => '500', 'required' => 'required'],
    ],
    'select' => [
        '<x-kit.select name="country" label="Pays" :options="$options" autocomplete="country-name" required class="sm:col-span-2" />',
        ['options' => ['ch' => 'Suisse']],
        'select',
        ['name' => 'country', 'autocomplete' => 'country-name', 'required' => 'required'],
    ],
]);

it('names the field and its label with the id it is given', function () {
    $xpath = renderedXPath(Blade::render('<x-kit.input name="email" id="contact-email" label="Courriel" hint="Nous répondons le jour même." />'));

    expect($xpath->query("//input[@id='contact-email'][@aria-describedby='contact-email-description']")->length)->toBe(1)
        ->and($xpath->query("//label[@for='contact-email']")->length)->toBe(1)
        ->and($xpath->query("//*[@id='contact-email-description']")->length)->toBe(1)
        ->and($xpath->query('/*[@id]')->length)->toBe(0);
});
