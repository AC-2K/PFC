<?php
    include 'DB.php';

    $sql = "select * from relatorio inner join servicotecnico On servico_id = id_servico
    inner join cliente On cliente_id = id_cliente";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
    
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }


    $sql2 = "select * from servicotecnico inner join cliente On cliente_id = id_cliente";
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
                                            <h5>Gestão de Relatorios</h5>
                                            <hr>
                                            <button type="submit" class="btn btn-success" id="relatorioCreate" >Criar</button>
                                            <button type="submit" class="btn btn-primary" id="relatorioACT" >Actualizar</button>
                                            <button type="submit" class="btn btn-danger" id="relatorioDel" >Apagar</button>
                                            <hr>
                                            <button type="submit" class="btn btn-primary" id="relatorioPDF" >Imprimir PDF</button>
                                            <hr>

                                            <!-- Modal 1  - Criar Relatorio -->
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
                                                                            <option><?php echo $rows['servico_id']." - ".$rows['cliente_nome']."- ".$rows['servico_descricaoGeral']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="data">Data de execução</label>
                                                                    <input type="date" class="form-control"  name="data" id="data" aria-describedby="data" placeholder="data">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="descricao">Descricao geral</label>
                                                                    <textarea class="form-control " name="descricao" id="area" rows="20"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="etapa">Etapa</label>
                                                                    <input type="number" class="form-control"  name="etapa" id="etapa" aria-describedby="etapa" placeholder="etapa">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="anexo">anexo</label>
                                                                    <input type="text" class="form-control"  name="anexo" id="anexo" aria-describedby="anexo" placeholder="anexo">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="relatorio" id="criarRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 2  - Actualizar Relatorio -->
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
                                                                            <option><?php echo $rows['rel_id']."-".$rows['cliente_nome']."-".$rows['rel_descricao']; ?></option>
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
                                                                <button class="btn btn-primary" name="submeter" value="relatorio" id="actualizarRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 3  - Apagar Relatorio -->
                                            <div class="modal fade" id="myModalDeleteRelatorio" role="dialog">
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
                                                                    <select class="form-control" name="selectRelatorio" id="selectRelatorio" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['rel_id']."-".$rows['cliente_nome']."-".$rows['rel_descricao']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="relatorio" id="apagarRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
                                            <!-- Modal 4  - Obter PDF -->
                                            <div class="modal fade" id="myModalPDFRelatorio" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form action="pdf.php" method="POST" enctype="multipart/form-data" >
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="selectRelatorio">Relatorio técnico </label> 
                                                                    <select class="form-control" name="selectRelatorio" id="selectRelatorio" required>
                                                                        <?php
                                                                            if(!empty($row))
                                                                            foreach($row as $rows)
                                                                            { 
                                                                        ?>                                                                   
                                                                            <option><?php echo $rows['rel_id']."-".$rows['cliente_nome']."-".$rows['rel_descricao']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    
                                                                    <br>
                                                                    <!-- Checkboxes de actividades -->
                                                                    <label>Actividades de manutenção efectuado</label>
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao1" value="Limpeza de equipamento"> Limpeza de equipamento
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao2" value="Verificação fisica"> Verificação fisica
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao3" value="Verificação logica"> Verificação logica
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao4" value="Teste mecanico"> Teste mecanico
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao5" value="Troca de peças e/ou equipamento"> Troca de peças e/ou equipamento
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao6" value="Troca de peças"> Troca de peças
                                                                    <hr>
                                                                    <input  type="checkbox" name="opcao7" value="Lubrificação de peças"> Lubrificação de peças        
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-danger" data-dismiss="modal">Negar</button>
                                                                <button class="btn btn-primary" name="submeter" value="relatorio" id="pdfRelatorio">continuar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ------------------------------------------------------------------------ -->
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
                                                    $('#myModalDeleteRelatorio').modal('toggle');

                                                });
                                                $('#relatorioPDF').on('click',function(e){
                                                    e.preventDefault();
                                                    $('#myModalPDFRelatorio').modal('toggle');

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
                                                $('#pdfRelatorio').on('click',function(){
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
