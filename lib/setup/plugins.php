<?php
/**
 * @file Contains additional setup routines revolving around the plugin system.
 */

// Find all the disabled core plugins.
$disabled_plugins = $settings->getConfig(CONFIG_DISABLED_CORE_PLUGINS);
if (empty($disabled_plugins)) {
  $disabled_plugins = array();
}

// Identify all the core plugins.
$core_plugin_root = assemble_path(TOOLKIT_COMMON_DIR, 'plugins');
$core_plugin_list = array();
$core_plugin_includes = array();
foreach ($core_plugins as $core_plugin => $plugin_class) {
  if (!in_array($core_plugin, $disabled_plugins)) {
    $core_plugin_list[] = $plugin_class;
    $core_plugin_includes[] = assemble_path($core_plugin_root, $core_plugin, $plugin_class . '.class');
  }
}

// Load the core plugins in at the beginning of the default configuration.
// This helps the dependency system be more efficient-like, since its more
// likely the core plugins will be required.
$settings->extendDefaultConfiguration(array(
  CONFIG_PLUGIN_INCLUDES => $core_plugin_includes,
  CONFIG_PLUGIN_REGISTRY => $core_plugin_list,
));

// Include all the required include files first.
$pluginIncludes = $settings->getConfig(CONFIG_PLUGIN_INCLUDES);
foreach ($pluginIncludes as $include) {
  require $include;
}

// Loop through all the plugin classes we located and do some setup on them.
$pluginKeys = $settings->getConfig(CONFIG_PLUGIN_REGISTRY);
$pluginStubs = array();
foreach ($pluginKeys as $plugin) {
  $ifaces = class_implements($plugin);
  // Only let in plugin objects.
  if (in_array('PluginInterface', $ifaces)) {
    $obj = new $plugin();
    // Initial injection
    DependencyManager::inject($obj);
    // Verify the extra requirements first, so we can ignore
    // objects that don't meet their dependencies.
    if ($obj->checkExtraRequirements()) {
      $pluginStubs[$plugin] = $obj;
    }
  }
}

// This section sorts the plugins by dependencies.
// Any plugin not having all its dependencies present will be removed from
// the list.
$changed = !empty($pluginStubs);
$addedPluginClasses = array();
while ($changed) {
  $changed = FALSE;
  foreach ($pluginStubs as $key => $stub) {
    $requirements = $stub->requiredPlugins();
    $valid = TRUE;
    foreach ($requirements as $requirement) {
      if (!in_array($requirement, $addedPluginClasses)) {
        $valid = FALSE;
        break;
      }
    }
    if ($valid) {
      $out->log('Initializing plugin ['.$key.']', CLOG_DEBUG);
      $stub->initialize();
      $plugins[$key] = $stub;
      $addedPluginClasses[] = $key;
      unset($pluginStubs[$key]);
      $changed = TRUE;
    }
  }
}

if (!empty($pluginStubs)) {
  foreach ($pluginStubs as $key => $stub) {
    $requirements = $stub->requiredPlugins();
    foreach ($requirements as $requirement) {
      if (!in_array($requirement, $addedPluginClasses)) {
        $out->log('Unable to load plugin [' . $key . '], missing plugin [' . $requirement . ']', CLOG_ERROR);
      }
    }
  }
  die();
}

$context = (object) array(
  'plugins' => $plugins,
);

// Notify everybody that the plugins are registered.
$events->fireEvent(EVENT_CORE_PLUGINS_REGISTERED, $context);

// Fire a specific event telling plugins to register their dependency 
// injection items
$events->fireEvent(EVENT_CORE_DEPENDENCY_INJECTION);

// We re-inject everything here to take into account any changes that the 
// plugins made.
DependencyManager::update();
