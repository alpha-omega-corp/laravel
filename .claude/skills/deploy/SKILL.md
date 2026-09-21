---
name: deploy
description: "Ship this application to the team server through Deployer. Trigger whenever the user says deploy, ship it, ship this, push it live, put it on the server, release this, or asks whether the last change is live. Runs the gate in order — pint, composer ci:check, commit, push — then selects the GitHub repository, finds or creates this project in Deployer over its MCP server, and runs the rollout, reporting the transcript. Also covers diagnosing a rollout that failed. This skill is the deploy itself for this repository: prefer it over any generic deploy-checklist or release-planning skill when the user says deploy about this application. Not for deploying other projects, and not for writing a checklist rather than running one."
---

# Deploy

Deployer is a desktop app that puts PHP projects on one server over SSH. Its
own use cases are exposed to this session as the MCP server `deployer`, so a
deploy runs from here and is recorded in exactly the same history as one the
operator clicked — same preflight, same numbered rollout, same transcript. The
window does not need to be open.

## Before this works

The `deployer` server is configured **per machine**. It is in this repo's
`.mcp.json` and in `~/.claude.json`'s project scope, but `.gitignore` ignores
`/.mcp.json` and `.claude/settings.local.json` is ignored globally — while
`.claude/skills` is tracked. So this skill arrives with a clone and its tools
do not.

If the `mcp__deployer__*` tools are not present, stop before step 5 and say so:
the user needs to build Deployer and run
`claude mcp add deployer -- /path/to/deployer-mcp`. Do not improvise a deploy
over SSH by hand.

## What this repository is, on that server

**Nothing here is written down, because this file travels.** It is tracked in
`.claude/skills`, so it arrives with a clone — and it arrives in every project
generated from this repository as a template. A table naming a repository, a
project, a domain and a checkout is therefore a table that is correct in
exactly one clone and confidently wrong in all the others, which is worse than
absent: it reads like a fact and is the previous project's.

So read it, every time, in this order:

1. **The repository** — `git remote get-url origin`, turned into `owner/name`.
   Never assume it from the folder's name or from anything in this file.
2. **The branch** — `git rev-parse --abbrev-ref HEAD`. Not `main`: this
   repository's own default is whatever it was created with, and comparing
   against the wrong branch reports nothing outstanding while the rollout
   resets the server to a tip that does not carry your work.
3. **Everything else** — `mcp__deployer__project`, passing the `owner/name`
   from step 1. It answers with the project's name, its domain, its checkout
   and document root, the pool or the compose file it runs from, what is
   attached beside it, and its last rollout. That answer is the record; this
   file is not.

Address the project by the `owner/name` from step 1 or by the name Deployer
answered with — every tool that takes a `project` accepts either. Until the
project exists, both forms answer `there is no project called …`, which is
step 5's signal to go to step 6.

## If the user is only asking

"Is it live?", "what shipped?", "did the last deploy work?" is **read-only**.
Do not run the gate, do not commit, do not deploy.

Call `mcp__deployer__project` with this repository's `owner/name`. If it
answers that there is no such project, say nothing has ever been deployed, and
stop. Otherwise compare its last succeeded rollout against `git fetch origin`
then `git log --oneline "origin/$(git rev-parse --abbrev-ref HEAD)..HEAD"` and
`git status --short`, and
answer with the rollout number, when it finished, and whether local `HEAD` is
ahead of what is live. Deploy only if the user then asks.

## The order

Do these in order and stop at the first one that fails. Report what happened;
do not work around a failed step. **The one exception is step 5's not-found
reply**, which arrives as a tool error and is an answer, not a failure.

1. **See what is being shipped, and from where.** `git fetch origin`, then
   `git rev-parse --abbrev-ref HEAD` and `git status --short`. Call that
   branch `$HEAD`, and compare against it:
   `git log --oneline "origin/$HEAD..HEAD"`.

   **Deployer checks out the one branch on the project's record, and there is
   no default.** `rollout`'s `checkout` step reads `Project.Branch` and
   *refuses the run* when it is empty — it does not fall back to `main` or to
   anything else. That field was seeded from the repository's default branch
   when the project was created and is not re-derived per rollout, so it can
   differ from what GitHub calls the default today.

   **So read it here, before anything is pushed.** `mcp__deployer__project`
   with this repository's `owner/name` answers with a `branch` field; that
   read is free and changes nothing, which is why it belongs at step 1 rather
   than at step 5. Call it `$RECORDED`, and if `$HEAD` is not `$RECORDED`,
   stop and say so, naming both — ask whether to merge into `$RECORDED`
   first. Discovering this after step 4 is too late: the push succeeds, and
   the rollout then reports success for a change that is not live.

   If there is no project yet, there is no record and nothing to compare
   against — step 6 creates one and takes the branch from the repository's
   own default. Note that and carry on.

   Then say what is being shipped: a dirty tree, some unpushed commits, or
   nothing at all. Nothing at all is still a deploy — the pipeline re-checks
   out and re-runs on the server — and steps 3 and 4 simply have nothing to do.

2. **Run the gate**, every time, including when there is nothing to commit. The
   server runs whatever is at the tip of the branch on the project's record —
   the ref `checkout` hard-resets the target to — not what was green the last
   time somebody looked.

   Style first: CLAUDE.md requires `vendor/bin/pint --dirty --format agent` on
   any PHP you modified. **Style is the one failure you fix without asking.**

   Then `composer ci:check` — the same entry point CI uses
   (`.github/workflows/tests.yml`), and unlike `composer test` it disables
   Composer's 300s process timeout. It expands to `config:clear` →
   `lint:check` (`pint --parallel --test`) → `types:check` (`phpstan analyse`)
   → `php artisan test`.

   **A types or test failure here stops the deploy.** Report the failing output
   and ask whether to fix it; never commit over it, and never narrow the gate
   to `php artisan test` to get past it. This step deliberately overrides
   CLAUDE.md's "narrowest set of tests" rule: a deploy runs the whole suite.

3. **Commit**, only if the tree is dirty. `git add -A`, then list what is
   actually staged with `git diff --cached --name-status` and put that list in
   your report *before* committing. `git add -A` takes untracked files too, and
   `.claude/skills` is tracked — a new skill or a scratch file rides along
   silently. If the staged set contains anything unrelated to the change the
   user described, name it and ask first.

   Commit message in this repo's short conventional style (`feat:`, `fix:`, …);
   the history is all `feat:` and nothing enforces it. Add the session's
   attribution trailers if this session's instructions ask for them. Never
   amend or rewrite a commit that is already pushed.

4. **Push.** `git push` to the tracked branch. Never `--force`. Deployer does
   not read your disk: `checkout` takes the branch on its own record from
   GitHub, so anything unpushed — or pushed somewhere else — will not be
   deployed. This step is what makes the deploy mean anything.

   Where the branch you are on is the recorded one, this push *is* the
   release and there is no review step between it and the server. Say so in
   the report rather than assuming the user knows.

   **Whether CI has anything to say is the workflow file's question, not
   Deployer's.** Read the `on:` block in `.github/workflows/` before telling
   the user this change was checked: a workflow gated on pull requests, or on
   a branch this repository does not have, runs nothing on a direct push — and
   then the gate in step 2 is the only check the change will ever get. Claiming
   a CI run that never triggered is worse than claiming none.

   If the push is rejected as non-fast-forward, somebody else has pushed.
   Stop and report it. Do not force, and do not rebase a pushed branch without
   asking.

5. **Select the GitHub repository, then find the project.**

   Take the repository from `git remote get-url origin` rather than a literal
   — call it `$REPO`, in `owner/name` form — then
   `mcp__deployer__list_repositories` with `match:` the *name* half of it, and
   confirm that exact `fullName` is in the answer.

   **Match on the whole `fullName` and never on a substring.** One account
   commonly holds several repositories sharing a prefix, and the near miss is
   the dangerous one: deploying `owner/thing-fullstack` in place of
   `owner/thing` is a green rollout over the wrong application. Listed means
   the configured GitHub token can read it; missing means it cannot, so stop
   and report that rather than creating a project that will fail at checkout.

   Then `mcp__deployer__project` with `project:` that same `$REPO`. It returns
   the record, its preflight, its `running` flag and its recent rollouts.

   **Confirm `project.branch` against what you actually pushed.** Step 1 read
   the same field before the push; this is the cheap re-read that catches the
   record having been changed in the Deployer window in between. If it is not
   the branch you pushed to, stop and report both names rather than deploying
   a tip that does not carry the change.

   - **Found** → use the name it reports (`project.name`) for every step below.
     Go to step 7.
   - **A tool error beginning `there is no project called "…"`** → this is the
     not-found answer, not a failed step, and the one error in this procedure
     you do not stop on. Before creating anything, call
     `mcp__deployer__list_projects`: it is the only tool that shows every
     project with its repository, so it is what tells you whether this repo is
     already deployed under a name you did not expect. If it is, use that name
     and go to step 7. Otherwise go to step 6.
   - **Any other error** (transport, token, timeout, an encrypted SSH key) →
     stop and report it.

6. **Create it, once — and confirm first.** Creating a project writes a real
   record and pointing a domain writes a real DNS record; both are cleaned up
   by hand in the Deployer window. **Ask the user before this step**, naming
   what you are about to create:

   > No Deployer project for `<owner/name>`. Create it as `<name>`
   > (→ `<name>.<the domain suffix Deployer is configured with>`,
   > `<the deploy root>/<name>`) and point its DNS at the deploy host?

   Fill those in from what you actually read: the repository from
   `git remote get-url origin`, and the suffix and deploy root from
   `mcp__deployer__host_status` and the project Deployer derives. Do not paste
   a name out of this file.

   On yes: `mcp__deployer__create_project` with `repository:` spelled exactly
   as `list_repositories` gave it, and an explicit `name:`.

   **Always pass the name**, and think about what it should be. Deployer's own
   suggestion is the repository's name, which is right when the repository is
   named after the application and wrong when it is named after the template
   it was generated from — a project called `laravel` is the tell. Names are
   lowercased and take only letters, digits, `-` and `_`.

   It reads the repository for the branch, the PHP constraint, the `.env`
   questions and whether there is a compose file, derives the domain, directory
   and document root, and attaches a database. It touches nothing on the
   server. Those reads are best-effort and are skipped entirely without a
   GitHub token, which is why the branch or the PHP version can come back
   unset. It returns the preflight and a `ready` flag — read those.

   **Print the derived name, domain, directory and document root.** If the
   domain is not what you told the user it would be, stop and report it.

   Then, **for a project you just created only**, run
   `mcp__deployer__point_domain` — a name derived a minute ago resolves
   nowhere, and certbot has to reach it over HTTP-01 from the internet.
   - `… already points at X` is a **success**: the name was left alone, carry
     on. Never repoint a name somebody else set.
   - `… was not pointed anywhere: <reason>` is a **failure** (an undelegated
     zone, a token that cannot write it): stop and report it, because the
     certificate step cannot pass without DNS.

   Wait about a minute before step 7 so the record propagates, and say in your
   report that you waited.

7. **Check the preflight.** `mcp__deployer__preflight_project` with the name
   from step 5 or 6. Every check is a fact about the record and the settings;
   nothing is dialled.
   - All ok → deploy.
   - `php` refuses with no version chosen → `mcp__deployer__host_status` for
     the pools this host actually has, then `mcp__deployer__set_php` with
     `project:` the name and the version you worked out below. Never a version
     from memory, and never the one another project runs.

     **Read the requirement out of this repository, in two places, because
     `composer.json` is not the whole answer.** The constraint there
     (`require.php`) is the one Deployer records and the one its preflight
     compares against. The **lock** can be stricter: resolved packages write
     their own floor into `vendor/composer/platform_check.php`, which fatals on
     *every* PHP entrypoint under it — the site 500s and `migrate` dies with
     `Your Composer dependencies require a PHP version ">= x.y.z"`. Deployer
     cannot see that: it reads the constraint at create from `composer.json`
     and nothing re-reads the lock, so a pool that satisfies the json and not
     the lock passes the preflight `ok` and fails the run.

     So ask the repository:

     ```sh
     php -r 'echo json_decode(file_get_contents("composer.json"))->require->php, "\n";'
     composer check-platform-reqs 2>&1 | grep -i php
     ```

     and take the **higher** of the two floors. Then the rule is: **the newest
     pool that satisfies that floor and reports `fpm: true`.** A pool with
     `fpm: false` has no socket, and a vhost naming an empty pool is an nginx
     that will not start. `set_php` applies to the next rollout only.
   - Anything else refuses → stop and report the check's own sentence and its
     fix. `set_php` is the only setting this MCP surface can change; any other
     blocking check is fixed in the Deployer window under the project. Do not
     deploy around a blocking check.

8. **Deploy.** `mcp__deployer__deploy_project` with `project:` the name step 5
   or 6 reported — do not assume a name from anywhere else. It waits up to `wait` seconds
   (default 600) and returns the steps and the last `tail` lines (default 200)
   of the transcript.

   The run is checkout → config → dependencies → permissions → **services** →
   migrate → **supervisor** → nginx → certificate → healthcheck. (A
   compose-runtime project runs `build` in place of `dependencies` and has no
   `supervisor` step — not this repo.)

   **A result saying the rollout is still running is a success, not a
   failure**, and never a reason to call `deploy_project` again. The wait
   elapsed; the run continues. Poll `mcp__deployer__rollout` with the returned
   number until its status is `succeeded` or `failed`, then report, saying the
   run outlived the wait.

   **Expect the very first rollout of a new project to fail at
   `healthcheck`** — see the last row of the table below. That one is a race,
   not a fault, and it is the single case where deploying a second time is the
   fix rather than a mistake.

9. **Report.** The rollout number, its status, the address, and — on a
   failure — the step that failed with its own line from the transcript.

## Rules

- **The gate is the point.** Nothing ships that fails style, types or tests.
- **The pool comes from the lock, not from the json and not from habit.**
  `composer.lock` can require a higher PHP than `composer.json` asks for, and
  Deployer's preflight only knows the json — so it says `ok` and the run dies
  at `migrate`. Work the floor out per repository; see step 7.
- **One rollout at a time.** `deploy_project` refuses when the recorded
  rollouts show a run of this project in flight —
  `X is already being deployed: rollout #N`. That check reads the rows, so it
  catches a window-started run once recorded, but not one started in the same
  second. Check `running` on `project` before deploying, and if it refuses,
  read the live run with `mcp__deployer__rollout` rather than retrying.
- **A failed rollout is not a reason to deploy again.** Read it first.
- **One project per repository.** Before creating, check
  `mcp__deployer__list_projects` for a project whose `repository` is the
  `$REPO` step 5 read off `git remote get-url origin`. If addressing the
  repository fails with
  `… is deployed by more than one project: a, b. Name the one you mean`, ask
  the user which; do not create a third.
- **Never repoint a name somebody else set.** `point_domain` will not, and
  neither should a workaround.
- **An encrypted SSH key stops everything that reaches the server.** If any
  tool answers `the SSH key is encrypted and this process has no passphrase for
  it`, stop. `deploy_project`, `host_status`, `containers` and `container_logs`
  are all dead; the record-only tools still answer. Tell the user to add the
  key to an ssh-agent, or to start the MCP server from a shell whose agent
  holds it. Never offer to pass a passphrase as a tool argument.
- **`mcp__deployer__rollout`** takes `project` (required); omit `number` for
  the latest run, pass one from the history for an older one, and `tail: 0` for
  the whole transcript instead of the last 200 lines.

## When it fails

| Where it stopped | What it usually is | What to do |
|---|---|---|
| `pint` / `phpstan` / `php artisan test` | style, types or a real test failure | report; fix style unasked, fix the rest only if asked |
| `create_project` — `there is already a project called X` | it exists already | go back to step 5 and address it by name |
| `create_project` — `… already deploys to …`, `there is already an app called …`, `there is already a compose project called …` | the name or directory is taken by something Deployer will not overwrite, and there is no project of that name to address | stop and report the sentence. `mcp__deployer__containers` shows a stale compose set holding it. Pick another name only if the user says so |
| `checkout` | the branch or the GitHub token | check the repository and branch on the record |
| `dependencies` | composer or npm on the server | read the transcript tail; `host_status` for disk |
| `services` | the postgres/redis beside the site did not come up | `mcp__deployer__containers`, then `container_logs` on the project's `db` |
| `migrate` | **read the step's own error first.** If it names a PHP version (`requires a PHP version ">= x.y.z"`), the project is on the wrong pool — that number is the lock's floor, so `set_php` to the newest `fpm: true` pool at or above it and deploy again. Only if it names the connection, host or credentials: `mcp__deployer__containers`, find the row whose `project` is this project and whose `service` is `db`, then `container_logs` with `container:` that row's `name` (it reads like `<project>-db-1`) |
| `supervisor` | a queue/scheduler/reverb unit on the record has nothing to run | read the transcript; harmless when the project has no workers |
| `certificate` | the domain does not resolve yet | `point_domain`, wait a minute for propagation, deploy once more |
| `healthcheck` — answers 500 | the site's own `.env` on the server, a database it cannot reach, or the lock's platform check refusing the pool | `mcp__deployer__rollout` for the transcript. The `.env` on the server is the sysadmin's, and Deployer does not judge it |
| `healthcheck` on the **first** rollout of a new project — `nothing answered for <domain>: it answers with <another site>'s certificate` | **expected, and not a fault.** Before a certificate exists the `nginx` step can only install the plain `:80` block; the TLS block goes in during the `certificate` step, and the healthcheck fires before it is serving, so the host's default vhost answers instead | confirm the site really is up — `curl -sS -o /dev/null -w '%{http_code}' --resolve <domain>:443:<ip> https://<domain>` should already return 200 with the right SNI certificate — then **deploy once more**. The second rollout installs the TLS block at the `nginx` step and the check passes. Do not chase it as an IPv6 or SNI problem: every name here is a CNAME to the same host with the same A and AAAA, and a no-SNI connection to that IP legitimately returns the default site's certificate. Seen on `cleaner` #1 → #2, 2026-09-18 |

Deployer's own record of a project is in its window under that project; nothing
here deletes or renames one, and a project created by mistake is removed there.
