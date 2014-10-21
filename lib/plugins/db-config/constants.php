<?php
/**
 * @file Defines all the constants used by this plugin.
 */

/**
 * String token for printing out the database connection information.
 * 
 * @ingroup strings
 */
define('STRING_INFO_DB', 'db_config.info.db-info');

/**
 * DB server type constant for MySQL servers.
 * 
 * @ingroup db_types
 */
define('DB_SERVER_TYPE_MYSQL', 'mysql');

/**
 * DB server type constant for MySQL servers that require query
 * verification before being executed.
 * 
 * @ingroup db_types
 */
define('DB_SERVER_TYPE_DUMMY_MSQL', 'dummy-mysql');

/**
 * Event to cast a DB server based on its type.
 * 
 * This event is fired when we want to convert an array of settings into
 * an instance of DatabaseManagerInterface. Listeners can check whether or 
 * not they support the specified type and, if so, return the appropriate
 * DatabaseManagerInterface object and stop propagation.
 * 
 * Context object properties:
 * - @c dbServer: This should be set to the appropriate DatabaseManagerInterface
 *   when found.
 * - @c type: The type name, see @ref db_types "Database Type Keys".
 * - @c settings: The settings array, which should be passed to the implementing
 *   object so it can act on it. See @ref db_settings "Database Host Settings"
 *   for available settings (not every type uses every setting).
 * 
 * 
 * @see DatabaseConfigurationPlugin::getCastedDBServer()
 * 
 * @ingroup events
 */
define('EVENT_CAST_DB_SERVER', 'cast-db-server');

/**
 * Event to find DB servers.
 * 
 * This event is fired to allow plugins to provide any DB servers. 
 * 
 * Context object properties:
 * - @c servers: An array of DatabaseManagerInterface objects. Plugins should
 *   add to this array.
 * 
 * @see DatabaseConfigurationPlugin::createDatabase().
 * 
 * @ingroup events
 */
define('EVENT_FIND_DB_SERVERS', 'find-db-servers');

/**
 * Random password constant.
 */
define('DB_RANDOM_PASSWORD', '__RANDOM__');

/**
 * Argument to specify the database name.
 * 
 * It should be a valid database name string. If not provided, the pattern
 * defined by CONFIG_SITE_NAME_PATTERN will be used.
 * 
 * @ingroup args
 */
define('OPTION_DB_NAME', 'db-name');

/**
 * Argument to specify the database username.
 * 
 * It should be a valid database username. If not provided, the pattern defined
 * by CONFIG_SITE_USER_PATTERN will be used.
 * 
 * @ingroup args
 */
define('OPTION_DB_USER', 'db-user');

/**
 * Argument to specify the database password.
 * 
 * It should be a valid database password. If not provided, the default defined
 * by CONFIG_DB_DEFAULT_PASSWORD will be used.
 * 
 * @ingroup args
 */
define('OPTION_DB_PASSWORD', 'db-pass');

/**
 * The pattern to use for the DB username.
 * 
 * @see DrupalSite::replaceTokens().
 * 
 * @ingroup config
 */
define('CONFIG_SITE_DB_USER_PATTERN', 'site-db-username-pattern');

/**
 * The pattern to use for the DB name.
 * 
 * @see DrupalSite::replaceTokens().
 * 
 * @ingroup config
 */
define('CONFIG_SITE_DB_NAME_PATTERN', 'site-db-name-pattern');

/**
 * A host restriction for the created user.
 * 
 * @ingroup config
 */
define('CONFIG_SITE_DB_HOST_RESTRICTION', 'site-db-host-limit');

/**
 * The default server type to use.
 * 
 * This is used in the default implementation of EVENT_CAST_DB_SERVER in
 * case a type is not provided by the host configuration.
 * 
 * @see @ref db_types "Database Types"
 * @ingroup config
 */
define('CONFIG_DB_DEFAULT_TYPE', 'db-default-server-type');

/**
 * The default password to use.
 * 
 * For a random password, set to the value of DB_RANDOM_PASSWORD.
 * 
 * @ingroup config
 */
define('CONFIG_DB_DEFAULT_PASSWORD', 'db-default-new-password');

/**
 * Config key for the default database prefix to use.
 * 
 * @ingroup config
 */
define('CONFIG_DB_PREFIX', 'db-prefix');

/**
 * Command line long option to override the database prefix.
 * 
 * @ingroup args
 */
define('OPTION_DB_PREFIX', 'db-prefix');

/**
 * The list of database servers.
 * 
 * This is used for the default implementation of EVENT_FIND_DB_SERVERS.
 * 
 * @ingroup config
 */
define('CONFIG_DB_SERVERS', 'db-servers');

/**
 * The key within each DB host for its server type.
 * 
 * @ingroup db_settings
 */
define('DB_HOST_TYPE', 'type');

/**
 * The host key for the host information.
 * 
 * @ingroup db_settings
 */
define('DB_HOST_HOST', 'host');

/**
 * The host key for which server category this falls into for Drupal.
 * 
 * This is the first key of the $databases array in Drupal's settings.php.
 * 
 * @ingroup db_settings
 */
define('DB_HOST_DRUPAL_CATEGORY', 'drupal-category');

/**
 * The host key for which server mode this server plays in its category.
 * 
 * This is the second key of the $databases array in Drupal's settings.php. See 
 * DB_HOST_DRUPAL_CATEGORY for the first key.
 * 
 * @ingroup db_settings
 */
define('DB_HOST_DRUPAL_MODE', 'drupal-mode');

/**
 * The host key for the user name.
 * 
 * @ingroup db_settings
 */
define('DB_HOST_USER', 'user');

/**
 * Site setting for the list of databases that were created for it.
 * 
 * @ingroup site_settings
 */
define('SITE_DATABASE_LIST', 'db-list');

/**
 * The host key for the password.
 * 
 * @ingroup db_settings
 */
define('DB_HOST_PASSWORD', 'password');

/**
 * String token for when the database could not be created.
 * 
 * @ingroup strings
 */
define('STRING_CANNOT_CREATE_DB', 'db_config.error.cannot-create-db');
  
/**
 * String token for when the settings.php file cnanot be updated.
 * 
 * @ingroup strings
 */
define('STRING_CANNOT_WRITE_SETTINGS', 'db_config.error.cannot-write-settings');

/**
 * String token for when support for a DB type already used is removed.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_USE_DB', 'db_config.error.cannot-cast-db');

/**
 * String token for when the database could not be deleted.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_DELETE_DB', 'db_config.error.cannot-delete-db');

/**
 * String token for when the user could not be deleted.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_DELETE_USER', 'db_config.error.cannot-delete-user');

/**
 * Site setting for all the Drupal DB connection keys.
 * 
 * @ingroup site_settings
 */
define('SITE_DB_CONNECTION_KEYS', 'db-connection-keys');

/**
 * String for when databases are being deleted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DB_DELETE', 'db_config.working.db-delete');

/**
 * String for when all databases have been deleted.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DB_DELETE', 'db_config.success.db-delete');

/**
 * String for when a database is being deleted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DB_DELETE_ITEM', 'db_config.working.db-delete-item');

/**
 * String for when databases are being created.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DB_CREATE', 'db_config.working.db-create');

/**
 * String for when all databases have been created.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DB_CREATE', 'db_config.success.db-create');

/**
 * String for when a database has been created.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DB_CREATE_ITEM', 'db_config.working.db-create-item');

define('STRING_HELP_OPTION_DB_PREFIX_DESC', 'help.option_desc.db-prefix');

define('STRING_HELP_OPTION_DB_USER_DESC', 'help.option_desc.db-user');

define('STRING_HELP_OPTION_DB_PASSWORD_DESC', 'help.option_desc.db-password');

define('STRING_HELP_OPTION_DB_NAME_DESC', 'help.option_desc.db-name');
