<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 20.06.2018
 * Time: 10:22
 */

// TODO: класс ветки testData - удалить

namespace app\models\test;

use yii\db\ActiveRecord;

class TestDate extends ActiveRecord
{

    /*
     * формат ввода значения времени для TIMESTAMP - '2038-01-19 03:14:07'
     * формат ввода значения времени для DATE - '2038-01-19'
     * всё остальное - искажение или проблемы при вводе.
     * Но поле TIMESTAMP - не добавляется в SQL инструкцию
     */

    public $tmestamp_col;

    public static function tableName()
    {
        return 'test_date';
    }
    public function rules()
    {
        return [
            [['tmestamp_col', 'date_col'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'tmestamp_col' => 'Время Timestamp',
            'date_col' => 'Время Date',
        ];
    }

    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);
        //Преобразовываем строку в русском формате dd.mm.yy в формат базы Y-m-d
        $this->date_col = \DateTime::createFromFormat('d#m#Y', $this->date_col)->format('Y-m-d');
        $dt = new \DateTime();
        $this->tmestamp_col = $dt->getTimestamp();

        return $return;
    }
}