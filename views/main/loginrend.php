<?php
/**
 * Date: 23.05.2018
 * Time: 22:00
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
$form = ActiveForm::begin(['id' => 'login-form']);
echo $form->field($modelform, 'username')->textInput();
echo $form->field($modelform, 'password')->passwordInput();
echo $form->field($modelform, 'rememberMe')->checkbox();
echo Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']);
ActiveForm::end();