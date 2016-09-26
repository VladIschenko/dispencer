<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:27
 */

namespace Controllers;

use Core\View;
use Models\DeviceModel;
use Models\UserModel;

class UserController
{
    private $username;
    private $password;

    const SUPERADMIN = 'superadmin';
    const ADMIN = 'admin';
    const USER = 'user';


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static function checkUserType()
    {
        $user = new UserModel();
        $id = $user->getIdByLogin($_SESSION['login']);
        $type = $user->checkUserType($id);
        return $type;
    }

    public static function saveUser()
    {
//        if (UserController::checkUsertype() == self::SUPERADMIN)
//        {
//            $roleForAdding = self::ADMIN;
//        } elseif (UserController::checkUsertype() == self::ADMIN){
//            $roleForAdding = self::USER;
//        }
        $user = new UserModel();
        if ($user->usernameExists($_POST['login'])) {
            echo "user exist";
        }else{
            if ($_POST['password'] == $_POST['repeat_password']) {
                $user->setUsername($_POST['login']);
                $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
                $user->setPass($hash);
                $user->setEmail($_POST['email']);
                $user->setFirstName($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setDescription($_POST['description']);
                $user->setOrganisation($_POST['organisation']);
                $user->setPhone($_POST['phone']);
                $user->setMeasurement($_POST['measurement']);
                $user->setLanguage($_POST['lang']);
                $user->setGroupName($_POST['group']);
//              $user->checkIsValidForRegister();
                $user->save();
            }
        }
        header('Location: /userlist');
    }

    public static function deleteProfile($id)
    {
        if($_SESSION['id'] == $id){
            echo "Вы не можете удалить свой аккаунт";
        }else{
            $user = new UserModel();
            $user->delete($id);
            header('Location: /userlist');
        }
    }

    public static function updateProfile($id)
    {
        $user = new UserModel();
        $user->setUsername($_POST['login']);
        $user->setEmail($_POST['email']);
        $user->setFirstName($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setDescription($_POST['description']);
        $user->setPhone($_POST['phone']);
        $user->setMeasurement($_POST['measurement']);
        $user->setLanguage($_POST['lang']);
//      $user->checkIsValidForRegister();
        $user->update($id);
        header('Location: /userlist');
    }

    //For render pages

    public static function editProfile($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $user = $user->findUserbyId($id);
            echo View::render('editProfile', $user);
        }
    }

    public static function userProfileView($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $user = $user->findUserbyId($id);
            echo View::render('userProfile', $user);
        }
    }

    public static function userListView()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAll();
            echo View::render('userList', $userlist);
        }
    }

    public static function addUser()
    {
        $view = new View();
        if(!isset($_SESSION['login'])){
            echo $view->render('errors/unauthorized');
        }else{
            echo $view->render('addUser');
        }
    }

    public static function loginFormView()
    {
        if(isset($_SESSION['login'])){
            echo "Вы уже авторизованы!";
            header('Location: /');
        }else{
            $view = new View();
            echo $view->render('login');
        }
    }

    public static function login()
    {
        $user = new UserModel();
        if ($user->usernameExists($_POST['login']) &&
            $user->isValidUser($_POST['login'], $_POST['password'])) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['id'] = UserModel::getIdByLogin($_SESSION['login']);
            $type = self::checkUserType();
            $_SESSION['type'] = $type;
            echo $_SESSION['type'];
            if (!empty($_SESSION['login'])) {
                header('Location: /');
            }
        }
    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['login']);
        header('Location: /');
    }

    public static function test()
    {
        $user = new UserModel();
        $id = $user->getIdByLogin($_SESSION['login']);
        $action = 'viewAllUsers';
        echo $user->checkPermission($id, $action);
    }

}