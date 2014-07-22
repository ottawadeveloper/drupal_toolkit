<?php
/**
 * @file Useful constants for this plugin.
 */

/**
 * Config value for the location of the temp directory that will be wiped
 * when starting a build or update process.
 * 
 * @ingroup config
 */
define('CONFIG_TEMPDIR_DIRECTORY', 'temp-directory');

/**
 * Config flag for whether or not to wipe the temp directory specified in
 * CONFIG_TEMPDIR_DIRECTORY. Defaults to FALSE.
 * 
 * @ingroup config
 */
define('CONFIG_TEMPDIR_CLEAR', 'clean-temp-directory');

/**
 * String token for when the temp directory was wiped.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_TEMPDIR_CLEANUP', 'tempdir.success.cleanup');

/**
 * String token for when there was an error while wiping the temp directory.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_TEMPDIR_CLEANUP', 'tempdir.error.cleanup');

/**
 * String token for the message to display before attempting to wipe the 
 * temporary directory.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_TEMPDIR_CLEANUP', 'tempdir.working.cleanup');
