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
        $query = "SELECT Cnpj, SenhaAnunciante, NomeAnunciante from anunciante WHERE EmailAnunciante = '{$usuario}' AND SenhaAnunciante = '{$senha}'";
        $result = mysqli_query($mysqli, $query);

        $coluna = $result->fetch_assoc();	
        $nome = $coluna["NomeAnunciante"];
        //$email = $coluna["EmailAnunciante"];

        $row = mysqli_num_rows($result);
        if ($row == 1) { //se o login for validado, redireciona para home
            $cnpj = $coluna["Cnpj"];
            $_SESSION['usuario'] = $nome;
            $_SESSION['Anunciante'] = true;
            $_SESSION['cnpj'] = $cnpj;
            header('Location: index.php');
            exit();
        } else { //se não, volta para a tela de login
            header('Location: login.php');   
            $_SESSION['nao_autenticado'] = true;    
            exit();
        }
    } else {
        $query = "SELECT Cpf, SenhaTurista, NomeTurista from turista WHERE EmailTurista = '{$usuario}' AND SenhaTurista = '{$senha}'";
        $result = mysqli_query($mysqli, $query);
        //$result = $mysqli -> query($query);
        $coluna = $result->fetch_assoc();	
        $nome = $coluna["NomeTurista"];
        $email = $coluna["EmailTurista"];

        $row = mysqli_num_rows($result);
        if ($row == 1) { //se o login for validado, redireciona para home
            $cnpj = $coluna["Cpf"];
            $_SESSION['usuario'] = $nome;
            $_SESSION['Turista'] = true;
            $_SESSION['cpf'] = $cpf;
            //$_SESSION['email'] = $email;
            
            header('Location: index.php');
            exit();
        } else { //se não, volta para a tela de login
            header('Location: login.php');   
            $_SESSION['nao_autenticado'] = true;    
            exit();
        }
    }
    //echo $usuario;
    //echo $senha;
    //exit();
    //$query = "SELECT turista.EmailTurista, turista.SenhaTurista, anunciante.EmailAnunciante, anunciante.SenhaAnunciante from turista CROSS JOIN anunciante WHERE anunciante.EmailAnunciante = '{$usuario}' AND anunciante.SenhaAnunciante = '{$senha}'";
    /*$result = mysqli_query($mysqli, $query);
    $coluna = $result->fetch_assoc();	
    $nome = $coluna["NomeAnunciante"];*/
    //echo $nome;
    //exit();

    /*$row = mysqli_num_rows($result);
    //echo $row;exit;
    if ($row == 1) { //se o login for validado, redireciona para home
        //$query = "SELECT turista.NomeTurista, anunciante.NomeAnuciante from turista CROSS JOIN anunciante WHERE turista.EmailTurista = '{$usuario}' OR anunciante.EmailAnunciante = '{$usuario}'";
        //$result = mysqli_query($mysqli, $query);
        //$nomeUsuario = 
        //echo $result;
        $_SESSION['usuario'] = $nome;
        header('Location: index.php');
        exit();
    } else { //se não, volta para a tela de login
        header('Location: login.php');   
        $_SESSION['nao_autenticado'] = true;    
        exit;
    }*/
?>