#!/usr/bin/php
<?php

/**
 * Defines the toolkit root.
 */
define('TOOLKIT_ABSOLUTE_ROOT', dirname(__FILE__));

include "lib/common.inc";

$commandName = $args->getArg(0);

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
    exit(1);
  }
  elseif (!$command->verifyArguments()) {
    exit(1);
  }
  $events->fireEvent(EVENT_COMMAND_PRE_EXECUTION, $context);
  $command->executeCommand();
  $events->fireEvent(EVENT_COMMAND_POST_EXECUTION, $context);
}
else {
  $out->log($sm->getString(STRING_ERROR_NO_COMMAND, array(
    '!command' => $commandName,
  )), CLOG_CRITICAL);
  exit(1);
}
