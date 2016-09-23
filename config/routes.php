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
//    '/processStats' => 'DeviceController/processStats',
    '/processStats' => 'DeviceController/processStats2',
    '/viewStats' => 'DeviceController/viewStats',
    '/add-user' => 'UserController/addUser',
    '/save-user' => 'UserController/saveUser',
    '/userlist' => 'UserController/userListView',
    '/user/:num' => 'UserController/userProfileView/$1',
    '/edit/:num' => 'UserController/editProfile/$1',
    '/save-edit/:num' => 'UserController/updateProfile/$1',
    '/delete/:num' => 'UserController/deleteProfile/$1',
    '/test' => 'DeviceController/showFreeDevices',



    //Routes for GOD
    '/control/userlist' => 'GodController/ViewFullUserlist',
    '/control/userlist/type' => 'GodController/ViewUserlistByType',
    '/control/userlist/organisation' => 'GodController/ViewUserlistByOrganisation',
    '/control/userlist/search' => 'GodController/ViewUserlistBySearchPhrase',

    '/control/devices' => 'DeviceController/showFullDevicelist',
    '/control/devices/:num' => 'DeviceController/deviceProfileView/$1',
    '/control/devices/free' => 'DeviceController/showFreeDevicelist',
    '/control/devices/sold' => 'DeviceController/showSoldDevicelist',
    '/control/devices/insatlled' => 'DeviceController/showInsatlledDevicelist',

    '/control/logs' => 'LogsController/ViewFullLogslist',

    '/control/options' => 'OptionsController/ViewFullOptionslist',

    '/control/stats' => 'GodController/ViewStatsForGod',

);