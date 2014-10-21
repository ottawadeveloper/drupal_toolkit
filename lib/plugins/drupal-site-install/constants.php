<?php
/**
 * @file Defines useful constants for the plugin.
 */

/**
 * Fired before the install process begins.
 * 
 * @ingroup events
 */
define('EVENT_INSTALL_START', 'drupal-install-start');

/**
 * Fired after the install process is done.
 * 
 * @ingroup events
 */
define('EVENT_INSTALL_DONE', 'drupal-install-done');

/**
 * Fired to install the site, which one plugin must take responsibility for
 * for the task to succeed.
 * 
 * @ingroup events
 */
define('EVENT_INSTALL_TASK', 'drupal-install-task');

/**
 * Fired for extra install tasks.
 * 
 * @ingroup events
 */
define('EVENT_INSTALL_EXTRAS', 'drupal-install-extras');

/**
 * String token for the generic error message should the install fail.
 * 
 * @ingroup strings
 */
define('STRING_INSTALL_ERROR', 'drupal_site_install.error.install-error');

/**
 * Site setting for the build ID of the last time a subsite was installed.
 * The rollback functionality will not be allowed to revert to before this
 * build as the newly installed subsite cannot be rolled back and will be
 * not in sync with the codebase.
 * 
 * @ingroup site_settings
 */
define('SITE_LAST_SUBSITE_INSTALL_BUILD', 'subsite-last-install-build');

/**
 * String token for describing the site-install command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SITE_INSTALL_DESCRIPTION', 'help.command-desc.site-install');

/**
 * String token for describing the subsite-install command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SUBSITE_INSTALL_DESCRIPTION', 'help.command-desc.subsite-install');
