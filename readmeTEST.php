<?php
    include 'DB.php';
    $gestor = 0;
  
    $sql = "select * from servico_tecnico
    inner join local_de_execucao On cod_servico = servico_cod
    inner join tecnico On cod_tecnico = tecnicoResponsavel
    inner join cliente On cliente_cod = cod_cliente";

    $sql2 = "select * from tecnico ";
    
    $sql3 = "select * from sistema_seguranca
    inner join servico_tecnico On cod_servico = servico_cod
    inner join cliente On cliente_cod = cod_cliente";


    
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
  
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }  
    
    $result2 = ($conn->query($sql2));
    //declare array to store the data of database
    $row2 = []; 
  
    if ($result2->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
    } 
    
    $result3 = ($conn->query($sql3));
    //declare array to store the data of database
    $row3 = []; 
  
    if ($result3->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row3 = $result3->fetch_all(MYSQLI_ASSOC);  
    }   

    $sql4 = "select * from gestor where nome = '". $user ."' ";
    $result4 = ($conn->query($sql4));

    if ($result4->num_rows > 0) 
    {
        $gestor = 1;
    }
    
    $sql5 = "select * from cliente ";
    $result5 = ($conn->query($sql5));
    //declare array to store the data of database
    $row5 = []; 
  
    if ($result5->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row5 = $result5->fetch_all(MYSQLI_ASSOC);  
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
                        <?php if($gestor == 1 ){
                                echo ' <a href="mainPage.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>';
                            }
                        ?>
                        <?php if($gestor == 0 ){
                                echo ' <a href="tecnicoPage.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Entidades</label>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Serviços técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="criarServico.php" class="">Criar</a></li>
                            <li class=""><a href="readServico.php" class="">Visualizar</a></li>
                            <li class=""><a href="updateServico.php" class="">Update</a></li>
                            <li class=""><a href="deleteServico.php" class="">Apagar</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Relatórios técnicos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="criarRelatorio.php" class="">Criar</a></li>
                            <li class=""><a href="readRelatorio.php" class="">Visualizar</a></li>
                            <li class=""><a href="updateRelatorio.php" class="">Update</a></li>
                            <li class=""><a href="deleteRelatorio.php" class="">Apagar</a></li>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Clientes</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="criarCliente.php" class="">Criar</a></li>
                            <li class=""><a href="readCliente.php" class="">Visualizar</a></li>
                            <?php if($gestor == 1 ){
                                echo ' <li><a href="updateCliente.php">Update</a></li>';
                                echo ' <li><a href="deleteCliente.php">Apagar</a></li>';
                                echo ' <li><a>Estatisticas</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Levantamentos</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="criarLevantamento.php" class="">Emissao</a></li>
                            <li class=""><a href="readLevantamento.php" class="">Visualizar</a></li>
                            <li class=""><a href="updateLevantamento.php" class="">Update</a></li>
                            <li class=""><a href="deleteLevantamento.php" class="">Apagar</a></li>
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
                                            <h5>Criar Serviço</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="metodoCriar.php" method="Post">
                                                        <div class="form-group">
                                                            <label for="descricao">Descricao Geral</label>
                                                            <textarea class="form-control"  name="descricao"  rows="20"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cliente">Cliente escolhido</label>
                                                            <select class="form-control" name="cliente" >
                                                                <?php
                                                                    if(!empty($row5))
                                                                        foreach($row5 as $rows)
                                                                    { 
                                                                ?> 
                                                                <option><?php echo $rows['c.nome']; ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tipoServico">Tipo de serviço</label>
                                                            <select class="form-control" name="tipoServico" >
                                                                <option>Manutenção</option>
                                                                <option>Instalação</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="estimativa">Estimativa de duração em dias</label>
                                                            <input type="number" class="form-control" name="estimativa" id="estimativa" aria-describedby="estimativa" placeholder="Estimativa">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tecnico">Tecnico responsavel</label> <!-- exampleSelectGenero -->
                                                            <select class="form-control" name="tecnico" >
                                                                <?php
                                                                    if(!empty($row2))
                                                                        foreach($row2 as $rows)
                                                                    { 
                                                                ?> 
                                                                <option><?php echo $rows['t.nome']; ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="aprovado">Aprovação</label>
                                                            <select class="form-control" name="aprovado" >
                                                                <option>sim</option>
                                                                <option>nao</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dataInicio">Data de inicio</label>
                                                            <input type="date" class="form-control" name="dataInicio"  aria-describedby="dataInicio" placeholder="dataInicio">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dataFim">Data de terminio</label>
                                                            <input type="date" class="form-control" name="dataFim" aria-describedby="dataFim" placeholder="dataFim">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="anexo">Anexo</label>
                                                            <input type="file" class="form-control" name="anexo"  aria-describedby="anexo" placeholder="anexo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="etapa">Numeros de etapas</label>
                                                            <input type="number" class="form-control" name="etapa" id="etapa" aria-describedby="etapa" placeholder="etapa">
                                                        </div>
                                                        <input type="hidden" name="criar" value="3">
                                                        <button type="submit" class="btn btn-primary">Criar</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="codigo">Codigo servico</label>
                                                            <input type="text" class="form-control" name="codigo"   aria-describedby="codigo" placeholder="codigo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sistema Segurança</label>
                                                            <select class="form-control" name="sistema" >
                                                                <?php
                                                                    if(!empty($row3))
                                                                        foreach($row3 as $rows)
                                                                    { 
                                                                ?> 
                                                                <option><?php echo $rows['s.designacao']; ?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="criar" value="2">
                                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                                    </form>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Local de execução</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="codigo">Codigo servico</label>
                                                            <input type="text" class="form-control" name="codigo" aria-describedby="codigo" placeholder="codigo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pais">Pais</label>
                                                            <input type="text" class="form-control" name="pais" aria-describedby="pais" placeholder="pais">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="provincia">Provincia</label>
                                                            <input type="text" class="form-control" name="provincia" aria-describedby="provincia" placeholder="provincia">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="endereco">Endereço</label>
                                                            <input type="text" class="form-control" name="endereco" aria-describedby="endereco" placeholder="endereco">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="estrutura">Tipo de estrutura</label>
                                                            <input type="text" class="form-control" name="estrutura" aria-describedby="estrutura" placeholder="estrutura">
                                                        </div>
                                                        <input type="hidden" name="criar" value="1">
                                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
