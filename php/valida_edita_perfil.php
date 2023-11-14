<?php
    session_start();
    include ("conecta.php");
    //require('conecta.php');

    $nomeanun = $_POST["nome"];
    $cnpjanun = $_POST["documento"];
    $emailanun = $_POST["email"];
    //echo $cnpjanun;
    //$dado = $mysqli->prepare("UPDATE 'anunciante' SET 'NomeAnunciante' = ?, 'Cnpj' = ?, 'EmailAnunciante' = ? WHERE 'Anunciante'.'Cnpj' = ?;");
    //$dado->bind_param("ssi", $nomeanun, $cnpjanun, $emaianun, $cnpjanun);
    //$dado->execute();
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
?>