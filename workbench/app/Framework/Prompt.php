<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

/**
 * The design inspected on the framework tab, written as deployer's
 * Hallucinator takes it: one `Label: value` line per field of its form, so a
 * build started from it is handed the business, the look and every page the
 * tab draws, and not a roll's guess at them.
 *
 * The labels are deployer's (`sitebuild::Options`), in English whatever the
 * tab's language, because deployer reads them back (`sitebuild::framework`):
 * Brief, Business, Direction, Theme (the kit's palette), Layout (the home
 * page's), the words of the business and of the direction, Pages and Look.
 * What deployer has no field for (the design's name, the light or dark scheme,
 * the arrangements, a layout for each page other than the home) is said in
 * Pages and Look, where the session reads it, and the design is named with the
 * skill's file so the session can open it.
 *
 * Each value keeps to deployer's own ceiling for its field and is shortened a
 * whole sentence or a whole page at a time, so nothing reaches deployer that
 * it would cut through the middle.
 *
 * @phpstan-import-type Choice from Site
 * @phpstan-import-type Page from Kit
 */
final class Prompt
{
    /** deployer's `BRIEF_LIMIT`: what it keeps of the line somebody typed. */
    public const BRIEF = 240;

    /** deployer's `PART_LIMIT`: each of Pages, Features, Look and Demo. */
    public const PART = 480;

    /** deployer's `WORDS_LIMIT`: a design value's own words. */
    public const WORDS = 200;

    /**
     * The fields, in the order deployer's form asks them, empty ones left out.
     *
     * @param  Choice  $choice
     * @return array<string, string>
     */
    public static function fields(array $choice): array
    {
        $business = $choice['business'];
        $design = $choice['design'];
        $layouts = self::layouts($choice);

        // The design's reason is what this site is: its opening sentences the brief, the next ones the business's words.
        $why = self::split($design['why'] !== '' ? $design['why'] : $business['summary']);
        $brief = self::sentences($why, self::BRIEF);
        $rest = array_slice($why, max(1, count(self::split($brief))));

        return array_filter([
            'Brief' => $brief,
            'Business' => $business['name'],
            'Direction' => $choice['direction'],
            'Theme' => $choice['palette'],
            'Layout' => $layouts['/'] ?? reset($layouts) ?: $choice['layout'],
            'Business words' => self::sentences($rest, self::WORDS),
            'Direction words' => self::sentences(self::split($business['directions'][$choice['direction']] ?? ''), self::WORDS),
            'Pages' => self::pages($choice, $layouts),
            'Look' => self::look($choice),
        ], fn (string $value): bool => $value !== '');
    }

    /**
     * The whole prompt: a line naming what it is, then a field a line.
     *
     * @param  Choice  $choice
     */
    public static function text(array $choice): string
    {
        $lines = ['Hallucinator · '.$choice['business']['name'].' · '.$choice['design']['name']];

        foreach (self::fields($choice) as $label => $value) {
            $lines[] = "{$label}: {$value}";
        }

        return implode("\n", $lines);
    }

    /**
     * The layout of every page, as the tab would draw it: the page inspected
     * in the layout chosen for it, every other in the design's when the
     * direction takes it, or the first it does take.
     *
     * @param  Choice  $choice
     * @return array<string, string> path to layout
     */
    public static function layouts(array $choice): array
    {
        $layouts = [];

        foreach ($choice['business']['pages'] as $page) {
            $fits = Kit::layoutsFor($page, $choice['direction']) ?: $page['layouts'];
            $own = $choice['design']['pages'][$page['path']] ?? null;

            $layouts[$page['path']] = match (true) {
                $page['path'] === $choice['page']['path'] => $choice['layout'],
                in_array($own, $fits, true) => $own,
                default => $fits[0],
            };
        }

        return $layouts;
    }

    /**
     * Every page, its name on the site, its layout and its prefabs; whole
     * pages are dropped from the end rather than one cut in two.
     *
     * @param  Choice  $choice
     * @param  array<string, string>  $layouts
     */
    private static function pages(array $choice, array $layouts): string
    {
        $said = array_map(function (array $page) use ($choice, $layouts): string {
            $name = $choice['content']['pages'][$page['path']]['label'] ?? $page['label'] ?? ($page['path'] === '/' ? 'home' : $page['role']);
            $with = $page['prefabs'] !== [] ? ' with '.implode(', ', $page['prefabs']) : '';

            return "{$page['path']} ({$name}) in the {$layouts[$page['path']]} layout{$with}";
        }, $choice['business']['pages']);

        return self::joined($said, '; ', self::PART);
    }

    /**
     * The design by name and file, what the viewer changed of it, the scheme
     * and the arrangements.
     *
     * @param  Choice  $choice
     */
    private static function look(array $choice): string
    {
        $design = $choice['design'];
        $chosen = $choice['chosen'];

        $changed = array_filter([
            $chosen['direction'] ? "the {$choice['direction']} direction" : null,
            $chosen['palette'] ? "the {$choice['palette']} palette" : null,
            $chosen['layout'] ? "{$choice['page']['path']} in the {$choice['layout']} layout" : null,
            $chosen['scheme'] ? 'its own scheme' : null,
            $chosen['variants'] ? 'its own arrangements' : null,
        ]);

        $parts = [
            "The {$design['name']} design of the ui-kit skill's designs/{$choice['business']['name']}.md"
                .($changed !== [] ? ', with '.implode(', ', $changed).' instead of the design\'s' : '').'.',
            match ($choice['scheme']) {
                'light' => 'Light scheme.',
                'dark' => 'Dark scheme.',
                default => 'Light or dark as the visitor\'s system is.',
            },
        ];

        // Not part of any design, so said only when asked: <html data-inputs> draws every form field this way.
        if ($choice['inputs'] !== 'default') {
            $parts[] = $choice['inputs'] === 'floating'
                ? 'Form fields with floating labels (<html data-inputs="floating">).'
                : 'Form fields with an icon at the left (<html data-inputs="icon">).';
        }

        if ($choice['variants'] !== []) {
            $parts[] = 'Arrangements: '.implode(', ', array_map(
                fn (string $component, string $variant): string => "{$component} {$variant}",
                array_keys($choice['variants']),
                $choice['variants'],
            )).'.';
        }

        return self::joined($parts, ' ', self::PART);
    }

    /**
     * As many whole sentences as fit in `limit` bytes; a first sentence too
     * long for it alone is cut at its last clause that fits, or at a word.
     *
     * @param  list<string>  $sentences
     */
    private static function sentences(array $sentences, int $limit): string
    {
        if ($sentences === []) {
            return '';
        }

        $kept = self::joined($sentences, ' ', $limit);

        if ($kept !== '') {
            return $kept;
        }

        $cut = mb_strcut($sentences[0], 0, $limit, 'UTF-8');
        $clause = max((int) strrpos($cut, ', '), (int) strrpos($cut, ': '), (int) strrpos($cut, '; '));
        $word = (int) strrpos($cut, ' ');

        return rtrim(substr($cut, 0, $clause > $limit / 2 ? $clause : ($word ?: strlen($cut))), ' ,;:');
    }

    /**
     * Text on one line, as deployer puts every field, in sentences.
     *
     * @return list<string>
     */
    private static function split(string $text): array
    {
        $text = self::plain($text);

        return $text === '' ? [] : (preg_split('/(?<=[.!?])\s+/u', $text) ?: []);
    }

    /**
     * The pieces joined, as many from the start as fit in `limit` bytes.
     *
     * @param  list<string>  $pieces
     */
    private static function joined(array $pieces, string $glue, int $limit): string
    {
        $kept = '';

        foreach ($pieces as $piece) {
            $next = $kept === '' ? $piece : $kept.$glue.$piece;

            if (strlen($next) > $limit) {
                break;
            }

            $kept = $next;
        }

        return $kept;
    }

    /** On one line, as deployer puts every field. */
    private static function plain(string $text): string
    {
        return trim((string) preg_replace('/\s+/u', ' ', $text));
    }
}
