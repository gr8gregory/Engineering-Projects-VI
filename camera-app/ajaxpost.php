<?php

$photo_location = $_POST['picture'];
//Conver to a readable format 
$img = str_replace(' ','+',$photo_location);
$imgData =  substr($img,strpos($img,",")+1);
$decodedData = base64_decode($imgData);

$file = "face.png";

file_put_contents($file, $decodedData);


$host = "76.71.52.14";
$port = 65432;
// No Timeout 

set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect toserver\n");

socket_write($socket, $decodedData, strlen($decodedData)) or die("Could not send data to server\n");

$result = socket_read ($socket, 1024) or die("Could not read server response\n");
echo "Reply From Server  :".$result;
socket_close($socket);

?>