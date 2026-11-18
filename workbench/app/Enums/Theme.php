<?php

declare(strict_types=1);

namespace Workbench\App\Enums;

/**
 * The palettes the UI kit can be rendered in.
 *
 * Every case has a matching `[data-palette='…']` token block in
 * resources/css/themes.css, and every one of them is declared in both schemes,
 * so the palette says nothing about light or dark — that is the other axis, and
 * it is {@see Appearance}. `Orchard` is also the token set declared in `@theme`
 * in resources/css/kit.css, which is what makes it the default.
 */
enum Theme: string
{
    case Orchard = 'orchard';
    case Sandstone = 'sandstone';
    case Harbour = 'harbour';
    case Graphite = 'graphite';
    case Blossom = 'blossom';
    case Fresh = 'fresh';
    case Vellum = 'vellum';
    case Marigold = 'marigold';
    case Lagoon = 'lagoon';
    case Nocturne = 'nocturne';
    case Ember = 'ember';
    case Concrete = 'concrete';
    case Quill = 'quill';
    case Alpine = 'alpine';
    case Clay = 'clay';
    case Plum = 'plum';
    case Denim = 'denim';
    case Sorbet = 'sorbet';
    case Marble = 'marble';
    case Locanda = 'locanda';
    case Forno = 'forno';
    case Basilico = 'basilico';

    public static function default(): self
    {
        return self::Orchard;
    }

    public function label(): string
    {
        return ucfirst($this->value);
    }

    /**
     * The one-line description shown beside the palette in the picker.
     */
    public function summary(): string
    {
        return __('theme.summary.'.$this->value);
    }
}
