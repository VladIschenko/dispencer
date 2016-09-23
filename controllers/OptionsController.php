<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 20.09.16
 * Time: 11:10
 */

namespace Controllers;

use Core\View;
use Models\DeviceModel;
use Models\OptionsModel;
use Models\UserModel;

class OptionsController
{
    public static  function ViewFullOptionslist()
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
            $options = new OptionsModel();
            $optionslist = $options->findAll();
            echo View::render('optionsList', $optionslist);
        }
    }

}