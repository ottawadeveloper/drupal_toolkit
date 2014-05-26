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
 */
define('STRING_SELF_UPDATE_ERROR', 'self-update.error.on-update');
