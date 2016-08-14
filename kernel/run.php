<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
set_time_limit ( 0 );

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));
define('HTTP_DIR',      ROOT_DIR . DS . 'http');
define('PLUGINS_DIR',   ROOT_DIR . DS . 'plugins');
define('PUBLIC_DIR',    ROOT_DIR . DS . 'public');
define('KERNEL_DIR',    ROOT_DIR . DS . 'kernel');


require_once ROOT_DIR .   DS . '.env.php';
require_once ROOT_DIR .   DS . 'global_helpers.php';
require_once KERNEL_DIR . DS . 'config.php';
require_once KERNEL_DIR . DS . 'kernel_helpers.php';




dieIfSizeLessThan2($argv);

for ( $i=1; $i<count($argv); $i++ ) {
    $dir_name = trim(trim($argv[$i], '/'));
    $dir = KERNEL_DIR . DS . $dir_name;

    if ( isPhpFile($dir_name) && file_exists($dir) ) { 
        require_once $dir;
        continue;
    }

    dieIfNotValidDirectory($dir_name, $dir);

    foreach ( scandir($dir) as $filename ) {
        if ( isPhpFile($filename) ) require_once $dir . DS . $filename;
    }
}
