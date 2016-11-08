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
    public static function ViewFullOptionslist()
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

    public static function ViewFullOptionsForDevice($deviceUid)
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            //TODO убрать и изменить, когда будет реализован обмен настройками
            ini_set('display_errors', 0);
            //****************************
            $options = new OptionsModel();
            $device = new DeviceModel();
            $fullOptions = $options->findById($deviceUid);
            $fullOptions['tableDeviceId'] = $device->findIdByDeviceId($deviceUid);
            $fullOptions['deviceUid'] = $deviceUid;
            echo View::render('optionProfile', $fullOptions);
        }
    }

    public static function editOptions($deviceUid)
    {
        $options = new OptionsModel();
        $device = new DeviceModel();
        $fullOptions = $options->findById($deviceUid);
        if(!$fullOptions['device_id'])
        {
            $fullOptions['device_id'] = $deviceUid;
        }
        if(!isset($fullOptions['hw_config']))
        {
            $fullOptions['hw_config'] = 'Не установлено';
        }
        $fullOptions['tableDeviceId'] = $device->findIdByDeviceId($deviceUid);
        echo View::render('editOptions', $fullOptions);
    }

    public static function save($deviceUid)
    {
        $options = new OptionsModel();
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            if(empty($_POST['newtime'])){
                $_POST['newtime'] = $options->checkTime($deviceUid);
            }
            if(empty($_POST['scheme'])){
                $_POST['scheme'] = $options->checkHwConfig($deviceUid);
            }
                $options->setHwConfig($_POST['scheme']);
                $options->setSensor1($_POST['sensor1']);
                $options->setSensor2($_POST['sensor2']);
                $options->setStartVolume1($_POST['startVolume1']);
                $options->setStartVolume2($_POST['startVolume2']);
                $options->setStartVolume3($_POST['startVolume3']);
                $options->setEndVolume1($_POST['endVolume1']);
                $options->setEndVolume2($_POST['endVolume2']);
                $options->setEndVolume3($_POST['endVolume3']);
                $options->setCleanserVolume1($_POST['cleanserVolume1']);
                $options->setCleanserVolume2($_POST['cleanserVolume2']);
                $options->setCleanserVolume3($_POST['cleanserVolume3']);
                $options->setCleanserDelay1($_POST['cleanserDelay1']);
                $options->setCleanserDelay2($_POST['cleanserDelay2']);
                $options->setCleanserDelay3($_POST['cleanserDelay3']);
                $options->setConcentrateVolume($_POST['concentrate']);
                $options->setWaterMixVolume($_POST['waterMixVolume']);
                $options->setFlowSpeedMin($_POST['flowSpeedMin']);
                $options->setFlowmeterPerformance1($_POST['flowmeterPerformance1']);
                $options->setFlowmeterPerformance2($_POST['flowmeterPerformance2']);
                $options->setFlowmeterPerformance3($_POST['flowmeterPerformance3']);
                $options->setFlowmeterPerformance4($_POST['flowmeterPerformance4']);
                $options->setSanitizationMinInterval($_POST['sanitizationMinInterval']);
                $options->setSanitizationMaxInterval($_POST['sanitizationMaxInterval']);
                $options->setTime($_POST['newtime']);
                $options->save($deviceUid);
        }
        header('Location: /options/edit/' . $deviceUid);
    }
}