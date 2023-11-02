<?php
    session_start();
    include("conecta.php");

    //evitar que alguém entre nessa página sem passar pelo cadastro.php
    if (empty($_POST['nomeTurista']) || empty($_POST['cpfTurista']) || empty($_POST['senhaTurista']) || empty($_POST['emailTurista'])) {
        //$_SESSION['preencha_campos']; <-- Não precisa pois o navegador já faz essa verificação!
        header('Location: cadastro.php');
        exit();
    }       

    $nomeTurista = mysqli_real_escape_string($mysqli, $_POST["nomeTurista"]);                
    $cpfTurista = mysqli_real_escape_string($mysqli, $_POST["cpfTurista"]);
    $senhaTurista = mysqli_real_escape_string($mysqli, $_POST["senhaTurista"]);   
    $emailTurista = mysqli_real_escape_string($mysqli, $_POST["emailTurista"]);           
    $queryTurista = "INSERT INTO turista(`Cpf`, `SenhaTurista`,`EmailTurista`, `NomeTurista`) VALUES ('$cpfTurista', '$senhaTurista', '$emailTurista', '$nomeTurista')";
    
    //$sucesso = mysqli_query($mysqli, $queryTurista);
    try {
        if (mysqli_query($mysqli, $queryTurista)) { //se o ponto for adicionado, criamos uma sessão e redirecionamos
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
?>