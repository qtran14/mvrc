<?php
$table = 'expenses_app_types';


echo "creating table {$table}\n";
$db->rawQuery("DROP TABLE IF EXISTS {$table}");
$db->rawQuery("CREATE TABLE `{$table}` (
	id int(11) unsigned auto_increment,
	name varchar(60) not null,
	description varchar(60) default null,

	created_by int(11) not null,
	created_at datetime not null default current_timestamp,
	last_updated_by int(11) default null,
	last_updated_at datetime default null on update current_timestamp,

	PRIMARY KEY (id)
);");
echo "table {$table} created\n";


$db->insert($table, [
		'name' => 'Main Expense',
		'created_by' => 1,
	]);

$db->insert($table, [
		'name' => 'Marketing',
		'created_by' => 1,
	]);


echo "\n\nDone\n\n";
?>
