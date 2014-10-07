<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * String token for when we are removing an old codebase.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_REMOVE_OLD_CB', 'standard-structure.working.remove-old');

/**
 * Site setting for the codebase directory.
 * 
 * @ingroup site_settings
 */
define('SITE_CODEBASE_DIR', 'structure_codebases_dir');

/**
 * Site setting for the sites directory.
 * 
 * @ingroup site_settings
 */
define('SITE_SITES_DIR', 'structure_sites_dir');

/**
 * Site setting for the rootlinks directory.
 * 
 * @ingroup site_settings
 */
define('SITE_ROOTLINKS_DIR', 'structure_rootlinks_dir');

/**
 * Fired to allow plugins to extend this process without overridding it.
 * 
 * @ingroup events
 */
define('EVENT_CONTINUE_STANDARD_STRUCTURE', 'standard-structure-continue');

/**
 * Fired to allow plugins to register their own directories with the structure.
 * 
 * @ingroup events
 */
define('EVENT_DISCOVER_STRUCTURE_DIRS', 'discover-structure-dirs');

/**
 * String token for if there is a failure to create a directory.
 * 
 * @ingroup strings
 */
define('STRING_STRUCTURE_DIR_FAILURE', 'standard_structure.error-could-not-create-dir');

/**
 * String token for if we could not remove the build directory.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_REMOVE_BUILD_DIR', 'standard_structure.error.could-not-remove-build');

/**
 * String token for when a site is about to be removed entirely.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_REMOVE_SITE', 'standard_structure.working.remove-site');

/**
 * String token for when a site was entirely removed succcessfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_REMOVE_SITE', 'standard_structure.success.remove-site');

/**
 * String token for when a new site is about to be built.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_STRUCTURE', 'standard_structure.working.build-site');

/**
 * String token for when a new site was built successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_STRUCTURE', 'standard_structure.success.build-site');
