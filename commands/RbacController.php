<?php
/**
 * Created by PhpStorm.
 * User: didev
 * Date: 24.05.2018
 * Time: 22:58
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Yii;
use yii\helpers\ArrayHelper;
use app\models\user\UserRecord;

class RbacController extends Controller
{
    // Свойство хранит ссылку на объект authManager
    public $rbac;

    public function beforeAction($action)
    {
        $return = parent::beforeAction($action);
        /* Поскольку в каждом action этого контроллера мы будет пользоваться объектом AuthManager
         * присвоим его свойству класса $rbac
         */
        $this->rbac = Yii::$app->getAuthManager();
        return $return;
    }

    // TODO: просто тестовый метод - удалить
    public function actionIndex()
    {
        echo 'Консоль работает'. "\n";
        $rbac = $this->rbac;
//        print_r($rbac->getRoles());
//        print_r($rbac->getPermissions());
        $roleName = $this->select('Role:', ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'));
        $choice = $this->select('Role:', ['role' => 'role1', 'permission' => 'permission1']);
        echo $choice;
        return ExitCode::OK;
    }

    // Создаём роль
    public function actionCreateRole()
    {
        $roleName = $this->prompt('Role:', ['required' => true]);
        $roleDesc = $this->prompt('Description:', ['required' => true]);
        $role = $this->rbac->createRole($roleName);
        $role->description = $roleDesc;
        $this->rbac->add($role);
        return ExitCode::OK;

    }
    // Создаём Разрешение
    public function actionCreatePermission()
    {
        $permissName = $this->prompt('Permission:', ['required' => true]);
        $permissDesc = $this->prompt('Description:', ['required' => true]);
        $permiss = $this->rbac->createPermission($permissName);
        $permiss->description = $permissDesc;
        $this->rbac->add($permiss);
        return ExitCode::OK;
    }

    //Вкладываем item один в другой
    public function actionAddChild()
    {
        echo "Choose parent";
        $parent = $this->getItem();
        echo "Choose child";
        $child = $this->getItem();
        $this->rbac->addChild($parent, $child);
        return ExitCode::OK;
    }

    public function actionAssign()
    {
        $username = $this->prompt('Choose username:', ['required' => true]);
        $user = $this->findModel($username);
        echo "Choose role or permission \n";
        $role = $this->getItem();
        $this->rbac->assign($role, $user->id);
        return ExitCode::OK;
    }

    public function actionRevoke()
    {
        $username = $this->prompt('Choose username:', ['required' => true]);
        $user = $this->findModel($username);
        $choice = $this->select('Role:', ['all' => 'All Roles', 'one' => 'One Role']);
        if ($choice == 'all') {
            $this->rbac->revokeAll($user->id);
        } else {
            echo "Choose role or permission \n";
            $role = $this->getItem();
            $this->rbac->revoke($role, $user->id);
        }
        return ExitCode::OK;
    }

    private function findModel($username)
    {
        if (!$model = UserRecord::findIdentityByName($username)) {
            throw new Exception('User is not found');
        }
        return $model;
    }

    /**
     * Возвращаем объект безопасности выбирая это роль или разрешение
     * @return object - item of yii\rbac\DbManager role or permission
     */
    private function getItem()
    {
        echo "Choose type role or permission \n";
        $choice = $this->select('Role:', ['role' => 'role', 'permission' => 'permission']);
        if ($choice == 'role') {
            $itemName = $this->select('ChooseRole:', ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'));
            $item = Yii::$app->authManager->getRole($itemName);
        } else {
            $itemName = $this->select('ChoosePermission:', ArrayHelper::map(Yii::$app->authManager->getPermissions(), 'name', 'description'));
            $item = Yii::$app->authManager->getPermission($itemName);
        };
        return $item;
    }
}