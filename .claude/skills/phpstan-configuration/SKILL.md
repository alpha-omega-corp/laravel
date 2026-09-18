---
name: phpstan-configuration
description: "Invoke before editing phpstan.neon, changing the PHPStan level or analysed paths, tuning Larastan parameters, or adding any ignoreErrors entry or baseline. Also invoke when diagnosing a PHPStan or Larastan error that appears in PhpStorm's inspections but not on the CLI (or the reverse), when a Larastan rule fires on a file that should be exempt, and when `composer types:check` and the IDE disagree. Covers: why this project keeps one config for CLI and IDE, the settled `configDirectories` decision, and how to verify a config change. Skip for ordinary type errors in application code, which are real bugs to fix, not config problems."
---

# PHPStan Configuration

`phpstan.neon` carries no explanatory comments. Rationale for every non-obvious setting lives in this skill, so the config stays scannable. When you change a setting that future readers could not infer, document it here and leave the config bare — never restate the reasoning inline.

## One config, two consumers

`phpstan.neon` is the single source of truth. `composer types:check` runs it, and PhpStorm's PHPStan inspection points at the same file (`.idea/php.xml`, `PhpStanOptionsConfiguration`). Both must stay green against it.

Do not add a second IDE-only config. That was tried (`phpstan-storm.neon`) and it silently did nothing: PhpStorm was never pointed at it, and its `ignoreErrors` path could not have matched anyway, because PHPStan absolutizes a relative `path` against the config file's own directory. Fix the root cause in `phpstan.neon` instead.

## Settled: `configDirectories`

```neon
configDirectories:
    - config
    - /tmp/PHPStantemp_folder*/config
```

Larastan's `NoEnvCallsOutsideOfConfigRule` decides whether an `env()` call is "outside of the config directory" with an absolute-path prefix check against these directories, defaulting to `config_path()`.

PhpStorm's on-the-fly inspection does not analyse a file in place. It copies the editor buffer to `/tmp/PHPStantemp_folder<n>/<project-relative-path>` and analyses the copy, so the prefix check fails and every `env()` call in `config/` is reported as a violation in the IDE while the CLI stays clean. The second entry is the IDE's mirror of the real directory.

Both entries are load-bearing:

- Larastan globs each entry and requires `is_dir`, so the `/tmp` pattern resolves to whatever folder the current inspection run created and matches nothing when PhpStorm is not involved.
- The pattern is anchored to `/config`, so a temp copy of an `app/` or `routes/` file is still checked. Genuine `env()` violations outside `config/` keep failing.
- `config` must stay listed. Larastan's `ConfigParser` reuses this parameter for `config()` return-type inference; dropping it degrades typing across the codebase.

The `/tmp` prefix is the IDE-side `java.io.tmpdir`. Correct for this WSL setup, and it would need revisiting only if the project were analysed from a Windows-side PhpStorm.

## Do not suppress this rule

An `ignoreErrors` entry, a baseline, or a `@phpstan-ignore` comment for `larastan.noEnvCallsOutsideOfConfig` hides real bugs: `env()` returns `null` once the config is cached, so a genuine violation is a production failure waiting to happen. Outside `config/`, read through `config()`.

## Verifying a config change

A CLI run alone does not prove the IDE is fixed, and vice versa. After touching path-sensitive parameters, check all three:

```bash
vendor/bin/phpstan clear-result-cache -c phpstan.neon

# 1. CLI baseline: expect 0 errors
vendor/bin/phpstan analyse --no-progress --memory-limit=1G

# 2. IDE path: mirror a config file the way PhpStorm does, expect it to pass
mkdir -p /tmp/PHPStantemp_folder999/config
cp config/database.php /tmp/PHPStantemp_folder999/config/
vendor/bin/phpstan analyse -c phpstan.neon --no-progress /tmp/PHPStantemp_folder999/config/database.php

# 3. Negative control: env() in a non-config mirror must STILL be reported
mkdir -p /tmp/PHPStantemp_folder999/app
printf '<?php\nnamespace App;\nclass Probe { public function v(): mixed { return env("APP_KEY"); } }\n' \
    > /tmp/PHPStantemp_folder999/app/Probe.php
vendor/bin/phpstan analyse -c phpstan.neon --no-progress /tmp/PHPStantemp_folder999/app/Probe.php

rm -rf /tmp/PHPStantemp_folder999
```

Step 3 is the one that catches an over-broad exemption. A fix that makes step 2 pass by also silencing step 3 has traded a false positive for a blind spot.

Relative `includes` and `paths` resolve against the config file's directory, so a copy of `phpstan.neon` placed elsewhere will fail to load `vendor/larastan/larastan/extension.neon`. Compare configs in place, not from `/tmp`.
