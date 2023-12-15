<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include 'DB.php';
$q = $_GET['q'];
$sql="SELECT * from localexecucao
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
                            <th>Pais</th>
                            <th>Provincia</th>
                            
                            <th>Endereco</th>
                            <th>Data Estrutura</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
                        echo "<tr>";

                            echo "<td>" . $rows['loc_pais'] . "</td>";
                            echo "<td>" . $rows['loc_provincia'] . "</td>";

                            echo "<td>" . $rows['loc_endereco'] . "</td>";
                            echo "<td>" . $rows['loc_tipoEstrutura'] . "</td>";

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
