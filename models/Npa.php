<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "npa".
 *
 * @property int $id Идентификатор фрагмента знаний
 * @property string $date_id Дата фрагмента
 * @property int $category_id Идентификатор темы или раздел знаний
 * @property string $law_article Статья закона к которому относится
 * @property string $type Закон, постановление или распоряжение
 * @property string $source Кто выпустил документ
 * @property string $doc_number Точный номер документа для поиска
 * @property string $doc_date Дата документа
 * @property string $revision_date Дата редакции документа
 * @property string $title Наименоваие документа (если есть)
 * @property string $level Уровень документа: Федеральный, Субъекта, Муниципальный
 * @property string $description Краткое описание содеражания фрагмента знаний
 * @property string $usage_for Для заказчиков какого уровня (Все, федералы, областные, муниципалы)
 */
class Npa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'npa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_id', 'doc_date', 'revision_date'], 'safe'],
            [['category_id'], 'integer'],
            [['title', 'description'], 'string'],
            [['law_article', 'type', 'source', 'doc_number', 'level', 'usage_for'], 'string', 'max' => 255],
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
            'category_id' => 'Category ID',
            'law_article' => 'Law Article',
            'type' => 'Type',
            'source' => 'Source',
            'doc_number' => 'Doc Number',
            'doc_date' => 'Doc Date',
            'revision_date' => 'Revision Date',
            'title' => 'Title',
            'level' => 'Level',
            'description' => 'Description',
            'usage_for' => 'Usage For',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
