#!/usr/bin/php
<?php

// Define the toolkit root.
define('TOOLKIT_ABSOLUTE_ROOT', dirname(__FILE__));

// This include does all the setup work to get the toolkit up and running
include "lib/common.inc";

$constants = get_defined_constants(TRUE);

asort($constants['user']);

$existingFile = file('drupal_toolkit.example.yml');
$existingCheck = array();
foreach ($existingFile as $line) {
  $line = trim($line, " #\t");
  $pieces = explode(':', $line, 2);
  $existingCheck[$pieces[0]] = TRUE;
}

foreach ($constants['user'] as $c => $v) {
  if (substr($c, 0, 7) === 'CONFIG_') {
    $r = $sm->getString($v);
    if ($r === $v) {
      if (empty($existingCheck[$v])) {
        echo $v . ': "' . $c . '"' . PHP_EOL;
      }
    }
  }
}
