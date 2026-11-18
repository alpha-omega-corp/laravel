<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

/**
 * Claude's shots: the pictures deployer keeps of this project, as the
 * framework tab draws them.
 *
 * Deployer files every picture a session takes or saves for a project
 * (take_progress_picture, save_progress_picture) under its own folder,
 * `~/.config/deployer/progress/<project>/`: the images, and `index.json`
 * listing them newest first with the note each was filed with. Its console
 * shows them in the project's side panel under that name; this reads the same
 * folder, so a picture filed there is on the tab the moment it is filed, and
 * nothing is copied into the package.
 *
 * The folder is deployer's, outside the repository, so it is found rather than
 * assumed: `DEPLOYER_PROGRESS` names it when set, and a test points it at a
 * fixture with {@see use()}. With no folder, or no index, there are no shots.
 *
 * @phpstan-type Shot array{id: string, file: string, kind: string, url: string, note: string, at: string, width: int, height: int}
 */
final class Shots
{
    /** The project the pictures are filed under in deployer: this package's own. */
    public const PROJECT = 'laravel';

    private static ?string $folder = null;

    /**
     * Read the shots from another folder (a test's fixture), or from deployer's again with null.
     */
    public static function use(?string $folder): void
    {
        self::$folder = $folder;
    }

    public static function folder(): string
    {
        if (self::$folder !== null) {
            return self::$folder;
        }

        $root = getenv('DEPLOYER_PROGRESS') ?: rtrim((string) (getenv('HOME') ?: ''), '/').'/.config/deployer/progress';

        return rtrim($root, '/').'/'.self::PROJECT;
    }

    /**
     * Every shot on file, newest first, each with the image it names present.
     *
     * @return list<Shot>
     */
    public static function all(): array
    {
        $index = self::folder().'/index.json';

        if (! is_file($index)) {
            return [];
        }

        $shots = [];

        foreach ((array) json_decode((string) file_get_contents($index), true) as $entry) {
            if (! is_array($entry)) {
                continue;
            }

            $file = basename((string) ($entry['src'] ?? ''));

            if (self::path($file) === null) {
                continue;
            }

            $shots[] = [
                'id' => (string) ($entry['id'] ?? pathinfo($file, PATHINFO_FILENAME)),
                'file' => $file,
                'kind' => (string) ($entry['kind'] ?? 'progress'),
                'url' => (string) ($entry['url'] ?? ''),
                'note' => (string) ($entry['note'] ?? ''),
                'at' => (string) ($entry['at'] ?? ''),
                'width' => (int) ($entry['width'] ?? 1440),
                'height' => (int) ($entry['height'] ?? 900),
            ];
        }

        usort($shots, fn (array $a, array $b): int => strcmp($b['at'], $a['at']));

        return $shots;
    }

    /**
     * Where one shot's image is, or null for a name that is not one of deployer's.
     */
    public static function path(string $file): ?string
    {
        if (preg_match('/^[A-Za-z0-9][A-Za-z0-9_-]*\.(png|jpe?g|webp|gif)$/i', $file) !== 1) {
            return null;
        }

        $path = self::folder().'/'.$file;

        return is_file($path) ? $path : null;
    }

    /**
     * The image's media type, read from its name.
     */
    public static function type(string $file): string
    {
        return match (strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
            'jpg', 'jpeg' => 'image/jpeg',
            'webp' => 'image/webp',
            'gif' => 'image/gif',
            default => 'image/png',
        };
    }
}
