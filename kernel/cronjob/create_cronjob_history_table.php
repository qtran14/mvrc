<?php
$db = DbFactory::getInstance();

$table = '`cronjob_history`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` int(11) unsigned auto_increment,
    `cronjob_id` int(4) not null,
    `success` tinyint(1) default 0,
    `started_at` datetime not null default current_timestamp,
    `ended_at` datetime default null on update current_timestamp,

    PRIMARY KEY (`id`)
);\n";
echo $sql;
$db->rawQuery($sql);
