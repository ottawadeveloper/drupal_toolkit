<?php
/**
 * @file Defines several useful constants for this project.
 */

/**
 * Fired to update the core of DTK.
 * 
 * @ingroup events
 */
define('EVENT_SELF_UPDATE_CORE', 'self-update-core');

/**
 * Fired to allow plugins to update themselves after core has 
 * been updated.
 * 
 * @ingroup events
 */
define('EVENT_SELF_UPDATE_EXTRAS', 'self-update-extras');

/**
 * String token to display when there is an error during the update
 * process.
 * 
 * @ingroup strings
 */
define('STRING_SELF_UPDATE_ERROR', 'self-update.error.on-update');

/**
 * String token to display when there is an error pulling DTK from git.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_PULLING_DTK', 'self-update.failure.on-update');

/**
 * String token to display when DTK was pulled without errors from git.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_PULLING_DTK', 'self-update.success.on-update');

/**
 * String token to display just before DTK is pulled from git.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_PULLING_DTK', 'self-update.working.on-update');
