<?php

//if (file_exists('../.local.php')) {
//    include_once '../.local.php';
//}

date_default_timezone_set("Europe/Kiev");

$app['debug'] = true;



////chose db layer : capsule, eloquent or doctrine
//$app['db.default.layer'] = 'capsule';

////db config
//$dbconfig = [
//    'host' => 'localhost',
//    'database' => 'db',
//    'username' => 'user',
//    'password' => 'pass',
//    'charset' => 'utf8',
//    'collation' => 'utf8_unicode_ci',
//    'prefix' => '',
//    'logging' => true,
//];
//
//////////////////////////////////////////////////////////////////
//$app['db.config.doctrine'] = [
//    'dbname' => isset($secretdbconfig['database']) ? $secretdbconfig['database'] : $dbconfig['database'],
//    'user' => isset($secretdbconfig['username']) ? $secretdbconfig['username'] : $dbconfig['username'],
//    'password' => isset($secretdbconfig['password']) ? $secretdbconfig['password'] : $dbconfig['password'],
//    'host' => isset($secretdbconfig['host']) ? $secretdbconfig['host'] : $dbconfig['host'],
//    'driver' => 'pdo_mysql',
//];
//$app['db.config.eloquent'] = [
//    'driver' => 'mysql',
//    'host' => isset($secretdbconfig['host']) ? $secretdbconfig['host'] : $dbconfig['host'],
//    'database' => isset($secretdbconfig['database']) ? $secretdbconfig['database'] : $dbconfig['database'],
//    'username' => isset($secretdbconfig['username']) ? $secretdbconfig['username'] : $dbconfig['username'],
//    'password' => isset($secretdbconfig['password']) ? $secretdbconfig['password'] : $dbconfig['password'],
//    'charset' => $dbconfig['charset'],
//    'collation' => $dbconfig['collation'],
//    'prefix' => $dbconfig['prefix'],
//    'logging' => $dbconfig['logging'],
//];

