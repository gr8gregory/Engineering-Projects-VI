<?php

include 'faceCompare.php';
$jsonDB = "face_encoding.json";
$photo_location = $_POST['picture'];
//Conver to a readable format 
$img = str_replace(' ','+',$photo_location);
$imgData =  substr($photo_location,strpos($photo_location,",")+1);
$decodedData = base64_decode($imgData);

//$decodedData = str_replace(' ','+',$decodedData);


$host = "127.0.0.1";
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




$file = fopen("face_encoding.json", "w");


for ($i = 0; $i < 3; $i++)
{
  
  $read = socket_read($socket, 1024);
  fwrite($file,$read,1024);
  echo $read;

    if($i == 0)
    {
      if ($read[0] == '#')
      {
        //Error condition has been recieved 
        if($read[2] == '1')
        {
          echo "-1";
          socket_close($socket);
          exit();
          //No Faces where detected in the photo

        }

        if($read[2] == '2')
        {
          echo "-2";
          socket_close($socket);
          exit();
          //There were multiple faces detected in the picture

        }
      }
    }
}

//Grab the facial encdoings from the JSON file
$buffer = json_decode(file_get_contents($jsonDB),TRUE);

//Init an array to store all the face encodings
$enc = (array) null;

//Move all the encdings to a new 1D array
for($x = 0; $x < 127; $x++)
{
echo $buffer[0][$x] . "<br>";
$enc[$x] = $buffer[0][$x];
}

//create a faceCompare class to add to databasae
$facecompare = new faceCompare();
$facecompare->connectToDatabase();
$result = $facecompare->inDatabase($enc, 0.6);
//$facecompare->addToDatabase("bob", $enc);







fclose($file);
socket_close($socket);
?>

