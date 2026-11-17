# Local Boost Union hook: tenant flavours

Everon stores MuTMS tenant ↔ flavour mappings and matching logic itself. Boost Union’s
`theme_boost_union_get_flavour_which_applies()` has no upstream callback yet, so sites
need a **small local patch** on:

`theme/boost_union/flavours/flavourslib.php`

## What the patch does

1. Includes the active MuTMS tenant id in the flavours **session cache key**
   (`{categoryId}_t{tenantId}`) via `\theme_everon\local\flavours::cache_tenant_key()`.
2. After category and cohort checks for each flavour, calls
   `\theme_everon\local\flavours::applies_to_active_tenant($f)` and treats a hit as a match.

If Everon is not installed, behaviour stays stock Boost Union.

## Auto-repatch (preferred)

From Everon **v5.3-r23**, install/upgrade calls
`\theme_everon\local\boost_union_flavour_hook::ensure_applied()` which:

1. No-ops when the Everon marker is already present
2. Applies `boost_union-flavour-tenant-hook.patch` when possible
3. Falls back to a surgical insert if the unified diff does not apply cleanly

**Site administration → Reports → Status checks** includes an Everon check that reports
hook status and will try to re-apply when the file is writable.

## Manual apply / re-apply after a Boost Union upgrade

From the Moodle public root (or adjust paths):

```bash
patch -p1 < /path/to/theme/everon/patches/boost_union-flavour-tenant-hook.patch
php admin/cli/purge_caches.php
```

Or bump/reinstall Everon so the upgrade hook runs, then purge caches.

## Productized / upstream path

All admin UI (Everon → MuTMS tab), DB (`theme_everon_flavour_apply`), and tenant matching
live in **theme_everon**. Long-term: contribute child-theme callbacks upstream to Boost
Union (`extend_flavour_cache_key` + `flavour_applies`) and drop this Everon-hardcoded patch.

See:

- Design: project `docs/boost-union-flavour-callback.md`
- Generic upstream patch: `patches/upstream/boost-union-flavour-callbacks.patch`
