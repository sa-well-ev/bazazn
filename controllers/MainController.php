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
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest)
            return $this->goHome();

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) and $model->login())
            return $this->redirect(['base/index']);
        /*Ошибки сервера при авторизации передаются в $modal поэтому для отрисовки их на форме входа нужно вернуть $modal
         * для передачи модели в шаблон добавляем её в $params, который доступен из любого вида.*/
        Yii::$app->view->params['model'] = $model;
        //Странно что при использовании страница не переходит на вид index.
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}