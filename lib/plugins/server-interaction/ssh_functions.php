<?php

function dtk_ssh_cb_disconnect($reason, $message, $language) {
  echo 'Server disconnect: ' . $message . ' [' . $reason . ']';
}