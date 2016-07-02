<?php

echo "alter tables\n";
$db->rawQuery("ALTER TABLE `expenses` ADD COLUMN `app_type_id` TINYINT(2) NULL DEFAULT 1 AFTER `account_hash`");
$db->rawQuery("ALTER TABLE `expenses_categories` ADD COLUMN `app_type_id` TINYINT(2) NULL DEFAULT 1 AFTER `name`");

$db->insert('expenses_categories', [
    'name' => 'Mini Facial',
    'app_type_id' => 2,
    'created_by' => 1
]);

$db->insert('expenses_categories', [
    'name' => 'Promotions',
    'app_type_id' => 2,
    'created_by' => 1
]);

$db->insert('expenses_categories', [
    'name' => 'Other',
    'app_type_id' => 2,
    'created_by' => 1
]);

echo "\n\nDone\n\n";
?>
