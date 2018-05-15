<?php
/**
 * Главный контроллер сайта
 */

namespace app\controllers;

use app\models\TransformModelData;
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

    public function actionView($id = 1, $model = 'letter')
    {
        $docArr = [];
        $funcName = 'get' . $model;
        $relToCat = $model . 'Cat'; //letterCat
        $relToDocTbl = $relToCat . '.' . $model; //letterCat.letter
        if ($model == 'npa'){
            $data = Category::find()->With([$model])->where(['id'=>$id])->one();
            $docArr = $data->{$model};
        } else {
            $data = Category::find()->With([$relToCat, $relToDocTbl])->where(['id'=>$id])->one();
            foreach ($data->{$relToCat} as $doc){
                $docArr[] = $doc->{$model};
            }
        };
        $docArrChange = TransformModelData::{$funcName}($docArr);
        return $this->renderAjax('view', ['docArrChange' => $docArrChange]);
    }
}