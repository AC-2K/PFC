<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','pfc');
    $somaAdmin = 0;
    $somaTecnico = 0;
    $somaGestor = 0;

    
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
            goto gestor;          
        } else {
            //GOTO gestor
            gestor:

            $_SESSION["usuario"] = 1;
            $stmt = $link->prepare(" SELECT * from gestor where `ges_nome` = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
            $data = $result->fetch_all(MYSQLI_ASSOC);  

            if (mysqli_num_rows($result) == 1) {
                foreach($data as $datas){ 
                    $hashed_password = $datas['ges_pass'];
    
                    if(password_verify($pass, $hashed_password)) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Bem vindo - Gestor");';;
                        echo 'window.location.href = "mainPage.php";';
                        echo '</script>';
                    }
                }
                goto admin;    
            }else {
                //GOTO Admin 
                admin:

                $_SESSION["usuario"] = 2;
                $stmt = $link->prepare(" SELECT * from admin where `ad_user` = ?");
                $stmt->bind_param("s", $user);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = [];
                $data = $result->fetch_all(MYSQLI_ASSOC); 



                if (mysqli_num_rows($result) == 1) {
                    foreach($data as $datas){ 
                        $hashed_password = $datas['ad_pass'];
        
                        if(password_verify($pass, $hashed_password)) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Bem vindo - Admin");';;
                            echo 'window.location.href = "mainPage.php";';
                            echo '</script>';
                        }
                    } 
                }

                //Caso todos casos forem negados, serao rejeitados do programa

                $somaGestor++;
                $somaAdmin++;
                $somaTecnico++; 

                if ($somaAdmin > 0 && $somaGestor > 0 && $somaTecnico > 0 ) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Usuario invalido");';;
                    echo 'window.location.href = "sair.php";';
                    echo '</script>';
                } 
                
            }
        }

?>
