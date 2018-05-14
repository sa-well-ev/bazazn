<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "letter_cat".
 *
 * @property int $letter_id Идентификатор письма
 * @property int $category_id Раздел знаний
 */
class LetterCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'letter_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['letter_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'letter_id' => 'ID Письма',
            'category_id' => 'ID Категории',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getLetter()
    {
        return $this->hasOne(Letter::className(), ['id' => 'letter_id']);
    }
}
