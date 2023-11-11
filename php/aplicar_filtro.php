<?php
    session_start();
    include("conecta.php");

    //COLOCAR UMA CONDIÇÃO SE NÃO TIVER VALOR RECEBIDO





    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairros']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidades']);
    $categoria = mysqli_real_escape_string($mysqli, $_POST['categorias']);

    //$result = $mysqli->execute("SELECT * FROM local WHERE Bairro = '{$bairro}' AND Cidade = '{$cidade}'  ORDER BY `Bairro` ASC");
    $query = "SELECT * FROM local WHERE Bairro = '{$bairro}' AND Cidade = '{$cidade}' AND IdCategoria = '{$categoria}' AND Uf = 'SP'  ORDER BY Bairro ASC";
    $result = mysqli_query($mysqli, $query);
    $qtde_row = mysqli_num_rows($result);
    $i = 0;

    //echo $qtde_row;
    //exit();

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            //echo $i;
            /*$cnpj = $coluna["Cnpj"];
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
            $imagem = addslashes(file_get_contents($_FILES["input_imagem"]["tmp_name"]));*/
            
            $_SESSION['resultados_busca']['cnpj'][$i] = $row['CNPJ'];
            $_SESSION['resultados_busca']['nome'][$i] = $row['NomeLocal'];
            $_SESSION['resultados_busca']['site'][$i] = $row['RedeSocial'];
            $_SESSION['resultados_busca']['cep'][$i] = $row['Cep'];
            $_SESSION['resultados_busca']['bairro'][$i] = $row['Bairro'];
            $_SESSION['resultados_busca']['logradouro'][$i] = $row['Logradouro'];
            $_SESSION['resultados_busca']['cidade'][$i] = $row['Cidade'];
            $_SESSION['resultados_busca']['uf'][$i] = $row['Uf'];
            $_SESSION['resultados_busca']['complemento'][$i] = $row['Complemento'];
            $_SESSION['resultados_busca']['numero'][$i] = $row['Numero'];
            $_SESSION['resultados_busca']['telefone'][$i] = $row['Telefone'];
            $_SESSION['resultados_busca']['descricao'][$i] = $row['Descricao'];
            $_SESSION['resultados_busca']['categoria'][$i] = $row['IdCategoria'];
            $_SESSION['resultados_busca']['imagem'][$i] = $row['Imagem'];
            $i++;
        }
        $_SESSION['busca_completa'] = true;
    } else {
        $_SESSION['busca_fracasso'] = true;
    }
    //exit();
    
    header('Location: saopaulo.php');
    
?>