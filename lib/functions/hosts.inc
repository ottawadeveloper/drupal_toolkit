<?php
/**
 * @file Defines useful functions related to host file processing.
 */

/**
 * Parses a hosts file into a data structure.
 * 
 * @param string $contents
 *   The contents from a properly defined hosts file. Supports all line endings.
 * 
 * @return array
 *   A data structure array. Each entry contains three keys:
 *   - comments: An array of comments that preceded the host entry.
 *   - ip: The ip address defined.
 *   - hosts: An array of hosts associated with that IP address.
 */
function hosts_file_parse($contents) {
    $info = array();
    $pieces = preg_split('`[\r\n]{1,}`', $contents);
    $comments = array();
    foreach ($pieces as $piece) {
      $piece = trim($piece);
      if (!empty($piece)) {
        if (substr($piece, 0, 1) === '#') {
          $comments[] = $piece;
        }
        else {
          $s2 = preg_split('`\s{1,}`', $piece);
          $ip = array_shift($s2);
          $info[] = array(
            'comments' => $comments,
            'ip' => $ip,
            'hosts' => $s2,
          );
          $comments = array();
        }
      }
    }
    return $info;
  }
  
  /**
   * Compacts a host file to take up the least space possible.
   * 
   * This involves placing all the hosts for each IP address on the same line
   * and removing duplicated/overridden entries. Comments are also removed by
   * default.
   * 
   * @param array $host_defs
   *   The host definition array. See hosts_file_parse().
   * @param boolean $preserveComments
   *   If set to TRUE, comments will be preserved. Defaults to FALSE.
   * 
   * @return array
   *   The compacted host definition array, in the same format as 
   *   hosts_file_parse().
   */
  function hosts_file_compact(array &$host_defs, $preserveComments = FALSE) {
    $compacted = array();
    $hosts = array();
    $defs = array_reverse($host_defs);
    foreach ($defs as $host_def) {
      if (!isset($compacted[$host_def['ip']])) {
        $compacted[$host_def['ip']] = array(
          'comments' => array(),
          'ip' => $host_def['ip'],
          'hosts' => array(),
        );
      }
      foreach ($host_def['hosts'] as $host) {
        if (!in_array($host, $hosts) && (!in_array($host, $compacted[$host_def['ip']]))) {
          $compacted[$host_def['ip']]['hosts'][] = $host;
          $hosts[] = $host;
        }
      }
      if ($preserveComments) {
        $compacted[$host_def['ip']]['comments'] = array_merge($compacted[$host_def['ip']]['comments'], $host_def['comments']);
      }
    }
    foreach ($compacted as $k => $entry) {
      if (empty($entry['hosts'])) {
        unset($compacted[$k]);
      }
    }
    return $compacted;
  }
  
  /**
   * Converts a hosts file definition, as loaded by hosts_file_parse(), back
   * into a string representation suitable to be written to a hosts file.
   * 
   * @param array $host_defs
   *   A host file definition, as defined by hosts_file_parse().
   * @param string $ip_separator
   *   The character(s) used to separate the IP address from the hosts. Defaults
   *   to the <Tab> character.
   * @param string $host_separator
   *   The character(s) used to separate each host from other hosts. Defaults
   *   to the <Space> character.
   * @param string $line_break
   *   The character(s) used to separate each line. Defaults to PHP_EOL.
   * @param boolean $extra_comment_break
   *   Whether or not to include an extra line break before comments. Defaults
   *   to TRUE.
   * 
   * @return string
   *   A string suitable to be written to a hosts file.
   */
  function hosts_file_build(array &$host_defs, $ip_separator = "\t", $host_separator = " ", $line_break = PHP_EOL, $extra_comment_break = TRUE) {
    $entries = array();
    foreach ($host_defs as $def) {
      if (!empty($def['comments'])) {
        $str = '';
        if ($extra_comment_break) {
          $str .= $line_break;
        }
        $str .= implode($line_break, $def['comments']);
        $entries[] = $str;
      }
      if (!empty($def['hosts'])) {
        $str = $def['ip'];
        $str .= $ip_separator;
        $str .= implode($host_separator, $def['hosts']);
        $entries[] = $str;
      }
    }
    return implode($line_break, $entries);
  }
  
  /**
   * Looks up the IP address associated with a given host.
   * 
   * @param array $defs
   *   A hosts definition array, as defined by hosts_file_parse().
   * @param string $host
   *   The host to find the IP address of.
   * 
   * @return string
   *   The last IP address defined in the hosts file for the given IP. No
   *   distinction is made between IPv4 and IPv6 addresses.
   */
  function hosts_file_ip_lookup(array &$defs, $host) {
    $ip = NULL;
    foreach ($defs as $def) {
      if (in_array($host, $def['hosts'])) {
        $ip = $def['ip'];
      }
    }
    return $ip;
  }
  
  /**
   * Finds all the hosts associated with the given IP address.
   * 
   * @param string $defs
   *   A hosts definition array, as defined by hosts_file_parse().
   * @param string $ip
   *   The IP address to find hosts for.
   * 
   * @return array
   *   An array of host names that will resolve to the given IP address.
   */
  function hosts_file_hosts_lookup(array &$defs, $ip) {
    $hosts = array();
    foreach ($defs as $def) {
      if ($def['ip'] === $ip) {
        $hosts = array_merge($hosts, $def['hosts']);
      }
    }
    return array_unique($hosts);
  }
  
  /**
   * Adds a host file entry to a hosts definition array.
   * 
   * @param array $defs
   *   A hosts definition array, as defined by hosts_file_parse().
   * @param string $ip
   *   The IP address that each entry in $hosts will resolve to.
   * @param array|string $hosts
   *   One host name, or an array of host names, that will resolve to $ip.
   * @param array $comments
   *   Optional. If defined, will place comments before the hosts entry.
   */
  function hosts_file_add(array &$defs, $ip, $hosts, array $comments = array()) {
    if (!is_array($hosts)) {
      $hosts = array($hosts);
    }
    $entry = array(
      'ip' => $ip,
      'hosts' => array_unique(array_values($hosts)),
      'comments' => array(),
    );
    if (!empty($comments)) {
      foreach ($comments as $comment) {
        $comment = trim($comment);
        if (!empty($comment)) {
          if (substr($comment, 0, 1) !== '#') {
            $comment = '# ' . $comment;
          }
          $entry['comments'][] = $comment;
        }
      }
    }
    $defs[] = $entry;
  }
  
  /**
   * Removes all references to a given hostname.
   * 
   * @param array $defs
   *   A hosts definition array, as defined by hosts_file_parse().
   * @param string|array $hosts
   *   One host name, or an array of host names, that will be removed.
   * @param string $ip
   *   Limit removals to only the given IP address. Defaults to NULL (no 
   *   limits).
   */
  function hosts_file_remove_hosts(array &$defs, $hosts, $ip = NULL) {
    if (!is_array($hosts)) {
      $hosts = array($hosts);
    }
    foreach ($defs as $k => $def) {
      if (empty($ip) || $def['ip'] === $ip) {
        $updated_hosts = array();
        foreach ($def['hosts'] as $host) {
          if (!in_array($host, $hosts)) {
            $updated_hosts[] = $host;
          }
        }
        $defs[$k]['hosts'] = $updated_hosts;
      }
    }
  }
  