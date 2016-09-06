<?php
define('CRON_DIR', 				ROOT_DIR . DS . 'cron');
define('HTTP_DIR', 				ROOT_DIR . DS . 'http');
define('KERNEL_DIR',    		ROOT_DIR . DS . 'kernel');
define('LOCALIZATION_DIR',   	ROOT_DIR . DS . 'localization');
define('PLUGIN_DIR',    		ROOT_DIR . DS . 'plugin');
define('PUBLIC_DIR',    		ROOT_DIR . DS . 'public');
define('STORAGE_DIR',   		ROOT_DIR . DS . 'storage');
define('SYSTEM_DIR',    		ROOT_DIR . DS . 'system');

define('HELPER_DIR',       		HTTP_DIR . DS . 'helper');
define('LANDING_PAGE_DIR',      HTTP_DIR . DS . 'landing_page');
define('MODEL_DIR',         	HTTP_DIR . DS . 'model');
define('RC_DIR',         		HTTP_DIR . DS . 'rc');
define('VIEW_DIR',         		HTTP_DIR . DS . 'view');


$paths = [
	PLUGIN_DIR,
	SYSTEM_DIR,
	HELPER_DIR,
];

foreach ( $paths as $path ) {
	foreach ( getDirToLoad($path) as $dir ) {
	    foreach ( glob($dir."*.php") as $filename ) require_once $filename;
	}
}

function getPath($name) {
	$paths = [
		'cron' 			=> CRON_DIR,
		'http' 			=> HTTP_DIR,
		'kernel' 		=> KERNEL_DIR,
		'localization' 	=> LOCALIZATION_DIR,
		'plugin' 		=> PLUGIN_DIR,
		'public' 		=> PUBLIC_DIR,
		'storage' 		=> STORAGE_DIR,
		'system' 		=> SYSTEM_DIR,
		'helper' 		=> HELPER_DIR,
		'landing_page' 	=> LANDING_PAGE_DIR,
		'model' 		=> MODEL_DIR,
		'rc' 			=> RC_DIR,
		'view' 			=> VIEW_DIR,
	];

	return isset($paths[$name]) ? $paths[$name] : ROOT_DIR;
}