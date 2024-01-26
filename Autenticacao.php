<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','pfc');
    $somaAdmin = 0;
    $somaGestor = 0;
    $somaTecnico = 0;
    
    $user = $_POST['username'];
    $pass = $_POST['pass'];


    $_SESSION["usuario"] = 0;
      
    $stmt = $link->prepare(" SELECT * from tecnico where `tec_nome` = ?");
    $stmt->bind_param("s", $user);


    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    $data = $result->fetch_all(MYSQLI_ASSOC);  
          
        if (mysqli_num_rows($result) == 1) {
            
            foreach($data as $datas){ 
                
                $hashed_password = $datas['tec_pass'];

                if(password_verify($pass, $hashed_password)) {
                    
                    echo '<script type="text/javascript">';
                    echo 'alert("Bem vindo - Tecnico");';;
                    echo 'window.location.href = "mainPage.php";';
                    echo '</script>';
                }
            }
        
        }
        $somaTecnico = 1; 
        
    $stmt2 = $link->prepare(" SELECT * from gestor where `ges_nome` = ?");
    $stmt2->bind_param("s", $user);  
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $data2 = [];
    $data2 = $result2->fetch_all(MYSQLI_ASSOC); 
        if (mysqli_num_rows($result2) == 1) {
            $_SESSION["usuario"] = 1;
            foreach($data2 as $datas){ 
                
                $hashed_password = $datas['ges_pass'];

                if(password_verify($pass, $hashed_password)) {
                    
                    echo '<script type="text/javascript">';
                    echo 'alert("Bem vindo - Gestor");';;
                    echo 'window.location.href = "mainPage.php";';
                    echo '</script>';
                }
            }
            
        }
        $somaGestor = 1;

    $stmt3 = $link->prepare(" SELECT * from admin where `ad_user` = ?");
    $stmt3->bind_param("s", $user);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $data3 = [];
    $data3 = $result3->fetch_all(MYSQLI_ASSOC); 
        if (mysqli_num_rows($result3) == 1) {
            $_SESSION["usuario"] = 2;
            foreach($data3 as $datas){ 
                
                $hashed_password = $datas['ad_pass'];

                if(password_verify($pass, $hashed_password)) {
                    
                    echo '<script type="text/javascript">';
                    echo 'alert("Bem vindo - Admin");';;
                    echo 'window.location.href = "mainPage.php";';
                    echo '</script>';
                }
            }
            
        }
        $somaAdmin = 1;
          
        if ($somaAdmin > 0 && $somaGestor > 0 && $somaTecnico > 0 ) {
            echo '<script type="text/javascript">';
            echo 'alert("Usuario invalido");';;
            echo 'window.location.href = "sair.php";';
            echo '</script>';
        } 
    echo $somaAdmin;
    echo $somaGestor;
    echo $somaTecnico;

?>
