<?php
/**
 * @file Defines all the constants used by this plugin.
 */

/**
 * Saves the crontab frequency in use.
 * 
 * @ingroup site_settings
 */
define('SITE_SETTING_CRONTAB_FREQUENCY', 'crontab-frequency');

/**
 * Overrides the crontab frequency specified in CONFIG_CRONTAB_FREQUENCY.
 * 
 * @ingroup args
 */
define('OPTION_CRONTAB_FREQUENCY', 'crontab-frequency');

/**
 * Configure the setting that will be passed to crontab implementations.
 * 
 * This should be five values separated by spaces in the following order:
 * - minute (0-59)
 * - hour (0-23)
 * - day of the month (1-31)
 * - month (1-12
 * - day of the week (0-6, 0 is Sunday)
 * 
 * Special characters may depend on the exact Linux version in use:
 * - Spaces separate all five fields
 * - Commas separate multiple values within fields
 * - Hyphens separate ranges within fields
 * - Asterisk is a wildcard indicating all values
 * - Slashes indicate an interval of values
 * - At sign (@) or capital H indicates a random value between the min and 
 *   max value inclusive. Note that using an interval on a random value will
 *   limit the random value to min-(interval-1). If this is not desired, the
 *   random range can be explicitly declared as below.
 * - Random values can have limits, either @(max) or @(min, max). If min is 
 *   omitted, it defaults to the smallest value for the field.
 * 
 * Some special names can also be used instead of the five fields:
 * - @yearly and @annually indicates yearly execution on Jan 1
 * - @monthly indicates monthly execution on the first day of the month
 * - @weekly indicates executing every week on Sunday morning
 * - @daily indicates executing every day at midnight
 * - @hourly indicates executing every hour at the hour
 * 
 * @ingroup config
 */
define('CONFIG_CRONTAB_FREQUENCY', 'crontab-frequency');

/**
 * String for when a cron URL could not be determined.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_NO_CRON_URL', 'cron_plugin.error.no-url');

/**
 * String for when a cron job could not be installed.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_COULD_NOT_CREATE_CRON', 'cron_plugin.error.bad-creation');

/**
 * The set of servers that all need a cron job installed on them.
 * 
 * @ingroup server_types
 */
define('SERVER_TYPE_CRON', 'cron');

/**
 * Fired to cast a cron server to an instance of CronManagerInterface.
 * 
 * @ingroup events
 */
define('EVENT_CAST_CRON_SERVER', 'cast-cron-server');

/**
 * Server setting to override the cron type.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_CRON_TYPE', 'cron-type');

/**
 * Fallback value for SERVER_SETTING_CRON_TYPE. Also impacts the localhost
 * configuration.
 * 
 * @ingroup config
 */
define('CONFIG_DEFAULT_CRON_TYPE', 'cron-type-default');

/**
 * Cron type for a Linux crontab implementation that allows config files to be
 * dropped into /etc/cron.d
 * 
 * @ingroup cron_types
 */
define('CRON_TYPE_CRONTAB', 'crontab');

/**
 * Stores the list of cron machines.
 * 
 * @ingroup site_settings
 */
define('SITE_CRON_MACHINES', 'cron-machines');

/**
 * String for if a cron task could not be deleted.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_DELETE_CRON', 'cron_plugin.error.could-not-delete-task');

/**
 * String for if a server could not be initialized.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_INIT_SERVER', 'cron_plugin.error.could-not-init-server');

/**
 * Config setting to prevent cron tasks from being updated.
 * 
 * @ingroup config
 */
define('CONFIG_STATIC_CRON', 'cron-static-config');

/**
 * Server setting to prevent the cron task from being updated.
 * 
 * @ingroup server_settings
 */
define('SERVER_SETTING_STATIC_CRON', 'cron-static-config');

/**
 * String for telling the user that the cron tasks are being deleted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CRON_DELETE', 'cron.working.delete');

/**
 * String for telling the user that the cron tasks were deleted.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CRON_DELETE', 'cron.success.delete');

/**
 * String for telling the user that cron tasks are being setup.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CRON_SETUP', 'cron.working.setup');

/**
 * String for telling the user that cron tasks were setup properly.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_CRON_SETUP', 'cron.success.setup');
  
/**
 * String for telling the user that a cron task item is being deleted.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CRON_DELETE_ITEM', 'cron.working.delete_item');

/**
 * String for telling the user that a cron task item is being setup.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_CRON_SETUP_ITEM', 'cron.working.setup_item');
