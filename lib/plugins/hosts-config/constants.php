<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Set this config key to YES to limit the managed hosts to only the prefixed
 * versions of the URL.
 * 
 * @ingroup config
 */
define('CONFIG_MANAGED_HOSTS_PREFIXED_ONLY', 'managed-host-prefixed-only');

/**
 * Set this server setting to YES to limit the managed hosts to only the prefixed
 * versions of the URL.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_MANAGED_HOSTS_PREFIXED_ONLY', 'managed-host-prefixed-only');

/**
 * Config key for whether or not the local server needs its host file 
 * managed.
 * 
 * @ingroup config
 */
define('CONFIG_MANAGED_HOSTS_USE_LOCAL', 'managed-host-local');

/**
 * Config key for the fallback type for managed host servers.
 * 
 * @see @ref managed_host_types "Managed Host Types"
 * @ingroup config
 */
define('CONFIG_MANAGED_HOSTS_DEFAULT_TYPE', 'managed-host-default-type');

/**
 * Config key for the target IP address for host files.
 * 
 * @ingroup config
 */
define('CONFIG_MANAGED_HOSTS_TARGET_IP_ADDRESS', 'managed-host-ip-address');

/**
 * Config key to prevent the hosts files from being updated during the site
 * update process.
 * 
 * @ingroup config
 */
define('CONFIG_MANAGED_HOSTS_STATIC', 'managed-host-static');

/**
 * Server type for servers that want to have their host files managed by
 * the toolkit.
 * 
 * @ingroup server_types
 */
define('SERVER_TYPE_MANAGED_HOST', 'managed-host');

/**
 * Set to TRUE to prevent the local server from being used as a managed host
 * server.
 * 
 * @ingroup config
 */
define('CONFIG_DISABLE_LOCAL_MANAGED_HOST', 'si-disable-local-managed-host');

/**
 * Fired when a managed host needs to be cast into a HostFileManagerInterface
 * object.
 * 
 * @ingroup events
 */
define('EVENT_CAST_MANAGED_HOST_SERVER', 'cast-managed-host-server');

/**
 * Fired when a list of managed hosts is needed.
 * 
 * @ingroup events
 */
define('EVENT_FIND_MANAGED_HOST_SERVERS', 'find-managed-host-servers');

/**
 * Allows overridding the default IP address.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HOST_IP_OVERRIDE', 'managed-host-ip-override');

/**
 * Allows changing the managed host type.
 * 
 * @ingroup server_settings
 * @see @ref managed_host_types "Managed Host Types"
 */
define('SERVER_SETTING_ENVIRONMENT', 'managed-host-type');

/**
 * Allows the user to override the location of the host file.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_HOSTS_FILE', 'managed-host-file');

/**
 * Server setting to prevent the hosts file from being updated during the 
 * update process.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_STATIC_HOSTS', 'managed-host-static');

/**
 * Config key to compact the hosts files.
 * 
 * If set to TRUE, all hosts files will be compacted preserving comments. See
 * hosts_file_compact() for the impact of this.
 * 
 * @ingroup config
 */
define('CONFIG_MANAGED_HOSTS_COMPACT', 'compact-hosts-file');

/**
 * Indicates that the host is a Linux machine.
 * 
 * @ingroup managed_host_types
 */
define('MANAGED_HOST_TYPE_LINUX', 'linux');

/**
 * String token for when there was an error writing out the hosts file.
 * 
 * @ingroup strings
 */
define('STRING_HOSTS_FILE_BAD_WRITE', 'hosts_config.error.bad_write');

/**
 * Site setting for the list of machines where we need to remove this site
 * from the hosts file.
 * 
 * @ingroup site_settings
 */
define('SITE_HOST_FILES', 'host-files');

/**
 * String token for the message when there was an error cleaning up the hosts 
 * file.
 * 
 * @ingroup strings
 */
define('STRING_HOST_REMOVAL_ERROR', 'hosts_config.error.unable-to-clean-host-file');

/**
 * String token for when all the host files are about to be sanitizied.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_REMOVING_HOSTS', 'hosts_config.working.removing-hosts');

/**
 * String token for when a specific server's host file is about to be modified
 * to remove specific entries.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_REMOVING_HOSTS_ITEM', 'hosts_config.working-removing-hosts-item');

/**
 * String token for when all relevant host file entries have been removed.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_REMOVING_HOSTS', 'hosts_config.success.removing-hosts');

/**
 * String token for when all host files are about to be updated.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPDATING_HOSTS', 'hosts_config.working.updating-hosts');

/**
 * String token for when a specific server's host file is about to be updated.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPDATING_HOSTS_ITEM', 'hosts_config.working.updating-hosts-item');

/**
 * String token for when all host files have been updated.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_UPDATING_HOSTS', 'hosts_config.success.updating-hosts');
