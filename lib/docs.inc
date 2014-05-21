<?php
/**
 * @file This file exists solely to document groups and stuff.
 */

/**
 * 
 * @defgroup events Events
 * Various event keys that can be trapped.
 * @see EventManagerInterface
 * 
 * @defgroup config Configuration Settings
 * Various configuration settings that can be modified.
 * @see ConfigurationManagerInterface
 * 
 * @defgroup args Arguments
 * Various arguments that can be modified
 * @see ArgsInterface
 * 
 * @defgroup plugins Plugins
 * Plugins extend the functionality of the system in different ways.
 * 
 * @defgroup commands Commands
 * Commands provide additional options for the system.
 * 
 * @defgroup debug_levels Debug Levels
 * Different debug levels that are available to output handlers.
 * 
 * @defgroup log_levels Log Levels
 * Different levels of log messages.
 * 
 * @defgroup message_types Message Types
 * Different message types.
 * 
 * @defgroup strings String Placeholders
 * These placeholders are used to get strings from the translation matrix.
 * @see StringManagerInterface
 * @see TranslationPlugin
 * 
 * @defgroup event_objects "Event Objects"
 * These objects are used as context objects when events are fired.
 * 
 * @defgroup di_interfaces "Dependency Object Interfaces"
 * These interfaces are used to interact with objects that can be injected
 * via dependency injection.
 * 
 * @defgroup di_dependency_interfaces "Dependent Object Interfaces"
 * These interfaces can be used by objects to declare their dependencies
 * on certain @ref di_dependency_interfaces "Dependency Object Interfaces".
 */