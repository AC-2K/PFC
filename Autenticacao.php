<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','pfc');

    
    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $_SESSION["usuario"] = 0;
      
    $query = " SELECT * from tecnico where `tec_nome` ='". $user ."' and tec_pass='".$pass."'";
    $result = $link->query($query);
          
        if (mysqli_num_rows($result) == 1) {
            echo '<script type="text/javascript">';
            echo 'alert("Bem vindo - Tecnico");';;
            echo 'window.location.href = "mainPage.php";';
            echo '</script>';
        } else {
            $_SESSION["usuario"] = 1;
            $query = "SELECT * FROM gestor WHERE ges_nome = '". $user ."' AND ges_pass = '".$pass."' ";
            $result = mysqli_query($link,$query);
            if (mysqli_num_rows($result) == 1) {
                echo '<script type="text/javascript">';
                echo 'alert("Bem vindo - Gestor");';;
                echo 'window.location.href = "mainPage.php";';
                echo '</script>';
            }else {
                $_SESSION["usuario"] = 2;
                $query = "SELECT * FROM admin WHERE ad_user = '". $user ."' AND ad_pass = '".$pass."' ";
                $result = mysqli_query($link,$query);
                if (mysqli_num_rows($result) == 1) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Bem vindo - Admin");';;
                    echo 'window.location.href = "mainPage.php";';
                    echo '</script>';
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Usuario invalido");';;
                    echo 'window.location.href = "sair.php";';
                    echo '</script>';
                }
            }
        }

?>
