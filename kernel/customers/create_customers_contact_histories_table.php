<?php
$table = 'customers_contact_histories';


echo "creating table {$table}\n";
$db->rawQuery("DROP TABLE IF EXISTS {$table}");
$db->rawQuery("CREATE TABLE `{$table}` (
	id int(11) unsigned auto_increment,
	customer_id int(11) unsigned not null,
	contact_date datetime not null default current_timestamp,
	notes varchar(255) default null,

	created_by int(11) not null,
	created_at datetime not null default current_timestamp,
	last_updated_by int(11) default null,
	last_updated_at datetime default null on update current_timestamp,

	PRIMARY KEY (id),
	INDEX (customer_id)
);");
echo "table {$table} created\n";


echo "\n\nDone\n\n";
?>
