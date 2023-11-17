<?php 
    include('conecta.php');
    session_start();

    $cep = $_REQUEST["Cep"];
    //$cpf = $_SESSION['cpf'];

    //se o usuário não estiver logado, redirecionar para a página do ponto
    //onde será exibido um pop-up pedindo para efetuar o login
    if(!isset($_SESSION['cpf'])) {
        $_SESSION['nao_logado'] = true;
        header("Location: detalhes_ponto.php?Cep=$cep");
        exit();
    }

    //Pegando os dados necessários para inserir na tabela
    $comentario = mysqli_real_escape_string($mysqli,$_POST['comentario_usuario']);
    $nota = mysqli_real_escape_string($mysqli,$_POST['input_nota']);
    $cpf = $_SESSION['cpf'];

    

    $query = "INSERT INTO avaliacao(`Comentario`, `CepPonto`, `CpfTurista`, `nota`) VALUE ('$comentario', '$cep', '$cpf', '$nota')";
    $result = mysqli_query($mysqli, $query);

    /*$qtdComentarios = 0;
    $queryComentarios = "SELECT Comentario from local WHERE Cep = '{$cep}'";
    $resultComentarios = mysqli_query($mysqli, $queryComentarios);
    if ($result) {
        $rowComentarios = $result->fetch_assoc();
        $qtdComentarios = 
    }*/
    $media = $nota;
    $queryMedia = "SELECT nota FROM avaliacao WHERE CepPonto = '{$cep}'";
    $resultMedia = mysqli_query($mysqli, $queryMedia);
    $rows = mysqli_num_rows($resultMedia);
    if (mysqli_num_rows($resultMedia) > 0) {
        while($rowMedia = $resultMedia->fetch_assoc()) { 
            $media += $rowMedia['nota'];
        }
        $media = $media / ($rows + 1);
        /*$queryUpdate = "UPDATE local SET Avaliacao = $media";
        $resultUpdate = mysqli_query($mysqli, $queryUpdate);
        if($resultUpdate) {
            header("Location: detalhes_ponto.php?Cep=$cep");
        }*/
    } 

    //echo $media;
    //exit();
    $queryUpdate = "UPDATE local SET Avaliacao = $media, Comentario = Comentario + 1 WHERE Cep = '{$cep}'";
    $resultUpdate = mysqli_query($mysqli, $queryUpdate);
    //echo $query;
    //exit();

    //se a query for um sucesso, envia de volta para a página do ponto.
    if($result && $resultUpdate) {
        $_SESSION['sucesso'] = true;
        header("Location: detalhes_ponto.php?Cep=$cep");
        /*$media = 0;
        $queryMedia = "SELECT nota FROM avaliacao WHERE CepPonto = '{$cep}'";
        $resultMedia = mysqli_query($mysqli, $queryMedia);
        $rows = mysqli_num_rows($resultMedia);
        if (mysqli_num_rows($resultMedia) > 0) {
            while($rowMedia = $resultMedia->fetch_assoc()) { 
                $media += $rowMedia['nota'];
            }
            $media = $media / $rows;
            $queryUpdate = "UPDATE local SET Avaliacao = $media";
            $resultUpdate = mysqli_query($mysqli, $queryUpdate);
            if($resultUpdate) {
                header("Location: detalhes_ponto.php?Cep=$cep");
            }
        } */
    }
?>