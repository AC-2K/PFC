<?php
    include 'DB.php';
    $value = $_POST['criar'];

    //Local de execucao
    if($value == '1'){
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
    
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header(" ");
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
        
    }
    //Sistema de seguranca
    if($value == '2'){
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
    
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header(" ");
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
        
    }

    //Servico Tecnico
    if($value == '3'){
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
    
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header(" ");
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
        
    }

    //LEVANTAMENTO TECNICO
    if($value == 4){
        
        $codigoTecnico = $_POST['codigoTecnico'];
        $observacao = $_POST['observacao'];

        $query = " SELECT * from servico_tecnico ";
        $result = $conn->query($query);
        $row = []; 
        $soma = 0;

        if( $codigoTecnico == 0){ 
            $soma = 1;
        }

        $row = $result->fetch_all(MYSQLI_ASSOC);  

        
        if(!empty($row)){
            foreach($row as $rows){ 
                if($rows['cod_servico'] == $codigoTecnico){
                    $soma++;
                }
            } 
        }

        if($soma == 1){
            $sql = "INSERT INTO levantamento_tecnico (servico_cod, observacao) 
            VALUES ($codigoTecnico, '$observacao' )";
    
            if (mysqli_query($conn, $sql)) {
                header("Location: readLevantamento.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        }
        else{
            echo '<script type="text/JavaScript"> alert("Codigo de levantamento Invalido"); </script>';
            mysqli_close($conn);
            header("Location: criarLevantamento.php");
        }

    }
?>