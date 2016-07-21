<?php
/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 18.07.16
 * Time: 19:48
 */

namespace AlexKhram\Providers;

use Silex\Application;
use Silex\ControllerProviderInterface;

class ApiVoneControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        /* @var $routes \Silex\ControllerCollection */
        $routes = $app['controllers_factory'];

        $routes->get("/info", 'AlexKhram\\Controllers\\ApiVoneController::info');
        $routes->get("/lang", 'AlexKhram\\Controllers\\ApiVoneController::lang');
        $routes->get("/year/{table}/{year}/{limit}", 'AlexKhram\\Controllers\\ApiVoneController::topYear')
            ->assert('year', '^20\d{2}$')
            ->assert('limit', '^\d{1,2}|100$')
            ->value('limit', 100);
        $routes->get("/month/{table}/{year}/{month}/{limit}", 'AlexKhram\\Controllers\\ApiVoneController::topMonth')
            ->assert('year', '^20\d{2}$')
            ->assert('month', '^[1-9]|0[1-9]|1[0-2]$')
            ->assert('limit', '^\d{1,2}|100$')
            ->value('limit', 100);
        
        return $routes;
    }
}