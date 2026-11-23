# Local Boost Union hook: tenant flavours

Everon stores MuTMS tenant ↔ flavour mappings and matching logic itself. Boost Union’s
`theme_boost_union_get_flavour_which_applies()` has no upstream callback yet, so sites
need a **small local patch** on:

`theme/boost_union/flavours/flavourslib.php`

## What the patch does

1. Includes the active MuTMS tenant id in the flavours **session cache key**
   (`{categoryId}_t{tenantId}`) via `\theme_boost_union_everon\local\flavours::cache_tenant_key()`.
2. After category and cohort checks for each flavour, calls
   `\theme_boost_union_everon\local\flavours::applies_to_active_tenant($f)` and treats a hit as a match.

If Everon is not installed, behaviour stays stock Boost Union.

## Auto-repatch (preferred)

From Everon **v5.3-r23**, install/upgrade calls
`\theme_boost_union_everon\local\boost_union_flavour_hook::ensure_applied()`.

From Everon **v5.3-r38**, every request also runs
`ensure_applied_if_needed()` via `\core\hook\after_config`. That heals a Boost Union zip
overwrite on the next `www-data` request **without** waiting for an Everon version bump.

The helper:

1. No-ops when the Everon marker + classname are already present
2. Applies `boost_union-flavour-tenant-hook.patch` when possible
3. Falls back to a surgical insert if the unified diff does not apply cleanly
4. Migrates leftover `\theme_everon\local\flavours` classnames from pre-rename hooks
5. Purges the Boost Union `flavours` session cache after a successful restore

**Site administration → Reports → Status checks** includes an Everon check that reports
hook status and will try to re-apply when the file is writable.

## Manual apply / re-apply after a Boost Union upgrade

Usually unnecessary on r38+: load any page as the web user (or run CLI as `www-data`) so
`after_config` can rewrite `flavourslib.php`. If the file is not writable by the web user,
apply manually from the Moodle public root:

```bash
patch -p1 < /path/to/theme/boost_union_everon/patches/boost_union-flavour-tenant-hook.patch
sudo -u www-data php admin/cli/purge_caches.php
```

## Productized / upstream path

All admin UI (Everon → MuTMS tab), DB (`theme_boost_union_everon_flavour_apply`), and tenant matching
live in **theme_boost_union_everon**. Long-term: contribute child-theme callbacks upstream to Boost
Union (`extend_flavour_cache_key` + `flavour_applies`) and drop this Everon-hardcoded patch.

See:

- Design: project `docs/boost-union-flavour-callback.md`
- Generic upstream patch: `patches/upstream/boost-union-flavour-callbacks.patch`
