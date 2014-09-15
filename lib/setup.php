<?php
/**
 * @file This contains the basic setup of all the relevant objects. 
 * Additional setup is done in some include files.
 */

// Include all the required files.
foreach ($files as $file) {
  require TOOLKIT_COMMON_DIR . DIRECTORY_SEPARATOR . $file;
}

// Initialize the arguments
array_shift($argv);
$args = new Args($argv);
DependencyManager::inject($args);
DependencyManager::register('ArgsDependency', 'setArgs', 'args', 'ArgsInterface');
DependencyManager::setObject('args', $args);

// Initialize the configuration
$settings = new Configuration($default_settings);
DependencyManager::inject($settings);
DependencyManager::register('ConfigurationDependency', 'setConfiguration', 'config', 'ConfigurationManagerInterface');
DependencyManager::setObject('config', $settings);

// Additional configuration work
include "setup/config.php";

// Figure out the debug level
$debugLevel = DEBUG_LEVEL_NORMAL;
if (!extra_empty($settings->getConfig(CONFIG_SILENT))) {
  $debugLevel = DEBUG_LEVEL_SILENT;
}
if (!extra_empty($settings->getConfig(CONFIG_VERBOSE))) {
  $debugLevel = DEBUG_LEVEL_VERBOSE;
}
if (!extra_empty($settings->getConfig(CONFIG_DEBUG))) {
  $debugLevel = DEBUG_LEVEL_DEBUG;
}

// Check if we should be outputting direct system commands.
if (!extra_empty($args->getOption(OPTION_SSH_DIRECT_OUTPUT))) {
  ssh_direct_system_commands(TRUE);
}

// Initialize the output object.
$out = new OutputManager($debugLevel >= DEBUG_LEVEL_VERBOSE);
DependencyManager::inject($out);
DependencyManager::register('OutputDependency', 'setOutput', 'output', 'OutputManagerInterface');
DependencyManager::setObject('output', $out);

// Initialize the router object.
$router = new Router();
DependencyManager::inject($router);
DependencyManager::register('RouterDependency', 'setRouter', 'router', 'RouterInterface');
DependencyManager::setObject('router', $router);

// Initialize the event manager object.
$events = new EventManager();
DependencyManager::inject($events);
DependencyManager::register('EventDependency', 'setEventManager', 'events', 'EventManagerInterface');
DependencyManager::setObject('events', $events);

// Initialize the string manager object.
$sm = new StringManager();
DependencyManager::inject($sm);
DependencyManager::register('StringDependency', 'setStringManager', 'sm', 'StringManagerInterface');
DependencyManager::setObject('sm', $sm);

// Will hold the array of plugins
$plugins = array();

// Verifies and initializes all plugins
include "setup/plugins.php";

// Notify everyone so that output listeners can be added now.
$context = new DtkEvent(TRUE, array(
  'debugLevel' => $debugLevel,
  'output' => $out,
));
$events->fireEvent(EVENT_CORE_REGISTER_OUTPUTS, $context);

// This helps us debug system commands better.
register_system_command_listener(array($out, 'debug'));

// Default command must be available.
$router->addCommand('help', new HelpCommand());

// Allow plugins to register their own commands.
$events->fireEvent(EVENT_CORE_REGISTER_COMMANDS);

// Tell everybody we're done setup.
$events->fireEvent(EVENT_CORE_SETUP_COMPLETE);
