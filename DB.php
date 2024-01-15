<?php
   session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "pfc";

   if (!isset($_SESSION["usuario"])) {
      echo '<script type="text/javascript">';
      echo 'alert("Pagina indisponivel, nao acedeu");';;
      echo 'window.location.href = "index.php";';
      echo '</script>';
  }

     
   // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }

    function phpAlert($msg) {
      echo '<script type="text/javascript">';
      echo 'alert("' . $msg . '");';
      echo '</script>';
  }
?>

