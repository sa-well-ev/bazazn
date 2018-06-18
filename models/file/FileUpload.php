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

    public function getDocAttr($nameFile)
    {

        preg_match('/^(\w+)\s+(.*?)\s+(от|№|N)/u', $nameFile ,$m); //просто первое слово [1]- это вид документа второе словосочетание [2] это уже источник
        $matches[] = $m;
        preg_match('/(?<=от\s)\s*\d{1,2}\s+\w+\s+\d{2,4}/u', $nameFile ,$m); //Дата со словесным месяцем [0]
        $matches[] = $m;
        preg_match('/(?<=от\s)\s*\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4}/u', $nameFile ,$m); //Дата в числовом формате [0]
        $matches[] = $m;
        preg_match('/от\s+(\d{1,2}\s+\w+\s+\d{2,4}|\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4})/u', $nameFile ,$m); //Просто любая дата [1]
        $matches[] = $m;

        return $matches;
    }
}