<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 20.10.16
 * Time: 16:07
 */

$checkPage = file_get_contents('firmware.log');

if(!isset($_SESSION['count']) && $checkPage != 0){
    echo "lalala";
}