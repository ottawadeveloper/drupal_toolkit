<?php
/**
 * @file Useful functions that are commonly used in this toolkit
 */

/**
 * Checks to make sure a PHP function is available and not disabled.
 * 
 * @param string $function_name
 *   The name of a function.
 * 
 * @return boolean
 *   TRUE if the function exists and is not disabled, otherwise FALSE.
 */
function php_function_available($function_name) {
  if (!function_exists($function_name)) {
    return FALSE;
  }
  $disabled = explode(',', ini_get('disable_functions'));
  if (in_array($function_name, $disabled)) {
    return FALSE;
  }
  return TRUE;
}

/**
 * Replaces all instances of the keys in $replacements with the values in $str,
 * optionally escaping them through a provided function.
 * 
 * @param string $str
 *   The string to operate on.
 * @param array $replacements
 *   An array of replacements where the keys are the strings to search for in
 *   $str and the values are those to replace them with.
 * @param callable $escape_cb
 *   If set, each value will be run through this function during the escape 
 *   proces.
 * 
 * @return string
 *   The string with all the replacements.
 */
function str_replace_all($str, $replacements, $escape_cb = NULL) {
  if (!is_callable($escape_cb)) {
    $escape_cb = NULL;
  }
  foreach ($replacements as $k => $v) {
    if (substr($k, 0, 1) == '%') {
      $str = str_replace($k, $v, $str);
    }
    elseif (!empty($escape_cb)) {
      $str = str_replace($k, call_user_func($escape_cb, $v), $str);
    }
    else {
      $str = str_replace($k, $v, $str);
    }
  }
  return $str;
}

/**
 * Extended empty() check that doesn't require a variable. Also trims the
 * extra value and, by default, reports the string value "0" as empty.
 * 
 * @param mixed $val
 *   The variable to check if tis empty.
 * @param boolean $no_zero_string
 *   If TRUE, the string "0" will be considered "empty", otherwise it won't be.
 * 
 * @return boolean
 *   TRUE if the string is empty, otherwise FALSE.
 */
function extra_empty($val, $no_zero_string = TRUE) {
  if (is_string($val)) {
    $val = trim($val);
  }
  if (empty($val)) {
    return TRUE;
  }
  if ($no_zero_string && $val === "0") {
    return TRUE;
  }
  if (is_array($val)) {
    foreach ($val as $key => $value) {
      if (!extra_empty($value)) {
        return FALSE;
      }
    }
    return TRUE;
  }
  return FALSE;
}

/**
 * Extends an array. This works like the jQuery.extend function.
 * 
 * For each key in $extension, one of the following happens:
 * - If the key is numeric, the value is appended onto $base with a new numeric
 *   key.
 * - If $base does not have the key, $base[key] is set to the value.
 * - If $base[key] and the value are both scalar, then $base[key] is set to
 *   the value.
 * - If $base[key] is an array and the value is scalar, then the value is
 *   appended to $base[key] with a new numeric key.
 * - If $base[key] not an array and the value is, then $base[key] is turned into
 *   an array (and continue with the next instruction).
 * - If both of them are arrays, then this function is called recursively with
 *   $base[key] and value as the two arguments.
 * 
 * This is essentially like mixing the behaviour of array_replace() (for scalar
 * values) and array_merge() (for arrays).
 * 
 * Note that this function operates in place on $base (much like sort()). It
 * has no return value.
 * 
 * @param array $base
 *   The base array to extend with $extension.
 * @param array $extension
 *   The array to add on top of $base.
 */
function array_extend(array &$base, array $extension) {
  foreach ($extension as $k => $v) {
    // Incoming key is numeric, append the value.
    if (is_int($k)) {
      $base[] = $v;
      continue;
    }
    // Original key is not set
    if (!isset($base[$k])) {
      $base[$k] = $v;
      continue;
    }
    // Original key is set, not an array
    if (!is_array($base[$k])) {
      // Incoming value is an array, assume older value should be array.
      // Then fall through to the array handling part.
      if (is_array($v)) {
        $base[$k] = array($base[$k]);
      }
      // Otherwise, replace the value
      else {
        $base[$k] = $v;
        continue;
      }
    }
    // Incoming value is scalar, targeted at an array
    if (!is_array($v)) {
      $base[$k][] = $v;
    }
    // Incoming value is array w/associative key, recurse
    else {
      array_extend($base[$k], $v);
    }
  }
}

/**
 * Removes duplicates from numeric keys only.
 * 
 * @param array $array
 *   An array to remove duplicates from (for numeric keys only).
 * 
 * @return array
 *   The sanitized array.
 */
function array_unique_numeric($array) {
  $newArray = array();
  $check = array();
  foreach ($array as $k => $v) {
    if (is_int($k)) {
      $h = hash('sha256', serialize($v));
      if (!in_array($h, $check)) {
        $newArray[] = $v;
        $check[] = $h;
      }
    }
    else {
      $newArray[$k] = $v;
    }
  }
  return $newArray;
}

// Additional includes.
require "functions/system.inc";
require "functions/special.inc";
require "functions/drush.inc";
require "functions/hosts.inc";
require "functions/terminal.inc";
