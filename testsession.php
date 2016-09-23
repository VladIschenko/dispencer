<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 22.09.16
 * Time: 11:23
 */

session_start();

if(!isset($_SESSION['counter'])){
    $_SESSION['counter'] = 0;
}
$count = $_SESSION['counter'];
echo $count;
$_SESSION['counter'] += 1;


//session_destroy();