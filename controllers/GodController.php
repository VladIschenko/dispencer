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

    public static function ViewUserlistByOrganisation()
    {
        $user = new UserModel();
        $organisation = $_POST['organisation'];
        $userlist = $user->findByOrganisation($organisation);
        echo View::render('userList', $userlist);
    }

    public static function ViewUserlistBySearchPhrase()
    {
        $user = new UserModel();
        $search = $_POST['search'];
        $userlist = $user->findBySearchPhrase($search);
        echo View::render('userList', $userlist);
    }


    public static  function ViewFullDevicelist()
    {

    }

    public static  function ViewFullLoglist()
    {

    }

    public static  function ViewFullOptionslist()
    {

    }

    public static  function ViewStatsForGod()
    {

    }
}