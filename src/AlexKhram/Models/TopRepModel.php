<?php
/**
 * Created by PhpStorm.
 * User: AlexKhram
 * Date: 19.07.16
 * Time: 18:47
 */

namespace AlexKhram\Models;


class TopRepModel
{
    public $fields = [
        'id',
        'repo_name',
        'repo_star',
        'repo_url',
        'repo_url_api',
        'repo_url_avatar',
        'repo_desc',
        'stat_year',
        'stat_month',
        'created_at',
        'updated_at',
    ];

    public $models = [
        'top',
        'go',
        'java',
        'js',
        'php',
        'python',
        'ruby',
    ];
}