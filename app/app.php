<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 5/23/2016
 * Time: 3:29 PM
 */

//use Symfony\Component\HttpFoundation\ParameterBag;
//use Alex\Model\Bet;
use AlexKhram\Providers\ApiVoneControllerProvider;
use AlexKhram\Repositories\DoctrineTopRepRepository;
//use Alex\Repository\CapsuleBetRepository;
//use Alex\Repository\EloquentBetRepository;
//use Alex\Repository\DoctrineBetRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

//accepting JSON
/* @var $app \Silex\Application */
$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : []);
    }
});

////Bet model
//$app['bet.model'] = $app->share(function () {
//    return new Bet();
//});

//TopRep repository
$app['repository.toprep'] = function () use ($app) {
        return new DoctrineTopRepRepository($app);
    };

//mount controller for api bets
$app->mount("/api/v1", new ApiVoneControllerProvider());

////activate CORS
//$app->after(function (Request $request, Response $response) {
//    $response->headers->set('Access-Control-Allow-Origin', '*');
//});

////convert fatal errors to exceptions
//$handler_function = function ($e) use ($app) {
//    echo 'Server error';
//    $app['monolog']->addError("Critical - Error", $e);
//};

//error handling
$app->error(function (Exception $e) use ($app) {
    if ($e instanceof NotFoundHttpException) {
        return new Response('The requested page could not be found.', Response::HTTP_NOT_FOUND);
    }
    return new Response("{$e} Server error", 500);
});

