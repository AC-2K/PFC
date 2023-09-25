<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "pfc";

     
   // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }
?>

