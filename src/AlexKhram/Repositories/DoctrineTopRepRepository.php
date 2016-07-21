<?php
/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 19.07.16
 * Time: 16:00
 */

namespace AlexKhram\Repositories;

use AlexKhram\Models\TopRepModel;
use Silex\Application;

class DoctrineTopRepRepository implements TopRepRepositoryInterface
{
    private $app;
    private $models = [
        'top',
        'topgo',
        'topjava',
        'topjs',
        'topphp',
        'toppython',
        'topruby',
    ];



    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    /**
     * Get list of top repositories by specified table by specified year
     *
     * @param $table string name of table (github repository language)
     * @param $year integer - year
     * @param $limit integer - quantity of returned objects (default = 100)
     *
     *
     * @return array of instances github repositories
     */

    public function getTopRepByYear($table, $year, $limit = 100)
    {
        if (!in_array($table, $this->models)) {
            return;
        };

        $baseModel = new TopRepModel();
        $fields = implode(', ', $baseModel->fields);
//var_dump("SELECT {$fields}, sum(repo_star) as repo_star FROM {$table} WHERE stat_year={$year} GROUP BY 1 order by sum(repo_star) DESC LIMIT {$limit}");
        return $this->app['db']->fetchAll("SELECT {$fields}, sum(repo_star) as repo_star FROM {$table} WHERE stat_year={$year} GROUP BY 1 order by sum(repo_star) DESC LIMIT {$limit}");
    }

    /**
     * Get list of top repositories by specified table by specified month
     *
     * @param $table string name of table (github repository language)
     * @param $year integer - year (ex.: 2015)
     * @param $month integer - month (ex.: 02)
     * @param $limit integer - quantity of returned objects (default = 100)
     *
     * @return array of instances github repositories
     */
    public function getTopRepByMonth($table, $year, $month, $limit = 100)
    {
        if (!in_array($table, $this->models)) {
            return;
        };

        return $this->app['db']->fetchAll("SELECT * FROM {$table} WHERE stat_year={$year} and stat_month={$month} ORDER BY repo_star DESC LIMIT {$limit}");
    }
}