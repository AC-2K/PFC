<?php
   include 'DB.php';
   
   $sql = "select * from servicotecnico
   inner join tecnico On tec_id = id_tec
   inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";

  
   $result = ($conn->query($sql));
   //declare array to store the data of database
   $row = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $row = $result->fetch_all(MYSQLI_ASSOC);  
   }

   $sql2 = "select * from localexecucao
   inner join servicotecnico On servico_id = id_servico
   inner join cliente On cliente_id = id_cliente";
  
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
                                            <h5>Lista serviço tecnico</h5>
                                            <hr>
                                            <!-- [ Hover-table ] start -->
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Cliente</th>

                                                                        <th>Duração</th>
                                                                        <th>Descrição</th>
                                                                        
                                                                        <th>Estado</th>
                                                                        <th>Data inicio</th>

                                                                        <th>Data fim</th>
                                                                        <th>Aprovação</th>

                                                                        <th>Etapas</th>
                                                                        <th>Tipo</th>

                                                                        <th>Tecnico Responsavel</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        if(!empty($row))
                                                                        foreach($row as $rows)
                                                                        { 
                                                                    ?>                                                                   
                                                                    <tr>
                                                                        <td> <?php echo $rows['cliente_nome']; ?> </td>

                                                                        <td> <?php echo $rows['servico_estDuracao']; ?> </td>
                                                                        <td> <?php echo $rows['servico_descricaoGeral']; ?> </td>

                                                                        <td> <?php echo $rows['servico_estado']; ?> </td>
                                                                        <td> <?php echo $rows['servico_dataInicio']; ?> </td>

                                                                        <td> <?php echo $rows['servico_dataFim']; ?> </td>
                                                                        <td> <?php echo $rows['servico_aprovacao']; ?> </td>

                                                                        <td> <?php echo $rows['servico_numeroEtapas']; ?> </td>
                                                                        <td> <?php echo $rows['servico_Tipo']; ?> </td>

                                                                        <td> <?php echo $rows['tec_nome']; ?> </td>
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
                                            <h5>Locais de execução</h5>
                                            <hr>
                                            <!-- [ Hover-table ] start -->
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Serviço & cliente</th>
                                                                        <th>Pais</th>
                                                                        <th>Provincia</th>

                                                                        <th>Endereco</th>
                                                                        <th>Estrutura</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                        if(!empty($row2))
                                                                        foreach($row2 as $rows)
                                                                        { 
                                                                    ?>                                                                   
                                                                    <tr>
                                                                        <td> <?php echo $rows['cliente_nome']." - ".$rows['servico_descricaoGeral']; ?> </td>
                                                                        <td> <?php echo $rows['loc_pais']; ?> </td>
                                                                        <td> <?php echo $rows['loc_provincia']; ?> </td>

                                                                        <td> <?php echo $rows['loc_endereco']; ?> </td>
                                                                        <td> <?php echo $rows['loc_tipoEstrutura']; ?> </td>
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
