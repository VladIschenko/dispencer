<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 22.09.16
 * Time: 11:23
 */

$request = "FW page retry 89";

//$request = (substr($request,14) * 256) - 256;
$request = (substr($request,0,13));
echo $request;