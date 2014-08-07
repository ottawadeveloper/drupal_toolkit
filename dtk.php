#!/usr/bin/php
<?php

// Define the toolkit root.
define('TOOLKIT_ABSOLUTE_ROOT', dirname(__FILE__));

// This include does all the setup work to get the toolkit up and running
include "lib/common.inc";

// Finally, we execute the command.
dtk_execute_command($args->getArg(0));
