<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * How the page answers the operating system's colour preference.
 *
 * `System` is not an attribute value: it is the absence of `data-theme` on
 * `<html>`, which leaves `color-scheme: light dark` in resources/css/themes.css
 * to follow whatever the system says. The other two pin it.
 */
enum Appearance: string
{
    case System = 'system';
    case Light = 'light';
    case Dark = 'dark';

    public static function default(): self
    {
        return self::System;
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
     * The value of `data-theme` on `<html>`, or null when the system decides.
     */
    public function attribute(): ?string
    {
        return $this === self::System ? null : $this->value;
    }
}
