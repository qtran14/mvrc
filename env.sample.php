<?php
date_default_timezone_set('America/Chicago');

$debug_mode = false;


if ($debug_mode) {
    error_reporting(E_ALL & ~E_STRICT);
    ini_set('display_errors', 1);
}


define('ENV', 'local');
define('APP_URL', 'http://some-host.com/');

/**
 * DB config
 */
define('HOSTNAME', 'localhost');
define('USERNAME', '');
define('PASSWORD', '');
define('DATABASE', '');
?>
