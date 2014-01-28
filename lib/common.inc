<?php
/**
 * @file Contains the main settings for the toolkit. Generally only settings
 * and conditional settings are stored in this file - the main work of
 * setting up the subsystems is done in setup.php
 */

/**
 * Current version of the toolkit.
 */
define('TOOLKIT_VERSION', '0.0.3');

/**
 * Location of the common directory.
 */
define("TOOLKIT_COMMON_DIR", dirname(__FILE__));

/**
 * Indicates that the debug level has been set to silent.
 * 
 * @ingroup debug_levels
 */
define('DEBUG_LEVEL_SILENT', -5);

/**
 * Indicates that the debug level has been set to normal.
 * 
 * @ingroup debug_levels
 */
define('DEBUG_LEVEL_NORMAL', 0);

/**
 * Indicates that the debug level has been set to verbose.
 * 
 * @ingroup debug_levels
 */
define('DEBUG_LEVEL_VERBOSE', 5);

/**
 * Indicates that the debug level has been set to debug.
 * 
 * @ingroup debug_levels
 */
define('DEBUG_LEVEL_DEBUG', 10);

/**
 * Defines the default character to split arguments with.
 */
define('DEFAULT_SPLIT_CHARACTER', ',');

/**
 * Fired when plugins should register their output handlers with the
 * output manager.
 * 
 * Context arguments:
 * - \c debugLevel: The current debug level. See @ref debug_levels "Debug levels".
 * - \c output: The OutputManagerInterface object currently registered.
 * 
 * @ingroup events
 */
define('EVENT_CORE_REGISTER_OUTPUTS', 'core-register-outputs');

/**
 * Fired when plugins should register their commands with the router.
 * 
 * @ingroup events
 */
define('EVENT_CORE_REGISTER_COMMANDS', 'core-register-commands');

/**
 * Fired when setup is done.
 * 
 * @ingroup events
 */
define('EVENT_CORE_SETUP_COMPLETE', 'core-setup-done');

/**
 * Fired when plugins should register their dependency injection settings.
 * 
 * @ingroup events
 */
define('EVENT_CORE_DEPENDENCY_INJECTION', 'core-dependency-injection');

/**
 * Fired when all plugins have been registered.
 * 
 * @ingroup events
 */
define('EVENT_CORE_PLUGINS_REGISTERED', 'core-plugins-registered');

/**
 * Config setting for the list of files to include for plugins.
 * 
 * @ingroup config
 */
define('CONFIG_PLUGIN_INCLUDES', 'plugin-includes');

/**
 * Config setting for the list of plugin class names to instantiate.
 * 
 * @ingroup config
 */
define('CONFIG_PLUGIN_REGISTRY', 'plugin-registry');

/**
 * Config setting for the list of plugin names to disable from the core
 * list.
 * 
 * @ingroup config
 */
define('CONFIG_DISABLED_CORE_PLUGINS', 'core-disabled-plugins');

/**
 * Config setting to enable debug mode.
 * 
 * @ingroup config
 */
define('CONFIG_DEBUG', 'debug');

/**
 * Config setting to enable verbose mode.
 * 
 * @ingroup config
 */
define('CONFIG_VERBOSE', 'verbose');

/**
 * Config setting to enable silent mode.
 * 
 * @ingroup config
 */
define('CONFIG_SILENT', 'silent');

/**
 * Config setting to specify other config files (ini format).
 * 
 * @ingroup config
 */
define('CONFIG_CONFIG_FILES', 'config-files');

/**
 * Config setting to specify other config files (yaml format)
 * 
 * @ingroup config
 */
define('CONFIG_YAML_FILES', 'yaml-files');


/**
 * Config setting to specify where Spyc is installed to.
 * 
 * @ingroup config
 */
define('CONFIG_SPYC_LOCATION', 'spyc-location');

/**
 * Argument to override CONFIG_DEFAULT.
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_DEBUG', 'debug');

/**
 * Argument to override CONFIG_VERBOSE
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_VERBOSE', 'verbose');

/**
 * Short argument to override CONFIG_VERBOSE.
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_VERBOSE_SHORT', 'v');

/**
 * Argument to override CONFIG_SILENT.
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_SILENT', 'silent');

/**
 * Argument to add files to CONFIG_CONFIG_FILES.
 * 
 * Files should be separated by commas.
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_CONFIG_FILES', 'extra-config');

/**
 * Argument to override CONFIG_SPYC_LOCATION.
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_SPYC_LOCATION', 'spyc-location');

/**
 * Argument to add files to CONFIG_YAML_FILES.
 * 
 * @see @ref config "Configuration settings"
 * @ingroup args
 */
define('ARG_YAML_FILES', 'extra-yaml');

/**
 * Fired before the requirements of a command are checked.
 * 
 * @ingroup events
 */
define('EVENT_COMMAND_PRE_REQUIREMENTS', 'command-prereqs');

/**
 * Fired before the command is executed.
 * 
 * @ingroup events
 */
define('EVENT_COMMAND_PRE_EXECUTION', 'command-preexecute');

/**
 * Fired after the command is executed.
 * 
 * @ingroup events
 */
define('EVENT_COMMAND_POST_EXECUTION', 'command-postexecute');

/**
 * Fired when a string is needed.
 * 
 * @ingroup events
 */
define('EVENT_GET_STRING', 'get-string');

/**
 * String token for when the toolkit is initialized.
 * 
 * @ingroup strings
 */
define('STRING_CORE_INITIALIZED', 'core.message.initialized');

/**
 * String token for when the toolkit is not provided with a suitable command.
 * 
 * @ingroup strings
 */
define('STRING_CORE_MISSING_SUBCOMMAND', 'core.error.missing-subcommand');

/**
 * String token for when there is no command found to match the command.
 * 
 * Replacement strings:
 * - \c !command: The name of the command as supplied by the user.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_NO_COMMAND', 'core.error.no-command-found');


/**
 * A list of files, relative to TOOLKIT_COMMON_DIR, that must be
 * included for everything to work properly.
 */
$files = array(
  'functions.inc',
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
  'classes/commands/HelpCommand.class',
);

/**
 * Default settings that will be available via the Configuration object.
 * 
 * $key => $value syntax.
 */
$default_settings = array(
  CONFIG_PLUGIN_INCLUDES => array(),
  CONFIG_PLUGIN_REGISTRY => array(),
  CONFIG_DISABLED_CORE_PLUGINS => array(),
  CONFIG_DEBUG => FALSE,
  CONFIG_VERBOSE => FALSE,
  CONFIG_SILENT => FALSE,
  CONFIG_CONFIG_FILES => array(),
  CONFIG_YAML_FILES => array(),
  CONFIG_SPYC_LOCATION => '/usr/lib/php/spyc/Spyc.php',
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

/**
 * These are core plugins that will be loaded unless specifically disabled.
 * 
 * Core plugins are stored in 
 * 
 * plugins/$key/$value.class
 */
$core_plugins = array(
  'translation' => 'TranslationPlugin',
  'terminal' => 'TerminalPlugin',
  'flog' => 'FileLogPlugin',
  'drupal-site' => 'DrupalSitePlugin',
  'drupal-site-build' => 'DrupalSiteBuildPlugin',
  'drupal-site-install' => 'DrupalSiteInstallPlugin',
  'drupal-site-delete' => 'DrupalSiteDeletePlugin',
  'drupal-site-exists' => 'DrupalSiteExistsPlugin',
  'drupal-site-update' => 'DrupalSiteUpdatePlugin',
  'standard-config' => 'DrupalSiteStandardConfigPlugin',
  'standard-build' => 'DrupalSiteStandardBuildPlugin',
  'standard-structure' => 'DrupalSiteStandardStructurePlugin',
  'standard-site' => 'DrupalSiteStandardSitePlugin',
  'standard-server-struct' => 'DrupalSiteStandardServerStructurePlugin',
  'server-interaction' => 'ServerInteractionPlugin',
  'http-config' => 'HttpConfigurationPlugin',
  'hosts-config' => 'HostsConfigurationPlugin',
  'gateway-config' => 'GatewayConfigurationPlugin',
  'db-config' => 'DatabaseConfigurationPlugin',
  'drush-config' => 'DrushConfigurationPlugin',
  'permissions' => 'PermissionsPlugin',
  'drush-install' => 'DrushInstallPlugin',
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
