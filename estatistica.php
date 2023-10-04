<?php
include 'DB.php'; 

$sql2 = "select * from servicotecnico 
inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";
$result2 = ($conn->query($sql2));
//declare array to store the data of database
$row2 = []; 

if ($result2->num_rows > 0) 
{
    // fetch all data from db into array 
    $row2 = $result2->fetch_all(MYSQLI_ASSOC);  
}

$sql4 = "select * from estatisticas
inner join servicotecnico On servico_id = id_servico
inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";
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
                                <!-- [ Morris Chart ] start -->
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Numero de Serviços por técnicos</h5>
                                        </div>
                                        <div class="card-block">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> Técnico</th>
                                                        <th> Numero de serviço</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php                                                        
                                                        $sql11 = "SELECT tec_nome,COUNT(id_tec) as soma FROM servicotecnico INNER JOIN tecnico on id_tec = tec_id GROUP BY tec_nome ";
                                                        $result11 = mysqli_query($conn, $sql11);

                                                        if ($result11->num_rows > 0) {
                                                            // output data of each row
                                                            while($row11 = $result11->fetch_assoc()) {
                                                                echo '<tr>';
                                                                echo '<td>'.$row11["tec_nome"].'</td>';
                                                                echo '<td>'.$row11["soma"].'</td>';
                                                                echo '</tr>';
                                                            }
                                                        } else {
                                                            echo "0 results";
                                                        }
                                                        $conn->close();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Bar [ Stacked ] Chart</h5>
                                        </div>
                                        <div class="card-block">
                                            <div id="morris-bar-stacked-chart" style="height:300px"></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Numero de Serviços por clientes</h5>
                                        </div>
                                        <div class="card-block">
                                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Estatisticas de serviços</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <?php
                                                        if(!empty($row4))
                                                            foreach($row4 as $rows){ 
                                                    ?>                                                                   
                                                    <tbody>
                                                        <tr class="unread">
                                                            <?php 
                                                                if ($rows['cliente_sexo'] == 'Masculino') {
                                                                 echo '<td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-2.jpg"" alt="activity-user"></td>';
                                                                }
                                                                if ($rows['cliente_sexo'] == 'Feminino') {
                                                                    echo '<td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg" alt="activity-user"></td>';
                                                                }
                                                                if ($rows['cliente_sexo'] == 'Nao especificado') {
                                                                    echo '<td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-3.jpg" alt="activity-user"></td>';
                                                                }
                                    
                                                            ?>
                                                            <td>
                                                                <h4 class="mb-1"><?php echo $rows['cliente_nome']; ?></h4>
                                                                <h6 class="m-0"><?php echo $rows['servico_descricaoGeral']; ?></h6>
                                                                <hr>
                                                                <h5 class="m-0"><?php echo "Nivel de satisfação - ".$rows['est_nivelSatisfacao']." de 10"; ?></h5>
                                                                <br>
                                                                <h5 class="mb-1"><?php echo "Pontuação dado pelo cliente - ".$rows['est_pontuacaoServico']." de 10"; ?></h5>
                                                            </td>
                                                            <td>
                                                            </td>
                                                        </tr>
                                                    </tbody>                            
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Morris Chart ] end -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Gestão de estatisticas</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="estatisticaCreate" >Criar</button>
                                            <button type="submit" class="btn btn-danger" id="estatisticaDel" >Apagar</button>
                                            <hr>
                                            <!-- Modal 1  - Criar Estatistica -->
                                            <div class="modal fade" id="myModalCreateEstatistica" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoCriar.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="servico">Serviço técnico </label> 
                                                                    <select class="form-control" name="servico" id="servico">
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
                                                                    <label for="satisfacao">Nivel de satisfacao</label>
                                                                    <select class="form-control" name="satisfacao" id="satisfacao">                                                               
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                        <option>10</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pontuacao">Pontuação</label>
                                                                    <select class="form-control" name="pontuacao" id="pontuacao">                                                               
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                        <option>10</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="comentario">Comentário do cliente</label>
                                                                    <textarea class="form-control " name="comentario" id="area" rows="20"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="estatistica" id="criarEstatistica">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal 1  - Apagar Estatistica -->
                                            <div class="modal fade" id="myModalDeleteEstatistica" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="metodoDelete.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="servico">ID Serviço</label>
                                                                    <select class="form-control" name="servico" id="selectTipo">
                                                                        <?php
                                                                            if(!empty($row4))
                                                                            foreach($row4 as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['id_servico']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="estatistica" id="apagarEstatistica">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <script> 
                                            $('document').ready(function(){
                                                $('#estatisticaCreate').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalCreateEstatistica').modal('toggle');

                                                });
                                                $('#estatisticaDel').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalDeleteEstatistica').modal('toggle');

                                                });
                                            //------------------------------------------------------------------------
                                                $('#criarEstatistica').on('click',function(){
                                                                $('form').submit();
                                                });

                                                $('#apagarEstatistica').on('click',function(){
                                                                $('form').submit();
                                                });
                                            });    
                                            </script>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Servicos tecnicos</h5>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Descrição</th>
                                                        <th>Cliente </th>                                                               
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
                                                        <td> <?php echo $rows['servico_descricaoGeral']; ?> </td>
                                                        <td> <?php echo $rows['cliente_nome']; ?> </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
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
    <script>
        let listaCliente = new Array();

        let nomeClientes = new Array();
        let numeroClientes = new Array();

        function definirArray( objectoArray ){

            for (let index = 0; index < objectoArray.length; index++) {
                let element = objectoArray[index];
                listaCliente.push(element);      
            }
        }

        function adicionarDados( objectoArray ){

            for (let index = 0; index < objectoArray.length; index++) {
                let element = objectoArray[index];
                nomeClientes.push(element.cliente_nome);      
            }

            for (let index = 0; index < objectoArray.length; index++) {
                let element = objectoArray[index];
                numeroClientes.push(element.cliente_numServico);      
            }
        }

        fetch('Ajax-Calls.php')
        .then(response => response.json())
        .then(data => {    
            definirArray(data);
            adicionarDados(listaCliente);

            const barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9",
                "#1e7145"
                ];

                new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: nomeClientes,
                    datasets: [{
                    backgroundColor: barColors,
                    data: numeroClientes
                    }]
                },
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    </script>
    <script src="assets\js\chart.min.js"> </script>

</body>
</html>
