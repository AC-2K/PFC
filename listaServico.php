<?php
   include 'DB.php';
   
   $sql = "select cliente_nome from servicotecnico
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

   $sql2 = "select cliente_nome from cliente";
  
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
                                            <select name="servico" onchange="showParameter(this.value,'txtHint','getServico.php?q=')" class="form-control">
                                                    <option value=""> </option>
                                                <?php
                                                if(!empty($row))
                                                foreach($row as $rows)
                                                { 
                                                ?>                                                                   
                                                    <option value="<?php echo $rows['cliente_nome']; ?>" ><?php echo $rows['cliente_nome']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <hr>
                                            <div id="txtHint"></div>
                                        </div>
                                        <div class="card-body">
                                            <h5>Locais de execução</h5>
                                            <hr>
                                            <select name="local" onchange="showParameter(this.value,'txtHint2','getLocal.php?q=')" class="form-control">
                                                    <option value=""> </option>
                                                <?php
                                                if(!empty($row2))
                                                foreach($row2 as $rows)
                                                { 
                                                ?>                                                                   
                                                    <option value="<?php echo $rows['cliente_nome']; ?>" ><?php echo $rows['cliente_nome']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <hr>
                                            <div id="txtHint2"></div>
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
    <script src="assets/js/AJAX.js"></script>
</body>
</html>
