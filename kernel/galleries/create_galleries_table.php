<?php
$table = '`galleries`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED AUTO_INCREMENT,

    `name` VARCHAR(150) NULL,
    `uploaded_name` VARCHAR(150) NULL,

    `created_by` INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_updated_by` INT(11) DEFAULT NULL,
    `last_updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
);\n";
echo $sql;
$db->rawQuery($sql);
