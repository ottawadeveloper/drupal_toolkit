<?php
/**
 * @file Contains additional setup for the Configuration item.
 */

/* 
 * Add all the relevant configuration files. Since config files can define more
 * config files, this process is a bit weird.
 */
$added = TRUE;
$processed = array();
while ($added) {
  $added = FALSE;
  $extra_config_files = $settings->getConfig(CONFIG_CONFIG_FILES);
  if (!empty($extra_config_files)) {
    foreach ($extra_config_files as $file) {
      if (!in_array($file, $processed)) {
        $settings->appendIniFile($file);
        $added = TRUE;
        $processed[] = $file;
      }
    }
  }
}

/**
 * Runtime configuration is added after all the main configuration.
 * 
 * Plugins can leverage the extendFromOption() method in their initialize()
 * method to extend options like this.
 */
foreach ($runtime_settings as $setting_name => $arg_info) {
  $long = isset($arg_info['long']) ? $arg_info['long'] : NULL;
  $short = isset($arg_info['short']) ? $arg_info['short'] : NULL;
  $split = isset($arg_info['split']) ? $arg_info['split'] : FALSE;
  $settings->extendFromOption($setting_name, $long, $short, $split);
}

// Additional configuration via YAML files
// YAML is a much more flexible means of important data.
$spycLocation = $settings->getConfig(CONFIG_SPYC_LOCATION);
if (is_readable($spycLocation)) {
  require_once $spycLocation;
  foreach ($settings->getConfig(CONFIG_YAML_FILES) as $yamlfile) {
    $settings->appendYamlFile($yamlfile);
  }
}
elseif (!extra_empty($settings->getConfig(CONFIG_YAML_FILES))) {
  echo 'Warning: Spyc parser not detected at ' . $spycLocation;
}
