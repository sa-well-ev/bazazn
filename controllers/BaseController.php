<?php
/**
 * Главный контроллер сайта
 */

namespace app\controllers;

use yii\web\Controller;

class BaseController extends Controller
{
    public $layout = 'layout';

    public function actionIndex()
    {
        return $this->render('main');
    }
}