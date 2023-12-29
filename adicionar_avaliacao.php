<?php 
    include('conecta.php');
    session_start();

    $cep = $_REQUEST["Cep"];

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

    $media = 0;
    $queryMedia = "SELECT nota FROM avaliacao WHERE CepPonto = '{$cep}'";
    $resultMedia = mysqli_query($mysqli, $queryMedia);
    $rows = mysqli_num_rows($resultMedia);
    if (mysqli_num_rows($resultMedia) > 0) {
        //echo 'media normal(nota): '.$media;
        while($rowMedia = $resultMedia->fetch_assoc()) { 
            $media += $rowMedia['nota'];
        }
        //echo 'media normal(soma): '.$media;
        $media = $media / ($rows);
        //echo 'media nova: '.$media;
        //echo 'colunas: '.$rows;
        //exit();
    } 

    $queryUpdate = "UPDATE local SET Avaliacao = $media, Comentario = Comentario + 1 WHERE Cep = '{$cep}'";
    $resultUpdate = mysqli_query($mysqli, $queryUpdate);

    //se a query for um sucesso, envia de volta para a página do ponto.
    if($result && $resultUpdate) {
        header("Location: detalhes_ponto.php?Cep=$cep");
    }
?>