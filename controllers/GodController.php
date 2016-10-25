<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 19.09.16
 * Time: 8:13
 */

namespace Controllers;

use Core\View;
use Models\UserModel;

class GodController
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static  function ViewFullUserlist()
    {

        $user = new UserModel();
        $id = $user->getIdByLogin($_SESSION['login']);
        $action = 'ViewFullUserlist';
        if(!isset($_SESSION['login']))
        {
            echo View::render('errors/unauthorized');
        } elseif (!$user->checkPermission($id, $action)){
            echo View::render('errors/forbidden');
        } else {
            $userlist = $user->findAll();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewUserlistByType()
    {
        $user = new UserModel();
        if($_POST['user-type'] == 'Все')
        {
            $type = '%';
        }else {
            $type = $_POST['user-type'];
        }
        $userlist = $user->findByType($type);
        echo View::render('userList', $userlist);
    }

    public static function ViewGodUserlist()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAllGodType();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewSuperAdminUserlist()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAllSuperadminType();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewAdminUserlist()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAllAdminType();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewTechnicianUserlist()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAllTechnicianType();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewSuperuserUserlist()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAllSuperuserType();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewuserUserlist()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $userlist = $user->findAllUserType();
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewUserlistByOrganisation()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $organisation = $_POST['organisation'];
            $userlist = $user->findByOrganisation($organisation);
            echo View::render('userList', $userlist);
        }
    }

    public static function ViewUserlistBySearchPhrase()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $search = $_POST['search'];
            $userlist = $user->findBySearchPhrase($search);
            echo View::render('userList', $userlist);
        }
    }
}