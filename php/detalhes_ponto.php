<?php
    include("conecta.php");
    session_start();

    $Cep = $_REQUEST["Cep"];

    $query = "SELECT * from local where Cep='{$Cep}'";
    $result = mysqli_query($mysqli, $query);
    $row = $result->fetch_assoc();

    $queryHoras = "SELECT * from horafuncionamento WHERE horafuncionamento.CepPonto = '{$row['Cep']}'";
    $resultHoras = mysqli_query($mysqli, $queryHoras);
    $num = mysqli_num_rows($resultHoras);
    //$rowHoras = $resultHoras ->fetch_assoc();
    /*while ($rowHoras = $resultHoras ->fetch_assoc()){
        echo $rowHoras['idHora'];
        echo " ";
        echo $rowHoras['diaSemana'];
        echo " ";
        echo $rowHoras['HoraAbertura'];
        echo " ";
        echo $rowHoras['CepPonto'];
        echo "<br>";
    }
  
    exit();*/
    //   - Primeira parte precisa de: imagem, nome do local, descrição, endereço, tabela de horários (INNER JOIN), rede social.
    //echo $Cep;
    //echo $row['NomeLocal'];
    //exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Detalhes Ponto</title>
    <link rel="shortcut icon" 
          href="../images/logos/sudestour_logo.png">
    <link rel="stylesheet" href="../css/style_detalhes.css">
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
            <li class="dropdown"><a class="categorias-menu" href="espiritosanto.php"><b>Espírito Santo</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="minasgerais.php"><b>Minas Gerais</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="riodejaneiro.php"><b>Rio de Janeiro</b></a></li>
            <li class="dropdown"><a class="categorias-menu" href="saopaulo.php"><b>São Paulo</b></a></li>
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
            <div class="container-imagem">
                <img src="<?php echo "data:image/png;base64,". base64_encode($row["Imagem"]) ?>" class="imagem-ponto"><br>
                <!-- src = "data:image/png;base64,' .base64_encode($_SESSION['resultados_busca']['imagem'][$i]). '" -->
                <div class="container-dados">
                    <p class="legenda"><?php echo $row['NomeLocal']; ?></p><br>
                    <p class="legenda"><?php echo $row['Logradouro']; ?></p>
                </div>
                <img src="../images/icones/fav_desativado.png" class="icon-fav"> 
            </div>    
            <div class="container-descricao">
                <div class="opcoes">
                    <button class="opcao" style="margin:0 auto; display: inline-block;">SOBRE</button>
                    <div class="vl"></div>
                    <button class="opcao">AVALIAÇÕES</button><br>
                </div>
                <div class="descricao">
                    <label class="descricao_ponto"><?php echo $row['Descricao']; ?></label><br>
                </div>
                <div class="container-infos">
                    <img src="../images/icones/icon_local.png"><label class="endereco_ponto"><?php echo $row['Logradouro'].', '. $row['Numero'] . ' - '. $row['Cidade'].', '.$row['Uf'].', '.$row['Cep']; ?></label><br>
                    <img src="../images/icones/icon_redes.png"><label class="redes_sociais"><?php echo $row['RedeSocial']; ?></label><br>
                    <!--<img src="../images/icones/icon_abertura.png"><label class="horario_abertura">Horários ↓</label>-->
                        <img src="../images/icones/icon_abertura.png"><button onclick="mostrarTabela()" class="horario_abertura">Horários ↓</button>
                </div>
                <div class="tabela_horas" id="tabela_horas" style="width: 100%; margin: 0 auto;">
                    <!--<h5 class="titulo_tb_horas">Horários</h5>-->
                    <table style="margin-left: auto; margin-right: auto;">
                        <tr>
                            <th>Dia Semana</th>
                            <th>Abertura</th>
                            <th>Fechamento</th>
                        </tr>
                        <?php
                            while ($rowHoras = $resultHoras ->fetch_assoc()){
                        ?>
                            <tr style="border: 2px solid #737373;">
                                <td><?php echo $rowHoras['diaSemana'] ?></td>
                                <td><?php echo $rowHoras['HoraAbertura']  ?></td>
                                <td><?php echo $rowHoras['HoraFechamento'] ?></td>
                            </tr>
                        <?php } ?>
                    </table><br>
                    <p id="teste"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mostrarTabela() {
            var tb = document.getElementById("tabela_horas");
            if(tb.style.display == "none") {
                tb.style.display = "block";
            } else{
                tb.style.display = "none";
            }
        }
    </script>
</body>