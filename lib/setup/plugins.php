<?php
/**
 * @file Contains additional setup routines revolving around the plugin system.
 */

// Locate all plug-in files.
$pluginFiles = array();
foreach ($settings->getConfig(CONFIG_PLUGIN_DIRECTORIES) as $pluginDirectory) {
  $pluginFiles = array_merge($pluginFiles, dtk_locate_plugin_files($pluginDirectory)); 
}
$pluginFiles = array_unique($pluginFiles);

// List of plugins to ignore.
$skip = $settings->getConfig(CONFIG_SKIP_PLUGINS);
if (empty($skip)) { $skip = array(); }

// Build information on all plug-ins.
$pluginData = array();
foreach ($pluginFiles as $file) {
  $info = pathinfo($file);
  // Skip registering the plugin if it is disabled.
  if (!in_array($info['filename'], $skip)) {
    $pluginData[$info['filename']] = array(
      'path' => $file,
    ) + parse_ini_file($file) + array(
      'priority' => 0,
      'files' => array(),
      'dependencies' => array(),
    );
  }
  // Constants are included here so that they are available
  // even if the plug-in is disabled.
  $constants = assemble_path(dirname($file), 'constants.php');
  if (file_exists($constants)) {
    require $constants;
  }
}

// Sort plugins by priority to let the terminal go first.
uasort($pluginData, '_dtk_sort_plugins');

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
}

// Initialize plugins
foreach ($plugins as $plugin) {
  DependencyManager::inject($plugin);
  $plugin->initialize();
}

// Notify everybody that the plugins are registered.
$context = new DtkEvent(TRUE, array(
  'plugins' => $plugins,
));
$events->fireEvent(EVENT_CORE_PLUGINS_REGISTERED, $context);

// Fire a specific event telling plugins to register their dependency 
// injection items
$events->fireEvent(EVENT_CORE_DEPENDENCY_INJECTION);

// We re-inject everything here to take into account any changes that the 
// plugins made.
DependencyManager::update();
