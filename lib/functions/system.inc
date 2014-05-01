<?php
/**
 * @file Useful functions relating to system commands.
 * 
 * Note that many of these are Linux only at the moment.
 */

/**
 * Attempts to retrieve the current system username. Linux support only at
 * this point.
 * 
 * Relies on the system whoami command.
 * 
 * @return string
 *   The username of the current system user, or NULL if unable to determine.
 */
function get_system_username() {
  if (shell_command_available('whoami')) {
    $whoami = trim(execute_system_command('whoami'));
    if (!empty($whoami)) {
      return $whoami;
    }
  }
  return NULL;
}

/**
 * Recursively makes directories
 * 
 * @param string $dir
 *   Directory to make
 */
function mkdir_all($dir) {
  if (!is_dir(dirname($dir))) {
    mkdir_all(dirname($dir));
  }
  mkdir($dir);
}

/**
 * Callback for preg_replace_callback that resolves a randomized function in
 * a crontab.
 * 
 * Randomized crontab functions can appear in one of these forms:
 * 
 * @(min-max) is the full expression
 * @ is an alias for @(min-max)
 * @(max) is an alias for @(min-max)
 * @/X is an alias for @(min-XE)/X (eg, it generates a randomized start 
 * position for the interval but always within less than interval so that an
 * interval is not missed.
 * 
 * max may append the character 'E' onto the end which indicates that the last
 * value should be excluded. min has a similar feature.
 * 
 * @param array $matches
 *   Matches from the regex. Two capture groups should be specified - the 
 *   first is the lower bound (min) and the second is the upper bound (max),
 *   optionally with an E to indicate the value excludes itself.
 * 
 * @return int
 *   A random integer between min and max.
 */
function regex_callback_crontab_rand($matches) {
  return rand($matches[1], $matches[2]);
}

/**
 * Regex callback to resolve the @/I pattern.
 * 
 * @param array $matches
 *   An array of matches.
 * 
 * @return string
 *   Replacement pattern
 */
function regex_callback_crontab_interval($matches) {
  return '@(' . ($matches[1] - 1) . ')/' . $matches[1];
}

/**
 * Handles some custom crontab characters based on Jenkins and UltimateCron.
 * 
 * Supports the following:
 * - '?' is an alias for '*'
 * - 'H' is an alias for '@'
 * - '@' indicates a hashed value as used by Jenkins. @ takes on a randomized
 *   value that depends on its context.
 * - '@(min, max)' indicates a hashed value between the min and max. min can be
 *   omitted, at which point it defaults to the minimum for the field.
 * - '@/I' is equivalent to '@(min, I - 1)/I', eg the hashed value cannot
 *   cause there to be less than floor(max / I) executions in the given 
 *   timeframe.
 * - Note that the +(offset) is not supported as UltimateCron specifies.
 *   The offset is normally used to offset an interval (eg * / 15 + @). This can
 *   be replaced with @/15. Many use cases should be satisfied with this.
 * 
 * @param string $type
 *   One of the  five types of crontab fields: minute, hour, day, month or weekday.
 * @param string $value
 *   The value of the crontab field.
 * 
 * @return string
 *   A crontab-compliant field value that has supported all the customizations
 *   as detailed above.
 */
function crontab_simplify($type, $value) {
  $mins = array('minute' => 0, 'hour' => 0, 'day' => 1, 'month' => 1, 'weekday' => 0);
  $maxes = array('minute' => 59, 'hour' => 23, 'day' => 28, 'month' => 12, 'weekday' => 6);
  $value = str_replace('?', '*', $value);
  $value = str_replace('H', '@', $value);
  if ($value === '@') {
    $value = '@('.$mins[$type].'-'.$maxes[$type].')';
  }
  $value = preg_replace_callback('`@/(\d{1,})`i', 'regex_callback_crontab_interval', $value);
  $value = preg_replace('`@([^\(])`i', '@(' . $mins[$type] . '-' . $maxes[$type] . ')$1', $value);
  $value = preg_replace('`@(\d{1,})`i', '@(' . $mins[$type] . '-$1)', $value);
  $value = preg_replace_callback('`@\((\d{1,})-(\d{1,}E{0,1})\)`i', 'regex_callback_crontab_rand', $value);
  return $value;
}

/**
 * Attempts to retrieve the current system's hostname.
 * 
 * Relies on the system hostname command.
 * 
 * @return string
 *   The hostname for the current system, or NULL if unable to determine.
 */
function get_hostname() {
  if (shell_command_available('hostname')) {
    $host = trim(execute_system_command('hostname'));
    if (!empty($host)) {
      return $host;
    }
  }
  return NULL;
}

/**
 * Recursively deletes an entire directory.
 * 
 * Includes security check to not delete the root directory.
 * 
 * @param string $directory
 *   Directory to recursively delete.
 * 
 * @return boolean
 *   TRUE if the directory was deleted successfully, otherwise FALSE.
 */
function remove_directory($directory) {
  if (extra_empty(trim($directory, '/\\'))) {
    return FALSE;
  }
  if (!is_dir($directory)) {
    return unlink($directory);
  }
  elseif (is_link($directory)) {
    return unlink($directory);
  }
  $h = opendir($directory);
  if (empty($h)) {
    return FALSE;
  }
  while(($file = readdir($h)) !== FALSE) {
    if ($file !== '.' && $file !== '..') {
      if (!remove_directory(assemble_path($directory, $file))) {
        return FALSE;
      }
    }
  }
  closedir($h);
  return rmdir($directory);
}

/**
 * Expands a path in ways that realpath() doesn't and without necessarily
 * ensuring the file exists.
 * 
 * Current supports:
 * - expansion of a starting tilde (~) to the current HOME directory if
 *   provided by the $_SERVER global.
 * 
 * @param string $path
 *   The path to expand.
 * 
 * @return string
 *   The expanded path.
 */
function expand_path($path) {
  if (strlen($path) > 0) {
    if (substr($path, 0, 1) == '~') {
      if (!empty($_SERVER['HOME'])) {
        $path = assemble_path($_SERVER['HOME'], substr($path, 1));
      }
    }
  }
  return $path;
}

/**
 * Copies all files in a directory.
 * 
 * @param string $origin
 *   The directory to copy.
 * @param string $destination
 *   The target directory to copy to.
 * @param boolean $recuse
 *   If TRUE, this function will recurse into all subdirectories.
 * 
 * @return boolean
 *   TRUE if successful, otherwise FALSE.
 */
function copy_all($origin, $destination, $recurse = TRUE) {
  if (!is_dir($origin)) {
    return FALSE;
  }
  $h = opendir($origin);
  if (empty($h)) {
    return FALSE;
  }
  $success = TRUE;
  while (($file = readdir($h)) !== FALSE) {
    if ($file !== '.' && $file !== '..') {
      $full = assemble_path($origin, $file);
      $dest = assemble_path($destination, $file);
      if ($recurse && is_dir($full)) {
        $success = copy_all($full, $dest) && $success;
      }
      else {
        $success = copy($full, $dest) && $success;
      }
    }
  }
  return $success;
}

/**
 * Attempts to determine the user's primary group (usually the one that
 * is the same as the username, but not necessarily that one).
 * 
 * Right now this returns the first group listed in getent group [username].
 * 
 * @param string $username
 *   The username to get the group of. If not provided, will attempt to lookup
 *   the current user using get_system_username().
 * 
 * @return string
 *   The primary group of the user or NULL if one could not be determined
 */
function get_system_primary_group($username = NULL) {
  if (empty($username)) {
    $username = get_system_username();
  }
  if (empty($username)) {
    return NULL;
  }
  if (shell_command_available('getent')) {
    $group = trim(execute_system_command('getent group !user', array(
      '!user' => $username,
    )));
    if (!empty($group)) {
      $pieces = explode(':', $group);
      return trim($pieces[0]);
    }
  }
  return NULL;
}

/**
 * Checks to see if a shell command is available. This includes both that the
 * command exists on the system and that the command can be executed by the
 * current user.
 * 
 * This relies on which (Linux) or where (Windows).
 * 
 * @staticvar array $checked_commands
 *   The array of already checked commands.
 * @staticvar string $environment
 *   L for linux, W for Windows.
 * 
 * @param string $command_name
 *   The command name to check.
 * 
 * @return boolean
 *   TRUE if the command can be run, otherwise FALSE.
 */
function shell_command_available($command_name) {
  static $checked_commands = array();
  static $environment = '';
  if (!isset($checked_commands[$command_name])) {
    $checked_commands[$command_name] = FALSE;
    if (empty($environment)) {
      $environment = substr(strtolower(PHP_OS), 0, 3) == 'win' ? 'W' : 'L';
    }
    $command = 'which !cmd';
    if ($environment == 'W') {
       $command = 'where !cmd';
    };
    $line = execute_system_command($command, array(
      '!cmd' => $command_name,
    ), $output, $exit);
    if (empty($exit)) {
      $checked_commands[$command_name] = is_executable($line);
    }
  }
  return $checked_commands[$command_name];
}

/**
 * Apply a chmod, chown and chgrp operation to a set of files. This is a helper
 * function specifically designed to make recursive applications easier since
 * the directories only need to be opened once.
 * 
 * Relies on chmod(), chown() and chgrp().
 * 
 * @param string $target
 *   A directory or file to apply the settings to.
 * @param string $owner
 *   The new owner of the file.
 * @param string $group
 *   The new group of the file.
 * @param string $access
 *   The new access modifier of the file (eg 0755). Note that if you are using
 *   a string to provide the value (eg "755") then you must use decoct() to
 *   convert it first.
 * @param boolean $recursive
 *   Set to TRUE if you want to operate recursively on all available 
 *   directories.
 * 
 * @return int
 *   The number of errors that occured during the process.
 */
function chmog($target, $owner, $group, $access, $recursive = FALSE) {
  static $chmog_processed = array();
  if (in_array($target, $chmog_processed)) {
    return TRUE;
  }
  $failures = 0;
  if (!chmod($target, $access)) {
    $failures++;
  }
  if (!chown($target, $owner)) {
    $failures++;
  }
  if (!chgrp($target, $group)) {
    $failures++;
  }
  if (is_dir($target) && $recursive) {
    $chmog_processed[] = $target;
    $h = opendir($target);
    if (!empty($h)) {
      while (($file = readdir($h)) !== FALSE) {
        if ($file != '.' && $file != '..') {
          $failures += chmog(assemble_path($target, $file), $owner, $group, $access, $recursive);
        }
      }
    }
    else {
      $failures++;
    }
  }
  return $failures;
}

/**
 * Assembles two or more path components into a single path.
 * 
 * @param string $path1
 *   First path component.
 * @param string $path2
 *   Second path component.
 * @param string ...
 *   Additional path components, as needed.
 * 
 * @return string
 *   The assembled path.
 */
function assemble_path($path1, $path2) {
  $path = '';
  $args = func_get_args();
  foreach ($args as $piece) {
    $path = rtrim($path, ' /\\') . DIRECTORY_SEPARATOR . trim($piece, ' /\\');
  }
  return trim($path);
}

/**
 * Registers a listener for execute_system_command(). This will call the
 * callback with a message every time execute_system_command() is called. 
 * 
 * @staticvar array $system_command_listeners
 *   Keeps track of all the callbacks.
 * 
 * @param callable $cb
 *   The callback. Should take one parameter for a message.
 * 
 * @return array
 *   An array of callback methods currently registered.
 */
function register_system_command_listener($cb = NULL) {
  static $system_command_listeners = array();
  if (!empty($cb)) {
    if (is_callable($cb)) {
      $system_command_listeners[] = $cb;
    }
  }
  return $system_command_listeners;
}

/**
 * Safely executes a system command using prepared argument like syntax.
 * 
 * Essentially $command can have many strings in the format !argname. These
 * then get passed to $args. Each will be escaped using escapeshellarg() before
 * they are executed (note that this adds quotes!!)
 * 
 * @param string $command
 *   The command to execute.
 * @param array $args
 *   An array of arguments to replace.
 * @param array $output
 *   Will be set to an array of the output lines.
 * @param int $returnCode
 *   Will be set to the exit code of the function.
 * 
 * @return string
 *   The last time returned by $command.
 */
function execute_system_command($command, array $args = array(), &$output = array(), &$returnCode = '') {
  $command = escapeshellcmd($command);
  $command = str_replace_all($command, $args, 'escapeshellarg');
  foreach (register_system_command_listener() as $listener) {
    call_user_func($listener, 'System command about to execute: `' . $command . '`');
  }
  $result = exec($command . '', $output, $returnCode);
  foreach (register_system_command_listener() as $listener) {
    call_user_func($listener, 'System command executed: `' . $command . '`');
  }
  return $result;
}
