<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

/**
 * The photograph a demo business has not got.
 *
 * The kit frames a picture that is not there yet and captions it with what
 * belongs there (`<x-kit.media subject="…">`), and most components draw that
 * frame themselves. A few take an `<img>` and nothing else — the gallery's
 * pictures above all — and the showcase commits no photographs. So a content
 * file writes `picture:La salle dressée pour un mariage` where a file's
 * address would go, and that becomes the address of this drawing: the same
 * frame, as an image, with the same caption.
 *
 * One neutral grey at low opacity, so it sits on any palette's canvas in
 * either scheme: an image cannot read the page's tokens.
 */
final class Picture
{
    public const PREFIX = 'picture:';

    /**
     * Every `picture:<subject>` in a prefab's rows, turned into an address.
     *
     * @param  array<array-key, mixed>  $rows
     * @return array<array-key, mixed>
     */
    public static function resolve(array $rows): array
    {
        array_walk_recursive($rows, function (mixed &$value): void {
            if (is_string($value) && str_starts_with($value, self::PREFIX)) {
                $value = route('framework.picture', ['subject' => trim(substr($value, strlen(self::PREFIX)))]);
            }
        });

        return $rows;
    }

    public static function svg(string $subject, int $width = 1200, int $height = 900): string
    {
        $width = max(200, min(2400, $width));
        $height = max(200, min(2400, $height));
        $subject = e(mb_strimwidth(trim($subject), 0, 70, '…'));
        $cx = $width / 2;
        $cy = $height / 2;
        $size = (int) round(min($width, $height) / 22);

        $innerWidth = $width - 3;
        $innerHeight = $height - 3;
        $glyph = min($width, $height) / 9;
        $left = $cx - $glyph / 2;
        $top = $cy - $glyph * 0.9;
        $text = $cy + $glyph * 0.75;

        // The frame's glyph is the media frame's own: a picture, in outline.
        return <<<SVG
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {$width} {$height}" width="{$width}" height="{$height}" role="img" aria-label="{$subject}">
              <rect width="{$width}" height="{$height}" fill="#808890" fill-opacity="0.16"/>
              <rect x="1.5" y="1.5" width="{$innerWidth}" height="{$innerHeight}" fill="none" stroke="#808890" stroke-opacity="0.4" stroke-width="3"/>
              <svg x="{$left}" y="{$top}" width="{$glyph}" height="{$glyph}" viewBox="0 0 24 24" fill="none" stroke="#808890" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Z"/>
              </svg>
              <text x="{$cx}" y="{$text}" text-anchor="middle" font-family="ui-sans-serif, system-ui, sans-serif" font-size="{$size}" fill="#808890">{$subject}</text>
            </svg>
            SVG;
    }
}
