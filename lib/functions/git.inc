<?php
/**
 * @file Includes functions related to interacting with git.
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

/**
 * Checks to see if the given branch has already been created.
 * 
 * @param string $branchname
 *   The branch to check if it exists.
 * @param string $targetFolder
 *   The directory in which to execute the command. If left empty, will use the
 *   current working directory.
 * 
 * @return boolean
 *   TRUE if the branch exists, otherwise FALSE.
 */
function git_branch_exists($branchname, $targetFolder = NULL) {
  $current = NULL;
  if (!empty($targetFolder)) {
    $current = getcwd();
    if (!chdir($targetFolder)) {
      trigger_error('Unable to chdir to ' . $targetFolder);
      return FALSE;
    }
  }
  $command = 'git show-ref --verify --quiet refs/heads/!branch';
  $args = array(
    '!branch' => $branchname,
  );
  $exit = 1;
  execute_system_command($command, $args, $out, $exit);
  if (!empty($current)) {
    chdir($current);
  }
  return extra_empty($exit);
}

/**
 * Pulls all updates for a git repo.
 * 
 * @param string $targetFolder
 *   The location of the git repo to pull.
 * @param string $remoteName
 *   The name of the remote server to pull. If not specified, will act as
 *   if no parameter was passed.
 * @param string $branch
 *   The name of the branch to pull. Requires $remoteName to be specified.
 * 
 * @return boolean
 *   TRUE if successful, otherwise FALSE.
 */
function git_pull($targetFolder, $remoteName = NULL, $branch = NULL) {
  $current = getcwd();
  if (!chdir($targetFolder)) {
    trigger_error('Unable to chdir to ' . $targetFolder);
    return FALSE;
  }
  $command = 'git pull';
  $args = array();
  if (!empty($remoteName)) {
    $command .= ' !remote';
    $args['!remote'] = $remoteName;
    if (!empty($branch)) {
      $command .= ' !branch';
      $args['!branch'] = $branch;
    }
  }
  $exit = 1;
  execute_system_command($command, $args, $out, $exit);
  if (!empty($current)) {
    chdir($current);
  }
  return extra_empty($exit);
}
