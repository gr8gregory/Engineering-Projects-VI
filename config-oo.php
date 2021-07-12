<?php
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
   

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "elevator";

    $link = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if($link->connect_error){
        die("ERROR: Could not connect. " . $link->connect_error());
    }
?>