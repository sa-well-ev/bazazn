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
        //Подготавливаем строку для разбора
        //Удаляем расширение файла
        $nameFile = preg_replace('/\.\w+$/u', '', $nameFile);
        //Удаляем лишние пробелы (вконце, вначале и двойные)
        $nameFile = trim(preg_replace('/\s+/u', ' ', $nameFile));
        //удаляем пробелы между точками в датах
        $nameFile = preg_replace('/(?<=\d)\s*\.\s*/u', '.', $nameFile);
        //Отладочная информация что же всё таки получилось
        //$matches['Исходная строка'] = $nameFile;

        //Начало разбора строки
        preg_match('/^(\w+)\s+(.*?)\s+(от|№|N|по делу|дело)/iu', $nameFile ,$m); //просто первое слово [1]- это вид документа второе словосочетание [2] это уже источник
        $matches['Тип документа'] = isset($m[1]) ? $m[1] : null;
        if ($matches['Тип документа'] == 'ППРФ') {
            $matches['Тип документа'] = 'Постановление';
            $matches['Источник'] = 'Правительство';
        } else {
            $matches['Источник'] = isset($m[2]) ? $m[2] : null;
        }

        /*preg_match('/(?<=от\s)\s*\d{1,2}\s+\w+\s+\d{2,4}/iu', $nameFile ,$m); //Дата со словесным месяцем [0]
        $matches['Дата слово'] = isset($m[0]) ? $m[0] : null;
        preg_match('/(?<=от\s)\s*\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4}/iu', $nameFile ,$m); //Дата в числовом формате [0]
        $matches['Дата точки'] = isset($m[0]) ? $m[0] : null;*/

        preg_match('/от\s+(\d{1,2}\s+\w+\s+\d{2,4}|\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4})/iu', $nameFile ,$m); //Просто любая дата [1]
        $matches['Дата'] = isset($m[1]) ? preg_replace('/[_-]/', '.', $m[1]) : null; // TODO: преобразовать в Timestamp
        $matches['Дата'] = self::getFromRusDate($matches['Дата']);
        preg_match('/\(ред\.\s+(\d{1,2}\s+\w+\s+\d{2,4}|\d{1,2}[\._-]?\d{1,2}[\._-]?\d{2,4})/iu', $nameFile ,$m); //Просто любая дата [1]
        $matches['Редакция'] = isset($m[1]) ? preg_replace('/[_-]/', '.', $m[1]) : null; // TODO: преобразовать в Timestamp или класс DateTime($m[1]) DateTime::createFromFormat('d-m-y', $input)
        $matches['Редакция'] = self::getFromRusDate($matches['Редакция']);
        preg_match('/(?<!делу|дело)\s+(№|N)\s+([^\s\.]+)/iu', $nameFile ,$m); //Номер документа - перовое слово между пробелами после номера [2]
        $matches['Номер'] = isset($m[2]) ? preg_replace('/_/', '/', $m[2]) : null;
//        $matches['Номер'] = isset($m) ? $m : null;
        preg_match('/(по\s+делу|дело)\s+(№|N)\s+([^\s\.]+)/iu', $nameFile ,$m); //Номер документа - перовое слово между пробелами после слов по делу номера [3]
        $matches['Номер дела'] = isset($m[3]) ? preg_replace('/_/', '/', $m[3]) : null;
        return $matches;
    }
    /**
     * Функция преобразовывающая дату содержащую русские месяцы в дату формата ДД.ММ.ГГГГ
     * @param string $dateString входящая строка содержащая дату с русскими месяцами
     * @property array $rusMonths справочник слов месяцев, которые подлежат замене
     * @property array $numMonths справочник номеров месяцев, на которые заменяются слова месяцев
     * @return string преобразованная строка даты в формате ДД.ММ.ГГГГ
     */
    public static function getFromRusDate($dateString)
    {
        $rusMonths = [
            '/\s+(январь|января)\s+/iu',
            '/\s+(февраль|февраля)\s+/iu',
            '/\s+(март|марта)\s+/iu',
            '/\s+(апрель|апреля)\s+/iu',
            '/\s+(май|мая)\s+/iu',
            '/\s+(июнь|июня)\s+/iu',
            '/\s+(июль|июля)\s+/iu',
            '/\s+(август|августа)\s+/iu',
            '/\s+(сентябрь|сентября)\s+/iu',
            '/\s+(октябрь|октября)\s+/iu',
            '/\s+(ноябрь|ноября)\s+/iu',
            '/\s+(декабрь|декабря)\s+/iu'
        ];
        $numMonths = ['.01.', '.02.', '.03.', '.04.', '.05.', '.06.', '.07.', '.08.', '.09.', '.10.', '.11.', '.12.'];
        return preg_replace($rusMonths, $numMonths, $dateString);
    }
}