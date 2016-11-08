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

    '/userlist/type/god' => 'GodController/ViewGodUserlist',
    '/userlist/type/superadmin' => 'GodController/ViewSuperadminUserlist',
    '/userlist/type/admin' => 'GodController/ViewAdminUserlist',
    '/userlist/type/technician' => 'GodController/ViewTechnicianUserlist',
    '/userlist/type/superuser' => 'GodController/ViewSuperuserUserlist',
    '/userlist/type/user' => 'GodController/ViewUserUserlist',



    //Routes for Devices
    '/control/devices' => 'DeviceController/findAllDevices',
    '/control/devices/:any' => 'DeviceController/deviceProfileView/$1',
    '/devices/update/:any'  => 'DeviceController/updateFirmware/$1',
    '/devices/undoUpdate/:any'  => 'DeviceController/undoUpdateFirmware/$1',
    '/control/devices/sms/:num'  => 'DeviceController/changeSmsNotification/$1',
    '/control/devices/add'  => 'DeviceController/addDevice',
    '/control/devices/save'  => 'DeviceController/saveDevice',
    '/devices/edit/:num'  => 'DeviceController/editDevice/$1',
    '/devices/save/:num'  => 'DeviceController/updateDevice/$1',
    '/conf-devices/save/:num'  => 'ChannelController/addSortsOnChannel/$1',
    '/control/device/search' => 'DeviceController/ViewDevicelistBySearchPhrase',


    '/devices/free'  => 'DeviceController/findFreeDevices',
    '/devices/sold'  => 'DeviceController/findSoldDevices',
    '/devices/installed'  => 'DeviceController/findInstalledDevices',


    '/sell/:any'  => 'DeviceController/sellDevice/$1',




    //Routes for Logs
    '/control/logs' => 'LogsController/ViewFullLogslist',
    '/control/logs/:any'  => 'LogsController/ViewLogsById/$1',

    //Routes for Options
    '/control/options' => 'OptionsController/ViewFullOptionslist',
    '/control/options/:any' => 'OptionsController/ViewFullOptionsForDevice/$1',
    '/options/edit/:any' => 'OptionsController/editOptions/$1',
    '/options/update/:any' => 'OptionsController/save/$1',

    //Routes for Stats


    //Routes for beer
    '/beerlist' => 'BeerController/showBeerlist',
    '/beer/edit/:num' => 'BeerController/editBeerView/$1',
    '/beer/update/:num' => 'BeerController/editBeer/$1',
    '/beer/add' => 'BeerController/addBeerView',
    '/beer/save' => 'BeerController/save',
    '/beer/delete/:num' => 'BeerController/deleteBeer/$1',

    //Routes for channels
    '' => '',

    '/test' => 'MainController/sendSms',
    '/send' => 'MainController/sendPage',
    '/statistics' => 'MainController/statistic',
    '/control/statistics' => 'MainController/adminStatistic'


);