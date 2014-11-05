<?php
/**
 * @file Defines several useful functions that are specific to the DTK
 * package.
 */

function dtk_delegate_command_base($passOptions = array()) {
  global $args, $settings;
  $command = $settings->getConfig(CONFIG_DTK_LOCATION);
  if (extra_empty($command)) { $command = 'dtk'; }
  $passOptions[] = array(ARG_DEBUG, 'd');
  $passOptions[] = array(ARG_SILENT, 's');
  $passOptions[] = array(ARG_VERBOSE, 'v');
  $passOptions[] = ARG_SPYC_LOCATION;
  $passOptions[] = OPTION_SSH_DIRECT_OUTPUT;
  foreach ($passOptions as $option) {
    $long = $option;
    $short = NULL;
    if (is_array($option)) {
      $long = array_shift($option);
      $short = array_shift($option);
    }
    $value = $args->getOption($long, $short);
    if (is_bool($value)) {
      $value = $value ? '1' : '0';
    }
    $command .= ' --' . $long . '=' . escapeshellarg($value);
  }
  return $command;
}

function dtk_prompt_user($prompt) {
  $stream = fopen('php://stdin', 'rw');
  fputs($stream, $prompt);
  if (empty($stream)) {
    return FALSE;
  }
  $line = rtrim(fgets($stream));
  fclose($stream);
  return $line;
}

function dtk_debug_level($set = NULL) {
  $level = &state(__FUNCTION__, DEBUG_LEVEL_NORMAL);
  if ($set !== NULL) {
    $level = $set;
  }
  return $level;
}

/**
 * Shortcut function to display an info message.
 * 
 * @param string $string
 *   String to display.
 */
function dtk_info($string, $args = array()) {
  if (dtk_debug_level() < DEBUG_LEVEL_VERBOSE) {
    return;
  }
  global $out;
  $str = str_replace_all($string, $args);
  if ($out instanceof OutputManagerInterface) {
    $out->log($str, CLOG_INFO);
  }
  else {
    echo '[info] ' . $str . PHP_EOL;
  }
}

/**
 * Shortcut function to display a debug message.
 * 
 * @param string $string
 *   String to display.
 */
function dtk_debug($string, $args = array()) {
  if (dtk_debug_level() < DEBUG_LEVEL_DEBUG) {
    return;
  }
  global $out;
  $str = str_replace_all($string, $args);
  if ($out instanceof OutputManagerInterface) {
    $out->log($str, CLOG_DEBUG);
  }
  else {
    echo '[debug] ' . $str . PHP_EOL;
  }
}

/**
 * Sends mail.
 * 
 * @param array $data
 *   An array of mail data.
 */
function dtk_send_mail($data) {
  global $events;
  $mail = new Mail($data['to'], $data['subject'], $data['message']);
  if (!extra_empty($data['html'])) {
    $mail->markAsHtml();
  }
  if (!extra_empty($data['cc'])) {
    foreach ($data['cc'] as $cc) {
      $mail->carbonCopyTo($cc);
    }
  }
  if (!extra_empty($data['bcc'])) {
    foreach ($data['bcc'] as $bcc) {
      $mail->blindCarbonCopyTo($bcc);
    }
  }
  $event = new DtkMailEvent($mail);
  $events->fireEvent(EVENT_DTK_MAIL, $event);
  return $event->success();
}

/**
 * Function for maintaining some form of global state for low-level functions.
 * 
 * @param string $name
 *   Key to store/retrieve data with.
 * @param mixed $default
 *   Default value for $name.
 * @param boolean $reset
 *   Set to TRUE to reset values to defaults.
 * 
 * @return mixed
 *   The value of static $data[$name].
 */
function &state($name, $default = NULL, $reset = FALSE) {
  static $data = array(), $defaults = array();
  if ($reset) {
    if (empty($name)) {
      foreach ($default as $k => $v) {
        $data[$k] = $v;
      }
    }
    elseif (isset($data[$name])) {
      $data[$name] = $defaults[$name];
    }
  }
  if (isset($name)) {
    if (!isset($data[$name])) {
      $defaults[$name] = $default;
      $data[$name] = $defaults[$name];
    }
    return $data[$name];
  }
  return $data;
}

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
  if (empty($info['extension']) || empty($info['filename'])) {
    return FALSE;
  }
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