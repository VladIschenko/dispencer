<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:32
 */

return $routes = array(
//    '' => 'UserController/loginFormView',
//    '/' => 'UserController/loginFormView',
    '/' => 'MainController/index',
    '/login' => 'UserController/login',
    '/logout' => 'UserController/logout',
    '/stats' => 'DeviceController/stats',
    '/processStats' => 'DeviceController/processStats',
    '/viewStats' => 'DeviceController/viewStats',
    '/add-user' => 'UserController/addUser',
    '/save-user' => 'UserController/saveUser',
    '/userlist' => 'UserController/userListView',
    '/user/:num' => 'UserController/userProfileView/$1',
    '/edit/:num' => 'UserController/editProfile/$1',
    '/save-edit/:num' => 'UserController/updateProfile/$1',
    '/delete/:num' => 'UserController/deleteProfile/$1'
);