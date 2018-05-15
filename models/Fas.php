<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fas".
 *
 * @property int $id Идентификатор фрагмента знаний
 * @property string $date_id Дата добавления изменения
 * @property string $case_number Это номер дела, для связки нескольких судебных решений если есть обжалование
 * @property string $type Решение контрольного органа
 * @property string $sourсe Кто выпустил документ
 * @property string $doc_number Точный номер документа для поиска
 * @property string $doc_date
 * @property string $description Краткое описание содеражания фрагмента знаний
 */
class Fas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_id', 'doc_date'], 'safe'],
            [['description'], 'string'],
            [['case_number', 'type', 'sourсe', 'doc_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_id' => 'Date ID',
            'case_number' => 'Case Number',
            'type' => 'Type',
            'sourсe' => 'Sourсe',
            'doc_number' => 'Doc Number',
            'doc_date' => 'Doc Date',
            'description' => 'Description',
        ];
    }

    public function getFasCat()
    {
        return $this->hasMany(FasCat::className(), ['fas_id' => 'id']);
    }
}
