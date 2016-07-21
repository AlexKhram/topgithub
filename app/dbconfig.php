<?php
$dbconfig = [
    'dbname' => 'gitstat',
    'user' => $_ENV["MYSQL_DB_USERNAME"],
    'password' => $_ENV["MYSQL_DB_PASSWORD"],
    'host' => $_ENV["MYSQL_DB_HOST"],
    'driver' => 'pdo_mysql',
    'charset' => 'utf8',
];