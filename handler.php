<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("IN_PARSER_MODE", "true");

session_start();


require 'requestHandler/DispenserProcessor.php';
require 'requestHandler/Crc32.php';
require 'core/Db.php';
require 'models/DeviceModel.php';
require 'models/UserModel.php';
require 'models/LogsModel.php';
require "smsGateway/smsc_api.php";
require "helpers/DeviceHelper.php";


$process = new \Handler\DispenserProcessor();

$process->processData();