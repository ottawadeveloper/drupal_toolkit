<?php
/**
 * @file Provides several useful constants for this plugin.
 */

/**
 * Event to generate documentation.
 * 
 * @ingroup events
 */
define('EVENT_GENERATE_DOCUMENTATION', 'generate-docs');

/**
 * Event fired before documentation is generated to allow installs to
 * do something, such as generate a documentation file.
 * 
 * @ingroup events
 */
define('EVENT_PRE_DOCUMENTATION', 'pre-generate-docs');

/**
 * String token for describing the site-doc command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SITE_DOC_DESCRIPTION', 'help.command-desc.site-doc');
