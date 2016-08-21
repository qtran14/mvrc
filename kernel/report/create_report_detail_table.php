<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table = '`report_detail`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `report_id` INT(11) UNSIGNED NOT NULL,
    `category_id` INT(11) UNSIGNED NOT NULL,
    `expense_id` INT(11) UNSIGNED NOT NULL,
    `created_by` INT(11) UNSIGNED NOT NULL,
    `updated_by` INT(11) UNSIGNED NULL DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);\n";

echo $sql;
$db->rawQuery($sql);