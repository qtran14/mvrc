<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$table = '`resident_histories`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` INT(11) UNSIGNED AUTO_INCREMENT,

    `resident_member_id` INT(11) NOT NULL,
    `landlord` VARCHAR(150) NULL,
    `phone` VARCHAR(11) NULL,
    `extension` VARCHAR(5) NULL,
    `email` VARCHAR(60) NULL,
    `start_date` DATE NULL,
    `end_date` DATE NULL,
    `address_1` VARCHAR(150) NULL,
    `address_2` VARCHAR(150) NULL,
    `city` VARCHAR(60) NULL,
    `state` VARCHAR(60) NULL,
    `zip_code` VARCHAR(60) NULL,

    `created_by` INT(11) DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `last_updated_by` INT(11) DEFAULT NULL,
    `last_updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`)
);\n"; 
echo $sql;
$db->rawQuery($sql);

$db->rawQuery("INSERT INTO `all_in_one_dev`.`resident_histories` (`resident_member_id`, `start_date`, `end_date`, `address_1`, `address_2`, `city`, `state`, `zip_code`) VALUES ('1', '2008-07-01', '2009-06-30', '10631 Tibbs Cir', 'Apt 2', 'Garden Grove', 'CA', '92840')");
$db->rawQuery("INSERT INTO `all_in_one_dev`.`resident_histories` (`resident_member_id`, `start_date`, `end_date`, `address_1`, `city`, `state`, `zip_code`) VALUES ('1', '2009-07-01', '2013-03-01', '12441 La Linda Cir', 'Garden Grove', 'CA', '92841')");
$db->rawQuery("INSERT INTO `all_in_one_dev`.`resident_histories` (`resident_member_id`, `start_date`, `end_date`, `address_1`, `address_2`, `city`, `state`, `zip_code`) VALUES ('1', '2013-03-01', '2013-10-01', '446 W 10th St', 'Apt 1', 'Erie', 'PA', '16502')");
$db->rawQuery("INSERT INTO `all_in_one_dev`.`resident_histories` (`resident_member_id`, `start_date`, `end_date`, `address_1`, `address_2`, `city`, `state`, `zip_code`) VALUES ('1', '2013-10-01', '2014-02-01', '3615 Brandes St', 'Front', 'Erie', 'PA', '16504')");
$db->rawQuery("INSERT INTO `all_in_one_dev`.`resident_histories` (`resident_member_id`, `start_date`, `end_date`, `address_1`, `city`, `state`, `zip_code`) VALUES ('1', '2014-02-01', '2015-09-01', '12441 La Linda Cir', 'Garden Grove', 'CA', '92841')");
$db->rawQuery("INSERT INTO `all_in_one_dev`.`resident_histories` (`resident_member_id`, `start_date`, `address_1`, `address_2`, `city`, `state`, `zip_code`) VALUES ('1', '2015-09-01', '1610 Camellia Dr', 'D2', 'Munster', 'IN', '46321')");
