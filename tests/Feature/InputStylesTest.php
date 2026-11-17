<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;
use Workbench\App\Framework\Kit;
use Workbench\App\Framework\Site;

/*
 * The input styles: a site's form fields drawn the default way, with floating
 * labels or with an icon, chosen on <html data-inputs> and on the framework
 * tab. The field's markup is the same in all three; it only has to carry what
 * the stylesheet reads — a placeholder and an icon after the control.
 */

beforeEach(function () {
    Vite::useHotFile(base_path('tests/does-not-exist.hot'))->useBuildDirectory('build');
    Kit::forget();
});

it('gives a line and a long text a placeholder, a space when it has none, and keeps one it is given', function () {
    $html = Blade::render('<x-kit.field name="name" label="Nom" /><x-kit.field name="message" type="long" label="Message" /><x-kit.field name="city" label="Ville" placeholder="Sion" />');

    expect(substr_count($html, 'placeholder=" "'))->toBe(2)
        ->and($html)->toContain('placeholder="Sion"');
});

it('gives a choice no placeholder', function () {
    expect(Blade::render('<x-kit.field name="scope" label="Type" :options="[\'A\', \'B\']" />'))->not->toContain('placeholder=');
});

it('draws the icon after the control, so the control stays the second child', function () {
    $html = Blade::render('<x-kit.field name="contact" label="Courriel" autocomplete="email" />');

    expect($html)->toContain('data-kit-part="field-icon"')
        ->and(strpos($html, '<input'))->toBeLessThan(strpos($html, 'field-icon'))
        ->and(strpos($html, '<label'))->toBeLessThan(strpos($html, '<input'));
});

it('picks the icon from what the field is for', function (string $tag, string $icon) {
    // The icon's drawing, without the <svg> around it, which takes the field's attributes.
    $drawing = trim((string) preg_replace('~^<svg[^>]*>|</svg>$~', '', trim(svg('lucide-'.$icon)->contents())));

    expect(Blade::render($tag))->toContain($drawing);
})->with([
    'an e-mail by its autocomplete' => ['<x-kit.field name="contact" label="C" autocomplete="email" />', 'mail'],
    'a phone' => ['<x-kit.field name="phone" type="tel" label="T" />', 'phone'],
    'a date' => ['<x-kit.field name="date" type="date" label="D" />', 'calendar'],
    'a time' => ['<x-kit.field name="time" type="time" label="H" />', 'clock'],
    'a party' => ['<x-kit.field name="party" type="number" label="P" />', 'users'],
    'a name' => ['<x-kit.field name="name" label="N" autocomplete="name" />', 'user'],
    'a long text' => ['<x-kit.field name="message" type="long" label="M" />', 'message-square'],
    'a choice' => ['<x-kit.field name="scope" label="S" :options="[\'A\']" />', 'list'],
    'one named' => ['<x-kit.field name="name" label="N" icon="star" />', 'star'],
]);

it('takes an input style from the address, says so in it, and falls back to the default on anything else', function () {
    $business = array_key_first(Site::businesses());
    $design = Site::designs($business)[0];

    foreach (['floating', 'icon'] as $style) {
        $choice = Site::choose(['business' => $business, 'inputs' => $style]);

        expect($choice['inputs'])->toBe($style)
            ->and($choice['chosen']['inputs'])->toBeTrue()
            ->and(Site::query($choice)['inputs'])->toBe($style);
    }

    $choice = Site::choose(['business' => $business, 'inputs' => 'sideways']);

    expect($choice['inputs'])->toBe('default')
        ->and(Site::query($choice))->toBe(['business' => $business, 'design' => $design['slug']]);
});

it('writes the style on the page\'s <html> and offers every one beside it', function () {
    $business = array_key_first(Site::businesses());
    $design = Site::designs($business)[0];

    $this->get(route('framework.site', ['business' => $business, 'design' => $design['slug'], 'inputs' => 'floating']))
        ->assertOk()
        ->assertSee('data-inputs="floating"', false);

    $html = $this->get(route('framework.businesses', ['business' => $business, 'design' => $design['slug']]))->assertOk()->getContent();

    expect($html)->toContain(__('framework.businesses.inputs'));

    foreach (Site::INPUTS as $style) {
        expect($html)->toContain(e(__('framework.businesses.inputs_'.$style)));
    }

    expect($html)->toContain(e(route('framework.businesses', ['business' => $business, 'design' => $design['slug'], 'inputs' => 'icon'])));
});
