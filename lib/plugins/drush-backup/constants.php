<?php
/**
 * @file Defines useful constants for this plugin.
 */

/**
 * String token for when we are unable to backup the database.
 * 
 * @ingroup strings
 */
define('STRING_COULD_NOT_BACKUP_DB', 'drush_backup.error.no-db-backup');

/**
 * String token for when we are unable to delete the DB backup.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_COULD_NOT_DELETE_BACKUP', 'drush_backup.error.delete-backup');

/**
 * String token for when the toolkit could not restore from backups.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_COULD_NOT_RESTORE_BACKUP', 'drush_backup.error.restore-error');

/**
 * String token for when the toolkit is about to restore from backups.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_RESTORE', 'drush_backup.working.restore');

/**
 * String token for when the toolkit is about to restore an item from backups.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_RESTORE_ITEM', 'drush_backup.working.restore-item');

/**
 * String token for when the toolkit is done restoring from backups.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DRUSH_RESTORE', 'drush_backup.success.restore');

/**
 * String token for when the toolkit is deleting backups.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_DELETE_BACKUPS', 'drush_backup.working.delete');

/**
 * String token for when the toolkit is done deleting backups.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DRUSH_DELETE_BACKUPS', 'drush_backup.success.delete');

/**
 * String token for when the toolkit is backing up the databases.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_BACKUP', 'drush_backup.working.backup');

/**
 * String token for when the toolkit is backing up a specific database.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DRUSH_BACKUP_ITEM', 'drush_backup.working.backup-item');

/**
 * String token for when the toolkit has finished backing up all the databases
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_DRUSH_BACKUP', 'drush_backup.success.backup');
