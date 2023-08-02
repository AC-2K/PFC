<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','pfc');

    
    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $_SESSION["usuario"] = $user;
      
    $query = " SELECT * from tecnico where `t.nome` ='". $user ."' and pass='".$pass."'";
    $result = $link->query($query);
          
        if (mysqli_num_rows($result) == 1) 
        {
            echo '<script type="text/JavaScript"> alert("Bem vindo - Tecnico"); </script>';
            header("Location: tecnicoPage.php");
        } 
        else 
        {
            $query = "SELECT * FROM gestor WHERE nome = '". $user ."' AND password = '".$pass."' ";
            $result = mysqli_query($link,$query);
            if (mysqli_num_rows($result) == 1) 
            {
                echo '<script type="text/JavaScript"> alert("Bem vindo - Gestor"); </script>';
                header("Location: mainPage.php");
            }
            else{
                echo '<script type="text/JavaScript"> alert("Usuario invalido"); </script>';
                header("Location: auth-signin.html");
            }
        }

?>
