<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Server setting for whether or not to use sudo on appropriate commands.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_NO_SUDO_COMMANDS', 'no-sudo-commands');

/**
 * Server setting to disable the server.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_DISABLED', 'disabled');

/**
 * Server setting for the remote host.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HOST', 'host');

/**
 * Server setting for the remote port for SSH.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_PORT', 'port');

/**
 * Server setting for the fingerprint.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_FINGERPRINT', 'fingerprint');

/**
 * Server setting for the connection type.
 * 
 * @see @ref server_connection_types "Server Connection Types"
 * @ingroup server_settings
 */
define('SERVER_SETTING_CONNECTION_TYPE', 'connection');

/**
 * Server setting for the user name.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_USER', 'user');

/**
 * Server setting for the public key file.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_PUBKEY', 'pubkey');

/**
 * Server setting for the private key file.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_PRIVKEY', 'privkey');

/**
 * Server setting for the passphrase.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_PASSPHRASE', 'passphrase');

/**
 * Connection type to use public-private key authentication.
 * 
 * @ingroup server_connection_types
 */
define('SERVER_CONNECTION_PUBKEY', 'pubkey');

/**
 * Fired when a list of servers are needed.
 * 
 * @ingroup events
 */
define('EVENT_FIND_SERVERS', 'find-servers');

/**
 * Config key for the list of servers.
 * 
 * This key must be defined via YAML and be a list of @ref server_types 
 * "server types". 
 * 
 * @ingroup config
 */
define('CONFIG_SERVER_LIST', 'si-servers');

/**
 * String token for when there is an error connecting to the server.
 * 
 * @ingroup strings
 */
define('STRING_SERVER_INTERACTION_NO_SERVER', 'server_interaction.error.could-not-init');

/**
 * Site setting for external files.
 * 
 * This is an array of files managed through PhysicalServerInterface objects
 * that should be tied to this Drupal site (eg deleted).
 * 
 * @ingroup site_settings
 */
define('SITE_REMOTE_FILES', 'remote-files');

/**
 * Server setting for the type of remote server object to build.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_TYPE', 'server-implementation');

/**
 * Generic server implementation - this is the default.
 * 
 * @ingroup server_implementation_types
 */
define('SERVER_IMPLEMENTATION_GENERIC', 'generic');

/**
 * Fired when we need a physical server type.
 * 
 * @ingroup events
 */
define('EVENT_CAST_PHYSICAL_SERVER', 'cast-physical-server');

/**
 * String token for when we are unable to delete a managed remote file.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_DELETE_REMOTE_FILE', 'server_interaction.error.could-not-delete-remote-file');

/**
 * String token for when the server could not be cast.
 * 
 * @ingroup strings
 */
define('STRING_UNABLE_TO_CAST_SERVER', 'server_interaction.error.unable-to-cast');

/**
 * String token for when the server is done deleting remote files.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DELETING_REMOTE_FILES', 'server_interaction.success.remote-delete');

/**
 * String token for when the server is about to delete some remote files.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DELETING_REMOTE_FILES', 'server_interaction.working.remote-delete');

/**
 * String token for when the server is deleting a specific remote file.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DELETING_REMOTE_FILES_ITEM', 'server_interaction.working.remote-delete-item');
