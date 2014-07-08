<?php
/**
 * @file Defines some useful constants.
 */

/**
 * Config key for the drush alias file name template.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_ALIAS_TEMPLATE', 'drush-alias-template');

/**
 * Config key for the default drush configuration.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_CONFIG_TEMPLATE', 'drush-alias-template-file');

/**
 * Config key for the drush alias default directory.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_ALIAS_DIR', 'drush-alias-default-dir');

/**
 * Config key for whether or not the drush alias should be created on the 
 * local machine.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_ALIAS_CREATE_FOR_LOCAL', 'drush-alias-local');

/**
 * Config key for preventing the update of any drush alias file during site
 * update.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_ALIAS_STATIC', 'drush-alias-static');

/**
 * Site setting for preventing the update of the drush alias file during site
 * update.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_STATIC_ALIAS', 'drush-alias-static');

/**
 * Server type key indicating support for drush aliases.
 * 
 * @ingroup server_types
 */
define('SERVER_TYPE_DRUSH', 'drush');

/**
 * Server setting allowing override of the folder in which Drush aliases are
 * stored.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_DRUSH_DIR', 'drush-alias-dir');

/**
 * Server setting allowing override of the file name template for Drush aliases.
 * 
 * @see DrupalSite::replaceTokens()
 * @ingroup server_settings
 */
define('SERVER_SETTING_DRUSH_FILE_TEMPLATE', 'drush-file-template');

/**
 * Server setting allowing override of the configuration for Drush aliases.
 * 
 * This should be a path to a file that is a template for the configuration.
 * 
 * @see DrupalSite::replaceTokens()
 * @ingroup server_settings
 */
define('SERVER_SETTING_DRUSH_CONFIG_TEMPLATE', 'drush-config-template-file');

/**
 * String token for if the drush alias file could not be written.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_WRITE_DRUSH_ALIAS', 'drush_config.error.no-alias-file');

/**
 * Site setting for the drush alias.
 * 
 * @ingroup site_settings
 */
define('SITE_DRUSH_ALIAS', 'drush-alias');

/**
 * Site setting for all the drush aliases.
 * 
 * @ingroup site_settings
 */
define('SITE_DRUSH_ALIASES', 'drush-aliases');

/**
 * String token for when the system is about to setup the drush aliases.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_ALIASES_SETUP', 'drush_config.working.setup');

/**
 * String token for when the system is done setting up the drush aliases.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DRUSH_ALIASES_SETUP', 'drush_config.success.setup');

/**
 * String token for when the system is setting up a specific alias.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_ALIAS_SETUP', 'drush_config.working.setup-alias');

/**
 * Configuration setting for the Drush file alias template.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_ALIAS_FILE_TEMPLATE', 'drush-alias-file-template');

/**
 * String token for displaying the drush alias.
 * 
 * @ingroup strings
 */
define('STRING_INFO_DRUSH_ALIAS', 'drush_config.info.drush-alias');
