<?php
    session_start();
    include("conecta.php");

    $_REQUEST['cidades'];
    $query = "SELECT DISTINCT `Bairro` FROM `local` WHERE IdCategoria =$cidades  ORDER BY `Bairro` ASC";
    $result =  mysqli_query($mysqli, $result);

    while ($row = mysqli_fetch_assoc($result)) {
        $bairros_post[] = array (
            'bairro' => $row['Bairro']
        );
    }

    echo (json_encode($bairros_post));
?>