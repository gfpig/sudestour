<?php 
    session_start();
    include("conecta.php");

    if(empty($_POST['usuario']) || empty($_POST['senha'])) { //se não tiver esses valores, redireciona p/ pag login
        header('Location: login.php');
    }

    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
    $tipo_usuario = $_POST['tipousr'];
    if ($tipo_usuario == "anunciante") {
        $query = "SELECT EmailAnunciante, SenhaAnunciante from anunciante WHERE EmailAnunciante = '{$usuario}' AND SenhaAnunciante = '{$senha}'";
    } else {
        $query = "SELECT EmailTurista, SenhaTurista from turista WHERE EmailTurista = '{$usuario}' AND SenhaTurista = '{$senha}'";
    }
    //echo $usuario;
    //echo $senha;
    //exit();
    //$query = "SELECT turista.EmailTurista, turista.SenhaTurista, anunciante.EmailAnunciante, anunciante.SenhaAnunciante from turista CROSS JOIN anunciante WHERE anunciante.EmailAnunciante = '{$usuario}' AND anunciante.SenhaAnunciante = '{$senha}'";
    $result = mysqli_query($mysqli, $query);

    $row = mysqli_num_rows($result);
    //echo $row;exit;
    if ($row == 1) { //se o login for validado, redireciona para home
        //$query = "SELECT turista.NomeTurista, anunciante.NomeAnuciante from turista CROSS JOIN anunciante WHERE turista.EmailTurista = '{$usuario}' OR anunciante.EmailAnunciante = '{$usuario}'";
        //$result = mysqli_query($mysqli, $query);
        //$nomeUsuario = 
        //echo $result;
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else { //se não, volta para a tela de login
        header('Location: login.php');   
        $_SESSION['nao_autenticado'] = true;    
        exit;
    }
?>