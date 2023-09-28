<?php
    include 'DB.php';
    $value = $_POST['submeter'];

    //servico tecnico
    if($value == 'servico'){
        try {
            $servico = $_POST['servico'];
            
            $sql = "select servico_id from servicotecnico WHERE servico_descricaoGeral = ? ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["servico_id"];
            }
                         
            $stmt = $conn->prepare(" DELETE FROM servicotecnico WHERE servico_id = ? ");
            $stmt->bind_param("i", $var1);
                                 
            if ($stmt->execute() ) {
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
        
    }
    //Local de execucao
    if($value == 'local'){
        try {
            $local = $_POST['local'];
                         
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
        
    }

    //lista de material
    if($value == 'lista'){
        try {
            $lista = $_POST['selectLista'];
                         
            $stmt = $conn->prepare(" DELETE FROM listamaterial WHERE list_id = ? ");
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
        
    } 
    //historico
    if($value == 'historico'){
        try {
            $servico = $_POST['servico'];
                         
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
        
    }  
    
    //telefone
    if($value == 'telefone'){
        try {
            $telefone = $_POST['telefone'];
                         
            $stmt = $conn->prepare(" DELETE FROM telefone WHERE telefone_numero = ? ");
            $stmt->bind_param("i", $telefone);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
    }

    //Relatorio
    if($value == 'relatorio'){
        try {
            $relatorio = $_POST['selectRelatorio'];
                         
            $stmt = $conn->prepare(" DELETE FROM relatorio WHERE id_servico = ? ");
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
        
    }

    //Levantamento
    if($value == 'levantamento'){
        try {
            $levantamento = $_POST['selectLevantamento'];
                         
            $stmt = $conn->prepare(" DELETE FROM levantamento WHERE id_servico = ? ");
            $stmt->bind_param("i", $levantamento);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Relatorio Apagado");';
                echo 'window.location.href = "paginaLevantamento.php";';
                echo '</script>';
            }else{
                throw new Exception("Erro - Inseriu dados invalidos");
            }           
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
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
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
            
    }

?>