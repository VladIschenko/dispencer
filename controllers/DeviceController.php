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
use Models\UserModel;

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

    public static function findAllDevices()
    {
        if(isset($_SESSION['login'])){
            $device = new DeviceModel();
            $allDevices = $device->findAllDevices();
            echo View::render('devicePanel/installedDevices', $allDevices);
        }else{
            echo View::render('errors/unauthorized');
        }
    }

    public static function findInstalledDevices()
    {
        if(isset($_SESSION['login'])){
            $device = new DeviceModel();
            $installedDevices = $device->findInstalledDevices();
            echo View::render('devicePanel/installedDevices', $installedDevices);
        }else{
            echo View::render('errors/unauthorized');
        }
    }

    public static function findSoldDevices()
    {
        if(isset($_SESSION['login'])){
            $device = new DeviceModel();
            $soldDevices = $device->findSoldDevices();
            echo View::render('devicePanel/soldDevices', $soldDevices);
        }else{
            echo View::render('errors/unauthorized');
        }
    }

    public static function findFreeDevices()
    {
        if(isset($_SESSION['login'])){
            $device = new DeviceModel();
            $freeDevices = $device->findFreeDevices();
            echo View::render('devicePanel/freeDevices', $freeDevices);
        }else{
            echo View::render('errors/unauthorized');
        }
    }

    public static  function showFullDevicelist()
    {
        if(isset($_SESSION['login'])){
            $device = new DeviceModel();
            $helper = new MainModel();

            if($_SESSION['type'] == 'god'){
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
            }else{
                echo View::insert('layouts/header');
                $user = new UserModel();
                $organisation = $user->getOrganisationById($_SESSION['id']);
                $devices = $device->findDevicesByOrganisation($organisation);
                echo View::insert('templates/devicePanel/installedDevices', $devices);
                echo View::insert('layouts/footer');
            }

        }else{
            echo "Доступ запрещен, необходима авторизация!";
        }

    }

    public static function ViewDevicelistBySearchPhrase()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            //TODO только для демонстрации, потом убрать
            ini_set('display_errors', 0);
            //****************
            $device = new DeviceModel();
            $search = $_POST['search'];
            $devicelist = $device->findBySearchPhrase($search);
            $devicelist[0]['title'] = 'Результат';
            echo View::render('devicePanel/installedDevices', $devicelist);
        }
    }

    public static function showFreeDevices()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $device = new DeviceModel();
            $devices = $device->findFreeDevices();
            echo View::render('devicePanel', $devices);
        }
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
            $device = new DeviceModel();
            $id = $device->findIdByDeviceId($id);
            $beers = new BeerModel();
            $beerList = $beers->findAllSorts();
            $sorts = $beers->findSortsOnDeviceChannels($id);
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
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $device = new DeviceModel();
            $device->changeFirmwareStatusToStanby($id);
            header('Location: /control/devices/' . $id);
        }

    }

    public static function undoUpdateFirmware($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $device = new DeviceModel();
            $device->changeFirmwareStatusToNotRequired($id);
            header('Location: /control/devices/' . $id);
        }

    }

    public static function changeSmsNotification($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $device = new DeviceModel();
            $status = $device->checkSmsNotifications($id);
            if ($status == 1) {
                $device->changeSmsNotificationsToNotNeeded($id);
                header("Location: /control/devices/$id");
            } elseif ($status == 0) {
                $device->changeSmsNotificationsToNeeded($id);
                header("Location: /control/devices/$id");

            }
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
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $device = new DeviceModel();
            if ($device->deviceExists($_POST['device-id'])) {
                echo "device exist";
            } else {
                $device->setDeviceId($_POST['device-id']);
                if (empty($_POST['organisation'])) {
                    $device->setOrganisation(NULL);
                } else {
                    $device->setOrganisation($_POST['organisation']);
                }
                if (empty($_POST['installation-date'])) {
                    $device->setInstallationDate(NULL);
                } else {
                    $device->setInstallationDate($_POST['installation-date']);
                }
                if (empty($_POST['installation-city'])) {
                    $device->setInstallationCity(NULL);
                } else {
                    $device->setInstallationCity($_POST['installation-city']);
                }
                if (empty($_POST['installation-street'])) {
                    $device->setInstallationStreet(NULL);
                } else {
                    $device->setInstallationStreet($_POST['installation-street']);
                }
                if (empty($_POST['installation-house-number'])) {
                    $device->setInstallationHouseNumber(NULL);
                } else {
                    $device->setInstallationHouseNumber($_POST['installation-house-number']);
                }
                if (empty($_POST['inventory-number'])) {
                    $device->setInventoryNumber(NULL);
                } else {
                    $device->setInventoryNumber($_POST['inventory-number']);
                }
                if (empty($_POST['installer-name'])) {
                    $device->setInstallerName(NULL);
                } else {
                    $device->setInstallerName($_POST['installer-name']);
                }
                $device->save();
            }
        }
        header('Location: /control/devices');
    }

    public static function updateDevice($id)
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $device = new DeviceModel();
            $device->setDeviceId($_POST['device-id']);
            if (empty($_POST['customer'])) {
                $device->setCustomerId(NULL);
            } else {
                $device->setCustomerId($_POST['customer']);
            }
            if (empty($_POST['organisation'])) {
                $device->setOrganisation(NULL);
            } else {
                $device->setOrganisation($_POST['organisation']);
            }
            if (empty($_POST['installation-date'])) {
                $device->setInstallationDate(NULL);
            } else {
                $device->setInstallationDate($_POST['installation-date']);
            }
            if (empty($_POST['installation-city'])) {
                $device->setInstallationCity(NULL);
            } else {
                $device->setInstallationCity($_POST['installation-city']);
            }
            if (empty($_POST['installation-street'])) {
                $device->setInstallationStreet(NULL);
            } else {
                $device->setInstallationStreet($_POST['installation-street']);
            }
            if (empty($_POST['installation-house-number'])) {
                $device->setInstallationHouseNumber(NULL);
            } else {
                $device->setInstallationHouseNumber($_POST['installation-house-number']);
            }
            if (empty($_POST['inventory-number'])) {
                $device->setInventoryNumber(NULL);
            } else {
                $device->setInventoryNumber($_POST['inventory-number']);
            }
            if (empty($_POST['installer-name'])) {
                $device->setInstallerName(NULL);
            } else {
                $device->setInstallerName($_POST['installer-name']);
            }
            $device->update($id);
            header('Location: /control/devices');
        }
    }

    public static function saveConfiguration($id)
    {
        var_dump($_POST);
    }


    public static function sellDevice($deviceUid)
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            echo View::render('sell');
        }
    }

}


































