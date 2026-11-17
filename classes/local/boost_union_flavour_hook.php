<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Auto-repatch Boost Union flavourslib for Everon MuTMS tenant flavours.
 *
 * Interim until upstream child-theme callbacks land in Boost Union.
 *
 * @package    theme_everon
 * @copyright  2026 Project Theme / Jason Dorey
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_everon\local;

defined('MOODLE_INTERNAL') || die();

/**
 * Detect and re-apply the local Boost Union flavourslib tenant hook.
 */
final class boost_union_flavour_hook {

    /** Unique comment marker written by the local patch. */
    public const MARKER = 'Everon MuTMS tenant flavours (local hook)';

    /**
     * Absolute path to Boost Union flavourslib.php.
     *
     * @return string
     */
    public static function flavourslib_path(): string {
        global $CFG;
        return $CFG->dirroot . '/theme/boost_union/flavours/flavourslib.php';
    }

    /**
     * Absolute path to the shipped unified diff.
     *
     * @return string
     */
    public static function patch_path(): string {
        global $CFG;
        return $CFG->dirroot . '/theme/everon/patches/boost_union-flavour-tenant-hook.patch';
    }

    /**
     * Whether flavourslib exists on disk.
     *
     * @return bool
     */
    public static function flavourslib_exists(): bool {
        return is_readable(self::flavourslib_path());
    }

    /**
     * Whether the Everon marker is present in flavourslib.
     *
     * @return bool
     */
    public static function is_applied(): bool {
        if (!self::flavourslib_exists()) {
            return false;
        }
        $contents = file_get_contents(self::flavourslib_path());
        if ($contents === false) {
            return false;
        }
        return str_contains($contents, self::MARKER)
            && str_contains($contents, '\\theme_everon\\local\\flavours')
            && str_contains($contents, 'applies_to_active_tenant')
            && str_contains($contents, 'cache_tenant_key');
    }

    /**
     * Ensure the local hook is present; apply patch or surgical insert if missing.
     *
     * Safe to call repeatedly. No-op when already applied or Boost Union is absent.
     *
     * @return string One of: already_applied, applied_patch, applied_surgical, missing_target, failed
     */
    public static function ensure_applied(): string {
        if (!self::flavourslib_exists()) {
            return 'missing_target';
        }
        if (self::is_applied()) {
            return 'already_applied';
        }

        if (self::try_apply_patch_file()) {
            return self::is_applied() ? 'applied_patch' : 'failed';
        }

        if (self::try_apply_surgical()) {
            return self::is_applied() ? 'applied_surgical' : 'failed';
        }

        return 'failed';
    }

    /**
     * Try applying the shipped unified diff with the system patch utility.
     *
     * @return bool True if patch exited 0
     */
    private static function try_apply_patch_file(): bool {
        global $CFG;

        $patchfile = self::patch_path();
        if (!is_readable($patchfile)) {
            return false;
        }
        if (!is_writable(self::flavourslib_path())) {
            return false;
        }

        $patchbin = trim((string) shell_exec('command -v patch 2>/dev/null'));
        if ($patchbin === '') {
            return false;
        }

        // Patch paths are relative to Moodle public/dirroot (theme/boost_union/...).
        $cmd = escapeshellarg($patchbin) . ' -p1 --forward --batch -i '
            . escapeshellarg($patchfile)
            . ' -d ' . escapeshellarg($CFG->dirroot)
            . ' 2>&1';
        exec($cmd, $output, $exitcode);
        return $exitcode === 0;
    }

    /**
     * Surgical insert when the unified diff no longer applies cleanly.
     *
     * @return bool
     */
    private static function try_apply_surgical(): bool {
        $path = self::flavourslib_path();
        if (!is_writable($path)) {
            return false;
        }

        $contents = file_get_contents($path);
        if ($contents === false || str_contains($contents, self::MARKER)) {
            return false;
        }

        // 1) Cache key: replace the stock get() block.
        $cacheold = <<<'PHP'
        // Get the cached flavour for the current user and the page category ID.
        $cachedflavour = $cache->get($pagecategoryid);
PHP;
        $cachenew = <<<'PHP'
        // Everon MuTMS tenant flavours (local hook): include active tenant in the cache key.
        $everontenantkey = 0;
        if (class_exists('\theme_everon\local\flavours')) {
            $everontenantkey = \theme_everon\local\flavours::cache_tenant_key();
        }
        $flavourcachekey = $pagecategoryid . '_t' . $everontenantkey;

        // Get the cached flavour for the current user, page category ID, and tenant.
        $cachedflavour = $cache->get($flavourcachekey);
PHP;
        if (!str_contains($contents, $cacheold)) {
            return false;
        }
        $contents = str_replace($cacheold, $cachenew, $contents, $count);
        if ($count !== 1) {
            return false;
        }

        // 2) Replace cache set keys that still use $pagecategoryid.
        $contents = str_replace(
            '$cache->set($pagecategoryid, $f);',
            '$cache->set($flavourcachekey, $f);',
            $contents,
            $setcount
        );
        if ($setcount < 1) {
            return false;
        }
        $contents = str_replace(
            '$cache->set($pagecategoryid, null);',
            '$cache->set($flavourcachekey, null);',
            $contents,
            $nullcount
        );
        if ($nullcount !== 1) {
            return false;
        }

        // 3) Tenant match after category/cohort walk body, before closing foreach.
        $matchold = <<<'PHP'
            }
        }

        // If we haven't found any flavour which applies to the given page output, remember null as flavour object.
PHP;
        $matchnew = <<<'PHP'
            }

            // Everon MuTMS tenant flavours (local hook): after categories and cohorts.
            if (class_exists('\theme_everon\local\flavours') &&
                    \theme_everon\local\flavours::applies_to_active_tenant($f)) {
                $appliedflavour = $f;
                $cache->set($flavourcachekey, $f);
                $flavourchecked = true;
                return $appliedflavour;
            }
        }

        // If we haven't found any flavour which applies to the given page output, remember null as flavour object.
PHP;
        if (!str_contains($contents, $matchold)) {
            return false;
        }
        $contents = str_replace($matchold, $matchnew, $contents, $matchcount);
        if ($matchcount !== 1) {
            return false;
        }

        $written = file_put_contents($path, $contents);
        return $written !== false;
    }
}
