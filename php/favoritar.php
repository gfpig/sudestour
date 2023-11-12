<?php
    session_start();
    include("conecta.php");

    $cep = $_REQUEST["Cep"];
    $query = "SELECT Cep from local where Cep='{$cep}'";
    $result = mysqli_query($mysqli, $query);

    
?>