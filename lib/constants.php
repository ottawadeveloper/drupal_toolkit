<?php
/**
 * @file Defines useful core constants.
 */

/**
 * Current version of the toolkit.
 */
define('TOOLKIT_VERSION', '0.0.7');

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
 * Fired to send email.
 * 
 * @ingroup events
 */
define('EVENT_DTK_MAIL', 'dtk-mail');

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
 * Configuration setting for the location of directories containing
 * plugins.
 * 
 * @ingroup config
 */
define('CONFIG_PLUGIN_DIRECTORIES', 'plugins');

/**
 * String token for when a system command is missing.
 * 
 * @ingroup strings
 */
define('STRING_ROUTER_NO_COMMAND', 'router.error.missing-command');

/**
 * String token for when not enough arguments were provided.
 * 
 * @ingroup strings
 */
define('STRING_ROUTER_NO_ARGUMENT', 'router.error.missing-argument');

/**
 * String token for when a configuration setting is missing.
 * 
 * @ingroup strings
 */
define('STRING_ROUTER_NO_CONFIG', 'router.error.missing-config');

/**
 * String token for when a PHP function is missing.
 * 
 * @ingroup strings
 */
define('STRING_ROUTER_NO_FUNCTION', 'router.error.missing-function');

/**
 * String token for when a command is not implemented.
 * 
 * @ingroup strings
 */
define('STRING_ROUTER_NO_IMPLEMENTATION', 'router.error.command-not-implemented');

/**
 * Fired to find help instructions.
 * 
 * @ingroup events
 */
define('EVENT_FIND_HELP_INSTRUCTIONS', 'find-help-instructions');

/**
 * String token for when there are no help commands defined.
 * 
 * @ingroup strings
 */
define('STRING_ERROR_NO_HELP_COMMANDS', 'help.error.no-commands');

/**
 * Fired to allow other modules to alter help instructions.
 * 
 * @ingroup events
 */
define('EVENT_ALTER_HELP_INSTRUCTIONS', 'alter-help-instructions');

/**
 * An option for the help command that lets the user see extended
 * documentation for only one command.
 * 
 * @ingroup options
 */
define('OPTION_HELP_COMMAND', 'command');

/**
 * String token for documenting the core commands category.
 * 
 * @ingroup strings
 */
define('STRING_HELP_CORE_CATEGORY', 'string.category.core');

/**
 * String token for documenting the help command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_COMMAND_DESC_HELP', 'string.command-desc.help');

/**
 * String token for documenting the --command option for the help command.
 * 
 * @ingroup strings
 */
define('STRING_HELP_OPTION_HELP_COMMAND_DESC', 'string.option.command');

/**
 * String token for when an event is fired.
 * 
 * @ingroup strings
 */
define('STRING_EVENT_FIRING', 'events.message.firing');

/**
 * Denotes a critical error. Critical errors are ones that come from extreme
 * error conditions.
 * 
 * @ingroup log_levels
 */
define('CLOG_CRITICAL', 5);

/**
 * Denotes an error in the system.
 * 
 * @ingroup log_levels
 */
define('CLOG_ERROR', 10);

/**
 * Denotes an error that can be recovered from but may impact the results.
 * 
 * @ingroup log_levels
 */
define('CLOG_WARNING', 15);

/**
 * Denotes an error that can be recovered from and will not likely impact
 * the results.
 * 
 * @ingroup log_levels
 */
define('CLOG_NOTICE', 20);

/**
 * Denotes informational output.
 * 
 * @ingroup log_levels
 */
define('CLOG_INFO', 25);

/**
 * Denotes a debug log entry.
 * 
 * @ingroup log_levels
 */
define('CLOG_DEBUG', 30);

/**
 * Denotes a success message.
 * 
 * @ingroup message_type
 */
define('MESSAGE_SUCCESS', 's');

/**
 * Denotes a message notifying that the user is doing something.
 * 
 * @ingroup message_type
 */
define('MESSAGE_WORKING', 'w');

/**
 * Denotes a failure message.
 * 
 * @ingroup message_type
 */
define('MESSAGE_FAILURE', 'f');

/**
 * String token for a working message.
 * 
 * @ingroup strings
 */
define('STRING_MESSAGE_WORKING', 'types.message.working');

/**
 * String token for a success message.
 * 
 * @ingroup strings
 */
define('STRING_MESSAGE_SUCCESS', 'types.message.success');

/**
 * String token for a failure message.
 * 
 * @ingroup strings
 */
define('STRING_MESSAGE_FAILURE', 'types.message.failure');

/**
 * String token for a critical error.
 * 
 * @ingroup strings
 */
define('STRING_LOG_CRITICAL', 'types.log.critical');

/**
 * String token for an error.
 * 
 * @ingroup strings
 */
define('STRING_LOG_ERROR', 'types.log.error');

/**
 * String token for a warning.
 * 
 * @ingroup strings
 */
define('STRING_LOG_WARNING', 'types.log.warning');

/**
 * String token for a notice.
 * 
 * @ingroup strings
 */
define('STRING_LOG_NOTICE', 'types.log.notice');

/**
 * String token for information message.
 * 
 * @ingroup strings
 */
define('STRING_LOG_INFO', 'types.log.info');

/**
 * String token for debug message.
 * 
 * @ingroup strings
 */
define('STRING_LOG_DEBUG', 'types.log.debug');

/**
 * String token for when a plugin is missing configuration.
 * 
 * @ingroup strings
 */
define('STRING_PLUGIN_NO_CONFIG', 'plugin.error.missing-config');

/**
 * This config setting allows the user to specify an array of plugins
 * which should not be enabled. All plugins found will be enabled unless
 * listed in this config setting.
 * 
 * @ingroup config
 */
define('CONFIG_SKIP_PLUGINS', 'disabled-plugins');
