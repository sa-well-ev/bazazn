<?php
/**
 * Это тестовый вид для отрисовки возможностей Bootstrap включённой в Yii2
 */

use yii\bootstrap\Collapse;
use yii\widgets\ActiveForm;

?>

    <div class="nav navbar">
    <ul class="nav navbar-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" id="drop1" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
            Dropdown
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="drop1">

        </ul>
    </li>
    <li class="dropdown"><a href="#" class="dropdown-toggle" id="drop2" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false"> Dropdown <span class="caret"></span> </a>
        <ul class="dropdown-menu" aria-labelledby="drop2">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </li>
</ul>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" id="drop3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Меню
            <span class="caret"></span>
        </a>
            <div class="dropdown-menu" aria-labelledby="drop3">

                <form id="login-form" action="" method="post" style="padding: 0px 15px">
                <div class="form-group field-loginform-username required">
                    <label style="white-space: nowrap" class="control-label" for="loginform-username">Имя пользователя</label>
                    <input id="loginform-username" class="form-control" name="LoginForm[username]" aria-required="true"
                           type="text">
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-loginform-password required">
                    <label class="control-label" for="loginform-password">Пароль</label>
                    <input id="loginform-password" class="form-control" name="LoginForm[password]" aria-required="true"
                           type="password">
                    <div class="help-block"></div>
                </div>
                <div class="form-group field-loginform-rememberme">

                    <input name="LoginForm[rememberMe]" value="0" type="hidden">
                    <label style="white-space: nowrap"><input id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" type="checkbox">
                        Запомнить меня
                    </label>
                    <div class="help-block"></div>
                </div>
                <button type="submit" class="btn btn-primary" name="login-button">Войти</button>
            </form>

            </div>

    </li>
</ul>
    </div>
<!--Начало формы-->

<?php $form = ActiveForm::begin(['id' => 'login-form']);?>
<span>Буфере буфер</span>

<?php ActiveForm::end();?>

<!--Конец формы-->
