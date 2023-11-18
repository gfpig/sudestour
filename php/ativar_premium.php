<?php
    include('conecta.php');
    session_start();

    if(!isset($_SESSION['Anunciante'])) {
        header('Location: index.php');
        exit();
    }

    $mysqli -> query("UPDATE anunciante SET statusPremium = 1 WHERE Cnpj = '{$_SESSION['cnpj']}'");

    if($mysqli -> affected_rows == 0) {
        $_SESSION['erro_premium'];
        header('Location: pagamento.php');
        exit();
    }
    header('Location: perfil.php');
?>