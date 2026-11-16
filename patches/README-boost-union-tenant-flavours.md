# Local Boost Union hook: tenant flavours

Everon stores MuTMS tenant ↔ flavour mappings and matching logic itself. Boost Union’s
`theme_boost_union_get_flavour_which_applies()` has no upstream callback, so moodlework
needs a **small local patch** on:

`theme/boost_union/flavours/flavourslib.php`

## What the patch does

1. Includes the active MuTMS tenant id in the flavours **session cache key**
   (`{categoryId}_t{tenantId}`) via `\theme_everon\local\flavours::cache_tenant_key()`.
2. After category and cohort checks for each flavour, calls
   `\theme_everon\local\flavours::applies_to_active_tenant($f)` and treats a hit as a match.

If Everon is not installed, behaviour stays stock Boost Union.

## Apply / re-apply after a Boost Union upgrade

From the Moodle public root (or adjust paths):

```bash
patch -p1 < /path/to/theme/everon/patches/boost_union-flavour-tenant-hook.patch
```

Or re-apply the same hunks manually — see the `.patch` file.

Then purge caches (`php admin/cli/purge_caches.php`).

## Productized path

All admin UI (Everon → MuTMS tab), DB (`theme_everon_flavour_apply`), and tenant matching
live in **theme_everon**. Long-term: contribute a proper callback/hook upstream to Boost
Union and drop this patch.
