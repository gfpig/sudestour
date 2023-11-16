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
    //echo $query;
    //exit();

    //se a query for um sucesso, envia de volta para a página do ponto.
    if($result) {
        $_SESSION['sucesso'];
        header("Location: detalhes_ponto.php?Cep=$cep");
    }
?>