<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


define('APPS_DIR',          ROOT_DIR . DS .'http'. DS .'apps');
define('HELPERS_DIR',       ROOT_DIR . DS .'http'. DS .'helpers');
define('VIEWS_DIR',         ROOT_DIR . DS .'http'. DS .'views');

autoLoadFiles(PLUGINS_DIR);
autoLoadFiles(HELPERS_DIR);

$db             = new MysqliDb(HOSTNAME, USERNAME, PASSWORD, DATABASE);


// spl_autoload_register(function ($class_name) {
//     require_once getPath('controllers') . DS . strtolower($class_name) . '.php';
// });
