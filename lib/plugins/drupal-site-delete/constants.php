<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * String token for when we are unable to remove the site entirely.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_REMOVE', 'drupal_site_delete.error.unable-to-remove');

/**
 * Event fired to remove all evidence that a subsite ever existed.
 * 
 * @ingroup events
 */
define('EVENT_REMOVE_SUBSITE_ALL', 'subsite-remove');

/**
 * Generic message if there is an error removing the subsite.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_REMOVE_SUBSITE', 'drupal_site_delete.error.removing-subsite');

/**
 * Event fired after the subsite has been removed to cleanup the parent
 * site object.
 * 
 * @ingroup events
 */
define('EVENT_REMOVE_SUBSITE_CLEANUP', 'subsite-remove-cleanup');

/**
 * String token for the description of the site-delete command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SITE_DELETE_DESCRIPTION', 'help.command-desc.site-delete');

/**
 * String token for the description of the subsite-delete command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_SUBSITE_DELETE_DESCRIPTION', 'help.command-desc.subsite-delete');
