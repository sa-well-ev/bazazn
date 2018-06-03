<?php
/**
 * Created by PhpStorm.
 * User: didev
 * Date: 01.06.2018
 * Time: 22:39
 */

namespace app\controllers;


use yii\web\Controller;

class BtsController extends Controller
{
    public $layout = 'bootstrap';

    //Это действие создано для сравнения возможности bootstrap оригинального и включённого в Yii2

    /*Оригинальный bootstrap 4*/
    public function actionBts()
    {
        return $this->renderPartial('bootstrap');
    }
    /*bootstrap 3.3.7 включённый в Yii2*/
    public function actionIndex()
    {
        return $this->render('index');
    }
}