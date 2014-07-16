<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Site setting for the location of the current symlink.
 * 
 * @ingroup site_settings
 */
define('SITE_CURRENT_SYMLINK', 'build-current-symlink');

/**
 * Config key for the git repository server name.
 * 
 * This should include everything up until the git repo name.
 * 
 * @ingroup config
 */
define('CONFIG_GIT_REPO_ROOT', 'git-repository-root');

/**
 * Config key for the git repository that contains a drush make file.
 * 
 * This should include everything after CONFIG_GIT_REPO_ROOT.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_MAKE_REPO', 'drush-make-repository');

/**
 * Config key for the name of the drush make file within CONFIG_DRUSH_MAKE_REPO.
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_MAKE_FILE', 'drush-make-file');

/**
 * Config key for an array of options to pass to the drush make command.
 * 
 * Any flag option can be specified, without its leading two hyphens (eg 
 * working-copy, no-gitinfofile, etc).
 * 
 * @ingroup config
 */
define('CONFIG_DRUSH_MAKE_OPTIONS', 'drush-make-options');

/**
 * Config key for the default branch to use if one is not passed via
 * OPTION_BRANCH.
 * 
 * Defaults to master.
 * 
 * @ingroup config
 */
define('CONFIG_DEFAULT_BRANCH', 'default-branch');

/**
 * Config key for a list of acceptable branch names. Use this to prevent
 * accidently using certain branches.
 * 
 * Defaults to no restrictions.
 * 
 * @ingroup config
 */
define('CONFIG_BRANCH_WHITELIST', 'branch-whitelist');

/**
 * Option name to specify the branch name.
 * 
 * @ingroup args
 */
define('OPTION_BRANCH', 'branch');

/**
 * String token for the error message if no branch is specified.
 * 
 * @ingroup strings
 */
define('STRING_SITE_NO_BRANCH', 'standard_build.error.no-branch');

/**
 * String token for the error message if this plugin is not paired with one
 * that supplies SITE_CODEBASE_DIR.
 * 
 * @ingroup strings
 */
define('STRING_SITE_INVALID_CODEBASE', 'standard_build.error.no-codebase');

/**
 * String token for the error message if the clone fails.
 * 
 * @ingroup strings
 */
define('STRING_SITE_NO_CLONE', 'standard_build.error.clone-failure');

/**
 * String token for the error message if the make fails.
 * 
 * @ingroup strings
 */
define('STRING_SITE_NO_MAKE', 'standard_build.error.make-failure');

/**
 * String token for if the process to create a current symlink fails.
 * 
 * @ingroup strings
 */
define('STRING_SITE_NO_CURRENT', 'standard_build.error.current-symlink-failure');

/**
 * Site setting that contains the name of the branch cloned in this step.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_CLONED_BRANCH', 'cloned-branch');

/**
 * Site setting that contains the path to the current codebase that we just
 * made.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_CURRENT_BUILD', 'build-current-codebase-dir');

/**
 * Fired after this plugin is done so other modules can extend the build.
 * 
 * @ingroup events
 */
define('EVENT_CONTINUE_STANDARD_BUILD', 'standard-build-continue');

/**
 * String token for if a build directory could not be deleted.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_UNABLE_TO_DELETE_CODEBASE', 'standard_build.error.delete-codebase');

/**
 * Config key for an array of files to remove from each build.
 * 
 * @ingroup config
 */
define('CONFIG_REMOVE_BUILD_FILES', 'remove-build-files');

/**
 * String token for when a codebase that was reverted from is being saved.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_SAVE_REVERTED_CODE', 'standard_build.working.save-reverted');

/**
 * String token for when a reverted codebase was saved successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_SAVE_REVERTED_CODE', 'standard_build.success.save-reverted');

/**
 * String token for when a reverted codebase fails to save properly.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_BUILD_SAVE_REVERTED_CODE', 'standard_build.failure.save-reverted');

/**
 * String token for when extra files are successfully removed.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_REMOVE_EXTRAS', 'standard_build.success.remove-extras');

/**
 * String token for when the toolkit failed to remove extra files from the build.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_BUILD_REMOVE_EXTRAS', 'standard_build.failure.remove-extras');

/**
 * String token for when extra files are about to be removed from the build.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_REMOVE_EXTRAS', 'standard_build.working.remove-extras');

/**
 * String token for when a codebase is about to be deleted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_DELETE_CODEBASE', 'standard_build.working.delete-codebase');

/**
 * String token for when a codebase was successfully deleted.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_DELETE_CODEBASE', 'standard_build.success.delete-codebase');

/**
 * String token for when the current symlink is about to be updated.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_CURRENT_SYMLINK', 'standard_build.working.symlink-current');

/**
 * String token for when the current symlink was successfully updated.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_CURRENT_SYMLINK', 'standard_build.success.symlink-current');

/**
 * String token for when certain site variables are about to be reverted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_REVERT_SITE_VARS', 'standard_build.working.revert-site-vars');

/**
 * String token for when the site variables were fully reverted.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_REVERT_SITE_VARS', 'standard_build.success.revert-site-vars');

/**
 * String token for when a new codebase is about to be constructed.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_CONSTRUCT_CODEBASE', 'standard_build.working.construct-codebase');

/**
 * String token for when the make repo is about to be cloned.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_GIT_CLONE', 'standard_build.working.git-clone');

/**
 * String token for when the drush make command is about to be run.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_BUILD_DRUSH_MAKE', 'standard_build.working.drush-make');

/**
 * String token for when a new codebase is completed successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_BUILD_CONSTRUCT_CODEBASE', 'standard_build.success.construct-codebase');

/**
 * String token for displaying the build path.
 * 
 * @ingroup strings
 */
define('STRING_INFO_BUILD', 'standard_build.info.build-path');

/**
 * String token for displaying the build branch.
 * 
 * @ingroup strings
 */
define('STRING_INFO_BRANCH', 'standard_build.info.branch');
