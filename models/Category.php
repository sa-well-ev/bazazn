<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id Идентификатор раздела знаний
 * @property int $parent_id Идентификатор родительского раздела, если 0 то это корневой раздел.
 * @property string $name Наименование раздела знаний
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительский ID',
            'name' => 'Наименование',
        ];
    }

    /**
    * Связь с таблицей letterCat
    */
    public function getLetterCat()
    {
        return $this->hasMany(LetterCat::className(), ['category_id' => 'id']);
    }
    /**
     * Связь с таблицей FasCat
     */
    public function getFasCat()
    {
        return $this->hasMany(FasCat::className(), ['category_id' => 'id']);
    }
    /**
     * Связь с таблицей judgementCat
     */
    public function getJudgementCat()
    {
        return $this->hasMany(JudgementCat::className(), ['category_id' => 'id']);
    }
    /**
     * Связь с таблицей Npa
     */
    public function getNpa()
    {
        return $this->hasMany(Npa::className(), ['category_id' => 'id']);
    }
}
