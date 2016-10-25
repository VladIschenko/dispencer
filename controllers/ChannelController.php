<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 07.10.16
 * Time: 9:37
 */

namespace Controllers;

use Core\View;
use Models\BeerModel;
use Models\ChannelModel;
use Models\DeviceModel;
use Models\UserModel;

class ChannelController
{
    public static function addSortsOnChannel($id)
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $channels = new ChannelModel();
            $beer = new BeerModel();
            $device = new DeviceModel();
            $channels->setDeviceId($device->findIdByDeviceId($_POST['device-id']));
            $channels->setSort1Id($beer->getIdByName($_POST['channel1']));
            $channels->setSort2Id($beer->getIdByName($_POST['channel2']));
            $channels->setSort3Id($beer->getIdByName($_POST['channel3']));
            $channels->setConfigurationonChannels();
            header("Location: /control/devices/" . $_POST['id']);
        }
    }

}
