<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Config setting to skip the redundant symlinks.
 * 
 * If set, symlinks for the default domains won't be created.
 * 
 * @ingroup config
 */
define('CONFIG_SKIP_REDUNDANT_SYMLINKS', 'skip-redundant-symlinks');

/**
 * Option to override CONFIG_SKIP_REDUNDANT_SYMLINKS.
 * 
 * @ingroup args
 */
define('OPTION_SKIP_REDUNDANT_SYMLINKS', 'skip-redundant-symlinks');

/**
 * String token for if the settings.php file was not found.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_FIND_SETTINGS_PHP', 'standard_site.error.no-settings-file');

/**
 * String token for if a redundant symlink was not created (these are symlinks
 * to the default site).
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_SYMLINK_SITE', 'standard_site.error.redundant-symlink-failure');

/**
 * String token for if there is an error while updating the settings.php file.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_APPEND_SETTINGS', 'standard_site.error.unable-to-update-settings');

/**
 * String token for if there is an error while saying the settings.php template.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_CREATE_SETTINGS_TEMPLATE', 'standard_site.error.unable-to-create-settings-template');

/**
 * String token for if there is an error reading the sites directory.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_READ_SITES_DIR', 'standard_site.error.could-not-read-sites-dir');

/**
 * String token for if the site could not be symlinked into the build.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_SYMLINK_SITE', 'standard_site.error.unable-to-symlink');

/**
 * Fired to retrieve extra settings from other plugins.
 * 
 * @ingroup events
 */
define('EVENT_GET_EXTRA_SETTINGS', 'get-extra-settings');

/**
 * Fired to allow other plugins to extend this process.
 * 
 * @ingroup events
 */
define('EVENT_CONTINUE_STANDARD_SITES', 'standard-site-setup-continue');

/**
 * Site setting for the location of the settings.php file.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTINGS_FILE', 'settings-file');

/**
 * Site setting for the location of the settings.php template file.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTINGS_TEMPLATE', 'settings-template');

/**
 * String token for if we cannot delete the default directory.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_DELETE_DEFAULT', 'standard_site.error.unable-to-delete-default');

/**
 * String token for when the default site is about to be removed.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_REMOVE_DEFAULT_SITE', 'standard_site.working.remove-default');

/**
 * String token for when the subsite's sites directory is about to be built.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_SUBSITE_SITES', 'standard_site.working.create-subsite-sites');

/**
 * String token for when the subsite's settings.php file is about to be built.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_SUBSITE_SETTINGS', 'standard_site.working.create-subsite-settings');

/**
 * String token for when the site's sites directory is about to be built.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_SITES', 'standard_site.working.create-sites');

/**
 * String token for when the site's settings.php file is about to be built.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_SITE_SETTINGS', 'standard_site.working.create-site-settings');

/**
 * String token for when redundant symlinks are about to be created.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_REDUNDANT_SYMLINKS', 'standard_site.working.create-redundant-symlinks');

/**
 * String token for when all the sites are about to be symlinked.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SYMLINK_SITES', 'standard_site.working.symlink-sites');

/**
 * String token for when a specific site is about to be symlinked.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SYMLINK_SITE', 'standard_site.working.symlink-site');

/**
 * String token for when a redundant symlink is about to be created.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_REDUNDANT_SYMLINK', 'standard_site.working.create-redundant-symlink');

/**
 * String token for when the default site was removed successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_REMOVE_DEFAULT_SITE', 'standard_site.success.remove-default');

/**
 * String token for when the subsite's sites were created successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CREATE_SUBSITE_SITES', 'standard_site.success.create-subsite-sites');

/**
 * String token for when the site's sites were created successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CREATE_SITES', 'standard_site.success.create-sites');

/**
 * String token for when the redundant symlinks were created successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CREATE_REDUNDANT_SYMLINKS', 'standard_site.success.create-redundant-symlinks');

/**
 * String token for when all the sites were created successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_SYMLINK_SITES', 'standard_site.success.symlink-sites');

/**
 * Site setting that holds the list of root symlinks.
 * 
 * @ingroup site_settings
 */
define('SITE_ROOT_SYMLINKS', 'root-symlinks');

/**
 * String token for when creating root symlinks.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATING_ROOT_SYMLINKS', 'standard_site.working.creating-root-symlinks');

/**
 * String token for when creating a root symlink.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATING_ROOT_SYMLINK', 'standard_site.working.creating-root-symlink');

/**
 * String token for when all the root symlinks are created.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CREATING_ROOT_SYMLINKS', 'standard_site.success.creating-root-symlinks');

/**
 * String token for when there is an error creating a root symlink.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_UNABLE_TO_CREATE_ROOT_SYMLINK', 'standard_site.error.unable-to-create-root-symlink');
