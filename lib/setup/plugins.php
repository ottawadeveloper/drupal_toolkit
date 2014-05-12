<?php
/**
 * @file Contains additional setup routines revolving around the plugin system.
 */

// Find all the disabled core plugins.
$disabled_plugins = $settings->getConfig(CONFIG_DISABLED_CORE_PLUGINS);
if (empty($disabled_plugins)) {
  $disabled_plugins = array();
}

/**
 * Configuration setting for the location of directories containing
 * plugins.
 * 
 * @ingroup config
 */
define('CONFIG_PLUGIN_DIRECTORIES', 'plugins');

// Register the core plugin directory first.
$settings->extendDefaultConfiguration(array(
  CONFIG_PLUGIN_DIRECTORIES => array(
    assemble_path(TOOLKIT_COMMON_DIR, 'plugins'),
  ),
));

// Locate all plug-in files.
$pluginFiles = array();
foreach ($settings->getConfig(CONFIG_PLUGIN_DIRECTORIES) as $pluginDirectory) {
  $pluginFiles = array_merge($pluginFiles, dtk_locate_plugin_files($pluginDirectory)); 
}
$pluginFiles = array_unique($pluginFiles);

// Build information on all plug-ins.
$pluginData = array();
foreach ($pluginFiles as $file) {
  $info = pathinfo($file);
  $pluginData[$info['filename']] = array(
    'path' => $file,
  ) + parse_ini_file($file);
}

// Build information on what order we should enable plugins.
// Plugins that depend on others should be enabled later.
$loadPlugins = array();
$changed = TRUE;
while ($changed) {
  $changed = FALSE;
  foreach ($pluginData as $key => $plugin) {
    if (!in_array($key, $loadPlugins)) {
      if (empty($plugin['dependencies'])) {
        $changed = TRUE;
        $loadPlugins[] = $key;
      }
      else {
        $dependenciesMet = TRUE;
        foreach ($plugin['dependencies'] as $dependency) {
          if (!in_array($dependency, $loadPlugins)) {
            $dependenciesMet = FALSE;
          }
        }
        if ($dependenciesMet) {
          $changed = TRUE;
          $loadPlugins[] = $key;
        }
      }
    }
  }
}

// Critical error when plugins are missing dependencies.
$missing = FALSE;
foreach ($pluginData as $key => $plugin) {
  if (!in_array($key, $loadPlugins)) {
    $missing = TRUE;
    $list = array();
    foreach ($plugin['dependencies'] as $dep) {
      if (!in_array($dep, $loadPlugins)) {
        $list[] = $dep;
      }
    }
    $out->log('Unable to load plugin [' . $key . '], missing plugins [' . implode(", ", $list) . ']', CLOG_CRITICAL);
  }
}

if ($missing) {
  exit(1);
}

// Load plugins
$plugins = array();
foreach ($loadPlugins as $key) {
  $out->log('Initializing plugin ['.$key.']', CLOG_DEBUG);
  $plugin = $pluginData[$key];
  $base = dirname($plugin['path']);
  if (!empty($plugin['files'])) {
    foreach ($plugin['files'] as $file) {
      $path = assemble_path($base, $file);
      require $path;
    }
  }
  require assemble_path($base, $plugin['plugin'] . '.class');
  $plugins[$key] = new $plugin['plugin']();
  DependencyManager::inject($plugins[$key]);
  $plugins[$key]->initialize();
}

$context = new DtkEvent(TRUE, array(
  'plugins' => $plugins,
));

// Notify everybody that the plugins are registered.
$events->fireEvent(EVENT_CORE_PLUGINS_REGISTERED, $context);

// Fire a specific event telling plugins to register their dependency 
// injection items
$events->fireEvent(EVENT_CORE_DEPENDENCY_INJECTION);

// We re-inject everything here to take into account any changes that the 
// plugins made.
DependencyManager::update();
