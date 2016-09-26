<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 16:53
 */

namespace Controllers;

use Core\View;

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
        } else {
            UserController::loginFormView();
        }
    }

    public static function mapView()
    {
        $view = new View();
        echo $view->render('main');
    }
}