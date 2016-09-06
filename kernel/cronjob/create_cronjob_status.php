<?php
$db = DbFactory::getInstance();

$table = '`cronjob_status`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` int(4) unsigned auto_increment,
    `name` varchar(60) not null,
    `description` varchar(150) null,
    
    `created_at` datetime not null default current_timestamp,
    `updated_at` datetime default null on update current_timestamp,

    PRIMARY KEY (`id`)
);\n";
echo $sql;
$db->rawQuery($sql);

$db->insert($table, ['name' => 'Active']);
$db->insert($table, ['name' => 'Inactive']);