<?php
    session_start();
    include("conecta.php");

    $cep = $_REQUEST["Cep"];

    //Pegando a PK do ponto de interesse favoritado
    $query = "SELECT Cep from local where Cep='{$cep}'";
    $result = mysqli_query($mysqli, $query);

    //Pegando a PK de quem favoritou e adicionando na tabela de acordo com o tipo de usuário
    if (isset($_SESSION['Anunciante'])) {
        $cnpj = $_SESSION['cnpj'];
        $queryUsuario = "SELECT Cnpj from anunciante where Cnpj='{$cnpj}'";
        $resultUsuario = mysqli_query($mysqli, $queryUsuario);

        $queryAddFav = "INSERT into favoritos(CnpjAnunciante, CepPonto) VALUES ('$cnpj', '$cep')";
        
        try {
            if (mysqli_query($mysqli, $queryAddFav)) {
                header("Location: detalhes_ponto.php?Cep=$cep");
                exit();
            }
        } catch (Exception $ex) {
            header("Location: detalhes_ponto.php?Cep=$cep");
            exit();
        }
    }

    if(isset($_SESSION['Turista'])) {
        $cpf = $_SESSION['cpf'];
        $queryUsuario = "SELECT cpf from turista where cpf='{$cpf}'";
        $resultUsuario = mysqli_query($mysqli, $queryUsuario);

        $queryAddFav = "INSERT into favoritos(CpfTurista, CepPonto) VALUES ('$cpf', '$cep')";
        
        try {
            if (mysqli_query($mysqli, $queryAddFav)) {
                header("Location: detalhes_ponto.php?Cep=$cep");
                exit();
            }
        } catch (Exception $ex) {
            header("Location: detalhes_ponto.php?Cep=$cep");
            exit();
        }
    }
?>