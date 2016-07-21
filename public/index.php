<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/14/2016
 * Time: 8:55 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
//mb_internal_encoding('UTF-8');
$app = new \Silex\Application;

if (file_exists(__DIR__ . '/../app/env.php')) {
    require_once __DIR__ . '/../app/env.php';
}

require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/../app/servicesproviders.php';
require_once __DIR__ . '/../app/app.php';

$app->run();