<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * String token for when the updb command fails.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_UPDATE_DB', 'drush_update.error.no-updb');

/**
 * String token for when the cc command fails.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_CLEAR_DRUPAL_CACHE', 'drush_update.error.cache-failure');

/**
 * String token for when we are about to wipe all caches.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CACHE_WIPE', 'drush_update.working.cache-wipe');

/**
 * String token for when all the caches have been wiped successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CACHE_WIPE', 'drush_update.success.cache-wipe');

/**
 * String token for when all databases are about to be updated.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DB_UPDATE', 'drush_update.working.db-update');

/**
 * String token for when all databases have been updated.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DB_UPDATE', 'drush_update.success.db-update');
