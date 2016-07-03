<?php
$table = 'quick_notes';


echo "creating table {$table}\n";
$db->rawQuery("DROP TABLE IF EXISTS {$table}");
$db->rawQuery("CREATE TABLE `{$table}` (
	id int(4) unsigned auto_increment,
	name text not null,
	hidden tinyint(2) default 0,

	created_by int(11) not null,
	created_at datetime not null default current_timestamp,
	last_updated_by int(11) default null,
	last_updated_at datetime default null on update current_timestamp,

	PRIMARY KEY (id)
);");
echo "table {$table} created\n";


echo "\n\nDone\n\n";
?>
