<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Config key for the user language.
 * 
 * @ingroup config
 */
define('CONFIG_LANGUAGE_SELECT', 'language');

/**
 * Config key for the pattern for language file paths. !language is used to 
 * represent the language. Note that this is an array value as many different
 * paths (none of which are required) may be specified.
 * 
 * The default is %toolkit_directory/translations/!language.tr
 * 
 * @ingroup config
 */
define('CONFIG_LANGUAGE_FILE', 'language-file-pattern');
