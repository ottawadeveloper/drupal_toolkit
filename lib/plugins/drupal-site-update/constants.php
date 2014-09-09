<?php
/**
 * @file Defines several useful constants for this plugin.
 */

/**
 * Fired to finish off a subsite's update procedure.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_FINISH_SUBSITE', 'update-finish-subsite');

/**
 * Fired when the update-all command is about to begin.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_ALL_START', 'update-all-start');

/**
 * Fired when the update-all command has successfully completed.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_ALL_FINISH', 'update-all-finish');

/**
 * String token for when a site is about to be updated.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPDATE_ALL_SITE', 'drupal_site_update.working.site');

/**
 * String token for when starting to update all sites.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPDATE_ALL_SITES', 'drupal_site_update.working.all-sites');

/**
 * String token for when a site errored.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_UPDATE_ALL_SITE', 'drupal_site_update.error.all-site');

/**
 * String token for when there was an error on any site.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_UPDATE_ALL_SITES', 'drupal_site_update.error.all-sites');

/**
 * String token for when all sites were updated successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_UPDATE_ALL_SITES', 'drupal_site_update.success.all-sites');

/**
 * Fired for sites to do actions after the main actions.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_POST_ACTIONS', 'update-post-actions');

/**
 * Fired for subsites to do actions after the main actions.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_SUBSITE_POST_ACTIONS', 'update-subsites-post-actions');

/**
 * Fired for prior actions for subsites.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PRIOR_SUBSITE_ACTIONS', 'update-subsites-prior-actions');

/**
 * Fired to refresh subsite site directories.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_SUBSITE_SITES', 'update-subsite-sites');

/**
 * Fired before the update process begins.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PREPARE', 'begin-update');

/**
 * Fired to build the new codebase.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_CODEBASE', 'update-codebase');

/**
 * Fired to refresh a subsite.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_REFRESH_SUBSITE', 'update-refresh-subsite');

/**
 * Fired to migrate in the site definitions.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_SITES', 'update-sites');

/**
 * Fired when the codebase work is complete, but before we take a backup.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_CODEBASE_COMPLETE', 'update-codebase-complete');

/**
 * Fired to get a backup done.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_TAKE_BACKUP', 'update-backup');

/**
 * Fired to prepare the site for the update (eg engage maintenance mode).
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PREPARE_FOR_UPDATE', 'update-prepare');

/**
 * Fired to prepare the server for the update (eg update config files).
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PREPARE_SERVER', 'update-server-prep');

/**
 * Fired as a last-minute hook for plugins to do something immediately before
 * the core update actions.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PRIOR_ACTIONS', 'update-prior-actions');

/**
 * Fired for subsites to clean-up their stuff.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_CLEANUP_SUBSITE', 'update-cleanup-subsites');

/**
 * Fired to allow plugins to provide actions that must take place on the
 * site.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_ACTIONS', 'update-core');

/**
 * Fired to allow plugins to provide actions after the actions are complete.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_COMPLETE', 'update-complete');

/**
 * Fired to prepare the site for a complete cache wipe.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PREPARE_FOR_REFRESH', 'update-refresh-prep');

/**
 * Fired to wipe all the caches and make the site live again.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_REFRESH', 'update-refresh');

/**
 * Fired to cleanup anything we need to last-minute.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_CLEANUP', 'update-cleanup');

/**
 * Fired when the update is completely done.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_FINISH', 'finish-update');

/**
 * Fired to trigger an update of the server configuration.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_REFRESH_SERVER_CONFIG', 'update-refresh-server');

/**
 * String token for when the site fails to update.
 * 
 * @ingroup strings
 */
define('STRING_UPDATE_GENERIC_ERROR', 'drupal_site_update.error');

/**
 * Event fired to prepare a subsite for an update.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PREPARE_SUBSITE', 'update-prepare-subsite');

/**
 * Event fired to update a subsite.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_SUBSITE', 'update-subsites');

/**
 * Event fired to refresh a subsite's server configuration.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_REFRESH_SUBSITE_CONFIG', 'update-subsite-config');

/**
 * Event fired to prepare a server beforethe instance is refreshed.
 * 
 * @ingroup events
 */
define('EVENT_UPDATE_PREP_SUBSITE_FOR_REFRESH', 'update-subsite-prep-refresh');
