#!/usr/bin/php
<?php

/**
 * Defines the toolkit root.
 */
define('TOOLKIT_ABSOLUTE_ROOT', dirname(__FILE__));

include "lib/common.inc";

dtk_execute_command($args->getArg(0));
