<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:27
 */

namespace Controllers;

use Core\View;
use Models\BeerModel;
use Models\DeviceModel;
use Models\MainModel;

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
        $helper = new MainModel();

        $organisationsList = $helper->findAllOrganisations();
        echo View::insert('layouts/header');
        echo View::insert('templates/devicePanel', $organisationsList);
        if (isset($_POST['device-organisation'])){
            $organisation = $_POST['device-organisation'];
            $devices = $device->findDevicesByOrganisation($organisation);
            echo View::insert('templates/devicePanel/soldDevices', $devices);
        }
        if(!isset($_POST['device-type']) and !isset($_POST['device-organisation'])){
            $installedDevices = $device->findInstalledDevices();
            echo View::insert('templates/devicePanel/installedDevices', $installedDevices);
        }elseif(isset($_POST['device-type']) and $_POST['device-type'] == 'Свободные'){
            $freeDevices = $device->findFreeDevices();
            echo View::insert('templates/devicePanel/freeDevices', $freeDevices);
        }elseif(isset($_POST['device-type']) and $_POST['device-type'] == 'Проданные'){
            $soldDevices = $device->findSoldDevices();
            echo View::insert('templates/devicePanel/soldDevices', $soldDevices);
        }elseif(isset($_POST['device-type']) and $_POST['device-type'] == 'Установленные'){
            $installedDevices = $device->findInstalledDevices();
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
            $device = new DeviceModel();
            $device = $device->findDeviceById($id);
            echo View::render('editDevice', $device);
        }
    }

    public static function deviceProfileView($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $beers = new BeerModel();
            $beerList = $beers->findAllSorts();
            $sorts = $beers->findSortsOnDeviceChannels($id);
            $device = new DeviceModel();
            $status = $device->checkSmsNotifications($id);
            $device = $device->findDeviceById($id);
            $data = array_merge($beerList, $device);
            $data = array_merge($data, $sorts);
            $device['sms_status'] = $status;
            echo View::render('deviceProfile', $data);
        }
    }

    public static function updateFirmware($id)
    {
        $device = new DeviceModel();
        $device->changeFirmwareStatusToStanby($id);
        header('Location: /control/devices');

    }

    public static function changeSmsNotification($id)
    {
        $device = new DeviceModel();
        $status = $device->checkSmsNotifications($id);
        if($status == 1)
        {
            $device->changeSmsNotificationsToNotNeeded($id);
            header("Location: /control/devices/$id");
        }elseif($status == 0){
            $device->changeSmsNotificationsToNeeded($id);
            header("Location: /control/devices/$id");

        }
    }

    public static function addDevice()
    {
        $view = new View();
        if(!isset($_SESSION['login'])){
            echo $view->render('errors/unauthorized');
        }else{
            echo $view->render('addDevice');
        }
    }

    public static function saveDevice()
    {
        $device = new DeviceModel();
        if ($device->deviceExists($_POST['device_id'])) {
            echo "device exist";
        }else{
                $device->setDeviceId($_POST['device_id']);
            if(empty($_POST['organisation'])){
                $device->setOrganisation(NULL);
            }else{
                $device->setOrganisation($_POST['organisation']);
            }
            if(empty($_POST['installation_date'])){
                $device->setOrganisation(NULL);
            }else{
                $device->setInstallationDate($_POST['installation_date']);
            }
            if(empty($_POST['installation_address'])){
                $device->setOrganisation(NULL);
            }else{
                $device->setInstallationAddres($_POST['installation_address']);
            }
            if(empty($_POST['inventory_number'])){
                $device->setOrganisation(NULL);
            }else{
                $device->setInventoryNumber($_POST['inventory_number']);
            }
            if(empty($_POST['installer_name'])){
                $device->setOrganisation(NULL);
            }else{
                $device->setInstallerName($_POST['installer_name']);
            }
                $device->save();
        }
//        header('Location: /control/devices');
    }

    public static function updateDevice($id)
    {
        $device = new DeviceModel();
        $device->setDeviceId($_POST['device-id']);
        $device->setCustomerId($_POST['customer']);
        $device->setOrganisation($_POST['organisation']);
        $device->setInstallationDate($_POST['installation-date']);
        $device->setInstallationAddres($_POST['installation-address']);
        $device->setInventoryNumber($_POST['inventory-number']);
        $device->setInstallerName($_POST['installer']);
//      $user->checkIsValidForRegister();
        $device->update($id);
        header('Location: /control/devices');
    }

    public static function saveConfiguration($id)
    {
        var_dump($_POST);
    }

}


































