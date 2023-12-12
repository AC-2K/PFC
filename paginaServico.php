<?php
    include 'DB.php';
    
    $sql = "select tec_nome from tecnico";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
    
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }

    $sql2 = "select cliente_nome from cliente";
    $result2 = ($conn->query($sql2));
    //declare array to store the data of database
    $row2 = []; 
    
    if ($result2->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
    }

    $sql3 = "select loc_id from localexecucao";
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
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                    <i> <img src="assets/images/logo.png" alt="" width="70%"> </i>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Geral</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="mainPage.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Entidades</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Serviços técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaServico.php" class="">Operações</a></li>
                            <li class=""><a href="listaServico.php" class="">Lista</a></li>
                            <?php if($_SESSION["usuario"] == 1 || $_SESSION["usuario"] == 2){
                                echo ' <li><a href="material.php">Material</a></li>';
                                echo ' <li><a href="historico.php">Historico</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Relatórios técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaRelatorio.php" class="">Operações</a></li>
                            <li class=""><a href="listaRelatorio.php" class="">Lista</a></li>
                        </ul>
                    </li>
                    <?php 
                    if($_SESSION["usuario"] == 1 || $_SESSION["usuario"] == 2 ){
                    echo ' <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">';           
                        echo '<a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Clientes</span></a>';
                        echo '<ul class="pcoded-submenu">';
                            echo '<li class=""><a href="paginaCliente.php" class="">Operações</a></li>';
                            echo '<li class=""><a href="listaCliente.php" class="">Lista</a></li>';
                            echo '<li class=""><a href="estatistica.php" class="">Estatisticas</a></li>';
                        echo '</ul>';     
                    echo '</li>'; 
                    }
                    ?>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Levantamentos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaLevantamento.php" class="">Operações</a></li>
                            <li class=""><a href="listaLevantamento.php" class="">Lista</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Opções</label>
                    </li>
                    <?php 
                    if($_SESSION["usuario"] == 2 ){
                    echo ' <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">';           
                        echo '<a href="admin.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Privilegios</span></a>';
                    echo '</li>';
                    }
                    ?>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="sair.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Sign out</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Datta Able</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

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
                                            <h5>Gestão de Serviços</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="servicoCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="servicoACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="servicoDel" >Apagar</button>
                                            <hr>
                                            <h5>Local de execução</h5>
                                            <button type="submit" class="btn btn-success" id="localCreate" >Anexar</button>
                                            <button type="submit" class="btn btn-danger" id="localDEL">Apagar</button>
                                            <hr>

                                            <!-- Modal 1  - Criar Servico -->
                                            <div class="modal fade" id="myModalCreateServico" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="duracao">Duração</label>
                                                                    <input type="number" class="form-control" name="duracao" id="duracao" aria-describedby="duracao" placeholder="duracao">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descricao">Descricao geral</label>
                                                                    <textarea class="form-control "name="descricao"  id="descricao" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectEstado">Estado</label> 
                                                                    <select class="form-control" name="selectEstado" id="selectEstado">
                                                                        <option>Andamento</option>
                                                                        <option>Em espera</option>
                                                                        <option>Terminado</option>
                                                                        <option>Parado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dataInicio">Data inicio</label>
                                                                    <input type="date" class="form-control" name="dataInicio" id="dataInicio" placeholder="Data inicio">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dataFim">Data fim</label>
                                                                    <input type="date" class="form-control" name="dataFim" id="dataFim" placeholder="Data Fim">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectAprovacao">Aprovação</label>
                                                                    <select class="form-control" name="selectAprovacao" id="selectAprovacao">
                                                                        <option>Sim</option>
                                                                        <option>Nao</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="numeroEtapas">Numero de etapas</label>
                                                                    <input type="number" class="form-control" name="numeroEtapas" id="numeroEtapas" aria-describedby="numeroEtapas" placeholder="numero de etapas">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tipo">Tipo de serviço</label>
                                                                    <select class="form-control" name="selectTipo" id="selectTipo">
                                                                        <option>Manutenção</option>
                                                                        <option>Instalação</option>
                                                                        <option>Consultoria</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tecnico">Tecnico</label>
                                                                    <select class="form-control" name="tecnico" id="tecnico">
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['tec_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cliente">Cliente</label>
                                                                    <select class="form-control" name="cliente" id="cliente">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['cliente_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="servico" id="criarServico">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar Servico -->
                                            <div class="modal fade" id="myModalActServico" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoUpdate.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="servico">Servico tecnico</label>
                                                                    <select class="form-control" name="servico" id="servico" required>
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
                                                                    <label for="duracao">Duração</label>
                                                                    <input type="number" class="form-control" name="duracao" id="duracao" aria-describedby="duracao" placeholder="duracao">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descricao">Descricao geral</label>
                                                                    <textarea class="form-control "name="descricao"  id="descricao" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectEstado">Estado</label> 
                                                                    <select class="form-control" name="selectEstado" id="selectEstado">
                                                                        <option></option>
                                                                        <option>Andamento</option>
                                                                        <option>Em espera</option>
                                                                        <option>Parado</option>
                                                                        <option>Terminado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dataInicio">Data inicio</label>
                                                                    <input type="date" class="form-control" name="dataInicio" id="dataInicio" placeholder="Data inicio">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dataFim">Data fim</label>
                                                                    <input type="date" class="form-control" name="dataFim" id="dataFim" placeholder="Data Fim">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectAprovacao">Aprovação</label>
                                                                    <select class="form-control" name="selectAprovacao" id="selectAprovacao">
                                                                        <option></option>
                                                                        <option>Sim</option>
                                                                        <option>Nao</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="numeroEtapas">Numero de etapas</label>
                                                                    <input type="number" class="form-control" name="numeroEtapas" id="numeroEtapas" aria-describedby="numeroEtapas" placeholder="numero de etapas">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tipo">Tipo de serviço</label>
                                                                    <select class="form-control" name="selectTipo" id="selectTipo">
                                                                        <option></option>
                                                                        <option>Manutenção</option>
                                                                        <option>Instalação</option>
                                                                        <option>Consultoria</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tecnico">Tecnico</label>
                                                                    <select class="form-control" name="tecnico" id="tecnico">
                                                                        <option></option>
                                                                        <?php
                                                                            
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['tec_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cliente">Cliente</label>
                                                                    <select class="form-control" name="cliente" id="cliente">
                                                                        <option></option>
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['cliente_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="servico" id="updateServico">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar Servico -->
                                            <div class="modal fade" id="myModalDeleteServico" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="servico">Servico tecnico</label>
                                                                    <select class="form-control" name="servico" id="servico">
                                                                        <?php
                                                                            if(!empty($row4))
                                                                            foreach($row4 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>     
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="servico" id="apagarServico">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->



                                            <!-- Modal 4  - Criar local -->
                                            <div class="modal fade" id="myModalCreateLocal" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="servico">Servico tecnico</label>
                                                                    <select class="form-control" name="servico" id="servico">
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
                                                                    <label for="pais">Pais</label>
                                                                    <input type="text" class="form-control" name="pais" id="pais" placeholder="pais">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="provincia">Provincia</label>
                                                                    <input type="text" class="form-control" name="provincia" id="provincia" placeholder="provincia">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="endereco">Endereço</label>
                                                                    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="endereco">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="estrutura">Tipo de estrutura</label>
                                                                    <select class="form-control" name="estrutura" id="estrutura">
                                                                        <option>Alvenaria</option>
                                                                        <option>Instituição</option>
                                                                        <option>Comercial</option>
                                                                        <option>Governamental</option>
                                                                        <option>Prédio</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="local" id="criarLocal">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 5  - Apagar local -->
                                            <div class="modal fade" id="myModalDeleteLocal" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="local">ID local</label>
                                                                    <select class="form-control" name="local" id="local">
                                                                        <?php
                                                                            if(!empty($row3))
                                                                            foreach($row3 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['loc_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>     
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="local" id="apagarLocal">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                        </div>
                                        <script> 
                                            $('document').ready(function(){
                                                $('#servicoCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateServico').modal('toggle');

                                                });
                                                $('#servicoACT').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalActServico').modal('toggle');

                                                });
                                                $('#servicoDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteServico').modal('toggle');

                                                });
                                                $('#localCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateLocal').modal('toggle'); 

                                                });
                                                $('#localDEL').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteLocal').modal('toggle');

                                                });
                                            //------------------------------------------------------------------------
                                                $('#criarServico').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarServico').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarServico').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#criarLocal').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarLocal').on('click',function(){
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

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.js"></script>

</body>
</html>
