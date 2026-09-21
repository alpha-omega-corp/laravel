<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * How far a surface stands off the page behind it.
 *
 * `Normal` is not an attribute value: it is the absence of `data-contrast` on
 * `<html>`, which leaves each palette's own tokens alone. `High` pushes the page
 * further from the panel, strengthens the rule and gives every panel an edge,
 * including the three palettes that draw none.
 */
enum Contrast: string
{
    case Normal = 'normal';
    case High = 'high';

    public static function default(): self
    {
        return self::Normal;
    }

    public function label(): string
    {
        return __('theme.label.'.$this->value);
    }

    /**
     * The one-line description shown beside the option in the picker.
     */
    public function summary(): string
    {
        return __('theme.summary.'.$this->value);
    }

    /**
     * The value of `data-contrast` on `<html>`, or null when nothing is forced.
     */
    public function attribute(): ?string
    {
        return $this === self::Normal ? null : $this->value;
    }
}
