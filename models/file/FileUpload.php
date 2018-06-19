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
        preg_match('/^(\w+)\s+(.*?)\s+(от|№|N|по делу|дело)/iu', $nameFile ,$m); //просто первое слово [1]- это вид документа второе словосочетание [2] это уже источник
        $matches['Тип документа'] = isset($m[1]) ? $m[1] : null;
        $matches['Источник'] = isset($m[2]) ? $m[2] : null;

        /*preg_match('/(?<=от\s)\s*\d{1,2}\s+\w+\s+\d{2,4}/iu', $nameFile ,$m); //Дата со словесным месяцем [0]
        $matches['Дата слово'] = isset($m[0]) ? $m[0] : null;
        preg_match('/(?<=от\s)\s*\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4}/iu', $nameFile ,$m); //Дата в числовом формате [0]
        $matches['Дата точки'] = isset($m[0]) ? $m[0] : null;*/

        preg_match('/от\s+(\d{1,2}\s+\w+\s+\d{2,4}|\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4})/iu', $nameFile ,$m); //Просто любая дата [1]
        $matches['Дата'] = isset($m[1]) ? $m[1] : null; // TODO: вычистить строку от двойных пробелов и преобразовать в Timestamp
        preg_match('/\(ред\.\s+(\d{1,2}\s+\w+\s+\d{2,4}|\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4})/iu', $nameFile ,$m); //Просто любая дата [1]
        $matches['Редакция'] = isset($m[1]) ? $m[1] : null; // TODO: вычистить строку от двойных пробелов и преобразовать в Timestamp
        preg_match('/(?<!делу|дело)\s+(№|N)\s+([^\s\.]+)/iu', $nameFile ,$m); //Номер документа - перовое слово между пробелами после номера [2]
//        $matches['Номер'] = isset($m[2]) ? $m[2] : null;
        $matches['Номер'] = isset($m) ? $m : null;
        preg_match('/(по\s+делу|дело)\s+(№|N)\s+([^\s\.]+)/iu', $nameFile ,$m); //Номер документа - перовое слово между пробелами после слов по делу номера [3]
        $matches['Номер дела'] = isset($m) ? $m : null;
        return $matches;
    }
}