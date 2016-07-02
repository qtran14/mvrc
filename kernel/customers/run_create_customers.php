<?php

 define('DS', DIRECTORY_SEPARATOR);
 define('ROOT_DIR', dirname(__DIR__, 2));
 define('HTTP_DIR',      ROOT_DIR . DS . 'http');
 define('PLUGINS_DIR',   ROOT_DIR . DS . 'plugins');
 define('PUBLIC_DIR',    ROOT_DIR . DS . 'public');
 define('KERNEL_DIR',    ROOT_DIR . DS . 'kernel');


require_once ROOT_DIR .   DS . '.env.php';
require_once ROOT_DIR .   DS . 'global_helpers.php';
require_once KERNEL_DIR . DS . 'config.php';


$dir = 'customers';
$scripts = [
    'create_customers_table.php',
    'create_customers_status_table.php',
    'create_customers_contact_histories_table.php',
];

foreach ($scripts as $script) {
    require_once(KERNEL_DIR . DS . $dir . DS . $script);
}

?>