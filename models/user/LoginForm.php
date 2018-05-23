<?php
/**
 * Created by PhpStorm.
 * User: didev
 * Date: 23.05.2018
 * Time: 22:11
 */

namespace app\models\user;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;
    /** @var UserRecord */
    public $user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    public function login()
    {
        if (!$this->validate())
            return false;
        $user = $this->getUser($this->username);
        if (!$user)
            return false;
        return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
    }

    public function validatePassword($attributeName)
    {
        if ($this->hasErrors())
            return;
        $user = $this->getUser($this->username);
        if (!($user and $this->isCorrectHash($this->$attributeName, $user->password)))
            $this->addError('password', 'Имя пользователя и пароль не верны');
    }

    private function getUser($username)
    {
        if (!$this->user)
            $this->user = UserRecord::findOne(['username' => $username]);

        return $this->user;
    }

    private function isCorrectHash($plaintext, $hash)
    {
        return Yii::$app->security->validatePassword($plaintext, $hash);
    }
}