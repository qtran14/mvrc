<?php
$table = '`accounts`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` int(11) unsigned auto_increment,
    `hash` char(12) not null,
    `name` varchar(50) not null,
    `status` tinyint(2) unsigned not null default 1,
    `description` varchar(150) null,
    
    `created_by` int(11) not null,
    `created_at` datetime not null default current_timestamp,
    `last_updated_by` int(11) default null,
    `last_updated_at` datetime default null on update current_timestamp,

    PRIMARY KEY (`id`),
    UNIQUE KEY (`hash`)
);\n";
echo $sql;
$db->rawQuery($sql);

