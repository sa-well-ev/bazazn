<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 13.06.2018
 * Time: 14:09
 */

namespace app\models\file;

use yii\base\Model;
use yii\web\UploadedFile;


class FileUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $fileUp;

    public function rules()
    {
        return [
            [['fileUp'], 'file', 'skipOnEmpty' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fileUp' => 'Загрузить файл',
        ];
    }

    public function upload()
    {
        if ($this->validate()){
            $this->fileUp->saveAs('uploads/' . $this->fileUp->baseName . '.' . $this->fileUp->extension);
            return true;
        } else {
            return false;
        }
    }
}