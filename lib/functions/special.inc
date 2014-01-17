<?php
/**
 * @file Special commands that work with specific applications.
 */

/**
 * Executes a drush make.
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
 * Clones a git repository.
 * 
 * @param string $server
 *   The git server. This should be everything up until the repository name, 
 *   including any finishing slash or colon.
 * @param string $repository
 *   Repository name to clone.
 * @param string $targetFolder
 *   The path to clone the reposistory to. If omitted, will clone to whatever
 *   directory git would normally clone to (usually getcwd()/$repository).
 * @param string $branch
 *   A specific branch to clone. If omitted, will default to whatever git
 *   would normally clone (usually master).
 * 
 * @return boolean
 *   TRUE if the repo was cloned successfully, otherwise FALSE.
 */
function git_clone($server, $repository, $targetFolder = NULL, $branch = NULL) {
  $command = 'git clone ';
  if (!empty($branch)) {
    $command .= '-b !branch ';
  }
  $command .= '!repo';
  if (!empty($targetFolder)) {
    $command .= ' !folder';
  }
  execute_system_command($command, array(
    '!branch' => !empty($branch) ? $branch : '',
    '!repo' => $server . $repository,
    '!folder' => !empty($targetFolder) ? $targetFolder : '',
  ));
  if (empty($targetFolder)) {
    return is_dir($repository);
  }
  else {
    return is_dir($targetFolder);
  }
}
