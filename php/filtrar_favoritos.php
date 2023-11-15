<?php 
    session_start();
    include('conecta.php');

    if(isset($_SESSION['Anunciante'])) {
        //$resultTotal;
        $uf = $_POST['ordenacao'];

        $queryFavoritos = "SELECT favoritos.CepPonto, local.Uf from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = '{$uf}'";
        //SELECT favoritos.CepPonto, local.Uf from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = 'teste1'
        /*if(isset($_POST['ordenacao']) && $_POST['ordenacao'] == 'SP') {
            $querySP = "SELECT favoritos.CepPonto, local.Uf from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = 'SP'";
            $resultSP = mysqli_query($mysqli, $querySP);
            $resultTotal += $resultSP;
        }
        if(isset($_POST['ordenacao']) && $_POST['ordenacao'] == 'RJ') {
            $queryRJ = "SELECT favoritos.CepPonto, local.Uf from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = 'RJ'";
            $resultRJ = mysqli_query($mysqli, $queryRJ);
            $resultTotal += $resultRJ;
        }
        if(isset($_POST['ordenacao']) && $_POST['ordenacao'] == 'MG') {
            $queryMG = "SELECT favoritos.CepPonto, local.Uf from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = 'MG'";
            $resultMG = mysqli_query($mysqli, $queryMG);
            $resultTotal += $resultMG;
        }
        if(isset($_POST['ordenacao']) && $_POST['ordenacao'] == 'ES') {
            $queryES = "SELECT favoritos.CepPonto, local.Uf from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = 'ES'";
            $resultES = mysqli_query($mysqli, $queryES);
            $resultTotal += $resultES;
        }*/

        $resultFavoritos = mysqli_query($mysqli, $resultFavoritos);

        if (mysqli_num_rows($resultFavoritos) > 0) {
            $i = 0;

            while($row = $result->fetch_assoc()) {  
                //$queryPontos = "SELECT Cep, NomeLocal, Logradouro, Imagem from local WHERE Cep='{$row['CepPonto']}'";          
                $_SESSION['resultados_busca']['NomeLocal'][$i] = $row['NomeLocal'];
                $_SESSION['resultados_busca']['Logradouro'][$i] = $row['Logradouro'];
                $_SESSION['resultados_busca']['Imagem'][$i] = $row['Imagem'];
                $i++;
            }
            $_SESSION['busca_completa'] = true;
        } else {
            $_SESSION['busca_fracasso'] = true;
        }
        header('Location: favoritos.php');
    }

    if(isset($_SESSION['Turista'])) {
        $queryFavoritos = "SELECT CepPonto from favoritos WHERE CpfTurista = '{$_SESSION['cpf']}'";
    }

    //echo $queryFavoritos;
    $resultFavoritos = mysqli_query($mysqli, $queryFavoritos);
    while($row = $resultFavoritos->fetch_assoc()) {
        $queryPontos = "SELECT Cep, NomeLocal, Logradouro, Imagem from local WHERE Cep='{$row['CepPonto']}'";
        $resultPontos = mysqli_query($mysqli, $queryPontos);
        while($rowPontos = $resultPontos->fetch_assoc()) {
            echo '<a href=detalhes_ponto.php?Cep='.$rowPontos["Cep"].'>
            <figure id='.$rowPontos["Cep"].'>
            <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($rowPontos["Imagem"]). '"></img>
            <p class = legenda>'.$rowPontos["NomeLocal"].'</p>
            <p class = legenda>'.$rowPontos["Logradouro"].'</p>
            </figure>
            </a>';
        }
    }
?>