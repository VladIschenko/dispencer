<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 25.08.16
 * Time: 14:32
 */

return $routes = array(
    '/' => 'MainController/index',
    '/login' => 'UserController/login',
    '/logout' => 'UserController/logout',
    '/stats' => 'DeviceController/stats',
    '/processStats' => 'DeviceController/processStats2',
    '/viewStats' => 'DeviceController/viewStats',
    '/add-user' => 'UserController/addUser',
    '/save-user' => 'UserController/saveUser',
    '/userlist' => 'UserController/userListView',
    '/user/:num' => 'UserController/userProfileView/$1',
    '/edit/:num' => 'UserController/editProfile/$1',
    '/save-edit/:num' => 'UserController/updateProfile/$1',
    '/delete/:num' => 'UserController/deleteProfile/$1',

    //Routes for GOD
    '/control/userlist' => 'GodController/ViewFullUserlist',
    '/control/userlist/type' => 'GodController/ViewUserlistByType',
    '/control/userlist/organisation' => 'GodController/ViewUserlistByOrganisation',
    '/control/userlist/search' => 'GodController/ViewUserlistBySearchPhrase',

    //Routes for Devices
    '/control/devices' => 'DeviceController/showFullDevicelist',
    '/control/devices/:num' => 'DeviceController/deviceProfileView/$1',
    '/control/devices/firmware/:any'  => 'DeviceController/updateFirmware/$1',
    '/control/devices/sms/:num'  => 'DeviceController/changeSmsNotification/$1',
    '/control/devices/add'  => 'DeviceController/addDevice',
    '/control/devices/save'  => 'DeviceController/saveDevice',
    '/devices/edit/:num'  => 'DeviceController/editDevice/$1',
    '/devices/save/:num'  => 'DeviceController/updateDevice/$1',
    '/conf-devices/save/:num'  => 'ChannelController/addSortsOnChannel/$1',


    //Routes for Logs
    '/control/logs' => 'LogsController/ViewFullLogslist',
    '/control/logs/:any'  => 'LogsController/ViewLogsById/$1',

    //Routes for Options
    '/control/options' => 'OptionsController/ViewFullOptionslist',

    //Routes for Stats
    '/control/stats' => 'GodController/ViewStatsForGod',

    //Routes for beer
    '/beerlist' => 'BeerController/showBeerlist',
    '/beer/edit/:num' => 'BeerController/editBeerView/$1',
    '/beer/update/:num' => 'BeerController/editBeer/$1',
    '/beer/add' => 'BeerController/addBeerView',
    '/beer/save' => 'BeerController/save',
    '/beer/delete/:num' => 'BeerController/deleteBeer/$1',

    //Routes for channels
    '' => ''

);