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

    public static function processStats2()
    {
        $view = new View();
        self::$deviceId = $_POST['device_id'];
        self::$startDate = date('Y-m-d', strtotime($_POST['start_date']));
        self::$endDate = date('Y-m-d', strtotime($_POST['end_date']));
        $device = new DeviceModel();
        $data = $device->processStats2(self::$startDate, self::$endDate, self::$deviceId);
        echo $view->render('graph', $data);
        return $data;
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

    public static  function showFullDevicelist()
    {
        $device = new DeviceModel();

        $freeDevices = $device->findFreeDevices();
        $soldDevices = $device->findSoldDevices();
        $installedDevices = $device->findInstalledDevices();
        echo View::insert('layouts/header');
        echo View::insert('templates/devicePanel');
        if (isset($_POST['device-organisation'])){
            $organisation = $_POST['device-organisation'];
            $devices = $device->findDevicesByOrganisation($organisation);
            echo View::insert('templates/devicePanel/soldDevices', $devices);
        }
        if(!isset($_POST['device-type']) and !isset($_POST['device-organisation'])){
            echo View::insert('templates/devicePanel/installedDevices', $installedDevices);
        }elseif(isset($_POST['device-type']) and $_POST['device-type'] == 'Свободные'){
            echo View::insert('templates/devicePanel/freeDevices', $freeDevices);
        }elseif(isset($_POST['device-type']) and $_POST['device-type'] == 'Проданные'){
            echo View::insert('templates/devicePanel/soldDevices', $soldDevices);
        }elseif(isset($_POST['device-type']) and $_POST['device-type'] == 'Установленные'){
            echo View::insert('templates/devicePanel/installedDevices', $installedDevices);
        }
        echo View::insert('layouts/footer');
    }

    public static function showFreeDevices()
    {
        $device = new DeviceModel();
        $devices = $device->findFreeDevices();
        echo View::render('devicePanel', $devices);
    }


    public static function editDevice($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new DeviceModel();
            $user = $user->findDeviceById($id);
            echo View::render('editDevice', $user);
        }
    }

    public static function deviceProfileView($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $user = new DeviceModel();
            $user = $user->findDeviceById($id);
            echo View::render('deviceProfile', $user);
        }
    }



}