<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "judgement_cat".
 *
 * @property int $judgement_id Индетификатор судебного решения
 * @property int $category_id Раздел знаний
 */
class JudgementCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judgement_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judgement_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'judgement_id' => 'Judgement ID',
            'category_id' => 'Category ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getJudgement()
    {
        return $this->hasOne(Judgement::className(), ['id' => 'judgement_id']);
    }
}
