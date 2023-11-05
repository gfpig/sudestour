<?php
    session_start();
    include("conecta.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Pontos Turisticos do Rio de Janeiro</title>
    <link rel="stylesheet" href="../css/style_filtro.css">
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
            <div style="margin-left:8%; width:80%; display:contents">
                <li class="dropdown"><a href="index.php"><img src="../images/logos/sudestour_logo_claro.png" width="50" height="50" ></a></li>
                <li class="dropdown"><a class="categorias-menu" href="espiritosanto.php"><b>Espírito Santo</b></a></li>
                <li class="dropdown"><a class="categorias-menu" href="minasgerais.php"><b>Minas Gerais</b></a></li>
                <li class="dropdown"><a class="categorias-menu" href="#" style="background-color: #474747;"><b>Rio de Janeiro</b></a></li>
                <li class="dropdown"><a class="categorias-menu" href="saopaulo.php"><b>São Paulo</b></a></li>
            </div>
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
        <div class="container-esquerda">
            <div class="container-filtros">
                <label for="cidades"><b>Selecione a cidade:</b></label><br>
                <select name="cidades" id="cidades" class="combobox_filtros">
                    <option value="Vitória">Vitória</option>
                    <option value="Vila Velha">Vila Velha</option>
                    <option value="Cariacica">Cariacica</option>
                </select><br>
                <label for="bairros"><b>Selecione o bairro:</b></label><br>
                <select name="bairros" id="bairros" class="combobox_filtros">
                <option value="argolas">Argolas</option>
                <option value="Ibes">Ibes</option>
                <option value="Jucu">Jucu</option>
                <option value="São Torquato">São Torquato</option>
                <option value="Sede">Sede</option>
                </select><br>
                <label for="categorias"><b>Selecione a categoria:</b></label><br>
                <select name="categorias" id="categorias" class="combobox_filtros">
                <option value="restaurante">Restaurante</option>
                <option value="praia">Praia</option>
                <option value="bar">Bar</option>
                <option value="balada">Balada</option>
                <option value="roupas">Roupas</option>
                </select><br>
                <button class="botaoBuscar">BUSCAR</button>
            </div>
        </div>
        <div class="container-direita">
            <div class="direita-radiobuttons">
                ORDENAR POR:
                <input type="radio" id="mais_visitados" name="ordenacao" class="radiobutton" checked="checked">
                <label for="html">MAIS VISITADOS</label>
                <input type="radio" id="melhor_avaliados" name="ordenacao" class="radiobutton">
                <label for="css">MELHORES AVALIADOS</label>
            </div>
            <hr>
            <div class="direita-destaques">
                <div class="divisaoCategorias">
                    <div id="listaDestaques" class="divisaoItensDestaque"></div>
                </div>
            </div>
            <div class="direita-pontos">
                <div id="listaPontos" class="divisaoItensNormais"></div>
            </div>
        </div>
    </div>
    <script src="../js/filtro.js"></script>
</body>