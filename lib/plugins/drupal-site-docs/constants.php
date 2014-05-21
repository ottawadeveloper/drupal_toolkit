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
 */
define('EVENT_PRE_DOCUMENTATION', 'pre-generate-docs');
