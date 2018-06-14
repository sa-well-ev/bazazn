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
use yii\web\UploadedFile;

class FileupController extends Controller
{
    // Отключаем шаблон
    public $layout = false;

    public function actionIndex()
    {
        $model = new FileUpload();

        if (\Yii::$app->request->isPost){
            $model->fileUp = UploadedFile::getInstance($model, 'fileUp');
            if ($model->upload()){
                //return $this->refresh(); //Перезагрузка формы - массив $_FILES - очищается
                return $this->render('fileup', ['model' => $model]);
            }
        }


        return $this->render('fileup', ['model' => $model]);
    }
}