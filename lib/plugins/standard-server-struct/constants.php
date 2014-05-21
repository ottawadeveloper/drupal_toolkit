<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Config key for the server sites directory.
 * 
 * @ingroup config
 */
define('CONFIG_SERVER_SITES_DIR', 'server-sites-dir');

/**
 * Site token for the document root.
 * 
 * @ingroup site_tokens
 */
define('SITE_TOKEN_DOCROOT', 'SITE_DOCROOT');

/**
 * Site setting for the document root.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_DOCROOT', 'server-doc-root');

/**
 * String token for if the site structure already exists.
 * 
 * @ingroup strings
 */
define('STRING_SERVER_STRUCTURE_ALREADY_EXISTS', 'standard_server_structure.error.already-exists');

/**
 * String token for if the site structure could not be created.
 * 
 * @ingroup strings
 */
define('STRING_SERVER_STRUCTURE_CREATE_FAILURE', 'standard_server_structure.error.could-not-create');

/**
 * String token for when the server structure is about to be deleted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DELETE_SERVER_STRUCT', 'standard_server_structure.working.delete-structure');

/**
 * String token for when the server structure was successfully removed.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DELETE_SERVER_STRUCT', 'standard_server_structure.success.delete-structure');

/**
 * String token for when the server structure was not removed.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_DELETE_SERVER_STRUCT', 'standard_server_structure.failure.delete-structure');

/**
 * String token for when the server structure is about to be created.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CREATE_SERVER_STRUCT', 'standard_server_structure.working.create-structure');

/**
 * String token for when the server structure was successfully created.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CREATE_SERVER_STRUCT', 'standard_server_structure.success.create-structure');
