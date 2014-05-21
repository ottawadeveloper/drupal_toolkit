<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Config setting for the directory in which doxygen files are stored.
 * 
 * @ingroup config
 */
define('CONFIG_DOXYGEN_DIR', 'doxygen-dir-name');

/**
 * Config setting for the path to the doxyfile. Defaults to NULL which allows
 * doxygen to figure out what to use.
 * 
 * @ingroup config
 */
define('CONFIG_DOXY_FILE', 'doxygen-doxyfile');

/**
 * String token for when the doxygen generation process was successful.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DOXYGEN_GENERATE', 'doxygen.success.generate');

/**
 * String token for when the doxygen generation process is about to happen.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DOXYGEN_GENERATE', 'doxygen.working.generate');

/**
 * String token for when the doxygen generation process fails.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_DOXYGEN_GENERATE', 'doxygen.failure.generate');
