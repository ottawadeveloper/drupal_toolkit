<?php

/**
 * Defines the toolkit root.
 */
define('TOOLKIT_ABSOLUTE_ROOT', dirname(__FILE__));

include "lib/common.inc";

$commandName = $args->getArg(0);

if (empty($commandName)) {
  $out->log('You must specify a subcommand to use this toolkit', CLOG_WARNING);
  $commandName = 'help';
}

$command = $router->findCommand($commandName);

if ($command instanceof RouterCommand) {
  $command->setArguments($args);
  $command->setConfiguration($settings);
  $command->setOutput($out);
  $command->setEventManager($events);
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
  $out->log('Could not find command ['.$commandName.']', CLOG_CRITICAL);
  exit(1);
}