<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
include 'DB.php';
$q = $_GET['q'];
$sql="SELECT * from listamaterial
inner join equipamento On eqm_id = id_eqm
inner join sistemaseguranca On sis_id = id_sis
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
                            <th>Descrição</th>
                            <th>Sistema segurança</th>
                            
                            <th>Loja</th>
                            <th>Equipamento</th>

                            <th>Fabricante</th>
                            <th>Modelo</th>

                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
                        echo "<tr>";

                            echo "<td>" . $rows['servico_descricaoGeral'] . "</td>";
                            echo "<td>" . $rows['sis_designacao'] . "</td>";

                            echo "<td>" . $rows['list_loja'] . "</td>";
                            echo "<td>" . $rows['eqm_nome'] . "</td>";

                            echo "<td>" . $rows['eqm_fabricante'] . "</td>";
                            echo "<td>" . $rows['eqm_modelo'] . "</td>";

                            echo "<td>" . $rows['list_quantidade'] . "</td>";

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
