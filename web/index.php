<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

/**
 * Функция для распечатки переменных
 * @param object $arr Входящий объёкт для распечатки
 */
function showVar($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

(new yii\web\Application($config))->run();
