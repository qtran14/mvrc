<?php
$table = '`expenses_status`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED AUTO_INCREMENT,

    `name` VARCHAR(60) NOT NULL,
    `description` VARCHAR(150) NULL,
    `edit_flag` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,

    `created_by` INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_updated_by` INT(11) DEFAULT NULL,
    `last_updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
);\n"; 
echo $sql;
$db->rawQuery($sql);

$inputData = [
    'name' => 'New',
    'created_by' => 1,
    'edit_flag' => 1,
];
$db->insert($table, $inputData);

$inputData = [
    'name' => 'Verified',
    'created_by' => 1,
    'edit_flag' => 1,
];
$db->insert($table, $inputData);

$inputData = [
    'name' => 'Completed',
    'created_by' => 1
];
$db->insert($table, $inputData);

$inputData = [
    'name' => 'Canceled',
    'created_by' => 1,
    'edit_flag' => 1,
];
$db->insert($table, $inputData);
