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
  $result = exec($command, $output, $returnCode);
  foreach (register_system_command_listener() as $listener) {
    call_user_func($listener, 'System command executed: `' . $command . '`');
  }
  return $result;
}
