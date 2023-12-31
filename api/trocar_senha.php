<?php
    include('conecta.php');
    session_start();

    if(empty($_POST['email_esqueci_senha']) || empty($_POST['nova_senha']) || empty($_POST['tipousr'])) {
        header('Location: login.php');
        exit();
    }

    $email = $_POST['email_esqueci_senha'];
    $senha = $_POST['nova_senha'];
    $tipo_usuario = $_POST['tipousr'];

    if($tipo_usuario == "anunciante") { //se for anunciante
        //$queryNovaSenha = "UPDATE anunciante SET SenhaAnunciante = '{$senha}' WHERE EmailAnunciante='{$email}'";
        //echo $queryNovaSenha;
        //exit();
        //$resultNovaSenha = mysqli_query($mysqli, $queryNovaSenha);
        //$affected_rows = mysqli_affected_rows($resultNovaSenha);
        $mysqli -> query("UPDATE anunciante SET SenhaAnunciante = '{$senha}' WHERE EmailAnunciante='{$email}'");
        if($mysqli -> affected_rows > 0) {
            $_SESSION['senha_trocada'] = true;
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['nao_trocada'] = true;
            header('Location: login.php');
            exit();
        }
    } else { //se for turista
        //$queryNovaSenha = "UPDATE turista SET SenhaTurista = '{$senha}' WHERE EmailTurista='{$email}'";
        //$resultNovaSenha = mysqli_query($mysqli, $queryNovaSenha);
        $mysqli -> query("UPDATE turista SET SenhaTurista = '{$senha}' WHERE EmailTurista='{$email}'");
        if($mysqli -> affected_rows > 0) {
            $_SESSION['senha_trocada'] = true;
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['nao_trocada'] = true;
            header('Location: login.php');
            exit();
        }
    }
?>