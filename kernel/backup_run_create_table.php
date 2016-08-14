<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 define('DS', DIRECTORY_SEPARATOR);
 define('ROOT_DIR', dirname(__DIR__));
 define('HTTP_DIR',      ROOT_DIR . DS . 'http');
 define('PLUGINS_DIR',   ROOT_DIR . DS . 'plugins');
 define('PUBLIC_DIR',    ROOT_DIR . DS . 'public');
 define('KERNEL_DIR',    ROOT_DIR . DS . 'kernel');


require_once ROOT_DIR .   DS . '.env.php';
require_once ROOT_DIR .   DS . 'global_helpers.php';
require_once KERNEL_DIR . DS . 'config.php';


$scripts = [
    'create_users_roles_table' => 'users/create_users_roles_table.php',
    'create_users_status_table' => 'users/create_users_status_table.php',
    'create_users_table' => 'users/create_users_table.php',
    'create_users_types_table' => 'users/create_users_types_table.php',

    'create_accounts_table' => 'accounts/create_accounts_table.php',
    'create_accounts_status_table' => 'accounts/create_accounts_status_table.php',

    'create_expenses_table' => 'expenses/create_expenses_table.php',
    'create_expenses_categories_table' => 'expenses/create_expenses_categories_table.php',
    'create_expenses_status_table' => 'expenses/create_expenses_status_table.php',
    'create_expenses_pictures_table' => 'expenses/create_expenses_pictures_table.php',
];

foreach ($scripts as $desc => $path) {
    require_once(KERNEL_DIR . DS . $path);
}
