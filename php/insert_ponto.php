<?php
    include("conecta.php");
    session_start();

    //$diretorio = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
    //$cover = addslashes(file_get_contents($_FILES["cover"]["tmp_name"]));

    //ADICIONANDO NA TABELA LOCAIS

    $queryAnunciante = "SELECT Cnpj from anunciante WHERE NomeAnunciante = '{$_SESSION['usuario']}'";

    //se não encontrar o anunciante, volte à tela de adicionar ponto
    if(!mysqli_query($mysqli, $queryAnunciante)){
        $_SESSION["erro"] = true; 
        header('Location: adicionar_ponto.php');
        exit();
    }

    $result = mysqli_query($mysqli, $queryAnunciante);
    $coluna = $result->fetch_assoc();	

    $cnpj = $coluna["Cnpj"];
    $nome = $_POST["nome"]; 
    $site = $_POST["site"];               
    $cep = $_POST["CEP"];
    $bairro = $_POST["bairro"];   
    $logradouro = $_POST["logradouro"];                 
    $cidade = $_POST["cidade"];             
    $uf = $_POST["UF"];   
    $complemento = $_POST["complemento"]; 
    $numero = $_POST["numero"]; 
    $telefone = $_POST["telefone"]; 
    $descricao = $_POST["descricao"];
    $categoria = $_POST['categoria'];
    //$categoria = $_POST['IdCategoria'];
    //echo $categoria;
    //exit();
    $imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));
    
    $queryLocal = "INSERT INTO local(`Cep`, `Bairro`,`Logradouro`, `Complemento`, `Telefone`, `RedeSocial` , `Imagem`, `Uf`, `Cidade`, `NomeLocal`,`Numero`, `Descricao`, `CNPJ`, `IdCategoria`) VALUES ('$cep', '$bairro', '$logradouro', '$complemento', '$telefone', '$site', '$imagem', '$uf', '$cidade','$nome', '$numero', '$descricao', '$cnpj', '$categoria')";                    
    
    //ADICIONANDO NA TABELA DE HORARIOS
    $SegAbertura = mysqli_real_escape_string($mysqli, $_POST['SegAbre']);
    $SegFechamento = mysqli_real_escape_string($mysqli, $_POST['SegFecha']);
    $TerAbertura = mysqli_real_escape_string($mysqli, $_POST['TerAbre']);
    $TerFechamento = mysqli_real_escape_string($mysqli, $_POST['TerFecha']);
    $QuaAbertura = mysqli_real_escape_string($mysqli, $_POST['QuaAbre']);
    $QuaFechamento = mysqli_real_escape_string($mysqli, $_POST['QuaFecha']);
    $QuiAbertura = mysqli_real_escape_string($mysqli, $_POST['QuiAbre']);
    $QuiFechamento = mysqli_real_escape_string($mysqli, $_POST['QuiFecha']);
    $SextaAbertura = mysqli_real_escape_string($mysqli, $_POST['SextaAbre']);
    $SextaFechamento = mysqli_real_escape_string($mysqli, $_POST['SextaFecha']);
    $SabAbertura = mysqli_real_escape_string($mysqli, $_POST['SabAbre']);
    $SabFechamento = mysqli_real_escape_string($mysqli, $_POST['SabFecha']);
    $DomAbertura = mysqli_real_escape_string($mysqli, $_POST['DomAbre']);
    $DomFechamento = mysqli_real_escape_string($mysqli, $_POST['DomFecha']);

    $querySeg = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Segunda', '$SegAbertura', '$SegFechamento')";
    $queryTer = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Terça', '$TerAbertura', '$TerFechamento')";
    $queryQua = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Quarta', '$QuaAbertura', '$QuaFechamento')";
    $queryQui = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Quinta', '$QuiAbertura', '$QuiFechamento')";
    $querySexta = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Sexta', '$SextaAbertura', '$SextaFechamento')";
    $querySab = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Sábado', '$SabAbertura', '$SabFechamento')";
    $queryDom = "INSERT INTO horafuncionamento(`CepPonto`, `diaSemana`, `HoraAbertura`, `HoraFechamento`) VALUES ('$cep', 'Dom', '$DomAbertura', '$DomFechamento')";

    if(mysqli_query($mysqli, $queryLocal) && mysqli_query($mysqli, $querySeg) && mysqli_query($mysqli, $queryTer) && 
        mysqli_query($mysqli, $queryQua) && mysqli_query($mysqli, $queryQui) && mysqli_query($mysqli, $querySexta) && 
        mysqli_query($mysqli, $querySab) && mysqli_query($mysqli, $queryDom)){
        $_SESSION["sucesso"] = true; 
        header('Location: adicionar_ponto.php');
    } else{
        $_SESSION["erro"] = true; 
        header('Location: adicionar_ponto.php');
    }

    mysqli_close($mysqli); 
?>