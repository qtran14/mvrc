<?php
$table = '`expenses`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED AUTO_INCREMENT,

    `hash` CHAR(60) NOT NULL,
    `account_hash` CHAR(12) NOT NULL,
    `on_date` DATE NOT NULL,
    `name` VARCHAR(150) NOT NULL,
    `category_id` TINYINT(2) UNSIGNED NOT NULL,
    `status_id` TINYINT(2) UNSIGNED NOT NULL,
    `amount` DECIMAL(5,2) NOT NULL DEFAULT 0.00,
    `description` TEXT DEFAULT NULL,

    `created_by` INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_updated_by` INT(11) DEFAULT NULL,
    `last_updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    UNIQUE KEY (`hash`),
    INDEX (`account_hash`)
);\n";
echo $sql;
$db->rawQuery($sql);
