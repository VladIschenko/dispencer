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

class DeviceController
{

    public static $deviceId;
    public static $startDate;
    public static $endDate;
    public function __construct()
    {

    }

    public static function stats()
    {
        if(isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('options');
        } else {
            $view = new View();
            echo $view->render('errors/denied');
        }
    }

    public static function processStats()
    {
        self::$deviceId = $_POST['device_id'];
        self::$startDate = date('Y-m-d', strtotime($_POST['start_date']));
        self::$endDate = date('Y-m-d', strtotime($_POST['end_date']));
        $device = new DeviceModel();
        return $device->processStats(self::$startDate, self::$endDate, self::$deviceId);
//        echo $startDate, $endDate, $deviceId;
    }

    public static function viewStats()
    {
        if(isset($_SESSION['login'])){
            $view = new View();
            echo $view->render('options');
            echo $view->insert('graph');
        }else{
            echo "Доступ запрещен, необходима авторизация!";
        }
    }
}