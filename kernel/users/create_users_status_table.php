<?php
$table = '`users_status`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` int(11) unsigned auto_increment,
    `name` varchar(50) not null,
    `description` varchar(150) null,

    `created_by` int(11) not null,
    `created_at` datetime not null default current_timestamp,
    `last_updated_by` int(11) default null,
    `last_updated_at` datetime default null on update current_timestamp,

    PRIMARY KEY (`id`)
);\n";
echo $sql;
$db->rawQuery($sql);

// Active status
$inputData = [
    'name' => 'Active',
    'created_by' => '1',
];
$db->insert($table, $inputData);

// Inactive status
$inputData = [
    'name' => 'Inactive',
    'created_by' => '1',
];
$db->insert($table, $inputData);

echo "\n{$table} created...\n";