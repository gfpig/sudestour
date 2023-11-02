<?php
    session_start();
    include("conecta.php");

    //evitar que alguém entre nessa página sem passar pelo cadastro.php
    if (empty($_POST['nomeAnunciante']) || empty($_POST['cnpjAnunciante']) || empty($_POST['senhaAnunciante']) || empty($_POST['emailAnunciante'])) {
        //$_SESSION['preencha_campos']; <-- Não precisa pois o navegador já faz essa verificação!
        header('Location: cadastro.php');
        exit();
    }       

    $nomeAnunciante = mysqli_real_escape_string($mysqli, $_POST["nomeAnunciante"]);                
    $cnpjAnunciante = mysqli_real_escape_string($mysqli, $_POST["cnpjAnunciante"]);
    $senhaAnunciante = mysqli_real_escape_string($mysqli, $_POST["senhaAnunciante"]);   
    $emailAnunciante = mysqli_real_escape_string($mysqli, $_POST["emailAnunciante"]);           
    $queryAnunciante = "INSERT INTO anunciante(`Cnpj`, `SenhaAnunciante`,`EmailAnunciante`, `NomeAnunciante`, `statusPremium`) VALUES ('$cnpjAnunciante', '$senhaAnunciante', '$emailAnunciante', '$nomeAnunciante', 0)";
    
    //$sucesso = mysqli_query($mysqli, $queryAnunciante);
    try {
        if (mysqli_query($mysqli, $queryAnunciante)) { //se o ponto for adicionado, criamos uma sessão e redirecionamos
            $_SESSION["usuario_cadastrado"] = true;
            //echo $_SESSION['usuario_cadastrado'];
            header("Location: cadastro.php");
            exit();
        }
    } catch (Exception $ex) {
        $_SESSION['nao_cadastrado'] = true; 
        header('Location: cadastro.php');   
        //echo $_SESSION['nao_cadastrado'];
        exit();
    }
    /* else {
        $_SESSION['nao_cadastrado'] = true; 
        header('Location: cadastro.php');   
        //echo $_SESSION['nao_cadastrado'];
        exit();
    } */
?>