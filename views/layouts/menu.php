<?php
/**
 * Date: 23.05.2018
 * Time: 22:00
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->beginContent('@app/views/layouts/main.php');
    $this->beginBlock('blockLogin');
        $form = ActiveForm::begin(['id' => 'login-form']);
            echo $form->field($model, 'username')->textInput();
            echo $form->field($model, 'password')->passwordInput();
            echo $form->field($model, 'rememberMe')->checkbox();
            echo Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']);
        ActiveForm::end();
    $this->endBlock();
$this->endContent();