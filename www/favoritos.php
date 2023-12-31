<?php
    session_start();
    include('conecta.php');

    if(isset($_SESSION['Anunciante'])) {
        $queryFotoPerfil = "SELECT FotoAnunciante from anunciante where Cnpj='{$_SESSION['cnpj']}'";
        $resultFotoPerfil = mysqli_query($mysqli, $queryFotoPerfil);
        $rowFotoPerfil = $resultFotoPerfil->fetch_assoc();
        if($rowFotoPerfil["FotoAnunciante"] == null) {
            $nulo = true;
        } else {
            $nulo = false;
            $img_src = $rowFotoPerfil["FotoAnunciante"];
        }
      }
  
      if(isset($_SESSION['Turista'])) {
        $queryFotoPerfil = "SELECT FotoTurista from turista where Cpf='{$_SESSION['cpf']}'";
        $resultFotoPerfil = mysqli_query($mysqli, $queryFotoPerfil);
        $rowFotoPerfil = $resultFotoPerfil->fetch_assoc();
        if($rowFotoPerfil["FotoTurista"] == null) {
            $nulo = true;
        } else {
            $nulo = false;
            $img_src = $rowFotoPerfil["FotoTurista"];
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Favoritos</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="stylesheet" href="../css/style_favoritos.css">  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <ul class="menu">
            <li class="dropdown"><a href="index.php"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
            <li class="dropdown"><a class="categorias-menu" href="#"><b>LISTA DE FAVORITOS</b></a></li>
            <?php
                if(isset($_SESSION['usuario'])): //caso o usuário esteja logado, o botão ficará com o nome dele
            ?>
                <div style="float:right;">
                    <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="perfil.php" class="link_botao"><img src="<?php if($nulo == true) { echo '../images/icones/usuario-login.png'; } else{ echo 'data:image/png;base64,'.base64_encode($img_src); } ?>" class="foto_perfil"><?php echo $_SESSION['usuario'];else:?></a></button></li>
                </div>
                <div style="float:right;">
                    <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="login.php" class="link_botao"><img src="../images/icones/usuario-login.png" width="40" height="40">Login<?php endif; ?></a></button></li>
                </div>
        </ul>
    </nav>
    <div class="container-principal">
        <div class="container-checkboxes">
            <form id="filtrar_favoritos" action="filtrar_favoritos.php" method="POST">
                <input type="radio" id="ES" name="ordenacao" value="ES" class="checkbox" onchange="document.getElementById('filtrar_favoritos').submit()" <?php if(isset($_SESSION['ordenacao']) && $_SESSION['ordenacao'] == 'ES') { echo 'checked'; } ?> >
                <label for="ES">ESPÍRITO SANTO</label>
                <input type="radio" id="MG" name="ordenacao" value="MG" class="checkbox" onchange="document.getElementById('filtrar_favoritos').submit()" <?php if(isset($_SESSION['ordenacao']) && $_SESSION['ordenacao'] == 'MG') { echo 'checked'; } ?>>
                <label for="MG">MINAS GERAIS</label>
                <input type="radio" id="RJ" name="ordenacao" value="RJ" class="checkbox" onchange="document.getElementById('filtrar_favoritos').submit()" <?php if(isset($_SESSION['ordenacao']) && $_SESSION['ordenacao'] == 'RJ') { echo 'checked'; } ?>>
                <label for="RJ">RIO DE JANEIRO</label>
                <input type="radio" id="SP" name="ordenacao" value="SP" class="checkbox" onchange="document.getElementById('filtrar_favoritos').submit()" <?php if(isset($_SESSION['ordenacao']) && $_SESSION['ordenacao'] == 'SP') { echo 'checked'; } ?>>
                <label for="SP">SÃO PAULO</label>
                <?php unset($_SESSION['ordenacao']); ?>
            </form>
        </div>
        <div class="container-favoritos">
            <div id="listaFavoritos" class="divisaoFavoritos">
                <?php
                    if (isset($_SESSION["busca_completa"])) {
                        echo '<form>';
                        for($i=0; $i<count($_SESSION['resultados_busca']['Cep']); $i++ ){
                            echo '<a href=detalhes_ponto.php?Cep='.$_SESSION['resultados_busca']['Cep'][$i].'>
                            <figure>
                            <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['Imagem'][$i]). '"></img>
                            <p class = legenda>'.$_SESSION['resultados_busca']["NomeLocal"][$i].'</p>
                            <p class = legenda>'.$_SESSION['resultados_busca']["Logradouro"][$i].'</p>
                            </figure>
                            </a>';
                            unset($_SESSION['resultados_busca']['Imagem'][$i]);
                            unset($_SESSION['resultados_busca']['NomeLocal'][$i]);
                            unset($_SESSION['resultados_busca']['Logradouro'][$i]);
                        }
                        unset($_SESSION['resultados_busca']);
                        echo '</form>';
                        unset($_SESSION['busca_completa']);
                    } else {
                        if (isset( $_SESSION['busca_fracasso'])) {
                            echo "<p style='text-align:center'>Você não possui nenhum ponto favorito nesse estado.</p>";
                            unset($_SESSION['busca_fracasso']);
                            exit();
                        }
                        if(isset($_SESSION['Anunciante'])) {
                            $queryFavoritos = "SELECT CepPonto from favoritos WHERE CnpjAnunciante = '{$_SESSION['cnpj']}'";
                        }

                        if(isset($_SESSION['Turista'])) {
                            $queryFavoritos = "SELECT CepPonto from favoritos WHERE CpfTurista = '{$_SESSION['cpf']}'";
                        }

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
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="../js/favoritos.js"></script>
</body>