<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fas_cat".
 *
 * @property int $fas_id Идентификатор решения ФАС
 * @property int $category_id Идентификатор раздела знаний
 */
class FasCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fas_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fas_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fas_id' => 'Fas ID',
            'category_id' => 'Category ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getFas()
    {
        return $this->hasOne(Fas::className(), ['id' => 'fas_id']);
    }
}
