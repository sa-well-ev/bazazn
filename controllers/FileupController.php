<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 13.06.2018
 * Time: 14:20
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\file\FileUpload;
use app\models\file\LetterFile;
use yii\web\UploadedFile;

class FileupController extends Controller
{
    // Отключаем шаблон
    //public $layout = false;

    public function actionIndexOld() // Обращение к такому эшкшэну как /fileup/index-old
    {
        $model = new LetterFile();

        if (\Yii::$app->request->isPost){
            $model->fileUp = UploadedFile::getInstance($model, 'fileUp');
            $model->upload(); //Загружаем атрибуты UploadedFile в атрибуты модели
            if ($model->validate() && $model->save()){
                //return $this->refresh(); //Перезагрузка формы - массив $_FILES - очищается
                return $this->render('fileup', ['model' => $model]);
            }
        }
        return $this->render('fileup', ['model' => $model]);
    }

    public function actionIndex()
    {
        $model = new FileUpload();
        if (\Yii::$app->request->isPost) {
            $model->fileUp = UploadedFile::getInstance($model, 'fileUp');
            $match = $model->getDocAttr($model->fileUp->name);
            return $this->render('fileup', ['model' => $model, 'match' => $match]);
        }
        return $this->render('fileup', ['model' => $model]);
    }

    public function actionTime()
    {
        return $this->render('datetime');
    }
}