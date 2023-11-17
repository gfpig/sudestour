<?php
    session_start();
    include("conecta.php");

    //SE NÃO TIVER VALOR RECEBIDO, REDIRECIONAR PARA A TELA INDEX
    /*if (empty($_POST['bairros']) || empty($_POST['cidades']) || empty($_POST['categorias'])) {
        header('Location: index.php');
        exit();
    }*/
    if (empty($_POST['ordenacao'])) {
        header('Location: index.php');
        exit();
    }
    /*$bairro = mysqli_real_escape_string($mysqli, $_POST['bairros']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidades']);
    $categoria = mysqli_real_escape_string($mysqli, $_POST['categorias']);
    $uf = mysqli_real_escape_string($mysqli, $_POST['uf']);*/
    $uf = mysqli_real_escape_string($mysqli, $_POST['uf']);
    $ordem = $_POST['ordenacao'];

    $query = "SELECT NomeLocal, Cep, Logradouro, Imagem, Comentario FROM local WHERE Uf = '{$uf}'  ORDER BY $ordem DESC";
    echo $query;
    exit();
    $result = mysqli_query($mysqli, $query);
    $qtde_row = mysqli_num_rows($result);
    $i = 0;

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $media = 0;
            /*$queryMedia = "SELECT * FROM avaliacao WHERE CepPonto = '{$row['Cep']}'";
            $resultMedia = mysqli_query($mysqli, $queryMedia);
            $rows = mysqli_num_rows($resultMedia);
            if (mysqli_num_rows($resultMedia) > 0) {
                while($rowMedia = $resultMedia->fetch_assoc()) { 
                    $media += $rowMedia['nota'];
                }
                $media = $media / $rows;
            }  
            echo $media.'<br>';
            exit();  */
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