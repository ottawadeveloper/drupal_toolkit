<?php
/**
 * @file Special commands that work with specific applications.
 */

/**
 * Generates doxygen documentation for a directory.
 * 
 * @param string $directory
 *   The directory to generate documentation for.
 * @param string $doxygenFile
 *   The path to the doxygenFile. If not specified, fallsback as doxygen
 *   itself falls back (currently looks for a file named Doxyfile in 
 *   $directory, then uses the defaults).
 * 
 * @return boolean
 *   TRUE if successful, otherwise FALSE.
 */
function doxygen_generate($directory, $doxygenFile = NULL) {
  if (!chdir($directory)) {
    return FALSE;
  }
  $command = 'doxygen';
  if (!empty($doxygenFile)) {
    $command .= ' !filename';
  }
  execute_system_command($command, array(
    '!filename' => $doxygenFile
  ), $out, $exit);
  return extra_empty($exit);
}

/**
 * Generates PHPLOC data.
 * 
 * @param string $target
 *   The directory to generate phploc data for
 * @param array $options
 *   An array of additional options to pass to the phploc command.
 * @param string $output
 *   The result of the operation.
 * 
 * @return boolean
 *   TRUE on success, otherwise FALSE.
 */
function generate_phploc($target, $options = array(), &$output = NULL) {
  $command = 'phploc';
  $args = array(
    '!target' => $target,
  );
  foreach ($options as $long => $value) {
    $command .= ' --' . $long . '=!' . $long;
    $args['!' . $long] = $value;
  }
  $command .= ' !target';
  $exit = 0;
  execute_system_command($command, $args, $output, $exit);
  return extra_empty($exit);
}
