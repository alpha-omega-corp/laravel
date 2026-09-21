<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * How much of itself a design shows — the third axis of the framework tab,
 * beside the layout and the palette.
 *
 * A layout says where things go and a palette says what colour they are.
 * Neither says how much there is. `Plain` strips a section to what it is for,
 * `Rich` gives it every image, ornament and breath it can carry, and
 * `Standard` is the middle a public page normally sits at.
 *
 * It is a degree rather than a style, so a section reads the dial and not the
 * case: {@see showsMedia()}, {@see showsFlourish()}, {@see rhythm()} and
 * {@see display()} are the whole of what a body needs to know, which is why
 * adding a fourth degree would not touch a single view.
 */
enum Variation: string
{
    case Plain = 'plain';
    case Standard = 'standard';
    case Rich = 'rich';

    public static function default(): self
    {
        return self::Standard;
    }

    /**
     * Whether an image is drawn here. `$primary` marks the one image the
     * section is actually about — the hero, the dish, the haircut. Everything
     * else is decoration, and only the richest degree keeps it.
     */
    public function showsMedia(bool $primary = true): bool
    {
        return match ($this) {
            self::Plain => false,
            self::Standard => $primary,
            self::Rich => true,
        };
    }

    /**
     * Whether the small ornaments — badges, pills, legends, captions — are
     * drawn at all. The content underneath them never depends on this.
     */
    public function showsFlourish(): bool
    {
        return $this !== self::Plain;
    }

    /** The vertical rhythm between a section's own blocks. */
    public function rhythm(): string
    {
        return match ($this) {
            self::Plain => 'space-y-6',
            self::Standard => 'space-y-10',
            self::Rich => 'space-y-14',
        };
    }

    /** The size the one heading a section leads with is set in. */
    public function display(): string
    {
        return match ($this) {
            self::Plain => 'text-xl',
            self::Standard => 'text-2xl',
            self::Rich => 'text-title',
        };
    }

    public function label(): string
    {
        return __('framework.variation.'.$this->value.'.label');
    }

    /**
     * The one-line description shown beside the degree in the rail.
     */
    public function summary(): string
    {
        return __('framework.variation.'.$this->value.'.summary');
    }
}
