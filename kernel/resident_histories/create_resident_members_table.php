<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table = '`resident_members`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED AUTO_INCREMENT,

    `first_name` VARCHAR(60) NOT NULL,
    `last_name` VARCHAR(60) NOT NULL,
    `phone` VARCHAR(11) NULL,
    `extension` VARCHAR(5) NULL,
    `email` VARCHAR(60) NULL,

    `created_by` INT(11) default 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_updated_by` INT(11) DEFAULT NULL,
    `last_updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`)
);\n"; 
echo $sql;
$db->rawQuery($sql);

$db->rawQuery("INSERT INTO `resident_members` (`first_name`, `last_name`, `phone`) VALUES ('Quoc', 'Tran', '7147182974')");
$db->rawQuery("INSERT INTO `resident_members` (`first_name`, `last_name`, `phone`) VALUES ('Thanhtam', 'Nguyen', '7147180058')");
