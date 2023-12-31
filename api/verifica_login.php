<?php 
    session_start();
    if(!$_SESSION['usuario']) { //se o usuário não estiver logado
        header('Location: login.php');
        exit();
    }
?>