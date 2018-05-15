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
        return $this->render('index');
    }

    public function actionLetter($id)
    {
        $data = Category::find()->With(['letterCat', 'letterCat.letter'])->where(['id'=>$id])->one();
        return $this->render('letter', ['data' => $data]);
    }
}