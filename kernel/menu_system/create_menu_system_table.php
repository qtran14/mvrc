<?php
$table = 'menu_system';


echo "creating table {$table}\n";
$db->rawQuery("DROP TABLE IF EXISTS {$table}");
$db->rawQuery("CREATE TABLE `{$table}` (
	id int(4) unsigned auto_increment,
	parent_id int(4) default null,
	name varchar(100) not null,
	description varchar(60) default null,
	href varchar(255) default 'javascript:void(0);',
	sidebar_category tinyint(2) default 0,
	icon_left varchar(60) default null,
	icon_right varchar(60) default null,
	hidden tinyint(2) default 0,
	active_code varchar(60) default null,

	created_by int(11) not null,
	created_at datetime not null default current_timestamp,
	last_updated_by int(11) default null,
	last_updated_at datetime default null on update current_timestamp,

	PRIMARY KEY (id)
);");
echo "table {$table} created\n";


$db->rawQuery("INSERT INTO `menu_system` 
				VALUES (1,NULL,'APPS',NULL,'javascript:void(0);',1,NULL,'fa fa-trophy',0,NULL,1,'2016-07-02 13:31:33',NULL,NULL),
					(2,1,'Expenses',NULL,'javascript:void(0);',0,'fa fa-dollar','arrow',0,'expense_menu',1,'2016-07-02 13:34:48',NULL,NULL),
					(3,1,'Customers',NULL,'javascript:void(0);',0,'fa fa-group','arrow',0,'customer_menu',1,'2016-07-02 13:34:48',NULL,NULL),
					(4,2,'Main',NULL,'/expenses',0,NULL,NULL,0,'expense_main_menu',1,'2016-07-02 13:36:37',NULL,NULL),
					(5,2,'Marketing',NULL,'/marketing',0,NULL,NULL,0,'expense_marketing_menu',1,'2016-07-02 13:36:37',NULL,NULL),
					(6,3,'Main',NULL,'/customers',0,NULL,NULL,0,'customer_main_menu',1,'2016-07-02 13:37:30',NULL,NULL);");


echo "\n\nDone\n\n";
?>
