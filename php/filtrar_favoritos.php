<?php 
    session_start();
    include('conecta.php');

    if(isset($_SESSION['Anunciante'])) {
        //$resultTotal;
        $uf = $_POST['ordenacao'];

        $queryFavoritos = "SELECT favoritos.CepPonto, local.Uf, local.NomeLocal, local.Logradouro, local.Imagem from favoritos INNER JOIN local WHERE favoritos.CepPonto = local.Cep AND CnpjAnunciante = '{$_SESSION['cnpj']}' AND local.Uf = '{$uf}'";
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
            $_SESSION['ordenacao'] = $uf;
            $_SESSION['busca_completa'] = true;
        } else {
            $_SESSION['ordenacao'] = $uf;
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
            $_SESSION['ordenacao'] = $uf;
            $_SESSION['busca_completa'] = true;
        } else {
            $_SESSION['ordenacao'] = $uf;
            $_SESSION['busca_fracasso'] = true;
        }
        header('Location: favoritos.php');
    }
?>