<?php

function drush_install_array_trim(&$ref, $dex) {
  $ref = trim($ref, " \r\n");
}