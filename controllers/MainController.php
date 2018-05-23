<?php
/**
 * Created by PhpStorm.
 * User: didev
 * Date: 23.05.2018
 * Time: 21:26
 */

namespace app\controllers;


use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}