<?php
/**
 * @file Contains the main settings for the toolkit. Generally only settings
 * and conditional settings are stored in this file - the main work of
 * setting up the subsystems is done in setup.php
 */

// Include all the constants from our core file.
include "constants.php";

// A list of files, relative to TOOLKIT_COMMON_DIR, that must be
// included for everything to work properly.
$files = array(
  'functions.inc',
  'classes/events/DtkEvent.class',
  'classes/dm/DependencyManagerInterface.iface',
  'classes/dm/DependencyInjector.class',
  'classes/dm/DependencyManager.class',
  'classes/dm/DependencyManagerDependency.iface',
  'classes/args/ArgsInterface.iface',
  'classes/args/Args.class',
  'classes/args/ArgsDependency.iface',
  'classes/config/ConfigurationManagerInterface.iface',
  'classes/config/Configuration.class',
  'classes/config/ConfigurationDependency.iface',
  'classes/string/StringEvent.class',
  'classes/string/StringManagerInterface.iface',
  'classes/string/StringDependency.iface',
  'classes/output/OutputHandler.iface',
  'classes/output/Writer.iface',
  'classes/output/Logger.iface',
  'classes/output/Messenger.iface',
  'classes/output/OutputManagerInterface.iface',
  'classes/output/OutputDependency.iface',
  'classes/output/OutputManager.class',
  'classes/events/EventManagerInterface.iface',
  'classes/events/EventListener.iface',
  'classes/events/EventManager.class',
  'classes/events/EventDependency.iface',
  'classes/string/StringManager.class',
  'classes/router/RouterInterface.iface',
  'classes/router/RouterDependency.iface',
  'classes/router/RouterCommand.iface',
  'classes/router/Router.class',
  'classes/plugins/PluginInterface.iface',
  'classes/plugins/GenericPlugin.class',
  'classes/commands/GenericCommand.class',
  'classes/commands/HelpInstructions.class',
  'classes/commands/HelpInstructionsEvent.class',
  'classes/commands/HelpCommand.class',
  'classes/mail/Mail.class',
  'classes/mail/DtkMailEvent.class',
);

/**
 * Default settings that will be available via the Configuration object.
 * 
 * $key => $value syntax.
 */
$default_settings = array(
  CONFIG_PLUGIN_DIRECTORIES => array(
    TOOLKIT_COMMON_DIR . '/plugins',
    '/usr/lib/php/dtk_plugins',
  ),
  CONFIG_SKIP_PLUGINS => array(),
  CONFIG_DEBUG => FALSE,
  CONFIG_VERBOSE => FALSE,
  CONFIG_SILENT => FALSE,
  CONFIG_CONFIG_FILES => array(),
  CONFIG_YAML_FILES => array(),
  CONFIG_SPYC_LOCATION => '/usr/lib/php/spyc/Spyc.php',
  CONFIG_GZIP_SUPPORT => FALSE,
);

/**
 * Allows some runtime options to be loaded into the configuration object.
 * 
 * The key is the configuration key that the setting will be available under.
 * The value is an array of runtime information:
 * - long: The long name of the option (eg --[long]=VALUE). If set to TRUE, 
 *   will default to the name of the config setting.
 * - short: The short name of the option (eg -sVALUE). If set to TRUE, 
 *   will default to the first letter of the long option (failure to provide
 *   a valid long option will prevent the short value from being used).
 * - split: Indicates that the value should be treated as an array and exploded
 *   based on the provided character. Setting to TRUE will use a comma as the
 *   default character.
 */
$runtime_settings = array(
  CONFIG_DEBUG => array('long' => ARG_DEBUG),
  CONFIG_VERBOSE => array('short' => ARG_VERBOSE_SHORT, 'long' => ARG_VERBOSE),
  CONFIG_SILENT => array('long' => ARG_SILENT),
  CONFIG_CONFIG_FILES => array('long' => ARG_CONFIG_FILES, 'split' => TRUE),
  CONFIG_SPYC_LOCATION => array('long' => ARG_SPYC_LOCATION),
  CONFIG_YAML_FILES => array('long' => ARG_YAML_FILES),
);

/*
 * If there is a HOME directory available, we can use the user's configuration
 * file.
 */
if (!empty($_SERVER['HOME'])) {
  $default_settings[CONFIG_CONFIG_FILES][] = $_SERVER['HOME'] . '/.drupal_toolkit.cfg';
  $default_settings[CONFIG_YAML_FILES][] = $_SERVER['HOME'] . '/.drupal_toolkit.yml';
}

/*
 * If we're on a Linux environment, we can use the system configuration file
 * as well.
 * 
 */
if (is_dir('/etc')) {
  $default_settings[CONFIG_CONFIG_FILES][] = '/etc/drupal_toolkit.cfg';
  $default_settings[CONFIG_YAML_FILES][] = '/etc/drupal_toolkit.yml';
}

// Just to keep this file clean, setup is moved to another file.
include "setup.php";

// We're done.
$out->message($sm->getString(STRING_CORE_INITIALIZED), MESSAGE_SUCCESS);
