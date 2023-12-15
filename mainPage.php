<?php
    include 'DB.php';

    $sql = "SELECT COUNT(*) FROM servicotecnico WHERE servico_estado LIKE 'andamento'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $sql2 = "SELECT COUNT(*) FROM servicotecnico WHERE servico_estado LIKE 'terminado'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

    $sql3 = "SELECT COUNT(*) FROM levantamento ";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);

    $sql4 = "select * from servicotecnico
    inner join tecnico On tec_id = id_tec
    inner join cliente On cliente_id = id_cliente ORDER by cliente_nome";
    $result4 = ($conn->query($sql4));
    //declare array to store the data of database
    $row4 = []; 
    
    if ($result4->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row4 = $result4->fetch_all(MYSQLI_ASSOC);  
    }

    $sql5 = "SELECT COUNT(*) FROM localexecucao";
    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_array($result5);

    $sql6 = "SELECT COUNT(*) FROM relatorio";
    $result6 = mysqli_query($conn, $sql6);
    $row6 = mysqli_fetch_array($result6);

    $sql7 = "select * from sistemaseguranca";
    $result7 = ($conn->query($sql7));
    //declare array to store the data of database
    $row7 = []; 
    
    if ($result7->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row7 = $result7->fetch_all(MYSQLI_ASSOC);  
    }

    $sql8 = "select * from cliente";
    $result8 = ($conn->query($sql8));
    //declare array to store the data of database
    $row8 = []; 
    
    if ($result8->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row8 = $result8->fetch_all(MYSQLI_ASSOC);  
    }

    $sql9 = "select * from tecnico";
    $result9 = ($conn->query($sql9));
    //declare array to store the data of database
    $row9 = []; 
    
    if ($result9->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row9 = $result9->fetch_all(MYSQLI_ASSOC);  
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRM - Amiware</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
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
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!--[ daily sales section ] start-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Serviços terminados</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-thumbs-up"> &nbsp </i>- <?php echo $row2[0]; ?></h3> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ daily sales section ] end-->
                                <!--[ Monthly  sales section ] starts-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card Monthly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Serviços em execução</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i><?php echo $row[0]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Monthly  sales section ] end-->
                                <!--[ year  sales section ] starts-->
                                <div class="col-md-12 col-xl-4">
                                    <div class="card yearly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Levantamentos Feitos</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-edit"> &nbsp </i>- <?php echo $row3[0]; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ year  sales section ] end-->
                                <!--[ Recent Users ] start-->
                                <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Servicos a decorrer</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <?php
                                                        if(!empty($row4))
                                                            foreach($row4 as $rows){ 
                                                    ?>                                                                   
                                                    <tbody>
                                                        <!-- TODO demonstrar a percentagem do trabalho -->
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
                                                                <h6 class="mb-1"><?php echo $rows['cliente_nome']; ?></h6>
                                                                <p class="m-0"><?php echo $rows['servico_descricaoGeral']; ?></p>
                                                                <hr>
                                                                

                                                                 <?php     
                                                                    $condicao = $rows['servico_id'];
                                                                    $limite = $rows['servico_numeroEtapas'];

                                                                    $sql10 = "SELECT COUNT(*) FROM relatorio WHERE id_servico = '$condicao' ";
                                                                    $result10 = mysqli_query($conn, $sql10);
                                                                    $row10 = mysqli_fetch_array($result10);
                                                                  
                                                                  
                                                                ?><p class="m-0">Etapas completas: <?php echo $row10[0]; ?> de <?php echo $limite; ?></p>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if ($rows['servico_estado'] == 'Andamento') {
                                                                        ?><h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i><?php echo $rows['servico_estado']; ?></h6><?php 
                                                                    }
                                                                    else {
                                                                        ?><h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i><?php echo $rows['servico_estado']; ?></h6><?php 
                                                                    }
  
                                                                ?>
                                                                <hr>
                                                                <p class="m-0">Tecnico responsavel: <?php echo $rows['tec_nome']; ?></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>                            
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ statistics year chart ] start -->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-zap f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"></i> <?php echo $row6[0]; ?></h3>
                                                    <span class="d-block text-uppercase">Relatorios técnicos </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-map-pin f-30 text-c-blue"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"><?php echo $row5[0]; ?></h3>
                                                    <span class="d-block text-uppercase">Locais de execução</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ statistics year chart ] end -->
                                <hr>
                                <div class="col-md-12 col-xl-4">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col text-right">
                                                    <h5>Técnicos registrados</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center card-active">
                                                <div class="col-6">
                                                    <div class="text-center m-b-10">
                                                        <?php
                                                            if(!empty($row9))
                                                                foreach($row9 as $rows)
                                                                { 
                                                            ?>                                                                   
                                                            <?php echo $rows['tec_nome']; ?>
                                                            <?php echo "<hr>" ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <!--[social-media section] start-->
                                <div class="col-md-12 col-xl-4">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col text-right">
                                                    <h5>Sistema de segurança</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center card-active">
                                                <div class="col-6">
                                                    <div class="text-center m-b-10">
                                                        <?php
                                                            if(!empty($row7))
                                                                foreach($row7 as $rows)
                                                                { 
                                                            ?>                                                                   
                                                            <?php echo $rows['sis_designacao']; ?>
                                                            <?php echo "<hr>" ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-4">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col text-right">
                                                    <h5>Clientes registrados</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center card-active">
                                                <div class="col-6">
                                                    <div class="text-center m-b-10">
                                                        <?php
                                                            if(!empty($row8))
                                                                foreach($row8 as $rows)
                                                                { 
                                                            ?>                                                                   
                                                            <?php echo $rows['cliente_nome']; ?>
                                                            <?php echo "<hr>" ?>
                                                        <?php } ?>
                                                    </div>
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

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.js"></script>
   
</body>
</html>

