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
use Models\LogsModel;
use Models\UserModel;

class LogsController
{

    public static  function ViewFullLogslist()
    {
        if (!isset($_SESSION['login'])) {
            echo View::render('errors/unauthorized');
        } else {
            $user = new UserModel();
            $id = $user->getIdByLogin($_SESSION['login']);
            $action = 'ViewFullUserlist';
            if (!isset($_SESSION['login'])) {
                echo View::render('errors/unauthorized');
            } elseif (!$user->checkPermission($id, $action)) {
                echo View::render('errors/forbidden');
            } else {
                $logs = new LogsModel();
                $logslist = $logs->findAll();
                echo View::render('logsList', $logslist);
            }
        }
    }

    public static  function ViewLogsById($id)
    {
        if(!isset($_SESSION['login']))
        {
            echo View::render('errors/unauthorized');
        }else {
            $logs = new LogsModel();
            $logslist = $logs->findById($id);
            echo View::render('logsList', $logslist);
        }
    }
}