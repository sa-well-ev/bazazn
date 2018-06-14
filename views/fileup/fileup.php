<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 13.06.2018
 * Time: 14:25
 */
//showV($GLOBALS);
showV($_FILES);

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
echo $form->field($model, 'fileUp')->fileInput();
echo Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'fileup']);
ActiveForm::end();