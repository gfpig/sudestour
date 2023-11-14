<?php
    session_start();
    include('conecta.php');

    /*if(isset($_SESSION['Anunciante'])) {
        $queryFavoritos = "SELECT CepPonto from favoritos WHERE Cnpj = '{$_SESSION['cnpj']}')";
        $resultFavoritos = mysqli_query($mysqli, $queryFavoritos);
        
    }*/
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
            <!--<li class="dropdown" id="menuUsuario"><a href="login.php"><img src="../images/icones/usuario-login.png" width="40" height="40"></a></li>-->
        <!--Mudar a página de destino da foto de perfil do usuário para o perfil dele ao invés da tela de login-->
            <?php
                if(isset($_SESSION['usuario'])): //caso o usuário esteja logado, o botão ficará com o nome dele
            ?>
                <div style="float:right;">
                    <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="perfil.php" class="link_botao"><img src="../images/icones/usuario-login.png" width="40" height="40"><?php echo $_SESSION['usuario'];else:?></a></button></li>
                </div>
                <div style="float:right;">
                    <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="login.php" class="link_botao"><img src="../images/icones/usuario-login.png" width="40" height="40">Login<?php endif; ?></a></button></li>
                </div>
        </ul>
    </nav>
    <div class="container-principal">
        <div class="container-checkboxes">
            <input type="checkbox" id="ES" name="ordenacao" class="checkbox" checked="checked">
            <label for="html">ESPÍRITO SANTO</label>
            <input type="checkbox" id="MG" name="ordenacao" class="checkbox" checked="checked">
            <label for="css">MINAS GERAIS</label>
            <input type="checkbox" id="RJ" name="ordenacao" class="checkbox" checked="checked">
            <label for="html">RIO DE JANEIRO</label>
            <input type="checkbox" id="SP" name="ordenacao" class="checkbox" checked="checked">
            <label for="css">SÃO PAULO</label>
        </div>
        <div class="container-favoritos">
            <div id="listaFavoritos" class="divisaoFavoritos">
            <?php
                //if (isset($_SESSION["busca_completa"])) {
                    if(isset($_SESSION['Anunciante'])) {
                        $queryFavoritos = "SELECT CepPonto from favoritos WHERE CnpjAnunciante = '{$_SESSION['cnpj']}'";
                        //$resultFavoritos = mysqli_query($mysqli, $queryFavoritos);
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
                //}
                //if(isset($_SESSION['Anunciante'])) {
        //$queryFavoritos = "SELECT CepPonto from favoritos WHERE Cnpj = '{$_SESSION['cnpj']}')";
        //$resultFavoritos = mysqli_query($mysqli, $queryFavoritos);
        
    //}
                ?>
            </div>
        </div>
    </div>
    <script src="../js/favoritos.js"></script>
</body>