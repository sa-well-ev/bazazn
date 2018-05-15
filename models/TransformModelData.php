<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 15.05.2018
 * Time: 21:39
 */

namespace app\models;


use yii\base\Model;

class TransformModelData extends Model
{
    public static function getnpa($docArr)
    {
        $fieldsArrAll = [];
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

    public static function getletter($docArr)
    {
        $fieldsArrAll = [];
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

    public static function getfas($docArr)
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

    public static function getjudgement($docArr)
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