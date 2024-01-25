<?php
    include 'DB.php';
    $value = $_POST['submeter'];

    //servico tecnico
    if($value == 'servico'){
        try {
            $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['servico']);
                      
            $stmt = $conn->prepare(" DELETE FROM servicotecnico WHERE servico_id = ? ");
            $stmt->bind_param("i", $servico);
                                 
            if ($stmt->execute()) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Serviço Apagado");';
                echo 'window.location.href = "paginaServico.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
            $msg =  " " . $th->getMessage();
            echo '<script type="text/javascript">';
            echo 'alert("'.$msg.'");';
            echo 'window.location.href = "paginaServico.php";';
            echo '</script>';
        }
        
    }
    //Local de execucao
    if($value == 'local'){
        try {
            $local = preg_replace('/(\d+)\s.*/', '$1', $_POST['local']);
                         
            $stmt = $conn->prepare(" DELETE FROM localexecucao WHERE loc_id = ? ");
            $stmt->bind_param("i", $local);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Local anexado apagado");';
                echo 'window.location.href = "paginaServico.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "paginaServico.php";';
                echo '</script>';
        }
        
    }

    //Equipamento
    if($value == 'equipamento'){
        try {
            $modelo = $_POST['modelo'];
                         
            $stmt = $conn->prepare(" DELETE FROM equipamento WHERE eqm_modelo = ? ");
            $stmt->bind_param("s", $modelo);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Equipamento apagado");';
                echo 'window.location.href = "material.php";';
                echo '</script>'; 

            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "material.php";';
                echo '</script>'; 
        }
        
    }

    //lista de material
    if($value == 'lista'){
        try {
            $lista = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectLista']);
                         
            $stmt = $conn->prepare(" DELETE FROM listamaterial WHERE id_servico = ? ");
            $stmt->bind_param("i", $lista);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("item da lista removido");';
                echo 'window.location.href = "material.php";';
                echo '</script>'; 

            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }             
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "material.php";';
                echo '</script>'; 
        }
        
    }
    if($value == 'listaOne'){
        try {
            $lista = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectLista']);
                         
            $stmt = $conn->prepare(" DELETE FROM listamaterial WHERE id_eqm = ?");
            $stmt->bind_param("i", $lista);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("item da lista removido");';
                echo 'window.location.href = "material.php";';
                echo '</script>'; 

            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }             
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "material.php";';
                echo '</script>'; 
        }
        
    }


    //Clientes
    if($value == 'cliente'){
        try {
            $cliente = $_POST['selectCliente'];
                         
            $stmt = $conn->prepare(" DELETE FROM cliente WHERE cliente_email = ? ");
            $stmt->bind_param("s", $cliente);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Cliente removido");';
                echo 'window.location.href = "paginaCliente.php";';
                echo '</script>'; 

            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }             
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "paginaCliente.php";';
                echo '</script>'; 
        }
        
    } 
    //historico
    if($value == 'historico'){
        try {
            $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['servico']);
                         
            $stmt = $conn->prepare(" DELETE FROM historico WHERE id_servico = ? ");
            $stmt->bind_param("i", $servico);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Historico Apagado");';
                echo 'window.location.href = "historico.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "historico.php";';
                echo '</script>'; 
        }
        
    }  
    
    //telefone
    if($value == 'telefone'){
        try {
            $telefone = $_POST['telefone'];
                         
            $stmt = $conn->prepare(" DELETE FROM telefone WHERE telefone_numero = ? ");
            $stmt->bind_param("s", $telefone);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("'.$telefone.'");';
                echo 'alert("Numero de telefone removido");';
                echo 'window.location.href = "paginaCliente.php";';
                echo '</script>'; 

            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }             
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "paginaCliente.php";';
                echo '</script>'; 
        }
    }

    //Relatorio
    if($value == 'relatorio'){
        try {
            $relatorio = $_POST['selectRelatorio'];
                         
            $stmt = $conn->prepare(" DELETE FROM relatorio WHERE rel_id = ? ");
            $stmt->bind_param("i", $relatorio);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Relatorio Apagado");';
                echo 'window.location.href = "paginaRelatorio.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "paginaRelatorio.php";';
                echo '</script>'; 
        }
        
    }

    //Levantamento
    if($value == 'levantamento'){
        try {
            $levantamento = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectLevantamento']);
                         
            $stmt = $conn->prepare(" DELETE FROM levantamento WHERE lev_id = ? ");
            $stmt->bind_param("i", $levantamento);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Levantamento Apagado");';
                echo 'window.location.href = "paginaLevantamento.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "paginaLevantamento.php";';
                echo '</script>'; 
        }
            
    }

    //tecnico
    if($value == 'tecnico'){
        try {
            $nome = $_POST['nome'];
                         
            $stmt = $conn->prepare(" DELETE FROM tecnico WHERE tec_nome = ? ");
            $stmt->bind_param("s", $nome);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Tecnico Apagado");';
                echo 'window.location.href = "admin.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "admin.php";';
                echo '</script>'; 
        }
            
    }

    //gestor
    if($value == 'gestor'){
        try {
            $nome = $_POST['nome'];
                         
            $stmt = $conn->prepare(" DELETE FROM gestor WHERE ges_nome = ? ");
            $stmt->bind_param("s", $nome);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Gestor Apagado");';
                echo 'window.location.href = "admin.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "admin.php";';
                echo '</script>'; 
        }
            
    }

    //estatistica
    if($value == 'estatistica'){
        try {
            $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['servico']);
                         
            $stmt = $conn->prepare(" DELETE FROM estatisticas WHERE id_servico = ? ");
            $stmt->bind_param("s", $nome);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Estatistica Apagado");';
                echo 'window.location.href = "estatistica.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "estatistica.php";';
                echo '</script>'; 
        }
            
    }
        //sistema
        if($value == 'sistemaServico'){
            try {
                $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['servico']);
                          
                $stmt = $conn->prepare(" DELETE FROM listasistema WHERE id_servico = ? ");
                $stmt->bind_param("i", $servico);
                                     
                if ($stmt->execute()) {
                    $stmt->close();
                    echo '<script type="text/javascript">';
                    echo 'alert("Lista de sistemas totalmente apagado");';
                    echo 'window.location.href = "paginaServico.php";';
                    echo '</script>';
                }else{
                    throw new Exception("Erro - Inseriu dados invalidos");
                }           
            }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo 'window.location.href = "paginaServico.php";';
                echo '</script>';
            }
            
        }

?>