<?php
   include 'DB.php';
   

   $sql2 = "select * from listamaterial
   inner join equipamento On eqm_id = id_eqm
   inner join sistemaseguranca On sis_id = id_sis
   inner join servicotecnico On servico_id = id_servico
   inner join cliente On cliente_id = id_cliente ";

  
   $result2 = ($conn->query($sql2));
   //declare array to store the data of database
   $row2 = []; 
   
   if ($result2->num_rows > 0) 
   {
       // fetch all data from db into array 
       $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
   }

   $sql = "select * from sistemaseguranca";
   $result = ($conn->query($sql));
   //declare array to store the data of database
   $row = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $row = $result->fetch_all(MYSQLI_ASSOC);  
   }

   $sql3 = "select eqm_nome, eqm_modelo from equipamento";
   $result3 = ($conn->query($sql3));
   //declare array to store the data of database
   $row3 = []; 
   
   if ($result3->num_rows > 0) 
   {
       // fetch all data from db into array 
       $row3 = $result3->fetch_all(MYSQLI_ASSOC);  
   }

   $sql4 = "select * from servicotecnico inner join cliente On cliente_id = id_cliente";
   $result4 = ($conn->query($sql4));
   //declare array to store the data of database
   $row4 = []; 
   
   if ($result4->num_rows > 0) 
   {
       // fetch all data from db into array 
       $row4 = $result4->fetch_all(MYSQLI_ASSOC);  
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRM - Amiware</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
    <?php include 'header.php'; ?> 
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Lista material</h5>
                                            <hr>
                                            <select name="material" onchange="showParameter(this.value,'txtHint','getMaterial.php?q=')" class="form-control">
                                                    <option value=""> </option>
                                                <?php
                                                if(!empty($row4))
                                                foreach($row4 as $rows)
                                                { 
                                                ?>                                                                   
                                                    <option value="<?php echo $rows['cliente_nome']; ?>" ><?php echo $rows['cliente_nome']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <hr>
                                            <div id="txtHint"></div>
                                        </div>
                                        <div class="card-body">
                                            <h5>Gestão de Equipamento</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="equipamentoCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="equipamentoACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="equipamentoDel" >Apagar</button>
                                            <hr>

                                            <!-- Modal 1 - Criar Equipamento -->
                                            <div class="modal fade" id="myModalCreateEquipamento" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nome">Nome</label>
                                                                    <input type="text" class="form-control"  name="nome" id="nome" aria-describedby="nome" placeholder="nome de equipamento">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fabricante">Fabricante</label>
                                                                    <input type="text" class="form-control"  name="fabricante" id="fabricante" aria-describedby="fabricante" placeholder="fabricante de equipamento">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="modelo">Modelo</label>
                                                                    <input type="text" class="form-control"  name="modelo" id="modelo" aria-describedby="modelo" placeholder="modelo de equipamento">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="equipamento" id="criarEquipamento">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar Equipamento -->
                                            <div class="modal fade" id="myModalActEquipamento" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoUpdate.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nome">Nome</label>
                                                                    <input type="text" class="form-control"  name="nome" id="nome" aria-describedby="nome" placeholder="nome de equipamento">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fabricante">Fabricante</label>
                                                                    <input type="text" class="form-control"  name="fabricante" id="fabricante" aria-describedby="fabricante" placeholder="fabricante de equipamento">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="modelo">Equipamento</label> 
                                                                    <select class="form-control" name="modelo" id="modelo" required>
                                                                        <?php
                                                                            if(!empty($row3))
                                                                            foreach($row3 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['eqm_modelo']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="equipamento" id="actualizarEquipamento">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar Equipamento -->
                                            <div class="modal fade" id="myModalDeleteEquipamento" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="modelo">Equipamento</label> 
                                                                    <select class="form-control" name="modelo" id="modelo" required>
                                                                        <?php
                                                                            if(!empty($row3))
                                                                            foreach($row3 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['eqm_modelo']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="equipamento" id="apagarEquipamento">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5>Gestão de lista de material</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="materialCreate" >Criar</button> 
                                            <button type="submit" class="btn btn-primary" id="materialACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="materialDel" >Apagar toda lista</button>
                                            <button type="submit" class="btn btn-danger" id="materialDelOne" >Apagar 1 elemento</button>
                                            <hr>

                                            <!-- Modal 1  - Criar Material -->
                                            <div class="modal fade" id="myModalCreateMaterial" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectEquipamento">Equipamento</label> 
                                                                    <select class="form-control" name="selectEquipamento" id="selectEquipamento">
                                                                        <?php
                                                                            if(!empty($row3))
                                                                            foreach($row3 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['eqm_modelo']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectServico">Serviço técnico disponivel</label> 
                                                                    <select class="form-control" name="selectServico" id="selectServico">
                                                                        <?php
                                                                            if(!empty($row4))
                                                                            foreach($row4 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']." - ".$rows['cliente_nome']."- ".$rows['servico_descricaoGeral']; ?></option>

                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sistema">Sistema Seguranca</label>
                                                                    <select class="form-control" name="sistema" id="sistema">
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['sis_designacao']; ?></option>
                                                                        <?php } ?>
                                                                    </select>                                                                
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="loja">Loja</label>
                                                                    <input type="text" class="form-control"  name="loja" id="loja" aria-describedby="loja" placeholder="loja">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="quantidade">Quantidade</label>
                                                                    <input type="number" class="form-control"  name="quantidade" id="quantidade" aria-describedby="quantidade" min="1" placeholder="quantidade">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="lista" id="criarMaterial">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar Material -->
                                            <div class="modal fade" id="myModalActMaterial" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoUpdate.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectLista">Lista alocado</label> 
                                                                    <select class="form-control" name="selectLista" id="selectLista">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['list_id']." - ".$rows['cliente_nome']."- ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectEquipamento">Equipamento</label> 
                                                                    <select class="form-control" name="selectEquipamento" id="selectEquipamento">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['eqm_modelo']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="loja">Loja</label>
                                                                    <input type="text" class="form-control"  name="loja" id="loja" aria-describedby="loja" placeholder="loja">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sistema">Sistema Seguranca</label>
                                                                    <select class="form-control" name="sistema" id="sistema">
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['sis_designacao']; ?></option>
                                                                        <?php } ?>
                                                                    </select>                                                                
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="quantidade">Quantidade</label>
                                                                    <input type="number" class="form-control"  name="quantidade" id="quantidade" aria-describedby="quantidade" placeholder="quantidade">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="lista" id="actualizarMaterial">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar Material - toda lista-->
                                            <div class="modal fade" id="myModalDeleteMaterial" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectLista">Lista de material</label> 
                                                                    <select class="form-control" name="selectLista" id="selectLista">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['id_servico']." - ".$rows['cliente_nome']." - ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="lista" id="apagarMaterial">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar Material - 1 item -->
                                            <div class="modal fade" id="myModalDeleteMaterialOne" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectLista">Lista de material</label> 
                                                                    <select class="form-control" name="selectLista" id="selectLista">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['id_eqm']." - ".$rows['eqm_nome']." - ".$rows['cliente_nome']." - ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="listaOne" id="apagarMaterialOne">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script> 
                                            $('document').ready(function(){
                                                $('#materialCreate').on('click',function(e){  
                                                    e.preventDefault();
                                                    $('#myModalCreateMaterial').modal('toggle'); 

                                                });
                                                $('#materialACT').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalActMaterial').modal('toggle');

                                                });
                                                $('#materialDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteMaterial').modal('toggle');

                                                });
                                                $('#materialDelOne').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteMaterialOne').modal('toggle');

                                                });

                                                $('#equipamentoCreate').on('click',function(e){  
                                                    e.preventDefault();
                                                    $('#myModalCreateEquipamento').modal('toggle'); 

                                                });
                                                $('#equipamentoACT').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalActEquipamento').modal('toggle');

                                                });
                                                $('#equipamentoDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteEquipamento').modal('toggle');

                                                });
                                            //------------------------------------------------------------------------
                                                $('#criarMaterial').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarMaterial').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarMaterial').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarMaterialOne').on('click',function(){
                                                                $('form').submit();
                                                });



                                                $('#criarEquipamento').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarEquipamento').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarEquipamento').on('click',function(){
                                                                $('form').submit();
                                                });
                                            });    
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.js"></script>
    <script src="assets/js/AJAX.js"></script>

</body>
</html>
