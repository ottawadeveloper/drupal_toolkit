<?php
/**
 * @file Defines several useful constants for this plugin.
 */

/**
 * String token for when a site is being updated.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_ROLLBACK_ALL_SITE', 'drupal_site_rollback.working.site');

/**
 * String token for when starting to rollback sites.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_ROLLBACK_ALL_SITES', 'drupal_site_rollback.working.all-sites');

/**
 * String token for when there was an error rolling back a site.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_ROLLBACK_ALL_SITE', 'drupal_site_rollback.error.all-site');

/**
 * String token for when there was an error on any site.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_ROLLBACK_ALL_SITES', 'drupal_site_rollback.error.all-sites');

/**
 * String token for when all sites were rolled back successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_ROLLBACK_ALL_SITES', 'drupal_site_rollback.success.all-sites');

/**
 * String token for when a site has not been updated since the last time
 * a subsite was installed.
 * 
 * @ingroup strings
 */
define('STRING_ROLLBACK_REQUIRES_TWO_BUILDS_AFTER_SUBSITE', 'drupal_site.error.two-subsite-builds');

/**
 * Fired to rollback subsites.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_SUBSITES', 'rollback-subsites');

/**
 * Fired to prepare subsites for a rollback, eg to back up the DB.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_SUBSITE_PREP', 'rollbakc-prepare-subsites');

/**
 * Fired so that plugins can prepare the site for rolling back to a previous 
 * update.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_PREPARE', 'rollback-prep');

/**
 * Fired to confirm that a backup is being taken in case we need to rollback
 * the rollback.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_BACKUP', 'rollback-backup');

/**
 * Fired to start the backup process.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_START', 'rollback-start');

/**
 * Fired for phase 1 of the rollback process. This is intended as a pre-rollback
 * phase for things that must happen before the actual rollback happens.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_PHASE1', 'rollback-phase1');

/**
 * Fired for phase 2 of the rollback process. This is intended to be the 
 * primary rollback event used.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_PHASE2', 'rollback-phase2');

/**
 * Fired for phase 3 of the rollback process. This is intended to be the
 * post-rollback phase for things that must happen after the actual rollback.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_PHASE3', 'rollback-phase3');

/**
 * Fired when the rollback phases are all finished.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_FINISH', 'rollback-finish');

/**
 * Fired to cleanup after the rollback has been finished.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_CLEAN', 'rollback-clean');

/**
 * Fired when the cleanup process is complete.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_COMPLETE', 'rollback-complete');

/**
 * Standard error message for the rollback process.
 * 
 * @ingroup strings
 */
define('STRING_ROLLBACK_STANDARD_ERROR', 'drupal_site_rollback.error.generic');

/**
 * Event fired to finish off the rollback procedure for subsites.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_SUBSITE_FINISH', 'rollback-subsite-finish');

/**
 * Event fired to clean up the subsites.
 * 
 * @ingroup events
 */
define('EVENT_ROLLBACK_SUBSITE_CLEAN', 'rollback-subsite-clean');

/**
 * Error message for if there are two builds missing.
 * 
 * @ingroup strings
 */
define('STRING_ROLLBACK_REQUIRES_TWO_BUILDS', 'drupal_site_rollback.error.two-builds-required');
