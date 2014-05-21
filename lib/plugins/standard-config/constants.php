<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Config setting to specify a prefix for all created URLs.
 * 
 * Usually the non-prefixed versions will be created as well.
 * 
 * @ingroup config
 */
define('CONFIG_SITE_URL_PREFIX', 'site-url-prefix');

/**
 * Config setting to specify a pattern for the primary URL.
 * 
 * @see DrupalSite::replaceTokens().
 * @ingroup config
 */
define('CONFIG_SITE_URL_PATTERN', 'site-url-pattern');

/**
 * Config setting to specify a pattern for a subsite's primary URL.
 */
define('CONFIG_SUBSITE_URL_PATTERN', 'subsite-url-pattern');

/**
 * Argument to provide extra URLs for the site.
 * 
 * @ingroup args
 */
define('OPTION_SITE_URLS', 'site-extra-urls');

/**
 * Argument to specify the site's primary URL.
 * 
 * @ingroup args
 */
define('OPTION_SITE_URL', 'site-url');

/**
 * String token for displaying information on the site-url option.
 * 
 * @ingroup strings
 */
define('STRING_HELP_OPTION_SITE_URL', 'help.option.site-url');

/**
 * String token for displaying information on the site-extra-urls option.
 * 
 * @ingroup strings
 */
define('STRING_HELP_OPTION_SITE_URLS', 'help.option.site-extra-urls');

/**
 * String token for displaying the primary URL.
 * 
 * @ingroup strings
 */
define('STRING_INFO_PRIMARY', 'drupal_site_config.info.primary-url');

/**
 * String token for displaying the login URL.
 * 
 * @ingroup strings
 */
define('STRING_INFO_LOGIN', 'drupal_site_config.info.login-url');
