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
    $context = array(
      'args' => $args,
      'commandName' => $commandName,
      'commandObject' => $command,
    );
    $events->fireEvent(EVENT_COMMAND_PRE_REQUIREMENTS, $context);
    if (!$command->verifyRequirements()) {
      if ($exit) { exit(1); }
      else { return FALSE; }
    }
    elseif (!$command->verifyArguments()) {
      if ($exit) { exit(1); }
      else { return FALSE; }
    }
    $events->fireEvent(EVENT_COMMAND_PRE_EXECUTION, $context);
    $command->executeCommand();
    $events->fireEvent(EVENT_COMMAND_POST_EXECUTION, $context);
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