<?php
    session_start();
    include("conecta.php");
    $uf = "SP";

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
<style>
    <?php include '../css/style_filtro.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Pontos Turisticos de São Paulo</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="stylesheet" type="text/css" href="../css/style_filtro.css">
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
                <li class="dropdown"><a class="categorias-menu" href="riodejaneiro.php"><b>Rio de Janeiro</b></a></li>
                <li class="dropdown"><a class="categorias-menu" href="#" style="background-color: #474747;"><b>São Paulo</b></a></li>
            </div>
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
    <?php
        /*$result = $mysqli->query("SELECT * FROM `local` WHERE Uf = 'SP'"); 
        while($row = $result->fetch_assoc()) {
            //echo '<script>addNormais($row["NomeLocal"], $row["Logradouro"], $row["Imagem"]);</script>';
            /*$NomeLocal = $row["nome"];
            $Logradouro = $row["Logradouro"];
            $Imagem = $row["Imagem"];//
            //echo json_encode($result);
            echo '<figure style="margin-top: 2%;text-align: center; display: inline-table; position: static;">
            <img src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
            <p style="font-family: "Roboto", sans-serif; font-size: 17px; margin: -10px; color: #545454;">'.$row["NomeLocal"].'</p>
            <p class = legenda>'.$row["Logradouro"].'</p>
            </figure>';
        }*/
    ?>
    <div class="container-principal">
        <div class="container-esquerda">
            <div class="container-filtros">

                <?php
                    if(isset($_SESSION['busca_fracasso'])) {
                        echo "Nenhum ponto satisfaz sua busca :(";
                    }
                    unset($_SESSION['busca_fracasso']);
                ?>
                    
                <form action="aplicar_filtro.php" method="POST">
                    <input type='hidden' name='uf' value='SP'/>
                    
                    <label><b>Selecione a cidade:</b></label><br>
                    <select name="cidades" id="cidades" class="combobox_filtros">
                        <option value=""></option>
                        <?php
                            $result = $mysqli->query("SELECT DISTINCT `Cidade` FROM `local` WHERE Uf = 'SP' ORDER BY `Cidade` ASC");
                            while($row = $result->fetch_assoc()) {
                                echo '<option value ="' . $row['Cidade'] . '">' . $row['Cidade'] . '</option>';
                            }
                        ?>
                    </select><br>
                    <label for="bairros"><b>Selecione o bairro:</b></label><br>
                    <select name="bairros" id="bairros" class="combobox_filtros">
                        <option value=""></option>
                    </select><br>
                    <label for="categorias"><b>Selecione a categoria:</b></label><br>
                    <select name="categorias" id="categorias" class="combobox_filtros">
                        <option value=""></option>
                        <?php
                            $result = $mysqli->query("SELECT DISTINCT categoria.NomeCategoria, categoria.IdCategoria from categoria INNER JOIN local ON categoria.IdCategoria = local.IdCategoria WHERE Uf = 'SP'");
                            while($row = $result->fetch_assoc()) {
                                echo '<option value ="' . $row['IdCategoria'] . '">' . $row['NomeCategoria'] . '</option>';
                            }
                        ?>
                    </select><br>
                    <button name="submit_filtros" class="botaoBuscar">BUSCAR</button>
                </form>
            </div>
                
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

            <script type="text/javascript">
                $(function() {
                    $('#cidades').change(function() {
                        if( $(this).val()) {
                            $.getJSON('preencher_bairros.php?search=', {cidades: $(this).val(), ajax: 'true'}, function(j) {
                                var options = '<option value=""></option>';
                                for (var i = 0; i < j.length; i++) {
                                    options += '<option value="' + j[i].bairros + '">' + j[i].bairros + '</option>';
                                }
                                $('#bairros').html(options).show();
                            });
                        }      
                    });
                });
            </script>
        </div>
        <div class="container-direita">
            <form id="ordenar_pontos" action="ordenar_pontos.php" method="POST">
                <div class="direita-radiobuttons">
                    ORDENAR POR:
                    <input type='hidden' name='uf' value='SP'/>
                    <input type="radio" id="Comentario" value="Comentario" name="ordenacao" class="radiobutton" onchange="document.getElementById('ordenar_pontos').submit()" <?php if(isset($_SESSION['tipo_ordenacao']) && $_SESSION['tipo_ordenacao'] == 'Comentario') { echo 'checked'; } ?>>
                    <label for="Comentario">MAIS COMENTADOS</label>
                    <input type="radio" id="Avaliacao" value="Avaliacao" name="ordenacao" class="radiobutton" onchange="document.getElementById('ordenar_pontos').submit()" <?php if(isset($_SESSION['tipo_ordenacao']) && $_SESSION['tipo_ordenacao'] == 'Avaliacao') { echo 'checked'; } ?>>
                    <label for="Avaliacao">MELHORES AVALIADOS</label>
                    <?php unset($_SESSION['tipo_ordenacao']); ?>
                </div>
            </form>
            <hr>
            <div class="direita-destaques">
                <div class="divisaoCategorias">
                    <div id="listaDestaques" class="divisaoItensDestaque">
                        <?php 
                            $result = $mysqli->query("SELECT local.NomeLocal, local.Cep, local.Logradouro, local.Imagem, anunciante.statusPremium FROM `local` INNER JOIN anunciante ON local.CNPJ = anunciante.Cnpj WHERE Uf = 'SP'");
                            //$queryD = "SELECT local.NomeLocal, local.Cep, local.Logradouro, local.Imagem, anunciante.statusPremium FROM `local` INNER JOIN anunciante ON local.CNPJ = anunciante.Cnpj WHERE Uf = 'SP'";
                            //echo $queryD;
                            //exit();
                            while($row = $result->fetch_assoc()) {
                                    if($row['statusPremium'] == 1) {
                                    echo '<a href=detalhes_ponto.php?Cep='.$row["Cep"].'>
                                    <figure id='.$row["Cep"].'>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
                                    <p class = legenda>'.$row["NomeLocal"].'</p>
                                    <p class = legenda>'.$row["Logradouro"].'</p>
                                    </figure>
                                    </a>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="direita-pontos">
                <div id="listaPontos" class="divisaoItensNormais">
                    <?php
                        if (isset($_SESSION["busca_completa"])) {
                            echo '<form>';
                            for($i=0; $i<count($_SESSION['resultados_busca']['cep']); $i++ ){
                                echo '<a href=detalhes_ponto.php?Cep='.$_SESSION['resultados_busca']['cep'][$i].'>
                                <figure>
                                <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['imagem'][$i]). '"></img>
                                <p class = legenda>'.$_SESSION['resultados_busca']["nome"][$i].'</p>
                                <p class = legenda>'.$_SESSION['resultados_busca']["logradouro"][$i].'</p>
                                </figure>
                                </a>';
                                unset($_SESSION['resultados_busca']['imagem'][$i]);
                                unset($_SESSION['resultados_busca']['nome'][$i]);
                                unset($_SESSION['resultados_busca']['logradouro'][$i]);
                            }
                            echo '</form>';
                            unset($_SESSION['resultados_busca']);
                            unset($_SESSION['busca_completa']);
                        } else {
                            //$result = $mysqli->query("SELECT * FROM `local` WHERE Uf = 'SP'");
                            $result = $mysqli->query("SELECT local.NomeLocal, local.Cep, local.Logradouro, local.Imagem, anunciante.statusPremium FROM `local` INNER JOIN anunciante ON local.CNPJ = anunciante.Cnpj WHERE Uf = 'SP'");

                            while($row = $result->fetch_assoc()) {
                                if($row['statusPremium'] == 0) {
                                    echo '<a href=detalhes_ponto.php?Cep='.$row["Cep"].'>
                                    <figure id='.$row["Cep"].'>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
                                    <p class = legenda>'.$row["NomeLocal"].'</p>
                                    <p class = legenda>'.$row["Logradouro"].'</p>
                                    </figure>
                                    </a>';
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/filtro.js"></script>
</body>