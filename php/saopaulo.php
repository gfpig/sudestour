<?php
    session_start();
    include("conecta.php");
    $uf = "SP";
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
                <li class="dropdown" id="botao"><button id="botao-login" class="botaoLogin"><a href="perfil.php" class="link_botao"><img src="../images/icones/usuario-login.png" width="40" height="40"><?php echo $_SESSION['usuario'];else:?></a></button></li>
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
                        <?php
                            /*$result = $mysqli->query("SELECT DISTINCT `Bairro` FROM `local` WHERE Uf = 'SP' ORDER BY `Bairro` ASC");
                            while($row = $result->fetch_assoc()) {
                                echo '<option value ="' . $row['Bairro'] . '">' . $row['Bairro'] . '</option>';
                            }*/
                        ?>
                    </select><br>

                    <label for="categorias"><b>Selecione a categoria:</b></label><br>
                    <select name="categorias" id="categorias" class="combobox_filtros">
                        <option value=""></option>
                        <?php
                            //$result = $mysqli->query("SELECT DISTINCT `IdCategoria` FROM `local` WHERE Uf = 'SP'");
                            $result = $mysqli->query("SELECT DISTINCT categoria.NomeCategoria, categoria.IdCategoria from categoria INNER JOIN local ON categoria.IdCategoria = local.IdCategoria WHERE Uf = 'SP'");
                            while($row = $result->fetch_assoc()) {
                                //$nomeCategoria = $mysqli->query("SELECT DISTINCT `categoria.NomeCategoria` from categoria INNER JOIN local ON categoria.IdCategoria = local.IdCategoria WHERE Uf = 'SP'")
                                echo '<option value ="' . $row['IdCategoria'] . '">' . $row['NomeCategoria'] . '</option>';
                            }
                        ?>
                    </select><br>

                    <button name="submit_filtros" class="botaoBuscar">BUSCAR</button>

                    </form>

                    <?php 
                        /*if(isset($_POST['submit_filtros'])) {
                            $cidade = $_POST['cidades'];
                            $bairro = $_POST['bairros'];
                            $categoria = $_POST['categorias'];

                            // $result = $mysqli->query("SELECT * FROM `local` WHERE Uf = 'SP'"); 
                            //$query = "SELECT * FROM local WHERE Bairro = '{$bairro}' AND Cidade = '{$cidade}' AND Categoria = '{$categoria}' AND Uf = 'SP'  ORDER BY `Bairro` ASC";
                            $result = $mysqli->query("SELECT * FROM local WHERE Bairro = '{$bairro}' AND Cidade = '{$cidade}' AND IdCategoria = '{$categoria}' AND Uf = 'SP'  ORDER BY `Bairro` ASC");

                            /*if(mysqli_num_rows($result) > 0) {
                                foreach($result as $value) {
                                    echo '<figure>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
                                    <p class = legenda>'.$row["NomeLocal"].'</p>
                                    <p class = legenda>'.$row["Logradouro"].'</p>
                                    </figure>';
                                }
                            }
                            $html = preg_replace('#<div id="listaPontos">(.*?)</div>#', '', $html);
                            while($row = $result->fetch_assoc()) {

                                    echo '<figure>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
                                    <p class = legenda>'.$row["NomeLocal"].'</p>
                                    <p class = legenda>'.$row["Logradouro"].'</p>
                                    </figure>';
                            }
                        }*/
                    ?>
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
                    <div id="listaPontos" class="divisaoItensNormais">
                        <?php
                            //$html = '<div id="listaPontos" class="divisaoItensNormais"></div>';
                            if (isset($_SESSION["busca_completa"])) {
                                for($i=0; $i<count($_SESSION['resultados_busca']['cep']); $i++ ){
                                    echo '<figure>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['imagem'][$i]). '"></img>
                                    <p class = legenda>'.$_SESSION['resultados_busca']["nome"][$i].'</p>
                                    <p class = legenda>'.$_SESSION['resultados_busca']["logradouro"][$i].'</p>
                                    </figure>';
                                    unset($_SESSION['resultados_busca']['imagem'][$i]);
                                    unset($_SESSION['resultados_busca']['nome'][$i]);
                                    unset($_SESSION['resultados_busca']['logradouro'][$i]);
                                }
                                unset($_SESSION['busca_completa']);
                            } else {
                                $result = $mysqli->query("SELECT * FROM `local` WHERE Uf = 'SP'"); 
                                while($row = $result->fetch_assoc()) {
                                    echo '<figure>
                                    <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
                                    <p class = legenda>'.$row["NomeLocal"].'</p>
                                    <p class = legenda>'.$row["Logradouro"].'</p>
                                    </figure>';
                                }
                            }
                        ?>
                    </div>
                    <?php
                        //$html = '<div id="listaPontos" class="divisaoItensNormais"></div>';
                        /*if (isset($_SESSION["busca_completa"])) {
                            for($i=0; $i<count($_SESSION['resultados_busca']['cep']); $i++ ){
                                echo '<figure>
                                <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['imagem'][$i]). '"></img>
                                <p class = legenda>'.$_SESSION['resultados_busca']["nome"][$i].'</p>
                                <p class = legenda>'.$_SESSION['resultados_busca']["logradouro"][$i].'</p>
                                </figure>';
                                unset($_SESSION['resultados_busca']['imagem'][$i]);
                                unset($_SESSION['resultados_busca']['nome'][$i]);
                                unset($_SESSION['resultados_busca']['logradouro'][$i]);
                            }
                            unset($_SESSION['busca_completa']);
                        } else {
                            $result = $mysqli->query("SELECT * FROM `local` WHERE Uf = 'SP'"); 
                            while($row = $result->fetch_assoc()) {
                                echo '<figure>
                                <img class = "img_ponto" src = "data:image/png;base64,' .base64_encode($row["Imagem"]). '"></img>
                                <p class = legenda>'.$row["NomeLocal"].'</p>
                                <p class = legenda>'.$row["Logradouro"].'</p>
                                </figure>';
                            }
                        }*/
                    ?>

                    <script type="text/javascript">
                        /*$(document).ready(function() {
                            $("#cidades").on('change', function() {
                                var value = $(this).val();
                            })
                        })*/
                    </script>
                </div>
            </div>
        </div>
       <script src="../js/filtro.js"></script>
    </body>