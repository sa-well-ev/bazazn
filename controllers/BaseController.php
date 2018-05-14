<?php
/**
 * Главный контроллер сайта
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Letter;

class BaseController extends Controller
{
    public $layout = 'layout';

    public function actionIndex()
    {
        $data = Category::findOne(15);
        return $this->render('main', ['data' => $data]);
    }
}