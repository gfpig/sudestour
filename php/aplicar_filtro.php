<?php
    session_start();
    include("conecta.php");

    //SE NÃO TIVER VALOR RECEBIDO, REDIRECIONAR PARA A TELA INDEX
    if (empty($_POST['bairros']) || empty($_POST['cidades']) || empty($_POST['categorias'])) {
        header('Location: index.php');
    }

    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairros']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidades']);
    $categoria = mysqli_real_escape_string($mysqli, $_POST['categorias']);
    $uf = mysqli_real_escape_string($mysqli, $_POST['uf']);

    $query = "SELECT * FROM local WHERE Bairro = '{$bairro}' AND Cidade = '{$cidade}' AND IdCategoria = '{$categoria}' AND Uf = '{$uf}'  ORDER BY Bairro ASC";
    $result = mysqli_query($mysqli, $query);
    $qtde_row = mysqli_num_rows($result);
    $i = 0;

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {            
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

    header('Location: saopaulo.php');
?>