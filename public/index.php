<?php
//die(phpinfo());

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));
define('HTTP_DIR',      ROOT_DIR . DS . 'http');
define('PLUGINS_DIR',    ROOT_DIR . DS . 'plugins');
define('PUBLIC_DIR',    ROOT_DIR . DS . 'public');
define('STORAGE_DIR',    ROOT_DIR . DS . 'storage');


require_once ROOT_DIR . DS . '.env.php';
require_once ROOT_DIR . DS . 'global_helpers.php';
require_once ROOT_DIR . DS . 'request.class.php';


require_once HTTP_DIR . DS . 'config.php';
?>
