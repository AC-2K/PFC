<?php
    include 'DB.php';

    $sql = "select * from levantamento inner join servicotecnico On servico_id = id_servico
    inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
    
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }


    $sql2 = "select * from servicotecnico inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";
    $result2 = ($conn->query($sql2));
    //declare array to store the data of database
    $row2 = []; 
    
    if ($result2->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
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
                                            <h5>Gestão de Levantamntos</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="levantamentoCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="levantamentoACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="levantamentoDel" >Apagar</button>
                                            <hr>

                                            <!-- Modal 1  - Criar Levantamento -->
                                            <div class="modal fade" id="myModalCreateLevantamento" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectTipo">Serviço técnico disponivel</label> 
                                                                    <select class="form-control" name="selectTipo" id="selectTipo">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']." - ".$rows['cliente_nome']." - ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descricao">Descricao geral</label>
                                                                    <textarea class="form-control "name="descricao"  id="descricao" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="anexo">anexo</label>
                                                                    <input type="text" class="form-control" name="anexo" id="anexo" aria-describedby="anexo" placeholder="anexo">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="data">Data de execução</label>
                                                                    <input type="date" class="form-control"  name="data" id="data" aria-describedby="data" placeholder="data">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="levantamento" id="criarLevantamento">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar Levantamento -->
                                            <div class="modal fade" id="myModalActLevantamento" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoUpdate.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectLevantamento">Levantamento em causa</label> 
                                                                    <select class="form-control" name="selectLevantamento" id="selectLevantamento" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['lev_id']." - ".$rows['cliente_nome']." - ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descricao">Descricao geral</label>
                                                                    <textarea class="form-control "name="descricao"  id="descricao" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="anexo">anexo</label>
                                                                    <input type="text" class="form-control" name="anexo" aria-describedby="anexo" placeholder="anexo">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="data">Data de execução</label>
                                                                    <input type="date" class="form-control"  name="data" id="data" aria-describedby="data" placeholder="data">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="levantamento" id="actualizarLevantamento">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar Levantamento -->
                                            <div class="modal fade" id="myModalDeleteLevantamento" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectLevantamento">Levantamento em causa</label>
                                                                    <select class="form-control" name="selectLevantamento" id="selectLevantamento" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['lev_id']." - ".$rows['cliente_nome']." - ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="levantamento" id="apagarLevantamento">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <script> 
                                            $('document').ready(function(){
                                                $('#levantamentoCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateLevantamento').modal('toggle');

                                                });
                                                $('#levantamentoACT').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalActLevantamento').modal('toggle');

                                                });
                                                $('#levantamentoDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteLevantamento').modal('toggle');

                                                });
                                            //------------------------------------------------------------------------
                                                $('#criarLevantamento').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarLevantamento').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarLevantamento').on('click',function(){
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
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.js"></script>

</body>
</html>
