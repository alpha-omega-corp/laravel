<?php

declare(strict_types=1);

namespace Workbench\App\Framework;

use function Orchestra\Testbench\package_path;

/**
 * The record of a run of work on the kit, as the framework tab draws it.
 *
 * `workbench/record/<date>/` holds one run: `run.php`, what was asked, what was
 * decided at each step and why, with the pictures sent back while it ran;
 * `pictures/`, those pictures; and `writers.json`, what each agent that wrote a
 * business or a direction reported when it finished. Nothing here is generated
 * at request time: it is an account, written once, of how the views beside it
 * came to be, kept where those views are so the reasons are not lost with the
 * conversation that held them.
 *
 * @phpstan-type Picture array{file: string, width: int, height: int, caption: string}
 * @phpstan-type Step array{title: string, why: list<string>, pictures?: list<Picture>, see?: list<array{label: string, route: string, query: array<string, string>}>}
 */
final class Record
{
    /**
     * The runs on record, the latest first.
     *
     * @return list<string>
     */
    public static function runs(): array
    {
        $runs = array_map('basename', array_filter(
            glob(package_path('workbench/record/*'), GLOB_ONLYDIR) ?: [],
            fn (string $folder): bool => is_file($folder.'/run.php'),
        ));

        rsort($runs);

        return array_values($runs);
    }

    /**
     * One run with what its writers reported, or null when there is none by that name.
     *
     * @return array<string, mixed>|null
     */
    public static function run(?string $name): ?array
    {
        $name = in_array($name, self::runs(), true) ? $name : (self::runs()[0] ?? null);

        if ($name === null) {
            return null;
        }

        $writers = package_path("workbench/record/{$name}/writers.json");

        return [
            'name' => $name,
            ...require package_path("workbench/record/{$name}/run.php"),
            'writers' => is_file($writers) ? (array) json_decode((string) file_get_contents($writers), true) : [],
        ];
    }

    /**
     * Where one picture of one run is, or null for a name that is not one.
     */
    public static function picture(string $run, string $file): ?string
    {
        if (! in_array($run, self::runs(), true) || preg_match('/^[a-z0-9][a-z0-9-]*\.webp$/', $file) !== 1) {
            return null;
        }

        $path = package_path("workbench/record/{$run}/pictures/{$file}");

        return is_file($path) ? $path : null;
    }
}
