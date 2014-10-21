<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Site setting for the prefixed primary URL.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_PREFIXED_PRIMARY', 'prefixed-primary');

/**
 * Site setting for the version in which this site was last updated or 
 * created.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_CURRENT_VERSION', 'version');

/**
 * Config setting for where DTK is located. If not specified, assumed to be
 * in the path settings.
 * 
 * @ingroup config
 */
define('CONFIG_DTK_LOCATION', 'dtk-location');

/**
 * Help category name for drupal site management commands.
 * 
 * @ingroup strings
 */
define('STRING_HELP_DSM_CATEGORY', 'help.category.drupal-site-management');

/**
 * Help category name for drupal subsite management commands.
 * 
 * @ingroup strings
 */
define('STRING_HELP_DSSM_CATEGORY', 'help.category.drupal-subsite-management');

/**
 * Help category name for drupal global site management commands.
 * 
 * @ingroup strings
 */
define('STRING_HELP_DGSM_CATEGORY', 'help.category.drupal-global-site-management');

/**
 * Help description for the site name argument.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SITE_NAME', 'help.arg.site-name');

/**
 * Help description for the subsite name argument.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SUBSITE_NAME', 'help.arg.subsite-name');

/**
 * String token for when the subsite is not installed.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_SUBSITE_NOT_INSTALLED', 'drupal_site.error.subsite-not-installed');

/**
 * Config setting for the default build directory for non-local sites.
 * 
 * @ingroup config
 */
define('CONFIG_BUILD_DIRECTORY', 'build-directory');

/**
 * Config setting for whether or not local sites are allowed.
 * 
 * @see @ref local_site_options "Local site options
 * @ingroup config
 */
define('CONFIG_ALLOW_LOCAL_SITES', 'local-sites');

/**
 * Config option that allows local sites.
 * 
 * @ingroup local_site_options
 */
define('LOCAL_SITES_ALLOW', 'allow');

/**
 * Config option that prevents local sites from being created.
 * 
 * @ingroup local_site_options
 */
define('LOCAL_SITES_NEVER', 'never');

/**
 * Config option that forces local sites to always be created.
 * 
 * @ingroup local_site_options
 */
define('LOCAL_SITES_ALWAYS', 'force');

/**
 * Argument for making a site local.
 * 
 * @ingroup args
 */
define('ARG_IS_LOCAL', 'local');

/**
 * String token for when a site setting is missing.
 * 
 * @ingroup strings
 */
define('STRING_SITE_MISSING_SETTING', 'drupal_site.error.no-setting');

/**
 * String token for when the subsite has already been installed.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_SUBSITE_INSTALLED', 'drupal_site.error.subsite-already-installed');

/**
 * Config key for the maximum number of builds to keep.
 * 
 * This value can be set as low as 2. Values of 1 or below will be treated like
 * FALSE. If set to FALSE, there is no maximum number of builds.
 * 
 * @ingroup config
 */
define('CONFIG_MAX_BUILDS', 'max-builds');

/**
 * Fired to cleanup old builds.
 * 
 * @ingroup events
 */
define('EVENT_CLEANUP_BUILD', 'drupal-build-cleanup');

/**
 * Fired to delete a specific build from a site.
 * 
 * @ingroup events
 */
define('EVENT_DELETE_BUILD', 'drupal-delete-build');

/**
 * Fired after a site is created
 * 
 * @ingroup events
 */
define('EVENT_DRUPAL_SITE_CONSTRUCTOR', 'drupal-site-construct');

/**
 * String token for when the build history needs to be pruned.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SITE_HISTORY_CLEANUP', 'drupal_site.working.history-cleanup');

/**
 * String token for when an old build is about to be pruned.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SITE_HISTORY_DELETE_ITEM', 'drupal_site.working.history-cleanup-item');

/**
 * String token for when the build history has been pruned.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_SITE_HISTORY_CLEANUP', 'drupal_site.success.history-cleanup');

/**
 * String token for when the site has not been installed yet.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_SITE_NOT_INSTALLED', 'drupal_site.error.not-installed');

/**
 * String token for when the site has already been installed.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_SITE_INSTALLED', 'drupal_site.error.already-installed');

/**
 * String token for displaying the site/subsite identifier.
 * 
 * @ingroup strings
 */
define('STRING_INFO_IDENTIFIER', 'drupal_site.info.identifier');

/**
 * String token for when the site object could not be built.
 * 
 * @ingroup strings
 */  
define('STRING_ERROR_NO_SITE', 'drupal_site.error.no-site');

/**
 * String token for when the site object is out of date.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_OLD_SITE', 'drupal_site.error.old-site');

/**
 * String token for when a site does not exist (and one is required).
 * 
 * @ingroup strings
 */
define('STRING_ERROR_MISSING_SITE', 'drupal_site.error.missing-site');

/**
 * String token for when a site exists (and we don't want to overwrite it).
 * 
 * @ingroup strings
 */
define('STRING_ERROR_ALREADY_SITE', 'drupal_site.error.site-exists');

/**
 * String token for if the site's configuration file could not be saved.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_SAVE_SITE', 'drupal_site.error.no-save');

/**
 * String token for when the subsite object could not be built.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_NO_SUBSITE', 'drupal_site.error.no-subsite');

/**
 * String token for when the subsite exists and we don't want to overwrite it.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_OLD_SUBSITE', 'drupal_site.error.old-subsite');

/**
 * String token for when the subsite does not exist.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_MISSING_SUBSITE', 'drupal_site.error.missing-subsite');

/**
 * String token for when the subsite already exists and it should not.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_ALREADY_SUBSITE', 'drupal_site.error.already-subsite');

/**
 * Steps with this type will be executed only on the site object.
 * 
 * @ingroup command_step_types
 */
define('COMMAND_STEP_SITE', 'site');

/**
 * Steps with this type will be executed only on a specific subsite object.
 * 
 * @ingroup command_step_types
 */
define('COMMAND_STEP_SUBSITE', 'subsite');

/**
 * Steps with this type will be executed on all subsites for the specified
 * site object.
 * 
 * @ingroup command_step_types
 */
define('COMMAND_STEP_ALL_SUBSITES', 'subsites-all');

/**
 * Steps with this type will be executed on all subsites for the specified
 * site object that have gone through the installation process.
 * 
 * @ingroup command_step_types
 */
define('COMMAND_STEP_ALL_INSTALLED_SUBSITES', 'subsites-all-installed');

/**
 * String token for when an error occurs during a step and no other error
 * string is specified.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_STEP_GENERIC', 'drupal_site.error.generic-step');

/**
 * String token for when the configuration is about to be saved.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SAVE_CONFIG', 'drupal_site.working.save-config');


/**
 * Contains the previous build ID.
 * 
 * @ingroup site_settings
 */
define('SITE_LAST_BUILD_ID', 'last-build-id');

/**
 * Fired to remove everything that belongs with a site.
 * 
 * @ingroup events
 */
define('EVENT_REMOVE_ALL', 'remove-all');

/**
 * Whether or not the site is local.
 * 
 * @ingroup site_settings
 */
define('SITE_IS_LOCAL', 'is_local');

/**
 * The build directory.
 * 
 * @ingroup site_settings
 */
define('SITE_BUILD_DIR', 'build_dir');

/**
 * The unique build name.
 * 
 * @ingroup site_settings
 */
define('SITE_BUILD_NAME', 'build_name');

/**
 * A list of build IDs.
 * 
 * @ingroup site_settings
 */
define('SITE_BUILD_IDS', 'build_ids');

/**
 * The latest build ID.
 * 
 * @ingroup site_settings
 */
define('SITE_LATEST_BUILD_ID', 'latest_build_id');

/**
 * A list of subsite names.
 * 
 * @ingroup site_settings
 */
define('SITE_EXISTING_SITES', 'existing_sites');

/**
 * A list of subsites.
 * 
 * @ingroup site_settings
 */
define('SITE_SUBSITE_LIST', 'subsite_list');

/**
 * Whether or not the site is instaleld.
 * 
 * @ingroup site_settings
 */
define('SITE_IS_INSTALLED', 'is_installed');

/**
 * A token for SITE_BUILD_NAME.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_BUILD_NAME', 'BUILD_NAME');

/**
 * A token for SITE_BUILD_DIR.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_BUILD_DIR', 'BUILD_DIRECTORY');

/**
 * A token for SITE_ALL_DOMAINS of a site and all it's 
 * child sites.
 * 
 * This is a dynamic token. It is generated automatically and it's value
 * does not need to be maintained.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_RECURSIVE_DOMAINS', 'RECURSIVE_DOMAINS');

/**
 * The setting that holds the main identifier.
 * 
 * @ingroup subsite_settings
 */
define('SUBSITE_IDENTIFIER', 'subsite-id');

/**
 * The site token that holds the subsite ID. Only available to subsites.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_SUBSITE_ID', 'SUBSITE_ID');

/**
 * The site token that holds the subsite's parent BUILD_NAME. Only available to
 * subsites.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_SUBSITE_PARENT_ID', 'SUBSITE_PARENT_ID');

/**
 * The primary URL for the site.
 * 
 * @ingroup site_settings
 */
define('SITE_PRIMARY_URL', 'primary_url');

/**
 * Extra URLs for the site.
 * 
 * @ingroup site_settings
 */
define('SITE_EXTRA_URLS', 'extra_urls');

/**
 * Site token for the Primary URL.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_PRIMARY_URL', 'SITE_PRIMARY_URL');

/**
 * Site token for all the URLs.
 *
 * @ingroup site_tokens
 */
define('SITE_TOKEN_ALL_URLS', 'SITE_ALL_URLS');

/**
 * Site token for the primary domain.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_PRIMARY_DOMAIN', 'SITE_DOMAIN');

/**
 * Site token for all the domains
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_ALL_DOMAINS', 'SITE_ALL_DOMAINS');

/**
 * Site setting for an array of all the domains
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_ALL_DOMAINS', 'all-domains');

/**
 * Site token for a unique identifier.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_UUID', 'SITE_UUID');

/**
 * Site setting for only prefixed domains.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_PREFIXED_DOMAINS', 'prefixed-domains');

/**
 * Site token for all the prefixed domains for this site and all subsites.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_PREFIXED_DOMAINS', 'SITE_RECURSIVE_PREFIXED_DOMAINS');

define('STRING_HELP_OPTION_LOCAL_DESC', 'help.option_desc.local');
