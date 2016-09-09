<?php

//$data = file_get_contents('php://input');
//if(empty($data))
//{
//    header("HTTP/1.0 404 Not Found");
//} else {
//    fopen('input.bin', 'r');
//    $file = file_get_contents('input.bin');
//    file_put_contents("input.bin", $file . $data . "      " . "\n");
//}
//$input = file_get_contents("input.bin");

$filename = 'input.bin';
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);
$data = unpack("C*", $contents);
