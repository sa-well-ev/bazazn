<?php

namespace app\models\file;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "letter_file".
 *
 * @property int $id Первичный ключ-индетификтор
 * @property int $letter_id Связь с полем id в таблице писем (letter)
 * @property string $date Дата внесения или обновления файла в таблице
 * @property string $filename Имя загруженного файла без расширеня
 * @property string $filedata Бинарные данные файла. Размер файла максимум 16 мб
 * @property int $filesize Размер файла в байтах
 */
class LetterFile extends ActiveRecord
{
    /**
     * @var UploadedFile - это объект из массива $_FILES
     */
    public $fileUp;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'letter_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'filedata', 'filesize', 'filetype'], 'required'],
            [['filesize'], 'integer'],
            [['filedata'], 'string'],
            [['filename', 'filetype'], 'string', 'max' => 255],
            [['fileUp'], 'file', 'skipOnEmpty' => false, 'maxSize' => 16*1024*1024, 'extensions' => ['doc', 'docx', 'xsl', 'xlsx', 'rtf', 'txt', 'pdf']],
            [['filename'], 'match', 'pattern' => '/(\.jpg|\.php)$/', 'not' => true], // излишний фильтр НЕ jpg и не php
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'letter_id' => 'ID Письма',
            'filename' => 'Имя файла',
            'filedata' => 'Данные файла',
            'filesize' => 'Размер файла',
            'fileUp' => 'Загрузка файла',
        ];
    }
    /**
     * Функция для присвоения значениям полей модели из объекта $fileUp
     * который является объектом - UploadedFile
     */
    public function upload()
    {
        $this->filename = $this->fileUp->name;
        $this->filesize = $this->fileUp->size;
        $this->filetype = $this->fileUp->type;
        // Чтение файла в текстовом режиме
        //$this->filedata = file_get_contents($this->fileUp->tempName);
        // Бинарное чтение файла
        $fileHandle = fopen($this->fileUp->tempName, 'rb'); // Открываем в бинароном режиме
        $this->filedata = fread($fileHandle, $this->filesize); //Читаем кусок целиком
        fclose($fileHandle); //Закрываем файл
    }

    public function download($id)
    {

    }
}
