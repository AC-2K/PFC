<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include 'DB.php';
$q = $_GET['q'];
$sql="SELECT * FROM servicotecnico 
INNER JOIN tecnico On tec_id = id_tec
INNER JOIN cliente On cliente_id = id_cliente 
WHERE cliente_nome = '$q' ";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC);  

echo "
<div class='col-xl-12'>
    <div class='card'>
        <div class='card-block table-border-style'>
            <div class='table-responsive'>
                <table class='table table-hover'>
                    <thead>
                        <tr>

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
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
                        echo "<tr>";

                            echo "<td>" . $rows['servico_estDuracao'] . "</td>";
                            echo "<td>" . $rows['servico_descricaoGeral'] . "</td>";

                            echo "<td>" . $rows['servico_estado'] . "</td>";
                            echo "<td>" . $rows['servico_dataInicio'] . "</td>";

                            echo "<td>" . $rows['servico_dataFim'] . "</td>";
                            echo "<td>" . $rows['servico_aprovacao'] . "</td>";

                            echo "<td>" . $rows['servico_numeroEtapas'] . "</td>";
                            echo "<td>" . $rows['servico_Tipo'] . "</td>";

                            echo "<td>" . $rows['tec_nome'] . "</td>";
                        echo "</tr>";
                        }
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
echo "</div>";
mysqli_close($conn);
?>
</body>
</html>
