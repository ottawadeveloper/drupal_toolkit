<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * This config setting lets you specify additional file types to scan for.
 * This is an array variable, and will extend the default types with the types
 * you specify.
 * 
 * Default types: *.php, *.inc, *.install, *.module
 * 
 * @ingroup config
 */
define('CONFIG_PHPLOC_FILES', 'phploc-file-patterns');

/**
 * String token for when phploc generation is about to happen.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_PHPLOC', 'phploc.working.phploc');

/**
 * String token for when phploc generation went fine.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_PHPLOC', 'phploc.success.phploc');

/**
 * String token for when phploc failed.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_PHPLOC', 'phploc.failure.phploc');