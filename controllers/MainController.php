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
    public function __construct()
    {
        echo "We are in main __construct";
    }

    public static function notFound()
    {
        $view = new View();
        echo $view->render('errors/notfound');
    }

    public  static function index()
    {
        if(isset($_SESSION['login']))
        {
            DeviceController::stats();
        } else {
            UserController::loginFormView();
        }
    }

    public static function test()
    {

    }
}