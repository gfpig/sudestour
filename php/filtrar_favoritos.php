<?php 
    session_start();
    include('conecta.php');

    if(isset($_SESSION['Anunciante'])) {
        //$resultTotal;
        $uf = $_POST['ordenacao'];

        $queryFavoritos = "SELECT favoritos.CepPonto, local.Uf, local.NomeLocal, local.Logradouro, local.Imagem from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = '{$uf}'";
        //echo $queryFavoritos;
        //exit();
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

        $resultFavoritos = mysqli_query($mysqli, $queryFavoritos);
        //$rows = mysqli_num_rows($resultFavoritos);
        //echo $rows;
        //exit();
        $i = 0;
        if (mysqli_num_rows($resultFavoritos) > 0) {
            while($row = $resultFavoritos->fetch_assoc()) {    
                $_SESSION['resultados_busca']['Cep'][$i] = $row['CepPonto'];   
                $_SESSION['resultados_busca']['NomeLocal'][$i] = $row['NomeLocal'];
                $_SESSION['resultados_busca']['Logradouro'][$i] = $row['Logradouro'];
                $_SESSION['resultados_busca']['Imagem'][$i] = $row['Imagem'];
                //echo $i.'<br>';
                
                $i++;
                
            }
            //exit();
            $_SESSION['busca_completa'] = true;
        } else {
            $_SESSION['busca_fracasso'] = true;
        }
        header('Location: favoritos.php');
    }

    if(isset($_SESSION['Turista'])) {
        $uf = $_POST['ordenacao'];

        $queryFavoritos = "SELECT favoritos.CepPonto, local.Uf, local.NomeLocal, local.Logradouro, local.Imagem from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CpfTurista = '{$_SESSION['cpf']}' AND local.Uf = '{$uf}'";
        $resultFavoritos = mysqli_query($mysqli, $queryFavoritos);
        $i = 0;

        if (mysqli_num_rows($resultFavoritos) > 0) {
            while($row = $resultFavoritos->fetch_assoc()) {    
                $_SESSION['resultados_busca']['Cep'][$i] = $row['CepPonto'];   
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
?>