<?php


$photo_location = $_POST['picture'];
//Conver to a readable format 
$img = str_replace(' ','+',$photo_location);
$imgData =  substr($photo_location,strpos($photo_location,",")+1);
$decodedData = base64_decode($imgData);

//$decodedData = str_replace(' ','+',$decodedData);



$file = "face.png";

//file_put_contents($file, $decodedData);

$host = "76.71.52.14";
$port = 65432;
$BUFSIZ = 1024 * 3;
// No Timeout 

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");

$len = strlen($decodedData);

$length = sprintf("###L%dX",$len);
socket_write($socket, $length, strlen($length));
$result = socket_read ($socket, 1024);
//Echo the result to the console
socket_close($socket);

//Create another socket connection
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");


socket_write($socket, $decodedData, $len);


for ($i = 0; $i < 1; $i++)
{
  $read = socket_read($socket, 1024);
  if ($read[0] == '#')
  {
    //Error condition has been recieved 
    if($read[2] == '1')
    {
      echo "-1";
      //No Faces where detected in the photo

    }

    if($read[2] == '2')
    {
      echo "-2";
      //There were multiple faces detected in the picture

    }
  }
}


socket_close($socket);
?>

