<?php
/**
 * @file Defines several useful functions that are specific to the DTK
 * package.
 */

/**
 * Executes a command for the Drupal Toolkit.
 * 
 * @param string $commandName
 *   The command to execute.
 * @param boolean $exit
 *   If set to TRUE, will exit() the script on failure.
 * 
 * @return boolean
 *   TRUE if successful, otherwise FALSE.
 */
function dtk_execute_command($commandName, $exit = TRUE) {
  global $out, $sm, $router, $events, $args;
  if (empty($commandName)) {
    $out->log($sm->getString(STRING_CORE_MISSING_SUBCOMMAND), CLOG_WARNING);
    $commandName = 'help';
  }
  $command = $router->findCommand($commandName);
  if ($command instanceof RouterCommand) {
    $event = new DtkEvent(TRUE, array(
      'args' => $args,
      'commandName' => $commandName,
      'commandObject' => $command,
    ));
    $events->fireEvent(EVENT_COMMAND_PRE_REQUIREMENTS, $event);
    if (!$command->verifyRequirements()) {
      if ($exit) { exit(1); }
      else { return FALSE; }
    }
    elseif (!$command->verifyArguments()) {
      if ($exit) { exit(1); }
      else { return FALSE; }
    }
    $events->fireEvent(EVENT_COMMAND_PRE_EXECUTION, $event);
    $command->executeCommand();
    $events->fireEvent(EVENT_COMMAND_POST_EXECUTION, $event);
  }
  else {
    $out->log($sm->getString(STRING_ERROR_NO_COMMAND, array(
      '!command' => $commandName,
    )), CLOG_CRITICAL);
    if ($exit) { exit(1); }
    else { return FALSE; }
  }
  return TRUE;
}

/**
 * Generals a build ID for DTK.
 * 
 * @return string
 *   A build ID.
 */
function dtk_generate_build_id() {
  return date('Ymd-His');
}

/**
 * Locates all plugin files within a given directory.
 * 
 * @param string $directory
 *   A directory to check.
 * 
 * @return array
 *   An array of plugin files.
 */
function dtk_locate_plugin_files($directory) {
  return find_files('_dtk_is_plugin_file', $directory);
}

/**
 * Callback for find_files() to determine if a file is a plugin file.
 * 
 * @param string $filename
 *   The full name of a file.
 * 
 * @return boolean
 *   TRUE if it is a plugin file, otherwise FALSE.
 */
function _dtk_is_plugin_file($filename) {
  $info = pathinfo($filename);
  return ($info['extension'] === 'plugin') &&
      $info['filename'] === basename(dirname($filename));
}

/**
 * Callback to sort plugins in order of priority.
 * 
 * @param array $a
 *   Plugin entry A.
 * @param array $b
 *   Plugin entry B.
 * 
 * @return int
 */
function _dtk_sort_plugins($a, $b) {
  return $b['priority'] - $a['priority'];
}

/**
 * Retrieves the value of a constant with a better error message if
 * it is not designed. Should be used by plugins that depend on other
 * plugins which may not be present (eg non-core plugins).
 * 
 * @param string $name
 *   The name of the constant, as a string.
 * 
 * @return mixed
 *   The value of the constant or $name if not present.
 */
function dtk_constant($name) {
  global $out;
  if (defined($name)) {
    return constant($name);
  }
  $out->log('Constant ['.$name.'] not declared', CLOG_NOTICE);
  return $name;
}