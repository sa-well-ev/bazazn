<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message = __DIR__;
        echo "\n";
        $obj = Yii::$app->getAuthManager()->getRoles();
        shwV($obj);

        return ExitCode::OK;
    }

    public function actionFile()
    {
        $data = file_get_contents('file.txt');
//        echo $data;
        $data = iconv("UTF-8", "Windows-1251", $data);
//        $data = mb_convert_encoding($data, 'utf-8', 'Windows-1251');
//        $data = mb_convert_encoding($data, 'CP1251', 'CP1252');
//        file_put_contents('conv.txt', $data);
        echo $data;
        return ExitCode::OK;
    }
}
