<?php
/**
 * Created by PhpStorm.
 * User: didev
 * Date: 23.05.2018
 * Time: 21:26
 */

namespace app\controllers;

use app\models\user\LoginForm;
use Yii;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $model = new LoginForm();
        if (!Yii::$app->user->isGuest)
            return $this->render('index', ['model' => $model]);

        if ($model->load(Yii::$app->request->post()) and $model->login())
            return $this->goBack();

        return $this->render('index', ['model' => $model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
            return $this->goHome();

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) and $model->login())
            return $this->goBack();

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}