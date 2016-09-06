<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();


define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));
require_once ROOT_DIR . DS . 'env.php';
require_once ROOT_DIR . DS . 'app_path.php';
require_once ROOT_DIR . DS . 'config.php';


require_once HTTP_DIR . DS . 'app.class.php';
(new App)->run();
?>
