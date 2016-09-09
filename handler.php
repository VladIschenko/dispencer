<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("IN_PARSER_MODE", "true");

require 'requestHandler/DispenserProcessor.php';
require 'requestHandler/Crc32.php';

$process = new \Handler\DispenserProcessor();

$process->processData();