<?php
/**
 * Главный контроллер сайта
 */

namespace app\controllers;

use app\models\TransformModelData;
use yii\web\Controller;
use app\models\Category;

class BaseController extends Controller
{
    public $layout = 'layout';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id = 1, $model = 'letter', $withChild)
    {
        $docArr = [];
        $funcName = 'get' . $model;
        $relToCat = $model . 'Cat'; //letterCat
        $relToDocTbl = $relToCat . '.' . $model; //letterCat.letter

        if ($model == 'npa') {
            $dataParent = Category::find()->With(['child', $model])->where(['id' => $id])->one();
            $dataCat[] = $dataParent;
            //Здесь стоит условие искать со вложенными или нет, если да - то строка ниже если нет то без неё
            if ($withChild == 'true') {
                $dataCat = TransformModelData::getChildsCat($dataCat);//Получаем массив объектов категорий которых в которых надо найти документы
            }
            foreach ($dataCat as $dataItem) {
                $docArr = array_merge($docArr, $dataItem->{$model});
            }
        } else {
            $dataParent = Category::find()->With(['child', $relToCat, $relToDocTbl])->where(['id' => $id])->one(); //это обект переданной категории
            $dataCat[] = $dataParent; //преобразовываем в массив объектов
            //Здесь стоит условие искать со вложенными или нет, если да - то строка ниже если нет то без неё
            if ($withChild == 'true') {
                $dataCat = TransformModelData::getChildsCat($dataCat);//Получаем массив объектов категорий которых в которых надо найти документы
            }
            foreach ($dataCat as $dataItem) {
                foreach ($dataItem->{$relToCat} as $doc) {
                    $docArr[] = $doc->{$model};
                }
            }
        };

        $docArrChange = TransformModelData::{$funcName}($docArr);
        return $this->renderAjax('view', ['docArrChange' => $docArrChange]);
    }
}