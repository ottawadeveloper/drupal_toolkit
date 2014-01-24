<?php
/**
 * @file Special commands that work with specific applications.
 */

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
