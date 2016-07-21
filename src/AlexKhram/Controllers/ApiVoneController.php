<?php
/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 19.07.16
 * Time: 14:55
 */

namespace AlexKhram\Controllers;

use Silex\Application;


class ApiVoneController
{
    public function info(Application $app)
    {
        $message = "List of available methods api 'bets': </br>";
        $message .= "+  - GET /info - returns this info;</br>";
        $message .= "+  - GET /top/{year} - returns list of top repository by year;</br>";
        $message .= "+  - GET /top/{year}/{month} - returns list of top repository by month;</br>";
        $message .= "+  - GET /topgo/{year} - returns list of top 'Go' repository by year;</br>";
        $message .= "+  - GET /topgo/{year}/{month} - returns list of top 'Go' repository by month;</br>";

//        $message .= "+  - GET /bets/stat/{team1}/{team2} - return quantity, percentage end sum amount bets of all recepients countries by match;</br>";
//        $message .= "+  - POST /bets - create new bet;</br>";
        return $message;
    }

    public function topYear(Application $app, $table, $year, $limit)
    {
        $top = $app["repository.toprep"]->getTopRepByYear($table, $year, $limit);

        if(!$top){
            return $app->json("Not found", 400);
        }
        return $app->json($top);
    }

    public function topMonth(Application $app, $table, $year, $month, $limit)
    {

        $top = $app["repository.toprep"]->getTopRepByMonth($table, $year, $month, $limit);

        if(!$top){
            return $app->json("Not found", 400);
        }

        return $app->json($top);
//        $stat = $app['repo.bet']->getStat($team1, $team2);
//
//        if (!$stat) {
//            $app['monolog']->addWarning(sprintf("Match %s vs %s not be found", $team1, $team2));
//            return $app->json(['error' => "Match {$team1} vs {$team2} not be found"], 404);
//        }
//        return $app->json($stat, 200);
    }
//
//    public function save(Application $app, Request $request)
//    {
//        $bet = $app['bet.model']->validateAndFill($request->request->all(), $app);
//        if (is_array($bet)) {
//            $app['monolog']->addWarning("Error bet creating", [$bet, $request->request->all()]);
//            return $app->json($bet, 400);
//        }
//        $app['repo.bet']->saveBet($bet);
//        return $app->json(['created' => 'bet'], 201);
//    }
}