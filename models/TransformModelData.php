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
            /*Чтобы иметь возможность пропускать поле description в цикле и получать к нему доступ отдельно*/
            $fieldsArr['description'] = $item['description'];
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
            /*Чтобы иметь возможность пропускать поле description в цикле и получать к нему доступ отдельно*/
            $fieldsArr['description'] = $item['description'];
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
            /*Чтобы иметь возможность пропускать поле description в цикле и получать к нему доступ отдельно*/
            $fieldsArr['description'] = $item['description'];
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
            /*Чтобы иметь возможность пропускать поле description в цикле и получать к нему доступ отдельно*/
            $fieldsArr['description'] = $item['description'];
            $fieldsArrAll[] = $fieldsArr;
        }
        return $fieldsArrAll;
    }

    /**
     * Функция рекурсивно обрабатывающая меню категорий и возвращающая
     * одномерный массив содержащий САМ объект категория и все её вложения
     * @var $data - Это массив объектов - результат запроса
     * @return $ChildArr - массив объектов содержащих категорию и все вложеные подкатегории
     */
    public static function getChildsCat($data)
    {
        $ChildArr = $data; //Это будет однородный массив первый элемент - сам массив объектов
        foreach ($data as $dataItem){
            if ($hasChild = $dataItem->child){
                foreach ($hasChild as $child){
                    if ($hasChilds = $child->child){
                        $ChildArr = array_merge($ChildArr, self::getChildsCat($hasChilds));
                    };
                    $ChildArr[] = $child;
                }
            }
        }
        return $ChildArr;
    }
}