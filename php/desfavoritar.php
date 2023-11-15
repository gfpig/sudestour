<?php 
    session_start();
    include('conecta.php');

    $Cep = $_REQUEST['Cep'];

    //LÓGICA PRA NÃO ENTRAR DE PARAQUEDAS
    if($Cep == null) {
        header('Location: index.php');
    }
    //echo 'alo';
    //exit();

    //REMOVENDO SE FOR ANUNCIANTE
    if(isset($_SESSION['Anunciante'])) {
        //echo 'alo';
        //exit();
        $Cnpj = $_SESSION['cnpj'];
        $queryDesfavorita = "DELETE from favoritos where CepPonto='{$Cep}' AND CnpjAnunciante='{$Cnpj}'";
        //echo $queryDesfavorita;
        //exit();
        //$resultDesfavoritao = mysqli_query($mysqli, $queryDesfavorita);
        if(mysqli_query($mysqli, $queryDesfavorita)) {
            header("Location: detalhes_ponto.php?Cep=$Cep");
        }
    }

    if(isset($_SESSION['Turista'])) {
        $Cpf = $_SESSION['Cpf'];
        $queryDesfavorita = "DELETE from favoritos where CepPonto='{$Cep}' AND CnpjAnunciante='{$Cnpj}'";
        //$resultDesfavoritao = mysqli_query($mysqli, $queryDesfavorita);
        //$qtd_row = mysqli_num_rows($resultDesfavorita);
        if(mysqli_query($mysqli, $queryDesfavorita)) {
            header("Location: detalhes_ponto.php?Cep=$Cep");
        }
    }
?>