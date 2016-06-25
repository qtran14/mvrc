<?php
$table = '`users`';

$db->rawQuery("DROP TABLE IF EXISTS {$table}");

$sql = "CREATE TABLE {$table} (
    `id` int(11) unsigned auto_increment,
    `username` varchar(30) not null,
    `email` varchar(100) not null,
    `type` tinyint(2) unsigned not null, 
    `account_hash` char(12) default null,
    `role` tinyint(2) unsigned not null,
    `status` tinyint(2) unsigned not null default 1,
    `pw_hash` varchar(60) default null,
    `salt` varchar(10) default null,
    `pepper` varchar(10) default null,

    `created_by` int(11) not null,
    `created_at` datetime not null default current_timestamp,
    `last_updated_by` int(11) default null,
    `last_updated_at` datetime default null on update current_timestamp,

    PRIMARY KEY (`id`),
    UNIQUE KEY (`username`),
    INDEX (`email`)
);\n";
echo $sql;
$db->rawQuery($sql);

$password = 'sysuser';
$salt = generateUUID(rand(5, 10));
$pepper = generateUUID(rand(5, 10));
$longPass = $salt.$password.$pepper;

$options = [
    'cost' => 12,
];
$pwHash = password_hash($longPass, PASSWORD_BCRYPT, $options);
echo "length: ". strlen($pwHash) ."\n";

$inputData = [
    'username' => 'system',
    'pw_hash' => $pwHash,
    'salt' => $salt,
    'pepper' => $pepper,
    'email' => 'system@the-site.com',
    'type' => 1,
    'role' => 1,
    'status' => 1,
    'created_by' => 0
];
$db->insert($table, $inputData);

if ( password_verify($longPass, $pwHash) ) echo "Yeah... you're good!\n";
