<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/23/2016
 * Time: 3:24 PM
 */
use Silex\Provider\DoctrineServiceProvider;
//use Silex\Provider\MonologServiceProvider;
//
//if(file_exists('dbconfig.php')){
//    require_once 'dbconfig.php';
//}
require_once 'dbconfig.php';


//provider of Doctrine DBAL
/* @var $app \Silex\Application */
$app->register(new DoctrineServiceProvider(), [
    'db.options' => $dbconfig,
]);

//// Provider of Monolog as $app['monolog']
//$app->register(new MonologServiceProvider(), [
//    'monolog.logfile' => __DIR__ . '/../app/logs/monolog.log',
//    'monolog.level' => 'WARNING',
//]);

//// Provider of Validator as $app['validator']
//$app->register(new ValidatorServiceProvider());
