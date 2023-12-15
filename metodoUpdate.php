<?php
    include 'DB.php';

    //Metodo update
    function updateField($mysqli, $tableName, $fieldName, $newValue, $primaryKey, $primaryKeyValue, $paginaSaida) {
        
            // Prepare the UPDATE statement
            $sql = "UPDATE $tableName SET $fieldName = ? WHERE $primaryKey = ?";
            $stmt = $mysqli->prepare($sql);
        
            if ($stmt === false) {
                die("Prepare failed: " . $mysqli->error);
            }
        
            // Bind parameters
            $stmt->bind_param("si", $newValue, $primaryKeyValue);

            $stmt->execute();
        
            // Execute the UPDATE statement
            if ($stmt->execute()) {
                echo '<script type="text/javascript">';
                echo 'alert("Elemento actualizado");';
                echo '</script>';
            } else {
                die("Update failed: " . $stmt->error);
            }
        
            // Close the statement
            $stmt->close();
               
    }

    $value = $_POST['submeter'];

    //servico tecnico
    if($value == 'servico'){
        try {
            $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['servico']);
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
            
            if(isset($duracao) && !empty($duracao) ){ updateField($conn,"servicotecnico","servico_estDuracao",$duracao,"servico_id",$servico,"paginaServico.php");}
            if(isset($descricao) && !empty($descricao)){updateField($conn,"servicotecnico","servico_descricaoGeral",$descricao,"servico_id",$servico,"paginaServico.php");}

            if(isset($estado) && !empty($estado) ){
                if ($estado == 'Terminado') {
                    $datafim = date("Y-m-d");
                    $stmt = $conn->prepare(" INSERT INTO historicoservico (id_servico, his_dataInsercao) VALUES (?, ?) ");
                    $stmt->bind_param("is", $servico, $datafim );
                    $stmt->execute();
                }
                if ($estado == 'Cancelado' && isset($descricao) && !empty($descricao) ) {
                    $datafim = date("Y-m-d");
                    $stmt = $conn->prepare("INSERT INTO servicocancelado (id_servico,cancelado_causa,cancelado_data) VALUES (?,?,?)");
                    $stmt->bind_param("iss", $servico,$descricao,$datafim);
                    $stmt->execute();
                }
                updateField($conn,"servicotecnico","servico_estado",$estado,"servico_id",$servico,"paginaServico.php");
            }
            if(isset($dataInicio) && !empty($dataInicio) ){updateField($conn,"servicotecnico","servico_dataInicio",$dataInicio,"servico_id",$servico,"paginaServico.php");}

            if(isset($dataFim) && !empty($dataFim) ){updateField($conn,"servicotecnico","servico_dataFim",$dataFim,"servico_id",$servico,"paginaServico.php");}
            if(isset($aprovacao) && !empty($aprovacao) ){updateField($conn,"servicotecnico","servico_aprovacao",$aprovacao,"servico_id",$servico,"paginaServico.php");}

            if(isset($numeroEtapas) && !empty($numeroEtapas) ){updateField($conn,"servicotecnico","servico_numeroEtapas",$numeroEtapas,"servico_id",$servico,"paginaServico.php");}
            if(isset($var1) && !empty($var1) ){updateField($conn,"servicotecnico","id_tec",$var1,"servico_id",$servico,"paginaServico.php");}

            if(isset($var2) && !empty($var2) ){updateField($conn,"servicotecnico","id_cliente",$var2,"servico_id",$servico,"paginaServico.php");}
            if(isset($tipo) && !empty($tipo) ){updateField($conn,"servicotecnico","servico_Tipo",$tipo,"servico_id",$servico,"paginaServico.php");}

            echo '<script type="text/javascript">';
            echo 'window.location.href = "paginaServico.php";';
            echo '</script>';
         
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

            $sql = "select eqm_id from equipamento WHERE eqm_modelo = '$modelo' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["eqm_id"];
            }
             
            
            if(isset($nome) && !empty($nome) ){updateField($conn,"equipamento","eqm_nome",$nome,"eqm_id",$var1,"material.php");}

            if(isset($fabricante) && !empty($fabricante) ){updateField($conn,"equipamento","eqm_fabricante",$fabricante,"eqm_id",$var1,"material.php");}
            if(isset($modelo) && !empty($modelo) ){updateField($conn,"equipamento","eqm_modelo",$modelo,"eqm_id",$var1,"material.php");}

            echo '<script type="text/javascript">';
            echo 'window.location.href = "material.php";';
            echo '</script>';
         
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

            $equipamento = $_POST['selectEquipamento'];
            $sistema = $_POST['sistema'];
            $loja = $_POST['loja'];
            $quantidade = $_POST['quantidade'];

            $sql = "select eqm_id from equipamento WHERE eqm_modelo = '$equipamento' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["eqm_id"];
            }


            $sql3 = "select sis_id from sistemaseguranca WHERE sis_designacao = '$sistema' ";
            $result3 = ($conn->query($sql3));
            while($row3 = mysqli_fetch_assoc($result3)) {
                $var3 = $row3["sis_id"];
            }
             
            
            if(isset($equipamento) && !empty($equipamento) ){updateField($conn,"listamaterial","id_eqm",$var1,"list_id",$lista,"material.php");}

            if(isset($sistema) && !empty($sistema) ){updateField($conn,"listamaterial","id_sis",$var3,"list_id",$lista,"material.php");}

            if(isset($loja) && !empty($loja) ){updateField($conn,"listamaterial","list_loja",$loja,"list_id",$lista,"material.php");}
            if(isset($quantidade) && !empty($quantidade) ){updateField($conn,"listamaterial","list_quantidade",$quantidade,"list_id",$lista,"material.php");}

            echo '<script type="text/javascript">';
            echo 'window.location.href = "material.php";';
            echo '</script>';
         
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

            $sql = "select cliente_id from cliente WHERE cliente_nome = '$nome' ";
            $result = ($conn->query($sql));
            while($row = mysqli_fetch_assoc($result)) {
                $var1 = $row["cliente_id"];
            }
            

            if(isset($mail) && !empty($mail) ){updateField($conn,"cliente","cliente_email",$mail,"cliente_id",$var1,"paginaCliente.php");}
            if(isset($selectTipo) && !empty($selectTipo) ){updateField($conn,"cliente","cliente_tipo",$selectTipo,"cliente_id",$var1,"paginaCliente.php");}

            if(isset($selectGenero) && !empty($selectGenero) ){updateField($conn,"cliente","cliente_sexo",$selectGenero,"cliente_id",$var1,"paginaCliente.php");}
            if(isset($responsavel) && !empty($responsavel) ){updateField($conn,"cliente","cliente_responsavel",$responsavel,"cliente_id",$var1,"paginaCliente.php");}

            echo '<script type="text/javascript">';
            echo 'window.location.href = "paginaCliente.php";';
            echo '</script>';
         
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
            $relatorio = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectRelatorio']);

            $data = $_POST['data'];
            $descricao = $_POST['descricao'];
            $etapa = $_POST['etapa'];
            $anexo = $_POST['anexo'];
            
            if(isset($data) && !empty($data) ){updateField($conn,"relatorio","rel_data",$data,"rel_id",$relatorio,"paginaRelatorio.php");}

            if(isset($descricao) && !empty($descricao) ){updateField($conn,"relatorio","rel_descricao",$descricao,"rel_id",$relatorio,"paginaRelatorio.php");}
            if(isset($etapa) && !empty($etapa) ){updateField($conn,"relatorio","rel_etapa",$etapa,"rel_id",$relatorio,"paginaRelatorio.php");}

            if(isset($anexo) && !empty($anexo) ){updateField($conn,"relatorio","rel_anexo",$anexo,"rel_id",$relatorio,"paginaRelatorio.php");}

            echo '<script type="text/javascript">';
            echo 'window.location.href = "paginaRelatorio.php";';
            echo '</script>';
         
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
            $levantamento = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectLevantamento']);

            $data = $_POST['data'];
            $descricao = $_POST['descricao'];
            $anexo = $_POST['anexo'];
                                
            if(isset($data) && !empty($data) ){updateField($conn,"levantamento","lev_data",$data,"lev_id",$levantamento,"paginaLevantamento.php");}

            if(isset($descricao) && !empty($descricao) ){updateField($conn,"levantamento","lev_observacao",$descricao,"lev_id",$levantamento,"paginaLevantamento.php");}

            if(isset($anexo) && !empty($anexo) ){updateField($conn,"levantamento","lev_anexo",$anexo,"lev_id",$levantamento,"paginaLevantamento.php");}

            echo '<script type="text/javascript">';
            echo 'window.location.href = "paginaLevantamento.php";';
            echo '</script>';
         
        }catch (\Throwable $th) {
                $msg =  " " . $th->getMessage();
                echo '<script type="text/javascript">';
                echo 'alert("'.$msg.'");';
                echo '</script>';
                echo"<td width=14% align=center><input type=button value=Voltar onclick=myselect() /></td>";
        } 
            
    }

    
?>