<?php
$table = 'customers';


echo "creating table {$table}\n";
$db->rawQuery("DROP TABLE IF EXISTS {$table}");
$db->rawQuery("CREATE TABLE `{$table}` (
	id int(11) unsigned auto_increment,
	account_hash varchar(60) not null,
	first_name varchar(60) not null,
	last_name varchar(60) default null,
	email varchar(150) default null,
	phone varchar(20) default null,
	last_call_date datetime default null,
	next_call_date date default null,
	status tinyint(2) unsigned not null,

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