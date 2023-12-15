<?php
    include 'DB.php';
    
    $sql = "select * from cliente";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
    
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }

    $sql2 = "SELECT * FROM telefone"; 
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
                                            <h5>Gestão de cliente</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="clienteCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="clienteACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="clienteDel" >Apagar</button>
                                            <hr>
                                            <h5>Contacto de telefone</h5>
                                            <button type="submit" class="btn btn-success" id="phoneCreate" >Anexar</button>
                                            <button type="submit" class="btn btn-danger" id="phoneDEL">Apagar</button>
                                            <hr>

                                            <!-- Modal 1  - Criar cliente -->
                                            <div class="modal fade" id="myModalCreateCliente" role="dialog">
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
                                                                    <input type="text" class="form-control" name="nome" id="nome" aria-describedby="nome" placeholder="Nome">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="mail">Endereço email</label>
                                                                    <input type="email" class="form-control" name="mail" id="mail" aria-describedby="mail" placeholder="Endereço email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="endereco">Endereço</label>
                                                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectTipo">Tipo de cliente</label> 
                                                                    <select class="form-control" name="selectTipo" id="selectTipo">
                                                                        <option>Individual</option>
                                                                        <option>Associação</option>
                                                                        <option>Empresa</option>
                                                                        <option>Diplomata</option>
                                                                        <option>Governo</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectGenero">Genero</label>
                                                                    <select class="form-control" name="selectGenero" id="selectGenero">
                                                                        <option>Masculino</option>
                                                                        <option>Feminino</option>
                                                                        <option>Nao especificado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="responsavel">Responsavel</label>
                                                                    <input type="text" class="form-control" name="responsavel" id="responsavel" aria-describedby="responsavel" placeholder="responsavel">
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="cliente" id="criarCliente">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar cliente -->
                                            <div class="modal fade" id="myModalActCliente" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoUpdate.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nome">Cliente</label> 
                                                                    <select class="form-control" name="nome" id="nome" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['cliente_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="mail">Endereço email</label>
                                                                    <input type="email" class="form-control" name="mail" id="mail" aria-describedby="mail" placeholder="Endereço email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="endereco">Endereço</label>
                                                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectTipo">Tipo de cliente</label> 
                                                                    <select class="form-control" name="selectTipo" id="selectTipo">
                                                                        <option></option>
                                                                        <option>Individual</option>
                                                                        <option>Associação</option>
                                                                        <option>Empresa</option>
                                                                        <option>Diplomata</option>
                                                                        <option>Governo</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectGenero">Genero</label>
                                                                    <select class="form-control" name="selectGenero" id="selectGenero">
                                                                        <option></option>
                                                                        <option>Masculino</option>
                                                                        <option>Feminino</option>
                                                                        <option>Nao especificado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="responsavel">Responsavel</label>
                                                                    <input type="text" class="form-control" name="responsavel" id="responsavel" aria-describedby="responsavel" placeholder="responsavel">
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="cliente" id="actualizarCliente">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar cliente -->
                                            <div class="modal fade" id="myModalDeleteCliente" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectCliente">Cliente</label> 
                                                                    <select class="form-control" name="selectCliente" id="selectCliente" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['cliente_email']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="cliente" id="apagarCliente">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->



                                            <!-- Modal 4  - Criar telefone -->
                                            <div class="modal fade" id="myModalCreateTelefone" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="telefone" >Numero telefone</label>
                                                                    <input type="text" class="form-control" name="telefone" id="telefone" maxlength="13" placeholder="Numero telefone">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectCliente">Cliente</label> 
                                                                    <select class="form-control" name="selectCliente" id="selectCliente">
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['cliente_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="telefone" id="criarTelefone">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 5  - Apagar telefone -->
                                            <div class="modal fade" id="myModalDeleteTelefone" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                               <div class="form-group">
                                                                    <label for="telefone" >Numero telefone</label>
                                                                    <select class="form-control" name="telefone" id="telefone">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['telefone_numero']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="telefone" id="apagarTelefone">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                        </div>
                                        <script> 
                                            $('document').ready(function(){
                                                $('#clienteCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateCliente').modal('toggle');

                                                });
                                                $('#clienteACT').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalActCliente').modal('toggle');

                                                });
                                                $('#clienteDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteCliente').modal('toggle');

                                                });
                                                $('#phoneCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateTelefone').modal('toggle'); 

                                                });
                                                $('#phoneDEL').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteTelefone').modal('toggle');

                                                });
                                            //------------------------------------------------------------------------
                                                $('#criarCliente').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarCliente').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarCliente').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#criarTelefone').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarTelefone').on('click',function(){
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
