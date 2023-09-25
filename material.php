<?php
   include 'DB.php';
   

   $sql2 = "select * from listamaterial
   inner join equipamento On eqm_id = id_eqm
   inner join sistemaseguranca On sis_id = id_sis
   inner join servicotecnico On servico_id = id_servico
   inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";

  
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

   $sql3 = "select eqm_nome from equipamento";
   $result3 = ($conn->query($sql3));
   //declare array to store the data of database
   $row3 = []; 
   
   if ($result3->num_rows > 0) 
   {
       // fetch all data from db into array 
       $row3 = $result3->fetch_all(MYSQLI_ASSOC);  
   }

   $sql4 = "select servico_id from servicotecnico";
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
                <a href="#" class="b-brand">
                    <div class="b-bg">
                        <i> <img src="assets/images/favicon.ico" alt="" width="100%"></i>
                    </div>
                    <span class="b-title">Amiware</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Geral</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="tecnicoPage.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Entidades</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Serviços técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaServico.php" class="">Operações</a></li>
                            <li class=""><a href="listaServico.php" class="">Lista</a></li>
                            <li class=""><a href="material.php" class="">Material</a></li>
                            <li class=""><a href="historico.php" class="">Historico</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Relatórios técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaRelatorio.php" class="">Operações</a></li>
                            <li class=""><a href="listaRelatorio.php" class="">Lista</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Clientes</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="paginaCliente.php" class="">Operações</a></li>
                            <li class=""><a href="listaCliente.php" class="">Lista</a></li>
                            <li class=""><a href="estatistica.php" class="">Estatisticas</a></li>
                        </ul>
                    </li>
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
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Admin</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="auth-signin.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Sign out</span></a>
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
                                            <h5>Lista material</h5>
                                            <hr>
                                            <!-- [ Hover-table ] start -->
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Codigo de serviço</th>
                                                                        <th>Cliente </th>
                                                                        <th>Descrição</th>
                                                                        <th>Sistema segurança</th>

                                                                        <th>Loja</th>
                                                                        <th>Equipamento</th>
                                                                        
                                                                        <th>Fabricante</th>
                                                                        <th>Modelo</th>
                                                                        <th>Quantidade</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        if(!empty($row2))
                                                                        foreach($row2 as $rows)
                                                                        { 
                                                                    ?>                                                                   
                                                                    <tr>
                                                                        <td> <?php echo $rows['servico_id']; ?> </td>
                                                                        <td> <?php echo $rows['cliente_nome']; ?> </td>
                                                                        <td> <?php echo $rows['servico_descricaoGeral']; ?> </td>
                                                                        <td> <?php echo $rows['sis_designacao']; ?> </td>

                                                                        <td> <?php echo $rows['list_loja']; ?> </td>
                                                                        <td> <?php echo $rows['eqm_nome']; ?> </td>
                                                                        <td> <?php echo $rows['eqm_fabricante']; ?> </td>
                                                                        <td> <?php echo $rows['eqm_modelo']; ?> </td>
                                                                        <td> <?php echo $rows['eqm_quantidade']; ?> </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- [ Hover-table ] end -->
                                        </div>
                                        <div class="card-body">
                                            <h5>Gestão de Material</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="materialCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="materialACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="materialDel" >Apagar</button>
                                            <hr>

                                            <!-- Modal 1  - Criar Material -->
                                            <div class="modal fade" id="myModalCreateMaterial" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectServico">Serviço técnico disponivel</label> 
                                                                    <select class="form-control" name="selectServico" id="selectServico">
                                                                        <?php
                                                                            if(!empty($row4))
                                                                            foreach($row4 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
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
                                                                <div class="form-group">
                                                                    <label for="etapa">Quantidade</label>
                                                                    <input type="number" class="form-control"  name="quantidade" id="quantidade" aria-describedby="quantidade" placeholder="quantidade">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="material" id="criarMaterial">continuar</button>
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
                                                                    <label for="selectServico">Serviço técnico disponivel</label> 
                                                                    <select class="form-control" name="selectServico" id="selectServico">
                                                                        <?php
                                                                            if(!empty($row4))
                                                                            foreach($row4 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
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
                                                                <div class="form-group">
                                                                    <label for="etapa">Quantidade</label>
                                                                    <input type="number" class="form-control"  name="quantidade" id="quantidade" aria-describedby="quantidade" placeholder="quantidade">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="material" id="actualizarMaterial">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar cliente -->
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
                                                                    <label for="selectRelatorio">Servico técnico </label> 
                                                                    <select class="form-control" name="selectRelatorio" id="selectRelatorio">
                                                                        <?php
                                                                            if(!empty($row4))
                                                                            foreach($row4 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectEquipamento">Equipamento</label> 
                                                                    <select class="form-control" name="selectEquipamento" id="selectEquipamento">
                                                                        <?php
                                                                            if(!empty($row3))
                                                                            foreach($row3 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['eqm_nome']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="material" id="apagarMaterial">continuar</button>
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
                                            //------------------------------------------------------------------------
                                                $('#criarMaterial').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarMaterial').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarRMaterial').on('click',function(){
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
