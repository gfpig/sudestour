<?php
    session_start();
    include ("conecta.php");

    if(empty($_POST["nome"]) || empty($_POST["documento"]) || empty($_POST["email"])) {
        echo $_POST["nome"].'<br>';
        echo $_POST["documento"].'<br>';
        echo $_POST["email"].'<br>';
        exit();
        header('Location: index.php');
    }

    //Impedindo a edição caso o form seja ativado pelo botão
    if (isset($_POST['favoritos']) || isset($_POST['sair'])) {
        header('Location: perfil.php');
        exit();
    }

    if(isset($_SESSION['Anunciante'])) {
        $nomeanun = $_POST["nome"];
        $cnpjanun = $_POST["documento"];
        $emailanun = $_POST["email"];

        //$imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));

        $query = "UPDATE anunciante SET NomeAnunciante='{$nomeanun}', EmailAnunciante='{$emailanun}'";//WHERE Cnpj='{$cnpjanun}'";
        
        if(empty ($_FILES['input_imagem']['tmp_name'])) {
            $query .= " WHERE Cnpj='{$cnpjanun}'";
        } else {
            $imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
            $query .= ", FotoAnunciante='{$imagem}' WHERE Cnpj='{$cnpjanun}'";
        }
        //echo $query;
        //exit();
        
        $result = mysqli_query($mysqli, $query);
        if($result){ 
            $_SESSION['usuario'] = $nomeanun;
            $_SESSION["sucesso"] = true;
            header('Location: perfil.php');

            exit();
        }
        else if(!mysqli_query($mysqli, $query)){
            $_SESSION['erro'] = true;
            header('Location: perfil.php');  
        }                 
        mysqli_close($mysqli);
    }

    if(isset($_SESSION['Turista'])) {
        $nome = $_POST["nome"];
        $cpf = $_POST["documento"];
        $email = $_POST["email"];
        //$imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));

        $query = "UPDATE turista SET NomeTurista='{$nome}', EmailTurista='{$email}'";
        //echo addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
        //exit();
        //$imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
        if(empty ($_FILES['input_imagem']['tmp_name'])) {
            $query .= " WHERE Cpf='{$cpf}'";
            //$imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
            //$imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
            //$query .= " FotoTurista='{$imagem}' WHERE Cpf='{$cpf}'";
            //echo $query;
            //exit();
            //$query = "UPDATE turista SET NomeTurista='{$nome}', EmailTurista='{$email}', FotoTurista='{$imagem}' WHERE Cpf='{$cpf}'";
            //UPDATE turista SET NomeTurista='Flávia', EmailTurista='teste1@gmail.com,' FotoTurista='
        } else {
            //$query .= " WHERE Cpf='{$cpf}'";
            $imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
            $query .= ", FotoTurista='{$imagem}' WHERE Cpf='{$cpf}'";
        }
        //echo $query;
        //exit();
        $result = mysqli_query($mysqli, $query);

        if($result){ 
            $_SESSION['usuario'] = $nome;
            $_SESSION["sucesso"] = true;

            header('Location: perfil.php');
            exit();
        }
        else if(!mysqli_query($mysqli, $query)){
            $_SESSION['erro'] = true;
            header('Location: perfil.php');  
        }                 
        mysqli_close($mysqli);
    }
?>