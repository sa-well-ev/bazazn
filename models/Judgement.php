<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "judgement".
 *
 * @property int $id Идентификатор фрагмента знаний
 * @property string $date_id Номер документа
 * @property string $case_number Это номер дела, для связки нескольких судебных решений
 * @property string $type Судебное решение
 * @property string $source Кто выпустил документ
 * @property string $doc_number Точный номер документа для поиска
 * @property string $doc_date Дата документа
 * @property string $description Краткое описание содеражания фрагмента знаний
 */
class Judgement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_id', 'doc_date'], 'safe'],
            [['description'], 'string'],
            [['case_number', 'type', 'source', 'doc_number'], 'string', 'max' => 255],
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
            'source' => 'Source',
            'doc_number' => 'Doc Number',
            'doc_date' => 'Doc Date',
            'description' => 'Description',
        ];
    }

    public function getJudgementCat()
    {
        return $this->hasMany(JudgementCat::className(), ['judgement_id' => 'id']);
    }
}
