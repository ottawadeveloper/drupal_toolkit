<?php
/**
 * @file Defines several useful constants for this plugin.
 */

/**
 * Event fired to refresh a site's configuration.
 * 
 * @ingroup events
 */
define('EVENT_SITE_REFRESH_CONFIGURATION', 'refresh-site');

/**
 * Event fired to refresh a subsite's configuration.
 * 
 * @ingroup events
 */
define('EVENT_SUBSITE_REFRESH_CONFIGURATION', 'refresh-subsite');

/**
 * String token for describing the site-refresh command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SITE_REFRESH_DESCRIPTION', 'help.command-desc.site-refresh');

/**
 * String token for describing the subsite-refresh command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SUBSITE_REFRESH_DESCRIPTION', 'help.command-desc.subsite-refresh');
