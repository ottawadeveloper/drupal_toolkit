<?php
/**
 * @file Useful constants for this plugin.
 */

/**
 * If there is a need to not download certain tables from the remote
 * server, set this config key to a key in $ignore_tables on the remote 
 * server.
 * 
 * You should also specify a mirrored value in CONFIG_UPSTREAM_LOCAL_TABLES_KEY
 * that specifies to keep all the ignored tables from the local install if
 * needed.
 * 
 * @ingroup config
 */
define('CONFIG_UPSTREAM_IGNORE_UPSTREAM_TABLES_KEY', 'upstream-ignore-upstream-tables-key');

/**
 * If there is a need to keep certain local tables from the previous installs,
 * set this config key to a key in $tables on the local server.
 * 
 * This data will be imported after the remote data is imported.
 * 
 * @ingroup config
 */
define('CONFIG_UPSTREAM_LOCAL_TABLES_KEY', 'upstream-local-tables-key');

/**
 * Set this config key to 1 in order to use gzip when downloading data.
 * 
 * Currently not supported.
 * 
 * @ingroup config
 */
define('CONFIG_UPSTREAM_GZIP_SUPPORT', 'upstream-gzip');

/**
 * If certain entries in the variables table should be preserved as they are,
 * add then to this array.
 * 
 * By default, several important variables are preserved in all cases:
 * - cron_key: This prevents the cron_key from being overridden on the local
 *   site and possibly breaking any existing crontab functionality. Also 
 *   prevents the server's cron_key from being known.
 * - drupal_private_key: Similar reasons to cron_key.
 * - file_temporary_path: As different servers might have different temp
 *   paths, this variable is not overridden.
 * - background_process_token: Specific to the background process module,
 *   this token should not be changed between installations.
 * - background_process_derived_default_host: Similar reasoning to the token.
 * 
 * Developers who know what they're doing can override these values directly
 * in this file if needed.
 * 
 * @ingroup config
 */
define('CONFIG_PRESERVE_VARIABLES', 'preserve-local-variables');

/**
 * String token for when the upstream database cannot be downloaded.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_DOWNLOAD_DUMP', 'upstream_db.error.unable-to-download');

/**
 * String token for when the local database dump fails.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_CREATE_LOCAL_DUMP', 'upstream_db.error.unable-to-create-local-dump');

/**
 * String token for when a plugin reports an error while saving the state.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_PRESERVE_STATE', 'upstream_db.error.unable-to-preserve-state');

/**
 * String token for when a plugin reports an error while restoring the state.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_RESTORE_STATE', 'upstream_db.error.unable-to-restore-state');

/**
 * String token for when the original database cannot be backed up.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_BACKUP_DATABASE', 'upstream_db.error.unable-to-backup-database');

/**
 * String token for when the original database could not be restored. This is a
 * fairly significant condition as it may indicate that the database is corrupt.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_RESTORE_DATABASE', 'upstream_db.warning.unable-to-restore-database');

/**
 * String token for if the database could not be dropped before the import.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_DROP_CURRENT_DB', 'upstream_db.error.unable-to-drop-current-db');

/**
 * String token for when the upstream database could not be imported.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_IMPORT_UPSTREAM_DB', 'upstream_db.error.unable-to-import-upstream');

/**
 * String token for when the local database could not be imported.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_IMPORT_LOCAL_DB', 'upstream_db.error.unable-to-import-local');

/**
 * String token for when a variable could not be restored to its original state.
 * 
 * @ingroup strings
 */
define('STRING_UPSTREAM_UNABLE_TO_RESTORE_VARIABLE', 'upstream_db.error.unable-to-restore-variable');

/**
 * This event is fired in order for plugins to obtain any information they need
 * to preserve from the Drupal site before the database is wiped out and replaced
 * by the upstream one. 
 * 
 * Plugins should use the $state proprty on the $context object to preserve
 * data between this event and EVENT_UPSTREAM_DATABASE_RESTORE_STATE.
 * 
 * Note that variable preservation is done by this plugin, see CONFIG_PRESERVE_VARIABLES.
 * 
 * @ingroup events
 */
define('EVENT_UPSTREAM_DATABASE_PRESERVE_STATE', 'upstream-db-preserve-state');

/**
 * This event is fired in order to restore the states preserved by 
 * EVENT_UPSTREAM_DATABASE_PRESERVE_STATE. Plugins should implement this event
 * in order to update the Drupal site with any preserved data.
 * 
 * An example of this can be seen in the variable presentation done by this
 * plugin.
 * 
 * @ingroup events
 */
define('EVENT_UPSTREAM_DATABASE_RESTORE_STATE', 'upstream-db-restore-state');

/**
 * String token for when all stateful variables are about to be preserved.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_PRESERVE_VARS', 'upstream_db.working.preserve-vars');

/**
 * String token for when a variable is about to be preserved.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_PRESERVE_VAR', 'upstream_db.working.preserve-var');

/**
 * String token for when all stateful variables are about to be restored.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_RESTORE_VARS', 'upstream_db.working.restore-vars');

/**
 * String token for when a variable is about to be restored.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_RESTORE_VAR', 'upstream_db.working.restore-var');

/**
 * String token for when a backup is about to be taken.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_DB_BACKUP', 'upstream_db.working.backup-db');

/**
 * String token for when a backup is about to be restored.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_DB_RESTORE', 'upstream_db.working.restore-backup');

/**
 * String token for when databases are about to be sync'd.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SYNC_DB', 'upstream_db.working.sync-db');

/**
 * String token for when a database is about to be downloaded.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_DOWNLOAD_UPSTREAM_DB', 'upstream_db.working.download-db');

/**
 * String token for when a database item is about to be sync'd.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_SYNC_DB_ITEM', 'upstream_db.working.sync-db-item');

/**
 * String token for when state is about to be preserved.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_PRESERVE_STATE', 'upstream_db.working.preserve');

/**
 * String token for when the current database is about to be dropped.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_DROP_CURRENT', 'upstream_db.working.drop-current');

/**
 * String token for when importing the remote databases is about to start.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_IMPORT_REMOTE', 'upstream_db.working.import-remote');

/**
 * String token for when importing the local databases is about to start.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_IMPORT_LOCAL', 'upstream_db.working.import-local');

/**
 * String token for when restoring any preserved states starts.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_UPSTREAM_RESTORE_STATE', 'upstream_db.working.restore');

/**
 * String token for when a local DB dump is about to start.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_GENERATE_LOCAL_DUMP', 'upstream_db.working.generate-local');

/**
 * String token for when a remote DB dump is about to start.
 * 
 * @ingroup strings
 */
define('STRING_WORKING_GENERATE_REMOTE_DUMP', 'upstream_db.working.generate-remote');

/**
 * String token for when variables were preserved properly.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_PRESERVE_VARS', 'upstream_db.success.preserve-vars');

/**
 * String token for when variables were restored properly.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_RESTORE_VARS', 'upstream_db.success.restore-vars');

/**
 * String token for when the backup is successful.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_UPSTREAM_DB_BACKUP', 'upstream_db.success.backup-db');

/**
 * String token for when the backup is successfully restored.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_UPSTREAM_DB_RESTORE', 'upstream_db.success.restore-db');

/**
 * String token for when all databases were sync'd successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_SYNC_DB', 'upstream_db.success.sync-db');

/**
 * String token for when a database was sync'd successfully.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_SYNC_DB_ITEM', 'upstream_db.success.sync-db-item');

/**
 * String token for when the local dump was successful.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_GENERATE_LOCAL_DUMP', 'upstream_db.success.generate-local');

/**
 * String token for when the remote dump was successful.
 * 
 * @ingroup strings
 */
define('STRING_SUCCESS_GENERATE_REMOTE_DUMP', 'upstream_db.success.generate-remote');

/**
 * String token for when the backup of the current database could not be
 * restored.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_UPSTREAM_DB_RESTORE', 'upstream_db.failure.restore-backup');

/**
 * String token for when the current database could not be backed up.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_UPSTREAM_DB_BACKUP', 'upstream_db.failure.backup-db');

/**
 * String token for when the upstream database dump could not be generated.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_GENERATE_REMOTE_DUMP', 'upstream_db.failure.generate-remote');

/**
 * String token for when the local database dump could not be generated.
 * 
 * @ingroup strings
 */
define('STRING_FAILURE_GENERATE_LOCAL_DUMP', 'upstream_db.failure.generate-local');

/**
 * String token for when the upstream database could not be downloaded.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_UPSTREAM_UNABLE_TO_DOWNLOAD_DB', 'upstream_db.error.unable-to-download-upstream');
