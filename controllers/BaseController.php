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
        $docArrChange = $this->{$funcName}($docArr);
        return $this->renderAjax('view', ['docArrChange' => $docArrChange]);
    }

    private function getnpa($docArr)
    {
        foreach ($docArr as $item) {
            $fieldsArr = [];
            $fieldsArr[] = $item['type'];
            $fieldsArr[] = $item['source'];
            $fieldsArr[] = 'от ' . getRusDateStr(date_create($item['doc_date']));
            $fieldsArr[] = '№ ' . $item['doc_number'];
            $fieldsArr[] = $item['revision_date'] ? '(ред. от ' . date_format(date_create($item['revision_date']), 'd.m.Y') . ')' : null;
            $fieldsArr[] = '"'. $item['title'] . '"';
            $fieldsArrAll[] = $fieldsArr;
        }
        return $fieldsArrAll;
    }

    private function getletter($docArr)
    {
        foreach ($docArr as $item) {
            $fieldsArr = [];
            $fieldsArr[] = $item['type'];
            $fieldsArr[] = $item['source'];
            $fieldsArr[] = 'от ' . getRusDateStr(date_create($item['doc_date']));
            $fieldsArr[] = '№ ' . $item['doc_number'];
            $fieldsArr[] = '"'. $item['title'] . '"';
            $fieldsArrAll[] = $fieldsArr;
        }
        return $fieldsArrAll;
    }

    private function getfas($docArr)
    {
        $fieldsArrAll = [];
        foreach ($docArr as $item) {
            $fieldsArr = [];
            $fieldsArr[] = $item['type'];
            $fieldsArr[] = $item['source'];
            $fieldsArr[] = 'от ' . getRusDateStr(date_create($item['doc_date']));
            $fieldsArr[] = '№ ' . $item['doc_number'];
            $fieldsArrAll[] = $fieldsArr;
        }
        return $fieldsArrAll;
    }

    private function getjudgement($docArr)
    {
        $fieldsArrAll = [];
        foreach ($docArr as $item) {
            $fieldsArr = [];
            $fieldsArr[] = $item['type'];
            $fieldsArr[] = $item['source'];
            $fieldsArr[] = 'от ' . getRusDateStr(date_create($item['doc_date']));
            $fieldsArr[] = $item['doc_number'] ? '№ ' . $item['doc_number'] : null;
            $fieldsArr[] = $item['case_number'] ? 'по делу № ' . $item['case_number'] : null;
            $fieldsArrAll[] = $fieldsArr;
        }
        return $fieldsArrAll;
    }
}