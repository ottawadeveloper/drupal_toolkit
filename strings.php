#!/usr/bin/php
<?php

// Define the toolkit root.
define('TOOLKIT_ABSOLUTE_ROOT', dirname(__FILE__));

// This include does all the setup work to get the toolkit up and running
include "lib/common.inc";

$constants = get_defined_constants(TRUE);

asort($constants['user']);

foreach ($constants['user'] as $c => $v) {
  if (substr($c, 0, 7) === 'STRING_') {
    echo $v . ' = "' . $c . '"' . PHP_EOL;
  }
}
