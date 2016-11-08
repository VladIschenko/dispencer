<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 02.11.16
 * Time: 16:04
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("IN_PARSER_MODE", "true");


require 'requestHandler/DispenserProcessor.php';
require 'requestHandler/DispenserProcessorTest.php';
require 'requestHandler/Crc32.php';
require 'core/Db.php';
require 'models/DeviceModel.php';
require 'models/UserModel.php';
require 'models/LogsModel.php';
require 'models/OptionsModel.php';
require "smsGateway/smsc_api.php";


$process = new \Handler\DispenserProcessorTest();

$process->processData();