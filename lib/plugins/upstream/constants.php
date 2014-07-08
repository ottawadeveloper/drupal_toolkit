<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Set this config key to 1 in order to prevent any syncing with an upstream
 * server.
 * 
 * @ingroup config
 */
define('CONFIG_IGNORE_UPSTREAM', 'upstream-ignore');

/**
 * Specifies a server type for the upstream server. Used by the server-interaction
 * plugin to load a server definition.
 * 
 * Unlike other server types, only a single server (the last one defined) is used
 * by this server type.
 * 
 * @ingroup server_types
 */
define('SERVER_TYPE_UPSTREAM_SERVER', 'upstream');

/**
 * String token for when there is no upstream server available.
 * 
 * @ingroup strings
 */
define('STRING_MISSING_UPSTREAM_SERVER', 'upstream.error.missing-upstream-server');

/**
 * Event fired to allow other plugins to bring down upstream data.
 * 
 * @ingroup events
 */
define('EVENT_UPSTREAM_PULL', 'pull-upstream-data');

/**
 * String token for when an upstream pull is about to begin.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_PULL_UPSTREAM', 'upstream.working.pull');

/**
 * String token for when an upstream pull is complete.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_PULL_UPSTREAM', 'upstream.success.pull');
