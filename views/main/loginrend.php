<?php
/**
 * Date: 23.05.2018
 * Time: 22:00
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$form = ActiveForm::begin([
    'action' => Url::to(['main/login']),
    'id' => 'login-form',
    'options' => [
        'style' => 'padding: 0px 15px',
    ],
]);
echo $form->field($model, 'username')->textInput();
echo $form->field($model, 'password')->passwordInput();
echo $form->field($model, 'rememberMe')->checkbox();
echo Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']);
ActiveForm::end();