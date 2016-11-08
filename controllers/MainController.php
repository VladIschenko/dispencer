<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 16:53
 */

namespace Controllers;

use Core\View;
use Models\UserModel;
use Models\DeviceModel;
use Models\LogsModel;
require "smsGateway/smsc_api.php";



class MainController
{
    public static function notFound()
    {
        $view = new View();
        echo $view->render('errors/notfound');
    }

    public  static function index()
    {
        if(isset($_SESSION['login']))
        {
            self::mapView();
        }else
        {
            UserController::loginFormView();
        }
    }

    public static function rememberMe()
    {
        if(empty($_SESSION['login']) && !empty($_COOKIE['remember']))
        {
            $user = new UserModel();
            list($selector, $authenticator) = explode(':', $_COOKIE['remember']);
            $authData = $user->findAuthToken($selector);

            if(hash_equals($authData['token'], hash('sha256', base64_decode($authenticator))))
            {
                $_SESSION['login'] = $user->getLoginById($authData['userid']);
                $_SESSION['id'] = $authData['userid'];
                $type = UserController::checkUserType();
                $_SESSION['type'] = $type;
                if (!empty($_SESSION['login']))
                {
//                    header("Refresh:0");
                }
            }
        }
    }

    public static function mapView()
    {
        $view = new View();
        echo $view->render('main');
    }

    public static function sendPage()
    {
        $view = new View();
        echo $view->render('CRUTCH');
    }

    public static function sendSms()  //CRUTCH!!!!!
    {
        $user = new UserModel();
        $device = new DeviceModel();
        $deviceUid = '00-04-a3-69-a8-03';
        $address = $device->getAddressById($deviceUid);
        $organisation = $device->getOrganisationById($deviceUid);
        $phones = $user->getAllPhonesFromOrganisation($organisation);
        $message = $_POST['message'];
        $sort = $_POST['sort'];
        $msg = $organisation . " " . $address . " " . $message . " " . $sort;
        for($i=0; $i<count($phones); $i++)
        {
            $phone = $phones[$i]['phone'];
            list($sms_id, $sms_cnt) = send_sms("$phone", "$msg", 0, 0, 0, 0);
        }
        header('Location: /send');

    }

    public static function statistic()
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            echo View::render('stats');
        }
    }

    public static function adminStatistic()
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            echo View::render('statsForAdmin');
        }
    }

}