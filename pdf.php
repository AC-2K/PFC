<?php
    include 'DB.php';
    $value = $_POST['submeter'];
    require_once 'assets/pdf/tcpdf.php';

    // Extend the TCPDF class to create custom Header and Footer
    class HeaderFooter extends TCPDF {


        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    $pdf = new HeaderFooter(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    //HTML components
    $header ='<head>
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .demo {
            width:100%;
            border:1px solid #E6E6E6;
            border-collapse:collapse;
            padding:5px;
        }
        .demo th {
            text-align:center;
            border:1px solid #E6E6E6;
            padding:5px;
            background:##C2C2C2;
            font-size: 15px;
        }
        .demo td {
            border:1px solid #E6E6E6;
            text-align:left;
            padding:9px;
            font-size: 10px;
        }

        .header {
            width:100%;
            border:1px none  #E6E6E6;
            border-collapse:collapse;
            padding:1.5px;
        }
        .header th {
            text-align:left;
            border:1px none  #E6E6E6;
            background:##C2C2C2;
            font-size: 9px;
            padding:0.5px;
        }
        .center {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>';

//Servico tecnico
    if ($value =='servico') {
    try {
            //Busca de dados do servico tecnico selecionado
            $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['servico']); 
            $stmt = $conn->prepare(" SELECT * from servicotecnico 
            INNER JOIN tecnico ON tec_id = id_tec 
            INNER JOIN cliente On cliente_id = id_cliente
            where servico_id = ? ");
            
            $stmt->bind_param("s", $servico);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = [];
            $data = $result->fetch_all(MYSQLI_ASSOC);  
//---------------------------------------------------------------------------------------
            //Lista de sistemas de seguranca designado para o servico
            $sql = "select ss.sis_designacao from sistemaseguranca ss
            INNER JOIN listasistema ls ON ls.id_sis = ss.sis_id 
            INNER JOIN servicoTecnico ON servico_id = id_servico
            where servico_id =".$servico;
            $result = ($conn->query($sql));
            $row = []; 
            if ($result->num_rows > 0) 
            {
                $row = $result->fetch_all(MYSQLI_ASSOC);  
            }
            //Popular array de designacao de sistema de seguranca
            $array = array();
            if (!empty($row)) {
                foreach($row as $rows){
                    $array[] = $rows['sis_designacao'];
                }
            } 
            $sistemas = implode(", ",$array);
//---------------------------------------------------------------------------------------
            // create new PDF document
            $pdf->AddPage();
?>
            <?php
            if(!empty($data))
                foreach($data as $rows)
                { 
            ?>                                                                   
            <?php 
            $html = $header.
            '
            <img src="assets/images/pdf-header.jpg" width ="1000" >
                <table class="header">
                    <thead>
                        <tr>
                            <th> Cliente: '.$rows['cliente_nome'].'</th>
                        </tr>
                        <tr>
                            <th> Email: '.$rows['cliente_email'].'</th>
                        </tr>
                        <tr>
                            <th> Categoria: '.$rows['cliente_tipo'].'</th>
                        </tr>
                    </thead>
                </table>
            <div class="table-responsive">
                <table class="demo">
                    <thead>
                    <tr>
                        <th colspan ="5" > Detalhes do serviço Técnico </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tipo de serviço</td>
                            <td>Aprovação</td>
                            <td>Data de inicio</td>
                            <td>Data fim</td>
                            <td>Numero de etapas</td>
                        </tr>
                        <tr>
                            <td>'.$rows['servico_Tipo'].'</td>
                            <td>'.$rows['servico_aprovacao'].'</td>
                            <td>'.$rows['servico_dataInicio'].'</td>
                            <td>'.$rows['servico_dataFim'].'</td>
                            <td>'.$rows['servico_numeroEtapas'].'</td>
                        </tr>
                        <tr>
                            <th colspan ="5" > Sistemas de seguranca coberto </th>
                        </tr>
                            <tr>
                                <td colspan = "5">'.$sistemas.'</td>
                            </tr>
                        <tr>
                            <th colspan ="5" > Descrição </th>
                        </tr>
                            <tr>
                                <td colspan ="5">'.$rows['servico_descricaoGeral'].'</td>
                            </tr>
                        <tr>
                            <th colspan ="5" > Estado actual </th>
                        </tr>
                            <tr>
                                <td colspan="5">'.$rows['servico_estado'].'</td>
                            </tr>
                        <tr>
                            <th colspan ="5" > Tecnico responsavel </th>
                        </tr>
                            <tr>
                                <td colspan="5">'.$rows['tec_nome'].'</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            '; ?>
            
            <?php echo "<hr>" ?>
        <?php } ?> 
        
<?php 
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
            ob_end_clean();
            $pdf->Output('servico.pdf', 'I');

    } catch (\Throwable $th) {
        //throw $th;
    }

}

//Relatorio
if ($value =='relatorio') {
    try {
         //Busca de dados do servico tecnico selecionado
         $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectRelatorio']); 
         $stmt = $conn->prepare(" SELECT * from relatorio 
         INNER JOIN servicotecnico ON servico_id = id_servico
         INNER JOIN cliente On cliente_id = id_cliente
         where rel_id = ? ");
         
         $stmt->bind_param("s", $servico);
         $stmt->execute();
         $result = $stmt->get_result();
         $data = [];
         $data = $result->fetch_all(MYSQLI_ASSOC);

//---------------------------------------------------------------------------------------
        //Lista de sistemas de seguranca designado para o servico
        $sql = "select ss.sis_designacao from sistemaseguranca ss
        INNER JOIN listasistema ls ON ls.id_sis = ss.sis_id 
        INNER JOIN servicoTecnico ON servico_id = id_servico
        where servico_id =".$data[0]["id_servico"];
        $result = ($conn->query($sql));

        $designacoes = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($designacoes,$row["sis_designacao"] );
        }
        $sistemas = implode(", ",$designacoes);
        $opcao1 = "";
        $opcao2 = "";
        $opcao3 = "";
        $opcao4 = "";
        $opcao5 = "";
        $opcao6 = "";
        $opcao7 = "";
        //Opcoes
        if(isset($_POST['opcao1'])){ $opcao1 = $_POST['opcao1'];}
        if(isset($_POST['opcao2'])){ $opcao2 = $_POST['opcao2'];}
        if(isset($_POST['opcao3'])){ $opcao3 = $_POST['opcao3'];}
        if(isset($_POST['opcao4'])){ $opcao4 = $_POST['opcao4'];}
        if(isset($_POST['opcao5'])){ $opcao5 = $_POST['opcao5'];}
        if(isset($_POST['opcao6'])){ $opcao6 = $_POST['opcao6'];}
        if(isset($_POST['opcao7'])){ $opcao7 = $_POST['opcao7'];}
//---------------------------------------------------------------------------------------
         // create new PDF document
         $pdf->AddPage();
?>
        <?php
        if(!empty($data))
            foreach($data as $rows)
            { 
        ?>                                                                   
        <?php 
        $html = $header.
         '
         <img src="assets/images/pdf-header.jpg" width ="1000" >
            <table class="header">
                <thead>
                    <tr>
                        <th> Cliente: '.$rows['cliente_nome'].'</th>
                    </tr>
                    <tr>
                        <th> Email: '.$rows['cliente_email'].'</th>
                    </tr>
                    <tr>
                        <th> Categoria: '.$rows['cliente_tipo'].'</th>
                    </tr>
                </thead>
            </table>
         <div class="table-responsive">

             <table class="demo">
                 <thead>
                 <tr>
                     <th colspan ="3" > Relatório técnico </th>
                 </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <td>Tipo de serviço: '.$rows['servico_Tipo'].'</td>
                         <td>Data: '.$rows['rel_data'].'</td>
                         <td>Etapa: '.$rows['rel_etapa'].'</td>
                     </tr>
                     <tr>
                         <th colspan ="3" > Sistemas de seguranca coberto </th>
                     </tr>
                         <tr>
                             <td colspan = "3">'.$sistemas.'</td>
                         </tr>
                     <tr>
                         <th colspan ="3" > Descrição </th>
                     </tr>
                         <tr>
                             <td colspan ="3">'.$rows['rel_descricao'].'</td>
                         </tr>
                     <tr>
                         <th colspan ="3" > Actividades realizados </th>
                     </tr>

                    <tr>
                        <td colspan ="3">'.$opcao1.'</td>
                    </tr>
                    <tr>
                        <td colspan ="3">'.$opcao2.'</td>
                    </tr>
                    <tr>
                        <td colspan ="3">'.$opcao3.'</td>
                    </tr>
                    <tr>
                        <td colspan ="3">'.$opcao4.'</td>
                    </tr>
                    <tr>
                        <td colspan ="3">'.$opcao5.'</td>
                    </tr>
                    <tr>
                        <td colspan ="3">'.$opcao6.'</td>
                    </tr>
                    <tr>
                        <td colspan ="3">'.$opcao7.'</td>
                    </tr>
                 </tbody>
             </table>
         </div>
         '; ?>
         
         <?php echo "<hr>" ?>
     <?php } ?> 
     
<?php 
         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
         ob_end_clean();
         $pdf->Output('relatorio.pdf', 'I');
    } catch (\Throwable $th) {
        //throw $th;
    }

}

//Levantamento
if ($value =='levantamento') {
    try {
        //Busca de dados do servico tecnico selecionado
        $servico = preg_replace('/(\d+)\s.*/', '$1', $_POST['selectLevantamento']); 
        $stmt = $conn->prepare(" SELECT * from levantamento 
        INNER JOIN servicotecnico ON servico_id = id_servico
        INNER JOIN cliente On cliente_id = id_cliente
        where lev_id = ? ");
        
        $stmt->bind_param("s", $servico);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        $data = $result->fetch_all(MYSQLI_ASSOC);

//---------------------------------------------------------------------------------------
       //Lista de sistemas de seguranca designado para o servico
       $sql = "select ss.sis_designacao from sistemaseguranca ss
       INNER JOIN listasistema ls ON ls.id_sis = ss.sis_id 
       INNER JOIN servicoTecnico ON servico_id = id_servico
       where servico_id =".$data[0]["id_servico"];
       $result = ($conn->query($sql));

       $designacoes = array();
       while ($row = mysqli_fetch_assoc($result)) {
           array_push($designacoes,$row["sis_designacao"] );
       }
       $sistemas = implode(", ",$designacoes);
//---------------------------------------------------------------------------------------
        // create new PDF document
        $pdf->AddPage();
?>
        <?php
        if(!empty($data))
            foreach($data as $rows)
            { 
        ?>                                                                   
        <?php 
        $html =$header.
        '
        <img src="assets/images/pdf-header.jpg" width ="1000" >
            <table class="header">
                <thead>
                    <tr>
                        <th> Cliente: '.$rows['cliente_nome'].'</th>
                    </tr>
                    <tr>
                        <th> Email: '.$rows['cliente_email'].'</th>
                    </tr>
                    <tr>
                        <th> Categoria: '.$rows['cliente_tipo'].'</th>
                    </tr>
                </thead>
            </table>
        <div class="table-responsive">

            <table class="demo">
                <thead>
                <tr>
                    <th colspan ="2" > Levantamento técnico </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tipo de serviço: '.$rows['servico_Tipo'].'</td>
                        <td>Data: '.$rows['lev_data'].'</td>
                    </tr>
                    <tr>
                        <th colspan ="2" > Sistemas de seguranca coberto </th>
                    </tr>
                        <tr>
                            <td colspan = "2">'.$sistemas.'</td>
                        </tr>
                    <tr>
                        <th colspan ="2" > Descrição do levantamento </th>
                    </tr>
                    <tr>
                        <td colspan ="2">'.$rows['lev_observacao'].'</td>
                    </tr>
                </tbody>
            </table>
        </div>
        '; ?>
        
        <?php echo "<hr>" ?>
    <?php } ?> 
    
<?php 
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        ob_end_clean();
        $pdf->Output('levantamento.pdf', 'I');
   } catch (\Throwable $th) {
       //throw $th;
   }

} 

//TODO deixar as tabelas mais bonitos

//TODO Implementar imagens no relatorio

?>


