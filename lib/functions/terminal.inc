<?php
/**
 * @file Defines useful command line functions for dealing with CLI output.
 * 
 * @defgroup terminal_foreground_colors "Terminal Foreground Colors"
 * Different colours that can be used in changing the foreground color of a 
 * string.
 * @see terminal_color_string()
 * 
 * @defgroup terminal_background_colors "Terminal Background Colors"
 * Different colours that can be used in changing the background color of a 
 * string.
 * @see terminal_color_string()
 */

/**
 * Makes the text being printed black.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_BLACK', '0;30');

/**
 * Makes the text being printed dark grey. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_DARK_GRAY', '1;30');

/**
 * Makes the text being printed blue.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_BLUE', '0;34');

/**
 * Makes the text being printed light blue. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_LIGHT_BLUE', '1;34');

/**
 * Makes the text being printed green
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_GREEN', '0;32');

/**
 * Makes the text being printed light green. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_LIGHT_GREEN', '1;32');

/**
 * Makes the text being printed cyan
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_CYAN', '0;36');

/**
 * Makes the text being printed light cyan. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_LIGHT_CYAN', '1;36');

/**
 * Makes the text being printed red.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_RED', '0;31');

/**
 * Makes the text being printed light red. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_LIGHT_RED', '1;31');

/**
 * Makes the text being printed purple.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_PURPLE', '0;35');

/**
 * Makes the text being printed light purple. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_LIGHT_PURPLE', '1;35');

/**
 * Makes the text being printed brown.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_BROWN', '0;33');

/**
 * Makes the text being printed yellow. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_YELLOW', '1;33');

/**
 * Makes the text being printed light gray.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_LIGHT_GRAY', '0;37');

/**
 * Makes the text being printed white. May also be bolded on some systems.
 * 
 * @ingroup terminal_foreground_colors
 */
define('TERMINAL_FOREGROUND_COLOR_WHITE', '1;37');

/**
 * Makes the background behind the text black.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_BLACK', '40');

/**
 * Makes the background behind the text red.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_RED', '41');

/**
 * Makes the background behind the text green.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_GREEN', '42');

/**
 * Makes the background behind the text yellow.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_YELLOW', '43');

/**
 * Makes the background behind the text blue.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_BLUE', '44');

/**
 * Makes the background behind the text magenta.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_MAGENTA', '45');

/**
 * Makes the background behind the text cyan.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_CYAN', '46');

/**
 * Makes the background behind the text light gray.
 * 
 * @ingroup terminal_background_colors
 */
define('TERMINAL_BACKGROUND_COLOR_LIGHT_GRAY', '47');

/**
 * Colours a string to be displayed to the terminal. If support is not present 
 * for this, or no colours are specified, then the string will be returned.
 * 
 * @todo support colours on DOS systems?
 * 
 * @param type $string
 * @param type $foreground
 * @param type $background
 * @return type
 */
function terminal_color_string($string, $foreground = NULL, $background = NULL) {
  if (!shell_command_available('tput')) {
    return $string;
  }
  $results = execute_system_command('tput colors');
  if (empty($results)) {
    return $string;
  }
  $pieces = array();
  if (!empty($foreground)) {
    $pieces[] = "\033[";
    $pieces[] = $foreground;
    $pieces[] = 'm';
  }
  if (!empty($background)) {
    $pieces[] = "\033[";
    $pieces[] = $background;
    $pieces[] = 'm';
  }
  if (empty($pieces)) {
    return $string;
  }
  $pieces[] = $string;
  $pieces[] = "\033[0m";
  return implode("", $pieces);
}

function terminal_word_wrap_line($string, $prefix, $maxLength = NULL, $skipFirstPrefix = FALSE) {
  if (empty($maxLength)) {
    $maxLength = 80;
  }
  $splitLength = $maxLength - $prefix;
  $pieces = array();
  $first = TRUE;
  while (strlen($string) > $splitLength) {
    $splitAt = $splitLength;
    if ($first && $skipFirstPrefix) {
      $first = FALSE;
      $splitAt = $maxLength;
    }
    $location = strrpos($string, ' ', $splitAt - strlen($string));
    $next = $splitAt;
    if (empty($location)) {
      $location = $splitAt;
    }
    else {
      $next = $location + 1;
    }
    $pieces[] = $prefix . substr($string, 0, $location);
    $string = substr($string, $next);
  }
  $pieces[] = $prefix . $string;
  return implode($pieces, PHP_EOL);
}
