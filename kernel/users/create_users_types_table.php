<?php
$table = '`users_types`';

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

// Sys type
$inputData = [
    'name' => 'Sys',
    'description' => 'System wide maintenant',
    'created_by' => '1',
];
$db->insert($table, $inputData);

// BOS type
$inputData = [
    'name' => 'BOS',
    'description' => 'Back Offices',
    'created_by' => '1',
];
$db->insert($table, $inputData);

// Belongs to an account type
$inputData = [
    'name' => 'BTAA',
    'description' => 'Belongs to an account',
    'created_by' => '1',
];
$db->insert($table, $inputData);

echo "\n{$table} created...\n";