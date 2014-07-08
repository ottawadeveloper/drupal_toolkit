<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Server setting to override the HTTP configuration directory from the 
 * default for the server type.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HTTP_CONFIG_DIR', 'http-config-dir');

/**
 * Server setting to override the location of the HTTP configuration template.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HTTP_CONFIG_TEMPLATE', 'http-config-template');

/**
 * Server setting to override the template for the HTTP config filename.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HTTP_FILE_TEMPLATE', 'http-file-template');

/**
 * Fired when an HTTP server needs to be cast based on its type.
 * 
 * @ingroup events
 */
define('EVENT_CAST_HTTP_SERVER', 'cast-http-server');

/**
 * Config key for whether or not we should use the local server as an HTTP
 * server.
 * 
 * @ingroup config
 */
define('CONFIG_HTTP_USE_LOCAL', 'http-local');

/**
 * Config key for the default server type.
 * 
 * @ingroup config
 * @see @ref http_types "HTTP Server Types"
 */
define('CONFIG_HTTP_DEFAULT_SERVER_TYPE', 'http-server-type');

/**
 * Config key for whether or not the configuration should be treated as static.
 * If set to TRUE, no HTTP server will have its configuration updated on
 * update.
 * 
 * @ingroup config
 */
define('CONFIG_HTTP_STATIC_CONFIG', 'http-static-config');

/**
 * Config key for the default config template file.
 * 
 * @ingroup config
 * @see DrupalSite::replaceTokens()
 */
define('CONFIG_HTTP_DEFAULT_CONFIG_TEMPLATE', 'http-config-template');

/**
 * Config key for the default config filename tempalte.
 * 
 * @ingroup config
 * @see DrupalSite::replaceTokens()
 */
define('CONFIG_HTTP_DEFAULT_FILENAME_TEMPLATE', 'http-config-filename-template');

/**
 * Server type for HTTP servers.
 * 
 * @ingroup server_types
 */
define('SERVER_TYPE_HTTP', 'http');

/**
 * HTTP server type for apache2 servers.
 * 
 * @ingroup http_types
 */
define('HTTP_TYPE_APACHE2', 'apache2');

/**
 * HTTP server type for nginx servers.
 * 
 * @ingroup http_types
 */
define('HTTP_TYPE_NGINX', 'nginx');

/**
 * HTTP server type for httpd servers.
 * 
 * @ingroup http_types
 */
define('HTTP_TYPE_HTTPD', 'httpd');

/**
 * Server setting to override the default HTTP type.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HTTP_TYPE', 'http-type');

/**
 * Server setting to prevent updating the configuration files.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HTTP_STATIC', 'http-static-config');

/**
 * String token for when there is no template file defined.
 * 
 * @ingroup strings
 */
define('STRING_HTTP_MISSING_TEMPLATE', 'http_config.error.no-template');

/**
 * String token for when there is no configuration.
 * 
 * @ingroup strings
 */
define('STRING_HTTP_NO_CONFIG', 'http_config.error.no-config');

/**
 * String token for when the configuration could not be written to the server.
 * 
 * @ingroup strings
 */
define('STRING_HTTP_BAD_WRITE', 'http_config.error.bad-write');

/**
 * String token for when all HTTP servers are about to be restarted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_HTTP_RESTART', 'http_config.working.restart');

/**
 * String token for when a specific HTTP server is about to be restarted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_HTTP_RESTART_SERVER', 'http_config.working.restart-server');

/**
 * String token for when all HTTP servers have been restarted.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_HTTP_RESTART', 'http_config.success.restart');

/**
 * String token for when all HTTP servers are about to be configured.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_HTTP_CONFIGURE', 'http_config.working.configure');

/**
 * String token for when a specific HTTP server is about to be configured.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_HTTP_CONFIGURE_SERVER', 'http_config.working.configure-server');

/**
 * String token fro when all HTTP servers have been configured.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_HTTP_CONFIGURE', 'http_config.success.configure');

/**
 * Set to TRUE to prevent HTTP server from restarting.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_SKIP_REBOOT', 'http-skip-reboot');