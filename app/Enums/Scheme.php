<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * How a theme answers the operating system's colour preference.
 */
enum Scheme: string
{
    case Light = 'light';
    case Dark = 'dark';
    case Dual = 'dual';

    public function label(): string
    {
        return __('theme.scheme.'.$this->value);
    }
}
