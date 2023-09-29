<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "pfc";

   // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
   // if error occurs 
   if ($conn -> connect_error){
      echo "Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
   }

    //Metodos DB
    $sql="SELECT * FROM cliente";
    $result = ($conn->query($sql));
    
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($data);
    
?>


