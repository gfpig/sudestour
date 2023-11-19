<?php
    session_start();
    include("conecta.php");

    //SE NÃO TIVER VALOR RECEBIDO, REDIRECIONAR PARA A TELA INDEX
    if (empty($_POST['bairros']) && empty($_POST['cidades']) && empty($_POST['categorias'])) {
        header('Location: index.php');
        exit();
    }

    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairros']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidades']);
    $categoria = mysqli_real_escape_string($mysqli, $_POST['categorias']);
    $uf = mysqli_real_escape_string($mysqli, $_POST['uf']);

    $query = "SELECT * FROM local WHERE Cidade = '{$cidade}'";
    
    if(!empty($_POST['bairros'])) {
        $query .= " AND Bairro = '{$bairro}'";
    }

    if(!empty($_POST['categorias'])) {
        $query .= " AND IdCategoria = '{$categoria}'";
    }

    $query .= " AND Uf = '{$uf}'  ORDER BY Bairro ASC";
    //echo $query;
    //exit();
    $result = mysqli_query($mysqli, $query);
    $qtde_row = mysqli_num_rows($result);
    $i = 0;

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['resultados_busca']['nome'][$i] = $row['NomeLocal'];
            $_SESSION['resultados_busca']['cep'][$i] = $row['Cep'];
            $_SESSION['resultados_busca']['logradouro'][$i] = $row['Logradouro'];
            $_SESSION['resultados_busca']['imagem'][$i] = $row['Imagem'];

            $_SESSION['select_cidade'] = $row['Cidade'];
            $_SESSION['select_bairro'] = $row['Bairro'];
            $_SESSION['select_categoria'] = $row['IdCategoria'];
            $i++;
        }
        $_SESSION['busca_completa'] = true;
    } else {
        $_SESSION['busca_fracasso'] = true;
    }

    if ($uf == "SP") {
        header('Location: saopaulo.php');
        exit();
    }

    if ($uf == "RJ") {
        header('Location: riodejaneiro.php');
        exit();
    }

    if ($uf == "MG") {
        header('Location: minasgerais.php');
        exit();
    }

    if ($uf == "ES") {
        header('Location: espiritosanto.php');
        exit();
    }
?>