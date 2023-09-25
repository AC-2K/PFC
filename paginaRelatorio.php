<?php
    include 'DB.php';

    $sql = "select * from relatorio inner join servicotecnico On servico_id = id_servico
    inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
    
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }


    $sql2 = "select * from servicotecnico";
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
    <title>CRM - gestao de relatorios</title>
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
                        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Dark mode</span></a>
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
                   <span class="b-title">Amiware</span>
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
                                            <h5>Gestão de Relatorios</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="relatorioCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="relatorioACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="relatorioDel" >Apagar</button>
                                            <hr>

                                            <!-- Modal 1  - Criar Levantamento -->
                                            <div class="modal fade" id="myModalCreateRelatorio" role="dialog">
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
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="data">Data de execução</label>
                                                                    <input type="date" class="form-control"  name="data" id="data" aria-describedby="data" placeholder="data">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="area">Descricao geral</label>
                                                                    <textarea class="form-control " name="descricao" id="area" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="etapa">Etapa</label>
                                                                    <input type="number" class="form-control"  name="etapa" id="etapa" aria-describedby="etapa" placeholder="etapa">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="anexo">anexo</label>
                                                                    <input type="file" class="form-control"  name="anexo" id="anexo" aria-describedby="anexo" placeholder="anexo">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="levantamento" id="criarRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar Levantamento -->
                                            <div class="modal fade" id="myModalActRelatorio" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoUpdate.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectRelatorio">Relatorio em causa</label> 
                                                                    <select class="form-control" name="selectRelatorio" id="selectRelatorio" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['rel_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="selectServico">Serviço técnico disponivel</label> 
                                                                    <select class="form-control" name="selectServico" id="selectServico">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="data">Data de execução</label>
                                                                    <input type="date" class="form-control"  name="data" id="data" aria-describedby="data" placeholder="data">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="area">Descricao geral</label>
                                                                    <textarea class="form-control " name="descricao" id="area" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="etapa">Etapa</label>
                                                                    <input type="number" class="form-control"  name="etapa" id="etapa" aria-describedby="etapa" placeholder="etapa">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="anexo">anexo</label>
                                                                    <input type="file" class="form-control"  name="anexo" id="anexo" aria-describedby="anexo" placeholder="anexo">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="levantamento" id="actualizarRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar cliente -->
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
                                                                    <label for="selectRelatorio">Relatorio técnico </label> 
                                                                    <select class="form-control" name="selectRelatorio" id="selectRelatorio">
                                                                        <?php
                                                                            if(!empty($row2))
                                                                            foreach($row2 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['servico_id']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="levantamento" id="apagarRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <h5>Lista Relatorios</h5>
                                            <hr>
                                            <!-- [ Hover-table ] start -->
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Codigo de Relatorio</th>
                                                                        <th>Cliente</th>
                                                                        <th>Descrição do servico</th>
                                                                        <th>ID do servico</th>
                                                                        <th>Observação</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        if(!empty($row))
                                                                        foreach($row as $rows)
                                                                        { 
                                                                    ?>                                                                   
                                                                    <tr>
                                                                        <td> <?php echo $rows['rel_id']; ?> </td>
                                                                        <td> <?php echo $rows['cliente_nome']; ?> </td>
                                                                        <td> <?php echo $rows['servico_descricaoGeral']; ?> </td>
                                                                        <td> <?php echo $rows['servico_id']; ?> </td>
                                                                        <td> <?php echo $rows['rel_descricao']; ?> </td>
                                                                    
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
                                        <script> 
                                            $('document').ready(function(){
                                                $('#relatorioCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateRelatorio').modal('toggle');

                                                });
                                                $('#relatorioACT').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalActRelatorio').modal('toggle');

                                                });
                                                $('#relatorioDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteLevantamento').modal('toggle');

                                                });
                                            //------------------------------------------------------------------------
                                                $('#criarRelatorio').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#actualizarRelatorio').on('click',function(){
                                                                $('form').submit();
                                                });
                                                $('#apagarRelatorio').on('click',function(){
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
