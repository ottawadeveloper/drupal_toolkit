<?php
/**
 * @file Defines useful constants for plugins.
 */

/**
 * Event to register gateway servers.
 * 
 * @ingroup events
 */
define('EVENT_FIND_GATEWAY_SERVERS', 'find-gateway-servers');

/**
 * Config key to set whether or not the local server is a gateway server.
 * 
 * @ingroup config
 */
define('CONFIG_GATEWAY_USE_LOCAL', 'gateway-local');

/**
 * Config key to set the default gateway type.
 * 
 * @ingroup config
 */
define('CONFIG_GATEWAY_TYPE', 'gateway-server-type');

/**
 * Configuration setting to prevent HTTP server configuration from being
 * created.
 * 
 * @ingroup config
 */
define('CONFIG_NO_GATEWAY_SERVER', 'no-gateway');

/**
 * Command-line option to prevent HTTP server configuration from being
 * created.
 * 
 * @ingroup config
 */
define('OPTION_NO_GATEWAY_SERVER', 'no-gateway');

define('STRING_HELP_OPTION_NO_GATEWAY_SERVER', 'help.option_desc.no-gateway');

/**
 * Keep track of this site not having HTTP configuration.
 * 
 * @ingroup config
 */
define('SITE_SETTING_NO_GATEWAY', 'skip-gateway');

/**
 * Config key to set the default gateway config template.
 * 
 * @ingroup config
 */
define('CONFIG_GATEWAY_CONFIG_TEMPLATE', 'gateway-config-template');

/**
 * Config key to set the default gateway filename template.
 * 
 * @ingroup config
 */
define('CONFIG_GATEWAY_FILENAME_TEMPLATE', 'gateway-config-filename-template');

/**
 * Config key to prevent config files from being updated.
 * 
 * @ingroup config
 */
define('CONFIG_GATEWAY_STATIC_CONFIG', 'gateway-config-static');

/**
 * Config key underneath the servers away for gateway servers
 * 
 * @ingroup server_types
 */
define('SERVER_TYPE_GATEWAY', 'gateway');

/**
 * Server setting to override the default gateway filename template.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_GATEWAY_FILENAME_TMEPLATE', 'gateway-filename-template');

/**
 * Server setting to override the default gateway configuration.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_GATEWAY_CONFIG_TEMPLATE', 'gateway-template-file');

/**
 * Server setting to prevent the server's gateway config from being overridden
 * on update.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_GATEWAY_STATIC_CONFIG', 'gateway-static-config');

/**
 * Server setting to override the default gateway type.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_GATEWAY_TYPE', 'gateway-type');

/**
 * String token for when there is no gateway template file defined.
 * 
 * @ingroup strings
 */
define('STRING_MISSING_GATEWAY_TEMPLATE', 'gateway.error.no-template');

/**
 * String token for when a write could not be performed to a gateway server.
 * 
 * @ingroup strings
 */
define('STRING_GATEWAY_BAD_WRITE', 'gateway.error.bad-write');

/**
 * Set to TRUE in order to use this plugin.
 * 
 * @ingroup config
 */
define('CONFIG_HAS_GATEWAY', 'has-gateways');

/**
 * String token for when gateway configuration is about to be published.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CONFIGURE_GATEWAY', 'gateway.working.configure');

/**
 * String token for when a specific server's gateway configuration is about to
 * be published.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CONFIGURE_GATEWAY_ITEM', 'gateway.working.configure-item');

/**
 * String token for when all gateway configuration was published successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CONFIGURE_GATEWAY', 'gateway.success.configure');
