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