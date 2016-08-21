<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table = '`report`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `account_id` INT(11) NOT NULL,
    `name` VARCHAR(60) NOT NULL,
    `type` TINYINT(2) UNSIGNED NOT NULL,
    `generated_by` INT(11) UNSIGNED NOT NULL DEFAULT '1',
    `start_period` DATE NOT NULL,
    `end_period` DATE NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `name` (`name`)
);\n";

echo $sql;
$db->rawQuery($sql);