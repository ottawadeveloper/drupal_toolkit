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