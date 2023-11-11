<?php
    include("conecta.php");

    $cidades = $_REQUEST['cidades'];

    $query = "SELECT DISTINCT Bairro FROM local WHERE Cidade ='{$cidades}' ORDER BY Bairro ASC";
    $result = mysqli_query($mysqli, $query);
    //$coluna = $result->fetch_assoc();
    //while ($row = $result->fetch_assoc()) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bairros_post[] = array (
            'bairros' => $row['Bairro'],
        );
    }

    echo (json_encode($bairros_post));
