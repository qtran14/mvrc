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


$table = 'customers';


echo "creating table {$table}\n";
$db->rawQuery("CREATE TABLE `{$table}` (
	id int(11) unsigned auto_increment,
	account_hash varchar(60) not null,
	first_name varchar(60) not null,
	last_name varchar(60) default null,
	email varchar(150) default null,
	phone varchar(20) default null,
	last_call_date datetime default null,
	next_call_date date default null,

	created_by int(11) not null,
	created_at datetime not null default current_timestamp,
	last_updated_by int(11) default null,
	last_updated_at datetime default null on update current_timestamp,

	PRIMARY KEY (id),
	INDEX (account_hash)
);");

echo "table {$table} created\n";
echo "\n\nDone\n\n";
?>