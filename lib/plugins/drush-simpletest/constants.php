<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * Option for specifying simple test classes or groups.
 * 
 * @ingroup args
 */
define('OPTION_SIMPLETEST_CASES', 'simple-test-classes');

/**
 * Option for specifying simple test methods. Only used if you specified
 * one and only one test class or group with OPTION_SIMPLETEST_CASES.
 * 
 * @ingroup args
 */
define('OPTION_SIMPLETEST_METHODS', 'simple-test-methods');

/**
 * Option for overriding CONFIG_SIMPLETEST_DIRTY.
 * 
 * @ingroup args
 */
define('OPTION_SIMPLETEST_DIRTY', 'simple-test-dirty');

/**
 * If set to TRUE, will not cleanup the test databases on failure.
 * 
 * @ingroup config
 */
define('CONFIG_SIMPLETEST_DIRTY', 'simple-test-dirty');

/**
 * String token for when simple test fails.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_SIMPLE_TEST', 'drush-simpletest.failure.testing');

/**
 * String token for when simple test succeeds.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_SIMPLE_TEST', 'drush-simpletest.success.testing');

/**
 * String token for when simpel test begins.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SIMPLE_TEST', 'drush-simpletest.working.testing');
