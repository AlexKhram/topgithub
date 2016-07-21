<?php
/**
 * Created by PhpStorm.
 * User: AlexKhram 19.07.16
 * Time: 14:55
 */

namespace AlexKhram\Controllers;

use Silex\Application;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;



class ApiVoneController
{
    public function info(Application $app)
    {
        $message = "You can see top github repositories with next programing language: 'go', 'java', 'js', 'php', 'python','ruby'. ";
        $message .= "Also you can see top github repository with all languages by using language 'top'.</br>";
        $message .= "List of available methods api 'topgithub': </br>";
        $message .= "GET http://{$_SERVER['HTTP_HOST']}/info - returns this info;</br>";
        $message .= "GET http://{$_SERVER['HTTP_HOST']}/lang - returns list of available languages;</br>";
        $message .= "GET http://{$_SERVER['HTTP_HOST']}/year/{language}/{year}/{limit=100} - returns list of top repository by year;</br>";
        $message .= "GET http://{$_SERVER['HTTP_HOST']}/month/{language}/{year}/{month}/{limit=100} - returns list of top repository by month;</br>";
        $message .= "Examples:</br>";
        $message .= "http://{$_SERVER['HTTP_HOST']}/api/v1/month/php/2016/02 - returns list of top 100 'PHP' repository by february 2016;</br>";
        $message .= "http://{$_SERVER['HTTP_HOST']}/api/v1/year/top/2015/5 - returns list of top 5 all languages repository by 2015;</br>";

        return $message;
    }

    public function lang(Application $app)
    {
        $data = $app["repository.toprep"]->getLanguages();

        return new Response(stripcslashes(json_encode($data)));
    }

    public function topYear(Application $app, $table, $year, $limit)
    {
        $data = $app["repository.toprep"]->getTopRepByYear($table, $year, $limit);

        if (!$data) {
            throw new NotFoundHttpException;
        }
       var_dump($app["response"]);
        return new Response(stripcslashes(json_encode($data)));
    }

    public function topMonth(Application $app, $table, $year, $month, $limit)
    {

        $data = $app["repository.toprep"]->getTopRepByMonth($table, $year, $month, $limit);

        if (!$data) {
            throw new NotFoundHttpException;
        }

        return new Response(stripcslashes(json_encode($data)));
    }
}