<?php

declare(strict_types=1);

namespace Workbench\App\Enums;

/**
 * The kit's five arrangements, one per layout in `.claude/skills/ui-kit/layouts`.
 * The case value is the layout's name, so nothing here restates that table.
 *
 * The framework tab crosses it with a {@see Project}'s own sections, and the
 * views live there rather than here, because the same layout means a different
 * composition per section (`framework.layouts.<layout>`). Which layout a
 * section arrives in is declared by the project that owns it, not defaulted: a
 * different kind of work wants a different arrangement.
 *
 * {@see palette()} and {@see variation()} are the pairings this layout's own
 * spec rates best, and they are what the tab dresses it in until the viewer
 * picks otherwise — so a layout, its colours and its degree arrive as the
 * coherent set they were rated as.
 */
enum KitLayout: string
{
    case Console = 'console';
    case Workspace = 'workspace';
    case Stacked = 'stacked';
    case Marketing = 'marketing';
    case Focus = 'focus';

    /**
     * The palette this layout is pinned to, the one rated `best` for it.
     */
    public function palette(): Theme
    {
        return match ($this) {
            self::Console => Theme::Graphite,
            self::Workspace => Theme::Harbour,
            self::Stacked => Theme::Orchard,
            self::Marketing => Theme::Fresh,
            self::Focus => Theme::Sandstone,
        };
    }

    /**
     * How much of itself this layout wants shown. A back office has no room
     * for a hero and no use for one; a public page is mostly hero.
     */
    public function variation(): Variation
    {
        return match ($this) {
            self::Console, self::Workspace => Variation::Plain,
            self::Stacked, self::Focus => Variation::Standard,
            self::Marketing => Variation::Rich,
        };
    }

    public function label(): string
    {
        return __('layout.'.$this->value.'.label');
    }

    /**
     * The one-line description shown under the section's heading.
     */
    public function summary(): string
    {
        return __('layout.'.$this->value.'.summary');
    }
}
