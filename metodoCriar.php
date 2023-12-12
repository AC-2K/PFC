<?php
    include 'DB.php';
    $value = $_POST['submeter'];

    //servico tecnico
    if($value == 'servico'){
        try {
            $duracao = $_POST['duracao'];
            $descricao = $_POST['descricao'];
            $estado = $_POST['selectEstado'];
            $dataInicio = $_POST['dataInicio'];
            $dataFim = $_POST['dataFim'];
            $aprovacao = $_POST['selectAprovacao'];
            $numeroEtapas = $_POST['numeroEtapas'];
            $tecnico = $_POST['tecnico'];
            $cliente = $_POST['cliente'];
            $tipo = $_POST['selectTipo'];

            if($aprovacao == 'Sim'){$aprovacao = 1;}
            if($aprovacao == 'Nao'){$aprovacao = 0;}
            
            $sql = "select tec_id from tecnico WHERE tec_nome = '$tecnico' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["tec_id"];
            }
             
            $sql3 = "select cliente_id from cliente WHERE cliente_nome = '$cliente' ";
            $result3 = ($conn->query($sql3));
            while($row3 = mysqli_fetch_assoc($result3)) {
                $var2 = $row3["cliente_id"];
            }
            
            $stmt = $conn->prepare(" INSERT INTO servicotecnico (servico_estDuracao ,servico_descricaoGeral ,servico_estado ,servico_dataInicio ,servico_dataFim ,servico_aprovacao ,servico_numeroEtapas ,servico_Tipo ,id_tec ,id_cliente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
            $stmt->bind_param("issssiisii", $duracao, $descricao, $estado, $dataInicio, $dataFim, $aprovacao, $numeroEtapas, $tipo, $var1, $var2);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Serviço criado");';
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
        //TODO se o servico for mudado para terminado, sera feito a insercao no historico sistema automaticamente
        
    }
    //Local de execucao
    if($value == 'local'){
        try {
            $servico =  preg_replace('/\D/', '', $_POST['servico']);
            $pais = $_POST['pais'];
            $provincia = $_POST['provincia'];
            $endereco = $_POST['endereco'];
            $estrutura = $_POST['estrutura'];
            
            $stmt = $conn->prepare(" INSERT INTO localexecucao (id_servico, loc_pais, loc_provincia, loc_endereco, loc_tipoEstrutura) VALUES (?, ?, ?, ?, ?) ");
            $stmt->bind_param("issss", $servico, $pais, $provincia, $endereco, $estrutura);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Local anexado criado");';
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
            $nome = $_POST['nome'];
            $fabricante = $_POST['fabricante'];
            $modelo = $_POST['modelo'];
             
            
            $stmt = $conn->prepare(" INSERT INTO equipamento (eqm_nome, eqm_fabricante, eqm_modelo) VALUES (?, ?, ?) ");
            $stmt->bind_param("sss", $nome, $fabricante, $modelo);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Equipamento criado");';
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
            $equipamento = $_POST['selectEquipamento'];
            $servico = $_POST['selectServico'];
            $sistema = $_POST['sistema'];
            $loja = $_POST['loja'];
            $quantidade = $_POST['quantidade'];

            $sql = "select eqm_id from equipamento WHERE eqm_modelo = '$equipamento' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["eqm_id"];
            }

            $sql2 = "select servico_id from servicotecnico WHERE servico_id = '$servico' ";
            $result2 = ($conn->query($sql2));
            while($row2 = mysqli_fetch_assoc($result2)) {
                $var2 = $row2["servico_id"];
            }

            $sql3 = "select sis_id from sistemaseguranca WHERE sis_designacao = '$sistema' ";
            $result3 = ($conn->query($sql3));
            while($row3 = mysqli_fetch_assoc($result3)) {
                $var3 = $row3["sis_id"];
            }
             
            
            $stmt = $conn->prepare(" INSERT INTO listamaterial (id_eqm, id_servico, id_sis, list_loja, list_quantidade) VALUES (?, ?, ?, ?, ?) ");
            $stmt->bind_param("iiisi", $var1, $var2, $var3, $loja, $quantidade);

                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("item da lista criado");';
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
            $nome = $_POST['nome'];
            $mail = $_POST['mail'];
            $selectTipo = $_POST['selectTipo'];
            $selectGenero = $_POST['selectGenero'];
            $responsavel = $_POST['responsavel'];
            $var = 0;
            
            $stmt = $conn->prepare(" INSERT INTO cliente (cliente_nome,cliente_email,cliente_sexo,cliente_tipo,cliente_responsavel,cliente_numServico) VALUES (?, ?, ?, ?, ?,?) ");
            $stmt->bind_param("sssssi", $nome, $mail, $selectTipo, $selectGenero, $responsavel, $var);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Cliente criado");';
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
    
    //telefone
    if($value == 'telefone'){
        try {
            $telefone = $_POST['telefone'];
            $selectCliente = $_POST['selectCliente'];
            
             
            $sql3 = "select cliente_id from cliente WHERE cliente_nome = '$selectCliente' ";
            $result3 = ($conn->query($sql3));
            while($row3 = mysqli_fetch_assoc($result3)) {
                $var2 = $row3["cliente_id"];
            }
            
            $stmt = $conn->prepare(" INSERT INTO telefone (id_cliente ,telefone_numero) VALUES (?, ?) ");
            $stmt->bind_param("is", $var2, $telefone);
                                 
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Telefone criado");';
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
            $selectServico = $_POST['selectServico'];
            $data = $_POST['data'];
            $descricao = $_POST['descricao'];
            $etapa = $_POST['etapa'];
            $anexo = $_POST['anexo'];
            
            $sql = "select servico_id, servico_numeroEtapas from servicotecnico WHERE servico_id = '$selectServico' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["servico_id"];
                $var2 = $row["servico_numeroEtapas"];
            }
            
            if($var2 < $etapa || $etapa >=0){
                throw new Exception("Erro - Etapa fora do intervalo do projecto");
            }else{
                $stmt = $conn->prepare(" INSERT INTO relatorio (id_servico, rel_data, rel_descricao, rel_etapa, rel_anexo) VALUES (?, ?, ?, ?, ?) ");
                $stmt->bind_param("issss", $var1, $data, $descricao, $etapa, $anexo);
                                     
                if ($stmt->execute() ) {
                    $stmt->close();
                    echo '<script type="text/javascript">';
                    echo 'alert("Relatorio criado");';
                    echo 'window.location.href = "paginaRelatorio.php";';
                    echo '</script>';
                }else{
                    throw new Exception("Erro - Inseriu dados invalidos");
                } 
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
            $selectTipo = $_POST['selectTipo'];
            $data = $_POST['data'];
            $descricao = $_POST['descricao'];
            $anexo = $_POST['anexo'];
                
            $sql = "select servico_id from servicotecnico WHERE servico_id = '$selectTipo' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
               $var1 = $row["servico_id"];
            }
                
            $stmt = $conn->prepare(" INSERT INTO levantamento (id_servico, lev_observacao, lev_anexo, lev_data) VALUES (?, ?, ?, ?) ");
            $stmt->bind_param("isss", $var1, $descricao, $anexo, $data);
                                         
            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Levantamento criado");';
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
            $pass = $_POST['password'];

            $sql = "select * from admin WHERE ad_user = '$nome' ";
            $sql2 = "select * from gestor WHERE ges_nome = '$nome' ";

            $result = ($conn->query($sql));
            $result2 = ($conn->query($sql2));

            if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("Usuario ja existe ");';
                echo 'window.location.href = "admin.php";';
                echo '</script>';
            } else {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                
                $stmt = $conn->prepare(" INSERT INTO tecnico (tec_nome, tec_pass) VALUES (?, ?) ");
                $stmt->bind_param("ss", $nome, $hash);
                                             
                if ($stmt->execute() ) {
                    $stmt->close();
                    echo '<script type="text/javascript">';
                    echo 'alert("Tecnico criado");';
                    echo 'window.location.href = "admin.php";';
                    echo '</script>';
                }else{
                    throw new Exception("Erro - Inseriu dados invalidos");
                } 
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
            $pass = $_POST['password'];

            $sql = "select * from admin WHERE ad_user = '$nome' ";
            $sql2 = "select * from tecnico WHERE tec_nome = '$nome' ";

            $result = ($conn->query($sql));
            $result2 = ($conn->query($sql2));

            $hash = password_hash($pass, PASSWORD_DEFAULT);
                
            $stmt = $conn->prepare(" INSERT INTO gestor (ges_nome, ges_pass) VALUES (?, ?) ");
            $stmt->bind_param("ss", $nome, $hash);

            if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("Usuario ja existe ");';
                echo 'window.location.href = "admin.php";';
                echo '</script>';
            } else {
                if ($stmt->execute() ) {
                    $stmt->close();
                    echo '<script type="text/javascript">';
                    echo 'alert("Gestor criado");';
                    echo 'window.location.href = "admnin.php";';
                    echo '</script>';
                }else{
                    throw new Exception("Erro - Inseriu dados invalidos");
                }
            }              
        }catch (\Throwable $th) {
            $msg =  " " . $th->getMessage();
            echo '<script type="text/javascript">';
            echo 'alert("'.$msg.'");';
            echo '</script>';
            echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        }
            
    }

    //estatistica
    if($value == 'estatistica'){
        try {
            $servico = $_POST['servico'];
            $satisfacao = $_POST['satisfacao'];
            $pontuacao = $_POST['pontuacao'];
            $comentario = $_POST['comentario'];
                
            $stmt = $conn->prepare(" INSERT INTO estatisticas (id_servico, est_pontuacaoServico,est_nivelSatisfacao,est_comentario) VALUES (?,?,?,?) ");
            $stmt->bind_param("iiis", $servico, $satisfacao,$pontuacao,$comentario);

            if ($stmt->execute() ) {
                $stmt->close();
                echo '<script type="text/javascript">';
                echo 'alert("Dados inseridos");';
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
?>