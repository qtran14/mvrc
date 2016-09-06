<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

set_time_limit ( 0 );


define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(__DIR__));
require_once ROOT_DIR . DS . 'env.php';
require_once ROOT_DIR . DS . 'app_path.php';
require_once ROOT_DIR . DS . 'config.php';


require_once CRON_DIR . DS . 'app.class.php';
(new App)->process($argv);
