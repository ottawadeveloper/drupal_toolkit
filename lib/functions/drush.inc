<?php
/**
 * @file Defines special functions that work with Drush.
 * 
 * @defgroup drush_watchdog_codes "Drush Watchdog Codes"
 * These codes are used to retrieve information about watchdog log messages.
 */

/**
 * Emergency log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_EMERGENCY', 'emergency');

/**
 * Alert log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_ALERT', 'alert');

/**
 * Critical log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_CRITICAL', 'critical');

/**
 * Error log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_ERROR', 'error');

/**
 * Warning log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_WARNING', 'warning');

/**
 * Notice log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_NOTICE', 'notice');

/**
 * Informational log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_INFO', 'info');

/**
 * Debug log entries.
 * 
 * @ingroup drush_watchdog_codes
 */
define('DRUSH_WATCHDOG_DEBUG', 'debug');

/**
 * Installs an array of Drupal modules.
 * 
 * @param array $modules
 *   An array of Drupal project names to install.
 * @param string $alias
 *   A Drush alias to use with drush_command().
 * 
 * @return boolean
 *   TRUE if all the modules are now enabled on the site, otherwise FALSE.
 */
function drush_install_modules(array $modules, $alias = NULL) {
  if (empty($modules)) {
    return TRUE;
  }
  drush_command('pm-enable !modules', $alias, array(
    '!modules' => implode(',', $modules),
  ));
  foreach ($modules as $module) {
    if (!drush_check_module($module, $alias)) {
      return FALSE;
    }
  }
  return TRUE;
}

/**
 * Verifies that a module is enabled on the site.
 * 
 * @param string $module_name
 *   The module name to check.
 * @param string $alias
 *   The site alias, if applicable.
 * 
 * @return boolean
 *   TRUE if the module is enabled, otherwise FALSE.
 */
function drush_check_module($module_name, $alias = NULL) {
  $pmi = drush_project_info($module_name, $alias);
  return drush_info_has_key_value($pmi, 'Status', 'enabled');
}

/**
 * Retrieves the project information for a project.
 * 
 * @param string $project_name
 *   The project name.
 * @param string $alias
 *   The project's alias.
 * 
 * @return array
 *   An array of lines returned by drush pm-info $project_name.
 */
function drush_project_info($project_name, $alias = NULL) {
  $info = array();
  drush_command('pm-info !module', $alias, array(
    '!module' => $project_name,
  ), $info);
  return $info;
}

/**
 * Installs a Drupal site.
 * 
 * @param string $profile
 *   The profile to install.
 * @param string $alias
 *   The alias to use for the installation.
 * @param array $extra
 *   An array of extra strings to attach after the command (options, etc).
 * @param array $args
 *   An array of replacements to perform in the command.
 * 
 * @return boolean
 *   TRUE if the site was installed correctly, otherwise FALSE.
 */
function drush_site_install($profile = NULL, $alias = NULL, array $extra = array(), array $args = array()) {
  if (empty($profile)) {
    $profile = 'standard';
  }
  $subcommand = 'site-install ' . $profile;
  if (!empty($extra)) {
    $subcommand .= ' ' . implode(' ', $extra);
  }
  drush_command($subcommand, $alias, $args);
  $status = drush_status($alias);
  return drush_info_has_key_value($status, 'Database', 'Connected') &&
    drush_info_has_key_value($status, 'Drupal bootstrap', 'Successful');
}

/**
 * Enables or disables maintenance mode on a Drupal site.
 * 
 * @param boolean $setTo
 *   Whether to enable (TRUE) or disable (FALSE) maintenance mode. Defaults to
 *   TRUE.
 * @param string $alias
 *   The alias for the site. Defaults to NULL which allows drush to determine
 *   the site to use.
 * 
 * @return boolean
 *   TRUE if the site is now in or out of maintenance mode as determine by
 *   $setTo.
 */
function drush_maintenance_mode($setTo = TRUE, $alias = NULL) {
  $subcommand = 'vset maintenance_mode ' . ($setTo ? "1" : "0");
  drush_command($subcommand, $alias, array(), $out, $exit);
  if (!extra_empty($exit)) {
    return FALSE;
  }
  return drush_check_maintenance_mode($alias) == $setTo;
}

/**
 * Checks if maintenance mode is enabled.
 * 
 * @param string $alias
 *   The alias for the site. Defaults to NULL which allows drush to determine
 *   the site to use.
 * 
 * @return boolean
 *   TRUE if maintenance mode is enabled, otherwise FALSE.
 */
function drush_check_maintenance_mode($alias = NULL) {
  $cmd = 'vget maintenance_mode';
  drush_command($cmd, $alias, array(), $out, $exit);
  if (!extra_empty($exit)) {
    return FALSE;
  }
  return drush_info_has_key_value($out, 'maintenance_mode', '1');
}

/**
 * Updates the database via drush.
 * 
 * @param string $alias
 *   The alias for the site. Defaults to NULL which allows drush to determine
 *   the site to use.
 * 
 * @return boolean
 *   TRUE if the update was successful, otherwise FALSE.
 */
function drush_updb($alias = NULL) {  
  $cmd = 'updb -y';
  drush_command($cmd, $alias, array(), $out, $exit);
  return extra_empty($exit);
}

/**
 * Checks a drush info array (either from drush status or pm-info) for a
 * particular key:value pairing.
 * 
 * @param array $info
 *   Info array to check in.
 * @param string $key
 *   Left side of : of lines in $info should be this.
 * @param string $value
 *   Right side of : of lines in $info should be this.
 * 
 * @return boolean
 *   TRUE if the key:value pair was found, otherwise false.
 */
function drush_info_has_key_value(array &$info, $key, $value) {
  $key = trim($key);
  $value = trim($value);
  foreach ($info as $line) {
    $pieces = explode(':', $line, 2);
    if (count($pieces) > 1) {
      if ($key == trim($pieces[0])) {
        return $value == trim($pieces[1]);
      }
    }
  }
  return NULL;
}

/**
 * Clears the cache in Drupal.
 * 
 * @param string $alias
 *   The alias to clear.
 * @param string $cache
 *   The cache to clear (defaults to all).
 */
function drush_cache_clear($alias = NULL, $cache = NULL) {
  if (empty($cache)) {
    $cache = 'all';
  }
  drush_command('cc ' . $cache, $alias, array(), $out, $exit);
  return extra_empty($exit);
}

/**
 * Retrieves the status information from a site.
 * 
 * @param string $alias
 *   The alias to get the status for.
 * 
 * @return array
 *   An array of site information.
 */
function drush_status($alias = NULL) {
  $output = array();
  drush_command('status', $alias, array(), $output, $exit);
  if (!empty($exit)) {
    return FALSE;
  }
  return $output;
}

/**
 * Executes a generic Drush command, with alias.
 * 
 * @param string $subcommand
 *   The full command to execute.
 * @param string $alias
 *   The alias to execute it against.
 * @param array $args
 *   An array of replacements to make in $subcommand.
 * @param array $out
 *   An array for the command output.
 * @param int $exit
 *   A variable for the exit code.
 * 
 * @return string
 *   The last line of the command executed.
 */
function drush_command($subcommand, $alias = NULL, array $args = array(), &$out = array(), &$exit = NULL) {
  $cmd = 'drush ';
  if (!empty($alias)) {
    $cmd .= '@' . $alias . ' ';
  }
  $cmd .= $subcommand;
  $ret = execute_system_command($cmd, $args, $out, $exit);
  return $ret;
}

/**
 * Dumps out the database to a specific location.
 * 
 * @param string $alias
 *   The alias of the Drupal site to dump. If empty, PHP's cwd must be a 
 *   sensible location to run this command.
 * @param string $destination
 *   The destination for the dump file.
 * @param array $options
 *   An array of additional options for the command:
 *   - data-only: Set to TRUE to skip schema creation commands.
 *   - database: Pass a specific DB connection key to use.
 *   - db-url: Pass to specify a specific DB connection.
 *   - gzip: Set to TRUE to gzip the dump.
 *   - ordered-dump: Set to TRUE to order by PK and add line breaks.
 *   - result-file: Same as $destination (overrides $destination).
 *   - skip-tables-key: ??
 *   - structure-tables-key: ??
 *   - tables-key: ??
 *   - tables-list: A list of tables to dump.
 * 
 * @return boolean
 *   TRUE if the dump was successful.
 * 
 * @see http://drush.ws/#sql-dump
 */
function drush_db_dump($alias = NULL, $destination = NULL, $options = array()) {
  array_extend($options, array(
    'data-only' => FALSE,
    'database' => NULL,
    'db-url' => NULL,
    'gzip' => FALSE,
    'ordered-dump' => FALSE,
    'result-file' => $destination,
    'skip-tables-key' => NULL,
    'structure-tables-key' => NULL,
    'tables-key' => NULL,
    'tables-list' => array(),
  ));
  $cmd = 'sql-dump';
  $args = array();
  foreach ($options as $key => $value) {
    if (!empty($value)) {
      if ($value === TRUE) {
        $cmd .= ' --' . $key;
      }
      else {
        $cmd .= ' --' . $key . '=!' . $key;
        if (is_array($value)) {
          $args['!' . $key] = implode(',' , $value);
        }
        else {
          $args['!' . $key] = $value;
        }
      }
    }
  }
  drush_command($cmd, $alias, $args, $out, $exit);
  if (!extra_empty($exit)) {
    return FALSE;
  }
  if (!empty($destination)) {
    return file_exists($destination);
  }
  return TRUE;
}

/**
 * Executes a drush make.
 * 
 * Note that this doesn't use the drush_command() function as there's almost
 * never an alias associated with this command.
 * 
 * @param string $makeFile
 *   The make file to execute.
 * @param array $options
 *   An array of additional arguments. Should be simply the flag name without
 *   the "--" (only works with long-format options). Values should be parameterized
 *   and passed through $args.
 * @param array $args
 *   Parameterized arguments in $options.
 * 
 * @return boolean
 *   TRUE when the drush make is completed (blocks until then), otherwise FALSE.
 */
function drush_make($makeFile, array $options = array(), array $args = array()) {
  $makeFile = realpath($makeFile);
  if (empty($makeFile)) {
    return FALSE;
  }
  chdir(dirname($makeFile));
  $command = 'drush make -y ';
  foreach ($options as $option) {
    $command .= '--' . $option . ' ';
  }
  $command .= '!makefile';
  execute_system_command($command, array(
    '!makefile' => $makeFile
  ) + $args);
  return file_exists(assemble_path(dirname($makeFile), 'index.php'));
}

/**
 * Checks if there are any log entries of the given severity or worse.
 * 
 * @param string $severity
 *   Severity code, see @ref drush_watchdog_codes "Drush watchdog codes".
 * @param string $alias
 *   Site alias to check.
 * 
 * @return boolean
 *   TRUE if there were log entries of the given type, otherwise false.
 */
function drush_check_log_worse($severity, $alias = NULL) {
  switch ($severity) {
    case DRUSH_WATCHDOG_DEBUG:
      if (drush_check_log(DRUSH_WATCHDOG_DEBUG)) {
        return TRUE;
      }
    case DRUSH_WATCHDOG_INFO:
      if (drush_check_log(DRUSH_WATCHDOG_INFO)) {
        return TRUE;
      }
    case DRUSH_WATCHDOG_NOTICE:
      if (drush_check_log(DRUSH_WATCHDOG_NOTICE)) {
        return TRUE;
      }
    case DRUSH_WATCHDOG_WARNING:
      if (drush_check_log(DRUSH_WATCHDOG_WARNING)) {
        return TRUE;
      }
    case DRUSH_WATCHDOG_ERROR:
      if (drush_check_log(DRUSH_WATCHDOG_ERROR)) {
        return TRUE;
      }
    case DRUSH_WATCHDOG_CRITICAL:
      if (drush_check_log(DRUSH_WATCHDOG_CRITICAL)) {
        return TRUE;
      }
    case DRUSH_WATCHDOG_ALERT:
      if (drush_check_log(DRUSH_WATCHDOG_ALERT)) {
        return TRUE;
      }
    default:
    case DRUSH_WATCHDOG_EMERGENCY:
      if (drush_check_log(DRUSH_WATCHDOG_EMERGENCY)) {
        return TRUE;
      }
  }
  return FALSE;
}

/**
 * Checks if there are any log entries of the given severity.
 * 
 * @param string $severity
 *   Severity code, see @ref drush_watchdog_codes "Drush watchdog codes".
 * @param string $alias
 *   Site alias to check.
 * 
 * @return boolean
 *   TRUE if there were log entries of the given type, otherwise false.
 */
function drush_check_log($severity, $alias = NULL) {
  $output = array();
  drush_command('ws --severity=!severity', $alias, array(
    '!severity' => $severity,
  ), $output);
  return !empty($output);
}
