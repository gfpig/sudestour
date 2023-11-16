<?php
    session_start();
    include ("conecta.php");
    //require('conecta.php');

    //echo $_POST['favoritos'];
    //exit();

    if(empty($_POST["nome"]) || empty($_POST["documento"]) || empty($_POST["email"])) {
        header('Location: index.php');
    }

    //Impedindo a edição caso o form seja ativado pelo botão
    if (isset($_POST['favoritos']) || isset($_POST['sair'])) {
        header('Location: perfil.php');
        exit();
    }
    
    //echo $cnpjanun;
    //$dado = $mysqli->prepare("UPDATE 'anunciante' SET 'NomeAnunciante' = ?, 'Cnpj' = ?, 'EmailAnunciante' = ? WHERE 'Anunciante'.'Cnpj' = ?;");
    //$dado->bind_param("ssi", $nomeanun, $cnpjanun, $emaianun, $cnpjanun);
    //$dado->execute();

    if(isset($_SESSION['Anunciante'])) {
        $nomeanun = $_POST["nome"];
        $cnpjanun = $_POST["documento"];
        $emailanun = $_POST["email"];

        $query = "UPDATE anunciante SET NomeAnunciante='{$nomeanun}', EmailAnunciante='{$emailanun}' WHERE Cnpj='{$cnpjanun}'";
        $result = mysqli_query($mysqli, $query);
        if($result){ 
            $_SESSION['usuario'] = $nomeanun;
            //exit();
            //echo "<p class='text-success'>Os dados foram alterados corretamente. Verifique o resultado na aba Exibir.</p>";
            $_SESSION["sucesso"] = true;
            header('Location: perfil.php');
            //echo $_SESSION["sucesso"];
            //$_SESSION["sucesso"] = true;
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

        $query = "UPDATE turista SET NomeTurista='{$nome}', EmailTurista='{$email}' WHERE Cpf='{$cpf}'";
        $result = mysqli_query($mysqli, $query);

        if($result){ 
            $_SESSION['usuario'] = $nome;
            //echo $_SESSION['usuario'];
            //exit();
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