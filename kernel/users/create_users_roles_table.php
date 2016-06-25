<?php
$table = '`users_roles`';

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

// Super role
$inputData = [
    'name' => 'Super',
    'description' => 'System wide maintainant',
    'created_by' => '1',
];
$db->insert($table, $inputData);

// Admin role
$inputData = [
    'name' => 'Admin',
    'description' => 'Admin role',
    'created_by' => '1',
];
$db->insert($table, $inputData);

// Sub Account role
$inputData = [
    'name' => 'Sub Account',
    'description' => 'Sub Account role',
    'created_by' => '1',
];
$db->insert($table, $inputData);

echo "\n{$table} created...\n";