<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';



function getRusDateStr($date)
{
    $rusMonths = array( 1 => 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
    return date_format($date,'j ' . $rusMonths[date_format($date, 'n')] . ' Y года');

}

/**
 * Функция для распечатки переменных
 * @param object $arr Входящий объёкт для распечатки
 */

function showVar($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

(new yii\web\Application($config))->run();
