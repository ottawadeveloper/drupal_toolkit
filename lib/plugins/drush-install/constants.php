<?php
/**
 * @file Useful constants for this plugin.
 */

/**
 * Config key for the default install profile.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_PROFILE', 'install-profile');

/**
 * Command line option for a file with the names of modules to
 * install.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_MODULES_FILE', 'install-modules-file');

/**
 * Config key for a file with the names of modules to
 * install.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_MODULES_FILE', 'install-modules-file');

/**
 * Config key for the default user 1 email address.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_DEFAULT_EMAIL', 'install-email');

/**
 * Config key for the default user 1 user name.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_DEFAULT_USER', 'install-user');

/**
 * Config key for the default user 1 password.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_DEFAULT_PASSWORD', 'install-password');

/**
 * Config key for an array of extra settings to be passed to the site-install
 * command. These can be used for extra form arguments.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_EXTRAS', 'install-settings');

/**
 * Config key for the site email address.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_SITE_EMAIL', 'install-site-email');

/**
 * Config key for the site name.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_SITE_NAME', 'install-site-name');

/**
 * Config key for an array of site options. These are flags passed to the
 * site-install command and should not be prefixed with "--".
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_SITE_OPTIONS', 'install-site-options');

/**
 * Config key for an array of modules to install.
 * 
 * @ingroup config
 */
define('CONFIG_INSTALL_MODULES', 'install-modules');

/**
 * Command line long option to override the install profile.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_PROFILE', 'install-profile');

/**
 * Command line long option to override the user 1 email address.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_EMAIL', 'install-email');

/**
 * Command line long option to override the user 1 user name.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_USER', 'install-user');

/**
 * Command line long option to override the user 1 password.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_PASSWORD', 'install-password');

/**
 * Command line long option to add additional form values to the installer. 
 * They should be defined separated by commas, without spaces.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_SETTINGS', 'install-settings');

/**
 * Command line long option to specify additional flags to the installer.
 * They should be defined separated by commas, without spaces and without the
 * prefixed '--'.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_OPTIONS', 'install-options');

/**
 * Command line long option to override the site email address.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_SITE_EMAIL', 'site-email');

/**
 * Command line long option to override the site name.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_SITE_NAME', 'site-name');

/**
 * Command line long option to specify additional modules to install. Module
 * names should be separated by commas, without spaces.
 * 
 * @ingroup args
 */
define('OPTION_INSTALL_MODULES', 'install-modules');

/**
 * String token for the error message if no local alias was provided.
 * 
 * @ingroup strings
 */
define('STRING_NO_LOCAL_ALIAS', 'drush_install.error.no-local-alias');

/**
 * String token for if there was an error while running the Drush install.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_INSTALL', 'drush_install.error.could-not-install');

/**
 * String token for if there was an error while installing modules.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_INSTALL_MODULES', 'drush_install.error.could-not-install-modules');

/**
 * String token for when all modules are installed successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_INSTALL_MODULES', 'drush_install.success.modules');

/**
 * String token for when a set of custom modules are about to be installed.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_INSTALL_MODULES', 'drush_install.working.modules');

/**
 * String token for when Drupal has been installed.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_INSTALL_DRUPAL', 'drush_install.success.drupal');

/**
 * String token for when Drupal is about to be installed.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_INSTALL_DRUPAL', 'drush_install.working.drupal');
