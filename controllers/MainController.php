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

        $model = new LoginForm(); // TODO: Здесь использовать Yii::$app->view->params['test'] = 'готово';
        if ($model->load(Yii::$app->request->post()) and $model->login())
            return $this->goBack(); // TODO: Сделать перенаправление на маршрут base/index

        //Ошибки сервера при авторизации находятся в $modal поэтому для отрисовки их на форме входа нужно вернуть $modal в форму
        return $this->render('index', ['model' => $model]); // TODO: Вместо этого можно использовать Yii::$app->view->params['test'] = 'готово'; и забирать в любом виде $this->params['test'];
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}