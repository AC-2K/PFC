<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include 'DB.php';
$q = $_GET['q'];
$sql="SELECT * FROM relatorio 
inner join servicotecnico On servico_id = id_servico
inner join cliente On cliente_id = id_cliente
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
                            <th>Data de execução</th>
                            <th>Serviço Técnico</th>
                            
                            <th>Relatório</th>
                            <th>Etapa</th>
                            <th>anexo</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
                        echo "<tr>";

                            echo "<td>" . $rows['rel_data'] . "</td>";
                            echo "<td>" . $rows['servico_descricaoGeral'] . "</td>";

                            echo "<td>" . $rows['rel_descricao'] . "</td>";

                            echo "<td>" . $rows['rel_etapa'] . "</td>";
                            echo "<td>" . $rows['rel_anexo'] . "</td>";

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
