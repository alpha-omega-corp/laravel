<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

/*
 * <x-kit.icon>: one Lucide icon by name, hidden from the accessibility tree,
 * and nothing at all for a name the set does not have — a session that writes
 * one icon wrong must not take the page down with it.
 */

it('draws a Lucide icon by its name, decorative and in the current colour', function () {
    $html = Blade::render('<x-kit.icon name="wheat" class="size-5 text-accent" />');

    expect($html)->toStartWith('<svg')
        ->toContain('aria-hidden="true"')
        ->toContain('data-kit="icon"')
        ->toContain('class="size-5 text-accent"')
        ->toContain('stroke="currentColor"');
});

it('renders nothing for a name the set does not have, or one that is not a name', function (string $name) {
    expect(trim(Blade::render('<x-kit.icon :name="$name" />', ['name' => $name])))->toBe('');
})->with(['no-such-icon', '../../etc/passwd', 'Phone', 'phone.svg', '']);

it('marks a band\'s details by what their link is, or by the icon they name', function () {
    $html = Blade::render('<x-kit.cta-band :details="$details" />', ['details' => [
        ['label' => 'Téléphone', 'value' => '+41 22 000 00 00', 'href' => 'tel:+41220000000'],
        ['label' => 'Courriel', 'value' => 'anna@example.org', 'href' => 'mailto:anna@example.org'],
        ['label' => 'Horaires', 'value' => 'Mar–Sam', 'icon' => 'clock'],
        ['label' => 'Parking', 'value' => 'Derrière'],
    ]]);

    expect(substr_count($html, 'data-kit="icon"'))->toBe(3);
});

it('draws a feature\'s icon above its title, and only when it names one', function () {
    $html = Blade::render('<x-kit.features :items="$items" />', ['items' => [
        ['title' => 'Boucherie', 'icon' => 'beef'],
        ['title' => 'Traiteur'],
    ]]);

    expect(substr_count($html, 'data-kit="icon"'))->toBe(1)
        ->and(strpos($html, 'data-kit="icon"'))->toBeLessThan(strpos($html, 'Boucherie'));
});
