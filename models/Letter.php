<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "letter".
 *
 * @property int $id Идентификатор фрагмента знаний
 * @property string $date_id Дата добавления/обновления
 * @property string $law_article Статья к которому относится информация
 * @property string $type Письмо или Новость
 * @property string $source Кто выпустил документ
 * @property string $doc_number Точный номер документа для поиска
 * @property string $doc_date Дата документа
 * @property string $title Наименоваие документа (если есть)
 * @property string $description Краткое описание содеражания фрагмента знаний
 */
class Letter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'letter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_id', 'doc_date'], 'safe'],
            [['title', 'description'], 'string'],
            [['law_article', 'type', 'source', 'doc_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_id' => 'Дата записи',
            'law_article' => 'Статья закона',
            'type' => 'Тип',
            'source' => 'Источник',
            'doc_number' => 'Номер документа',
            'doc_date' => 'Дата документа',
            'title' => 'Название',
            'description' => 'Описание',
        ];
    }

    public function getLetterCat()
    {
        return $this->hasMany(LetterCat::className(), ['letter_id' => 'id']);
    }
}
